const notifSound = document.getElementById('notifSound');
    
    function playSound() {
        notifSound.currentTime = 0;
        notifSound.play().catch(() => {});
    }

    window.showToast = function(message, type = 'success') {
        playSound();
        const toastContainer = document.getElementById('toast-container');
        const toast = document.createElement('div');
        
        const icon = type === 'success' ? 'fa-check-circle' : 
                     type === 'error' ? 'fa-times-circle' : 'fa-info-circle';
        
        const bgClass = type === 'success' ? 'bg-green-600' : 
                        type === 'error' ? 'bg-red-600' : 'bg-blue-600';

        toast.className = `toast ${bgClass}`;
        toast.innerHTML = `
            <div style="display:flex; align-items:center; gap:10px">
                <i class="fas ${icon}"></i>
                <span>${message}</span>
            </div>
            <button class="close-toast">&times;</button>
        `;

        toastContainer.appendChild(toast);

        // Close logic
        toast.querySelector('.close-toast').addEventListener('click', () => {
            toast.style.animation = "fadeOut 0.4s forwards";
            setTimeout(() => toast.remove(), 400);
        });

        // Auto dismiss
        setTimeout(() => {
            toast.style.animation = "fadeOut 0.4s forwards";
            setTimeout(() => toast.remove(), 400);
        }, 5000);
    }