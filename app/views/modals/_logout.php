    <div id="logout-modal" class="modal-overlay hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirm Logout</h2>
                <button class="modal-close-btn" data-modal-id="logout-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to log out of the TechStore Admin System?</p>
            </div>
            <div class="modal-footer">
                <button class="action-btn modal-cancel-btn" data-modal-id="logout-modal">Cancel</button>
                <button href="<?=site_url('auth/logout');?>" class="action-btn delete-btn" id="confirm-logout-btn">Logout</button>
            </div>
        </div>
    </div>