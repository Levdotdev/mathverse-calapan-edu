<div id="product-update-modal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Update Product</h2>
            <button class="modal-close-btn" data-modal-id="product-update-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="product-update-form">
                <input type="hidden" id="update-product-id">
                <div class="form-group">
                    <label for="update-name">Product Name</label>
                    <div class="input-group">
                        <i class="fas fa-tag"></i>
                        <input type="text" id="update-name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-category">Category</label>
                    <div class="input-group">
                        <i class="fas fa-layer-group"></i>
                        <input type="text" id="update-category" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-price">Price</label>
                    <div class="input-group">
                        <i class="fas fa-peso-sign"></i>
                        <input type="number" id="update-price" step="0.01" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-stock">Stock</label>
                    <div class="input-group">
                        <i class="fas fa-boxes"></i>
                        <input type="number" id="update-stock" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="update-barcode">Barcode</label>
                    <div class="input-group">
                        <i class="fas fa-barcode"></i>
                        <input type="text" id="update-barcode">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="action-btn modal-cancel-btn" data-modal-id="product-update-modal">Cancel</button>
            <button class="action-btn primary-btn" id="save-update-product-btn">Save Changes</button>
        </div>
    </div>
</div>
