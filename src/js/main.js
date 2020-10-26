jQuery(document).ready(function($) {

  //Open / close search bar 
  $('.header-right__search').click(function() {
    if($('.mobile-menu-container').hasClass('open')){
      $('.mobile-menu-container').fadeOut(300)
    }
    $('.search-container').fadeIn(300)
  })
  $('.search-container__header___out').click(function() {
    $('.search-container').fadeOut(300)
  })

  //Open / close navigation menu 
  $('.header-right__burger').click(function() {
    $('.mobile-menu-container').fadeIn(300)
    $('.mobile-menu-container').addClass('open')
  })
  $('.mobile-menu__header___out').click(function() {
    $('.mobile-menu-container').fadeOut(300)
    $('.mobile-menu-container').removeClass('open')
  })

  //Open / close navigation menu 
  $('.contacts---section-btn').click(function() {
    $('.contacts-drop').fadeIn(300)
  })
  $('.white_us___out').click(function() {
    $('.contacts-drop').fadeOut(300)
  })

  //Menu hover active
  $('.navigation-item__menu ul li a').hover(function() {
      if ($(document).width() > 768) {
        $('.navigation-item__menu ul li a').addClass('active')
      }
    },
    function() {
      $('.navigation-item__menu ul li a').removeClass('active')
    }
  )

  // Form validate
  $("#contacts_form").validate({});
  $("#subscribe_form").validate({});
  $("#subscribe_form2").validate({});
  $.validator.addClassRules({
    required: {
      required: true
    },
    requiredemail: {
      required: true,
      email: true
    },
    minSeven: {
      required: true,
      minlength: 7
    },
  });


  //Contacts form submit
  $('.submit_contact_form').click(function() {
    $('#contacts_form').submit();
  })

  //Form message sending
  $(document).on('submit', '#contacts_form', function(event) {
    event.preventDefault();

    $('#contacts_form').css('filter', 'blur(3px)');
    var formData = new FormData(this);
    formData.append('action', 'send_contact_form_message');

    jQuery.ajax({
      url: variables.ajaxUrl,
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',

      success: function(data) {
        // console.log(data);

        $('#contacts_form').css('opacity', '0');
        $('.contacts-drop__message').fadeIn(300);

        var inputValue = document.querySelectorAll('.mess-content');
        for (var i = 0; i < inputValue.length; i++) {
          inputValue[i].value = '';
        }

      }
    });
  });
  
  //subscribe_email
  $(document).on('submit', '#subscribe_form', function(event) {
    event.preventDefault();

    $('.subscribe_news').css('filter', 'blur(3px)');
    var formData = new FormData(this);
    formData.append('action', 'subscribe_email');

    jQuery.ajax({
      url: variables.ajaxUrl,
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',

      success: function(data) {
        console.log(data);

        $('.subscribe_news').css('filter', 'blur(0)');
        $('.subscribe_input').css('opacity', '0');
        $('.input-arrow_btn').css('opacity', '0');
        $('.subscribe-message').fadeIn(300);

        var inputValue = document.querySelectorAll('.mess-content');
        for (var i = 0; i < inputValue.length; i++) {
          inputValue[i].value = '';
        }

      }
    });
  });
  $(document).on('submit', '#subscribe_form2', function(event) {
    event.preventDefault();

    $('.subscribe_news').css('filter', 'blur(3px)');
    var formData = new FormData(this);
    formData.append('action', 'subscribe_email');

    jQuery.ajax({
      url: variables.ajaxUrl,
      data: formData,
      processData: false,
      contentType: false,
      type: 'POST',

      success: function(data) {
        console.log(data);

        $('.subscribe_news').css('filter', 'blur(0)');
        $('.subscribe_input').css('opacity', '0');
        $('.input-arrow_btn').css('opacity', '0');
        $('.subscribe-message').fadeIn(300);

        var inputValue = document.querySelectorAll('.mess-content');
        for (var i = 0; i < inputValue.length; i++) {
          inputValue[i].value = '';
        }

      }
    });
  });


  //Product inner tabs
  $('.product-tabs li').click(function(){
    var tab_id = $(this).attr('tada-tab');
    $('.product-tabs li').removeClass('current');
    $(this).addClass('current');

    $('.product-inner__tabs-item').hide();
    $("#" + tab_id).fadeIn(300);
  })


  //Enzymes drop container
  $('.section-btn__a').click(function(){
    var tab_id = $(this).attr('tada-count');

    $('html, body').animate({
      scrollTop: $(".kind_list").offset().top
    }, 500);


    $('.kind-drop').fadeOut(300);
    $('#' + tab_id).fadeIn(300);
  })

  $('.kind-drop__out').click(function(){
    $('.kind-drop').fadeOut(300);
  })

  //Textarea auto size
  autosize(document.getElementById("textarea"));

 //Show / hidden meniu on scroll
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {

    if($(document).width() < 768){

    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      $("header").css('top',  "0")
    } else {
      $("header").css('top',  "-70px")
    }
    prevScrollpos = currentScrollPos;
  }
}

// 2 columns
$('.section-btn__a').click(function(){
  var countID = $(this).attr('tada-count');


  var size = $(`#list-data-${countID} > li`).length;
  $(`.column-1-${countID} > li`).each(function (index) {
    if (index >= size / 2) {
      $(this).appendTo(`.column-2-${countID}`);
    }
  });
});




});

