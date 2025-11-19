document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const sidebarToggle = document.getElementById("sidebar-toggle");
    const themeToggle = document.getElementById("theme-toggle");
    const logoutBtnTrigger = document.getElementById("logout-btn-trigger"); 
    
    const body = document.body;
        const navItems = document.querySelectorAll("#sidebar li[data-section]");
    
    const contentSections = document.querySelectorAll(".content-section");
    const pageTitleElement = document.querySelector(".page-title");
    const themeIcon = themeToggle.querySelector("i");

    const addProductBtn = document.getElementById("addProductBtn");
    if (addProductBtn) {
        addProductBtn.addEventListener("click", () => {
            window.location.href = "product.php"; 
        });
    }

    sidebarToggle.addEventListener("click", () => {
        if (window.innerWidth > 768) {
            sidebar.classList.toggle("collapsed");
        } else {
            sidebar.classList.toggle("visible");
        }
    });

    function applyTheme(isDark) {
        if (isDark) {
            body.classList.add("dark-mode");
            body.classList.remove("light-mode");
            themeIcon.classList.replace("fa-moon", "fa-sun");
            localStorage.setItem("theme", "dark-mode");
        } else {
            body.classList.replace("dark-mode", "light-mode");
            themeIcon.classList.replace("fa-sun", "fa-moon");
            localStorage.setItem("theme", "light-mode");
        }
    }

    const storedTheme = localStorage.getItem("theme");
    applyTheme(storedTheme === "dark-mode");

    themeToggle.addEventListener("click", () => {
        applyTheme(!body.classList.contains("dark-mode"));
    });

    navItems.forEach((item) => {
        item.addEventListener("click", () => {
            const targetSectionId = item.getAttribute("data-section");

            navItems.forEach((i) => i.classList.remove("active"));
            item.classList.add("active");

            contentSections.forEach((section) => section.classList.remove("active"));

            const targetSection = document.getElementById(targetSectionId);
            if (targetSection) {
                targetSection.classList.add("active");

                const newTitle = targetSection.querySelector("h2")
                    ? targetSection.querySelector("h2").textContent.trim()
                    : 'Dashboard';
                pageTitleElement.textContent = newTitle;
            }

            if (window.innerWidth <= 768) {
                sidebar.classList.remove("visible");
            }
        });
    });

    const activeSection = document.querySelector(".content-section.active");
    if (activeSection && activeSection.querySelector("h2")) {
        pageTitleElement.textContent = activeSection.querySelector("h2").textContent.trim();
    }

    const profileMenu = document.getElementById("profile-menu");
    const profileToggle = document.getElementById("profile-toggle");

    if (profileToggle) {
        profileToggle.addEventListener("click", (e) => {
            e.stopPropagation(); 
            profileMenu.classList.toggle("active");
        });
    }

    document.addEventListener("click", (e) => {
        if (profileMenu && !profileMenu.contains(e.target)) {
            profileMenu.classList.remove("active");
        }
    });

    const dropdownItems = document.querySelectorAll(".profile-dropdown li, .profile-dropdown li button");
    dropdownItems.forEach(item => {
        item.addEventListener("click", () => {
            profileMenu.classList.remove("active");
        });
    });

    // Modal Logic
    const settingsModal = document.getElementById('settings-modal');
    const logoutModal = document.getElementById('logout-modal');
    
    const settingsBtn = document.getElementById('account-settings-btn');
    const confirmLogoutBtn = document.getElementById('confirm-logout-btn');
    const saveSettingsBtn = document.getElementById('save-settings-btn');
    
    const closeButtons = document.querySelectorAll('.modal-close-btn');
    const cancelButtons = document.querySelectorAll('.modal-cancel-btn');
    const overlays = document.querySelectorAll('.modal-overlay');

    function openModal(modal) {
        if (modal) modal.classList.remove('hidden');
    }

    function closeModal(modal) {
        if (modal) modal.classList.add('hidden');
    }

    settingsBtn.addEventListener('click', () => {
        openModal(settingsModal);
    });

    logoutBtnTrigger.addEventListener('click', () => {
        openModal(logoutModal);
    });

    closeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            closeModal(document.getElementById(btn.dataset.modalId));
        });
    });

    cancelButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            closeModal(document.getElementById(btn.dataset.modalId));
        });
    });
    
    overlays.forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                closeModal(overlay);
            }
        });
    });

    saveSettingsBtn.addEventListener('click', () => {
        const newPass = document.getElementById('new-password').value;
        const confirmPass = document.getElementById('confirm-password').value;

        if (newPass && newPass !== confirmPass) {
            alert('New passwords do not match!');
            return;
        }

        alert('Account settings saved!');
        closeModal(settingsModal);
    });
});

function confirmDelete() {
    if (confirm("CONFIRM: Are you sure you want to DELETE this record? This action cannot be undone.")) {
        handleCrudAction("DELETE");
    }
}

function handleCrudAction(action) {
    console.log("Action performed:", action);
}