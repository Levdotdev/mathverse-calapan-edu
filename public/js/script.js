$(document).ready(function() {

  $('#sidebar-toggle').click(function() {
    if ($(window).width() > 768) {
      $('#sidebar').toggleClass('collapsed');
    } else {
      $('#sidebar').toggleClass('visible');
    }
  });

  function applyTheme(isDark) {
    if (isDark) {
      $('body').addClass('dark-mode').removeClass('light-mode');
      $('#theme-toggle i').removeClass('fa-moon').addClass('fa-sun');
      localStorage.setItem('theme', 'dark-mode');
    } else {
      $('body').removeClass('dark-mode').addClass('light-mode');
      $('#theme-toggle i').removeClass('fa-sun').addClass('fa-moon');
      localStorage.setItem('theme', 'light-mode');
    }
  }

  if (localStorage.getItem('theme') === 'dark-mode') {
    applyTheme(true);
  } else {
    $('body').addClass('light-mode');
  }

  $('#theme-toggle').click(function() {
    applyTheme(!$('body').hasClass('dark-mode'));
  });

  $('#sidebar li[data-section]').click(function() {
    var targetSectionId = $(this).attr('data-section');
    $('#sidebar li[data-section]').removeClass('active');
    $(this).addClass('active');
    $('.content-section').removeClass('active');
    $('#' + targetSectionId).addClass('active');
    var title = $('#' + targetSectionId).find('h2').text().trim() || 'Dashboard';
    $('.page-title').text(title);
    if ($(window).width() <= 768) $('#sidebar').removeClass('visible');
  });

  var activeSection = $('.content-section.active h2');
  if (activeSection.length) $('.page-title').text(activeSection.text().trim());

  window.handleCrudAction = function(action) {
    alert('[' + action + ']: Action triggered! A modal form for input/editing would typically open here.');
  }

  window.confirmDelete = function() {
    if (confirm('CONFIRM: Are you sure you want to DELETE this record? This action cannot be undone.')) {
      handleCrudAction('DELETE');
    }
  }

  window.openAddProductModal = function() {
    $('#addProductOverlay').addClass('open').attr('aria-hidden', 'false');
    setTimeout(function() {
      $('#addProductOverlay').find('input,select,button,textarea').first().focus();
    }, 50);
  }

  window.closeAddProductModal = function() {
    $('#addProductOverlay').removeClass('open').attr('aria-hidden', 'true');
  }

  (function() {
    function playSound() {
      var sound = $('#notifSound')[0];
      if (sound) { try { sound.currentTime = 0; sound.play(); } catch(e) {} }
    }

    window.showModalAlert = function(message, type='info') {
      var icon = type === 'success' ? 'fa-check-circle' : (type === 'error' ? 'fa-times-circle' : 'fa-info-circle');
      var alertDiv = $('<div class="modal-alert"></div>')
        .addClass(type === 'success' ? 'alert-success' : (type === 'error' ? 'alert-error' : 'alert-info'))
        .html('<i class="fas ' + icon + '" style="font-size:18px"></i><div>' + message + '</div>');
      $('#modal-alert-container').empty().append(alertDiv);
      playSound();
      setTimeout(function() { alertDiv.remove(); }, 4500);
    }

    window.showToast = function(message, type='info') {
      playSound();
      var icon = type === 'success' ? 'fa-check-circle' : (type === 'error' ? 'fa-times-circle' : 'fa-info-circle');
      var toast = $('<div class="toast"></div>')
        .addClass(type === 'success' ? 'toast-success' : (type === 'error' ? 'toast-error' : 'toast-info'))
        .html('<div class="left"><i class="fas ' + icon + '" style="font-size:18px"></i><div>' + message + '</div></div><button class="close-toast" aria-label="Close">&times;</button>');
      $('#toast-container').append(toast);
      toast.find('.close-toast').click(function() {
        toast.fadeOut(200, function() { toast.remove(); });
      });
      setTimeout(function() { toast.fadeOut(200, function() { toast.remove(); }); }, 4200);
    }

    $('#addProductForm').submit(function(e) {
      e.preventDefault();
      var name = $.trim($('#addProductForm [name="product_name"]').val());
      if (!name) { showModalAlert('Please provide a product name.', 'error'); return; }
      closeAddProductModal();
      showToast('Product successfully added!', 'success');
      this.reset();
    });

    $('#addProductOverlay').click(function(e) {
      if (e.target === this) closeAddProductModal();
    });

    $(document).keydown(function(e) {
      if (e.key === 'Escape' && $('#addProductOverlay').hasClass('open')) closeAddProductModal();
    });
  })();

  $('#product_id').keydown(function(e) {
    if (e.key === 'Enter') e.preventDefault();
  });

});