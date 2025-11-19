<div id="inventory-update-modal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Update Inventory</h2>
            <button class="modal-close-btn" data-modal-id="inventory-update-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="inventory-update-form">
                <input type="hidden" id="inv-product-id">
                <div class="form-group">
                    <label for="inv-product-name">Product Name</label>
                    <div class="input-group">
                        <i class="fas fa-box"></i>
                        <input type="text" id="inv-product-name" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inv-current-stock">Current Stock</label>
                    <div class="input-group">
                        <i class="fas fa-layer-group"></i>
                        <input type="number" id="inv-current-stock" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inv-new-stock">Adjust Stock (use negative to subtract)</label>
                    <div class="input-group">
                        <i class="fas fa-plus-square"></i>
                        <input type="number" id="inv-new-stock" placeholder="e.g., 10 or -5" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inv-reason">Reason / Notes</label>
                    <div class="input-group">
                        <i class="fas fa-sticky-note"></i>
                        <input type="text" id="inv-reason" placeholder="Optional">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="action-btn modal-cancel-btn" data-modal-id="inventory-update-modal">Cancel</button>
            <button class="action-btn primary-btn" id="save-inv-update-btn">Save Update</button>
        </div>
    </div>
</div>
