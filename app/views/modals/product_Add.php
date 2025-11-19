<div id="product-add-modal" class="modal-overlay hidden">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Add Product</h2>
            <button class="modal-close-btn" data-modal-id="product-add-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="product-add-form">
                <div class="form-group">
                    <label for="add-name">Product Name</label>
                    <div class="input-group">
                        <i class="fas fa-tag"></i>
                        <input type="text" id="add-name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-category">Category</label>
                    <div class="input-group">
                        <i class="fas fa-layer-group"></i>
                        <input type="text" id="add-category" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-price">Price</label>
                    <div class="input-group">
                        <i class="fas fa-peso-sign"></i>
                        <input type="number" id="add-price" step="0.01" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-stock">Stock</label>
                    <div class="input-group">
                        <i class="fas fa-boxes"></i>
                        <input type="number" id="add-stock" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="add-barcode">Barcode</label>
                    <div class="input-group">
                        <i class="fas fa-barcode"></i>
                        <input type="text" id="add-barcode">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="action-btn modal-cancel-btn" data-modal-id="product-add-modal">Cancel</button>
            <button class="action-btn primary-btn" id="save-add-product-btn">Add Product</button>
        </div>
    </div>
</div>