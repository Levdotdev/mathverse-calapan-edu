<div id="inventory-import-modal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Import Inventory (CSV)</h2>
            <button class="modal-close-btn" data-modal-id="inventory-import-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="inventory-import-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="csv-file">CSV File</label>
                    <div class="input-group">
                        <i class="fas fa-file-csv"></i>
                        <input type="file" id="csv-file" accept=".csv" required>
                    </div>
                </div>
                <p class="helper-text">Upload a .csv file with columns: product_id,barcode,name,price,stock (example).</p>
            </form>
        </div>
        <div class="modal-footer">
            <button class="action-btn modal-cancel-btn" data-modal-id="inventory-import-modal">Cancel</button>
            <button class="action-btn primary-btn" id="import-csv-btn">Import CSV</button>
        </div>
    </div>
</div>
