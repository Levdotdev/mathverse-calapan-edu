$(document).ready(function() {

  $('#show-login-btn').click(function() {
    $('#modal-wrapper').removeClass('hidden');
    $('#container').removeClass('right-panel-active');
  });

  $('#show-register-btn').click(function() {
    $('#modal-wrapper').removeClass('hidden');
    $('#container').addClass('right-panel-active');
  });

  $('#close-btn').click(function() {
    $('#modal-wrapper').addClass('hidden');
  });

  $('#modal-wrapper').click(function(e) {
    if ($(e.target).is('#modal-wrapper')) {
      $('#modal-wrapper').addClass('hidden');
    }
  });

  $('#signUp').click(function() {
    $('#container').addClass('right-panel-active');
  });

  $('#signIn').click(function() {
    $('#container').removeClass('right-panel-active');
  });

});