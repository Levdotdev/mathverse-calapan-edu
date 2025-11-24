<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class _TransactionController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StaffModel');

        // Auth check
        if(segment(2) != 'logout') {
            $id = $this->lauth->get_user_id();
            if(!logged_in()){
                redirect('auth/login');
            } else if($this->lauth->is_user_verified($id) == 0){
                if($this->lauth->set_logged_out()) redirect('auth/login');
            } else if(logged_in() && $this->lauth->get_role($id) == "user") {
                redirect('pos');
            }
        }
    }

    public function report()
    {
        // --- Sales total ---
        $stmt = $this->db->table('transactions')->select_sum('total','total')->get();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['sales'] = (float)($row['total'] ?? 0);

        // --- Products sold ---
        $stmt = $this->db->table('products')->select_sum('sold','sold')->where_null('deleted_at')->get();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['sold'] = (float)($row['sold'] ?? 0);

        // --- Total transactions ---
        $res = $this->db->raw('SELECT COUNT(id) AS total FROM transactions WHERE deleted_at IS NULL');
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $data['transacts'] = (int)($row['total'] ?? 0);

        // --- Top cashier ---
        $sql = "
            SELECT cashier,
                   COUNT(*) AS total_transactions,
                   SUM(total) AS total_sales
            FROM transactions
            WHERE MONTH(date) = MONTH(CURRENT_DATE())
              AND YEAR(date) = YEAR(CURRENT_DATE())
              AND deleted_at IS NULL
            GROUP BY cashier
            ORDER BY total_sales DESC
            LIMIT 1
        ";
        $res = $this->db->raw($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $data['top_cashier'] = [
            'cashier' => $row['cashier'] ?? 'N/A',
            'total_transactions' => (int)($row['total_transactions'] ?? 0),
            'total_sales' => (float)($row['total_sales'] ?? 0)
        ];

        // --- Top 5 products ---
        $sql = "
            SELECT name, sold AS units_sold, (sold*price) AS revenue
            FROM products
            WHERE deleted_at IS NULL
            ORDER BY sold DESC
            LIMIT 5
        ";
        $res = $this->db->raw($sql);
        $data['top_products'] = $res->fetchAll(PDO::FETCH_ASSOC);

        // --- Transactions grouped by cashier ---
        $month = date('m'); $year = date('Y');
        $trans = $this->db->table('transactions')
            ->where("MONTH(date)", $month)
            ->where("YEAR(date)", $year)
            ->where("deleted_at", NULL)
            ->order_by('cashier','ASC')
            ->order_by('date','DESC')
            ->get_all();

        $transactions_by_cashier = [];
        foreach($trans as $t){
            $transactions_by_cashier[$t['cashier']][] = $t;
        }
        $data['transactions_by_cashier'] = $transactions_by_cashier;

        // --- Generate PDF ---
        $dompdf = new Dompdf();
        ob_start();
        include APPPATH.'Views/pdf_templates/monthly_report.php';
        $html = ob_get_clean();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream("TechStore_Report_".date('F_Y').".pdf", ["Attachment" => true]);
    }
}
