<!-- Toast and Modal -->
<div id="toast-container"></div>
<audio id="notifSound" src="notif.mp3" preload="auto"></audio>

<div id="addProductModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50">
  <div class="w-full max-w-xl bg-white rounded-2xl shadow-xl overflow-hidden">
    <!-- Header -->
    <div class="p-5 bg-gray-50 border-b border-gray-100 flex items-center justify-between">
      <div class="flex items-center">
        <div class="p-2.5 bg-primary-slate text-white rounded-full mr-3 shadow-md">
          <i class="fas fa-boxes text-lg"></i>
        </div>
        <div>
          <h2 class="text-xl font-extrabold text-primary-slate uppercase">Add New Product</h2>
          <p class="text-sm text-gray-500">Product details & unique identification.</p>
        </div>
      </div>
      <button onclick="closeAddProductModal()" class="close-btn text-2xl font-bold">&times;</button>
    </div>

    <!-- Body -->
    <div class="p-6">
      <div id="modal-alert-container" class="mb-3"></div>
      <form id="addProductForm">
        <!-- Product Name -->
        <div class="mb-4">
          <label for="product_name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name *</label>
          <div class="input-wrapper">
            <input type="text" id="product_name" name="product_name" class="form-input-field w-full px-4 py-2.5 text-gray-800" placeholder="e.g., Wireless Mouse" required>
            <i class="fas fa-tag input-icon"></i>
          </div>
        </div>
        <!-- Category -->
        <div class="mb-4">
          <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
          <div class="input-wrapper">
            <select id="category" name="category" class="form-select-field w-full px-4 py-2.5 text-gray-800" required>
              <option value="" disabled selected>Select a category</option>
              <option>Keyboard</option>
              <option>Mouse</option>
              <option>Controller</option>
              <option>Speaker</option>
              <option>Headphone</option>
            </select>
            <i class="fas fa-layer-group input-icon"></i>
            <i class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
          </div>
        </div>
        <!-- Unit Price -->
        <div class="mb-4">
          <label for="unit_price" class="block text-sm font-semibold text-gray-700 mb-2">Unit Price (₱) *</label>
          <div class="input-wrapper">
            <input type="number" id="unit_price" name="unit_price" step="0.01" min="0.01" class="form-input-field w-full px-4 py-2.5 text-gray-800" placeholder="0.00" required>
            <i class="fas fa-peso-sign input-icon"></i>
          </div>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <div class="p-5 border-t border-gray-100 bg-gray-50 flex justify-end gap-3">
      <button onclick="closeAddProductModal()" class="text-primary-slate font-semibold hover:bg-gray-200 px-4 py-2.5 rounded-lg">
        <i class="fas fa-times-circle mr-2"></i> Cancel
      </button>
      <button type="submit" form="addProductForm" class="bg-primary-slate text-white font-semibold hover:bg-gray-700 px-4 py-2.5 rounded-lg shadow-md">
        <i class="fas fa-save mr-2"></i> Save Product
      </button>
    </div>
  </div>
</div>
