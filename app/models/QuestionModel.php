<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: StaffModel
 * 
 * Automatically generated via CLI.
 */
class StaffModel extends Model {
    protected $table = 'questions';
    protected $primary_key = 'id';
    protected $fillable = ['grade', 'type', 'question', 'choice1', 'choice2', 'choice3', 'choice4'];
    protected $has_soft_delete = true;
    protected $soft_delete_column = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
    }

    public function questions($q, $records_per_page = null, $page = null) {
        if (is_null($page)) {
            return $this->db->table('questions')->get_all();
        } else {
            $query = $this->db->table('questions');
                
            // Build LIKE conditions

	    $query->grouped(function($x) use ($q) {
		    $x->like('grade', '%'.$q.'%')
                ->or_like('type', '%'.$q.'%');
	    })
	    ->where_null('deleted_at')
        ->order_by('grade', 'ASC')
        ->order_by('type', 'ASC');


            // Clone before pagination
            $countQuery = clone $query;

            $data['total_rows'] = $countQuery->select_count('*', 'count')
                                            ->get()['count'];

            $data['records'] = $query->pagination($records_per_page, $page)
                                    ->get_all();

            return $data;
        }
    }
}