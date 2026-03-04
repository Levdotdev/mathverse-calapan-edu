<?php
include APP_DIR.'views/templates/header.php';
?>
<body style="background-image: url('<?= base_url();?>public/resources/jenshin.gif'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div id="app">
    <?php
    include APP_DIR.'views/templates/nav.php';
    ?>  
    <main class="mt-3 pt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="characters-header">
    <h1>Genshin Trash Bin</h1>

    <div class="header-actions">
        <form action="<?=site_url('trash-user');?>" method="get" class="search-form">
            <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
            <input class="form-control" name="q" type="text" placeholder="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

    <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Character</th>
        <th>Element</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach(html_escape($all) as $char): ?>
      <tr>
        <td><?= $char['id']; ?></td>
        <td>
          <img src="<?= base_url().'uploads/'.$char['pic']; ?>" alt="<?= $char['name']; ?>">
        </td>
        <td><?= $char['name']; ?></td>
        <td><?= $char['class']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

    <?php
	echo $page;?>
            </div>
        </div>
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>

<!--<div id="reports" class="content-section">
                <div class="toolbar">
                    <button class="action-btn primary-btn" onclick="openModal('modal-generate-report')"><i class="fas fa-chart-bar"></i> Generate Report</button>
                </div>
        
                <div class="report-box-grid">
                    <div class="report-box">
                        <h3><i class="fas fa-coins"></i> Sales Summary: <?= date('F Y'); ?></h3>
                        <p>Total Sales: ₱ <?= $data['sales']['total']; ?></p>
                        <p>Total Transactions: <?= $data['transacts']['total']; ?></p>
                        <p>Products Sold: <?= $data['sold']['sold']; ?></p>
                        <p class="trend up"><i class="fas fa-arrow-up"></i>Monthly Totals</p>
                    </div>
                    <div class="report-box">
                        <h3><i class="fas fa-user-tie"></i> Top Cashier (<?= date('M'); ?>)</h3>
                        <p>Total Transactions: <?= $data['top_cashier']['total_transactions']; ?></p>
                        <p>Total Sales Handled: ₱ <?= number_format($data['top_cashier']['total_sales'], 2); ?></p>
                        <p class="trend up"><i class="fas fa-trophy"></i> Best Performer</p>
                    </div>
                </div>

                <div class="placeholder-chart">
                    <h3 style="font-family: 'Playfair Display', serif; margin-top: 3px; text-align: center;">Top 5 Selling Products (Units Sold)</h3>
                    <div class="table-container">
                        <table class="data-table top-products-table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Product Name</th>
                                    <th>Units Sold</th>
                                    <th>Sales (₱)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $rank = 1;
                                foreach ($data['top_products'] as $product): ?>
                                    <tr>
                                        <td><?= $rank++; ?></td>
                                        <td><?= $product['name']; ?></td>
                                        <td><?= $product['units_sold']; ?></td>
                                        <td><?= number_format($product['revenue'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="applicants" class="content-section">
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Applicant Name</th>
                                <th>Email</th>
                                <th>Date Applied</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(html_escape($applicants) as $applicant): ?>
                                <tr data-id="<?= $user['id']; ?>">
                                    <td><?= $applicant['id']; ?></td>
                                    <td><?= $applicant['fName']; ?></td>
                                    <td><?= $applicant['email']; ?></td>
                                    <td><?= $applicant['updated_at']; ?></td>
                                    <td>
                                        <button class="action-icon success-btn open-applicant-verify-modal" title="Verify/Approve" data-id="<?= $applicant['id']; ?>" data-name="<?= htmlspecialchars($applicant['fName']); ?>"><i class="fas fa-check"></i></button>
                                        <button class="action-icon delete-btn open-applicant-reject-modal" title="Reject/Delete" data-id="<?= $applicant['id']; ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo $page_applicants;?>
            </div> -->