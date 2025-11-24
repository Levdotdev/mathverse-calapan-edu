<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TechStore Monthly Report</title>
<style>
body { font-family: Arial, sans-serif; font-size: 12px; }
h1,h2,h3 { margin: 5px 0; }
table { border-collapse: collapse; width: 100%; margin-bottom: 15px; }
table, th, td { border: 1px solid #333; }
th, td { padding: 5px; text-align: center; }
th { background-color: #f2f2f2; }
strong { font-weight: bold; }
</style>
</head>
<body>

<h1>TechStore Monthly Report</h1>
<p>Generated on: <?= date('F d, Y H:i'); ?></p>

<h2>Sales Summary</h2>
<p>Total Sales: ₱ <?= number_format($data['sales'], 2); ?></p>
<p>Total Transactions: <?= $data['transacts']; ?></p>
<p>Products Sold: <?= $data['sold']; ?></p>

<h2>Top Cashier</h2>
<p>Cashier: <?= htmlspecialchars($data['top_cashier']['cashier']); ?></p>
<p>Total Transactions: <?= $data['top_cashier']['total_transactions']; ?></p>
<p>Total Sales Handled: ₱ <?= number_format($data['top_cashier']['total_sales'], 2); ?></p>

<h2>Top 5 Selling Products</h2>
<table>
<thead>
<tr>
<th>Rank</th>
<th>Product Name</th>
<th>Units Sold</th>
<th>Revenue (₱)</th>
</tr>
</thead>
<tbody>
<?php $rank=1; foreach($data['top_products'] as $p): ?>
<tr>
<td><?= $rank++; ?></td>
<td><?= htmlspecialchars($p['name']); ?></td>
<td><?= $p['units_sold']; ?></td>
<td><?= number_format($p['revenue'],2); ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<h2>Transactions of the Month (Grouped by Cashier)</h2>
<?php foreach($data['transactions_by_cashier'] as $cashier => $txs): ?>
<h3>Cashier: <?= htmlspecialchars($cashier); ?></h3>
<table>
<thead>
<tr>
<th>Transaction ID</th>
<th>Date</th>
<th>Total (₱)</th>
</tr>
</thead>
<tbody>
<?php 
$cashier_total = 0;
foreach($txs as $t):
    $cashier_total += (float)$t['total'];
?>
<tr>
<td><?= $t['id']; ?></td>
<td><?= date('Y-m-d H:i', strtotime($t['date'])); ?></td>
<td><?= number_format($t['total'],2); ?></td>
</tr>
<?php endforeach; ?>
<tr>
<td colspan="2"><strong>Total for <?= htmlspecialchars($cashier); ?></strong></td>
<td><strong>₱ <?= number_format($cashier_total,2); ?></strong></td>
</tr>
</tbody>
</table>
<?php endforeach; ?>

</body>
</html>
