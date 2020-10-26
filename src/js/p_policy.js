jQuery(document).ready(function($) {

  // Cookies
  if (Cookies.get('Valentis-Cookie')) {
    $('.p_policy').hide();
  } else {
    setTimeout(function() {
      $('.p_policy').fadeIn(500);
    }, 1000);
  }

    // Set a cookie
  Cookies.set('Valentis-Cookie', 'value', { expires: 10, path: '' });


  // Close cookie bar 
  $('.p_policy---out').click(function() {
    $('.p_policy').fadeOut(300);
  })

});