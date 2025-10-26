const modal = document.getElementById('modal');
    const closeModal = document.getElementById('closeModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const form = document.getElementById('addProductForm');
    const modalAlertContainer = document.getElementById('modal-alert-container');
    const toastContainer = document.getElementById('toast-container');
    const notifSound = document.getElementById('notifSound');

    function playSound() {
      notifSound.currentTime = 0;
      notifSound.play().catch(() => {});
    }

    function showModalAlert(message, type) {
      playSound();
      const colors = {
        success: 'background:#dcfce7;color:#166534;border:1px solid #86efac;',
        error: 'background:#fee2e2;color:#991b1b;border:1px solid #fca5a5;',
        info: 'background:#dbeafe;color:#1e3a8a;border:1px solid #93c5fd;'
      }[type] || 'background:#dbeafe;color:#1e3a8a;border:1px solid #93c5fd;';

      modalAlertContainer.innerHTML = `
        <div class="modal-alert" style="${colors}">
          <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : 'fa-info-circle'}"></i>
          <span>${message}</span>
        </div>`;
    }

    function showToast(message, type) {
      playSound();
      const bg = {
        success: '#16a34a',
        error: '#dc2626',
        info: '#2563eb'
      }[type] || '#2563eb';

      const toast = document.createElement('div');
      toast.className = 'toast';
      toast.style.background = bg;
      toast.innerHTML = `
        <div class="flex items-center gap-2">
          <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-times-circle' : 'fa-info-circle'}"></i>
          <span>${message}</span>
        </div>
        <button class="close-toast">&times;</button>
      `;
      toastContainer.appendChild(toast);

      toast.querySelector('.close-toast').addEventListener('click', () => {
        toast.style.animation = 'fadeOut 0.4s forwards';
        setTimeout(() => toast.remove(), 400);
      });

      setTimeout(() => {
        toast.style.animation = 'fadeOut 0.4s forwards';
        setTimeout(() => toast.remove(), 400);
      }, 4000);
    }

    closeModal.onclick = () => modal.style.display = 'none';
    cancelBtn.onclick = () => modal.style.display = 'none';

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      showModalAlert('Product saved successfully!', 'success');
      showToast('Product added successfully!', 'success');
      form.reset();
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
      if (e.target === modal) modal.style.display = 'none';
    });