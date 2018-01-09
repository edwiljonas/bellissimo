(function($) {

  var Knack = {
    // All pages
    'common': {
      init: function() {
          $(document).ready(function () {
              knack_nav();
              cart('load');
              ajax_check();
              wishlist_add();
              product_preview();
              wishlist_get('load');
              toggle();
              wishlist_get_data();
              cart_get_data();
              owl();
              signup();
              forms();
              knack_scroll_click();
              enable_tips();
              //upload_file();
              quantity();
              signup_modal();
              cart_update();
          });
          {
              var cart_update = function(){

                  "use strict";

                  jQuery( document.body ).on( 'updated_cart_totals', function(){
                      quantity();
                  });

              }
          }
          {
              var quantity = function(){

                  jQuery('body').find('.shop_table').find('.quantity').each(function(){

                      //VARAIBLES
                      var current_input = jQuery(this).find('input');
                      var current_value = jQuery(this).find('input').val();

                      jQuery(this).append('<div class="input-plus"></div><div class="input-minus"></div>');

                      jQuery(this).find('.input-plus').on('click', function(){
                          jQuery(current_input).trigger('change');
                          current_value = jQuery(current_input).val();
                          jQuery(current_input).val(parseInt(current_value)+1);
                      });

                      jQuery(this).find('.input-minus').on('click', function(){
                          jQuery(current_input).trigger('change');
                          current_value = jQuery(current_input).val();
                          if(current_value == 1){
                              return;
                          }
                          jQuery(current_input).val(parseInt(current_value)-1);
                      });

                  });

                  jQuery('.variations').find('select').each(function(){

                      jQuery(this).parent('td').append('<div class="htheme_select_box_arrow"></div>');

                  });

              }
          }
          {
              var upload_file = function(){

                  var file_frame; // variable for the wp.media file_frame

                  // attach a click event (or whatever you want) to some element on your page
                  $( '#frontend-button' ).on( 'click', function( event ) {
                      event.preventDefault();

                      // if the file_frame has already been created, just reuse it
                      if ( file_frame ) {
                          file_frame.open();
                          return;
                      }

                      file_frame = wp.media.frames.file_frame = wp.media({
                          title: $( this ).data( 'uploader_title' ),
                          button: {
                              text: $( this ).data( 'uploader_button_text' ),
                          },
                          multiple: false // set this to true for multiple file selection
                      });

                      file_frame.on( 'select', function() {
                          attachment = file_frame.state().get('selection').first().toJSON();

                          // do something with the file here
                          $( '#frontend-button' ).hide();
                          //$( '#frontend-image' ).attr('src', attachment.url);
                          console.log(attachment.url);
                      });

                      file_frame.open();
                  });

              }
          }
          {
              var enable_tips = function(){
                  $('body').find('.knack-tooltip').tooltip();
              }
          }
          {
              var forms = function(){
                  $('body').find('[type="text"], [type="password"], [type="email"], [type="tel"], [type="number"], select, textarea').addClass('form-control');
              }
          }
          { // Nav Scroll
              var knack_nav = function () {

                "use strict";

                var window_height = $(window).height();
                var top = $(window).scrollTop();

                knack_sticky(top);
                knack_scroll(top);

                $(window).on('scroll', function(){
                    top = $(window).scrollTop();
                    knack_sticky(top);
                    knack_parallax(top);
                    knack_scroll(top);
                });

                var window_width = $(window).width();

                knack_mobile(window_width);

                $(window).on('resize', function(){
                    window_width = $(window).width();
                    knack_mobile(window_width);
                });

              }
          }
          {
              var knack_scroll_click = function(){

                  $('body').find('.scroll-top').off().on('click', function(){
                      jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
                  });

              }
          }
          {
              var knack_scroll = function(top){

                  if(top > 250){
                      $('.scroll-top').show();
                  } else {
                      $('.scroll-top').hide();
                  }

              }
          }
          {
              var knack_mobile = function(width){

                if(width < 768){
                    $('body').find('.knack-navigation').addClass('knack-mobile');
                    $('body').find('.nav').removeClass('knack-default');
                } else {
                    $('body').find('.nav').addClass('knack-default');
                    $('body').find('.knack-navigation').removeClass('knack-mobile');
                }

                $('.mobile-toggle').on('click', function(){
                    var toggle = $(this).attr('data-mobile');
                    var li = $(this).parent('li');
                    var height = $(this).parent('li').children('.sub-menu').height();
                    //li.attr('style', 'height:' + (height+50) + 'px !important');

                    if(toggle === 'open'){
                        //li.attr('style', 'height:' + (height+50) + 'px !important');
                        toggle = $(this).attr('data-mobile', 'close');
                        $(this).parent('li').children('.sub-menu').show();
                    } else {
                        //li.attr('style', 'height:' + (50) + 'px !important');
                        toggle = $(this).attr('data-mobile', 'open');
                        $(this).parent('li').children('.sub-menu').hide();
                    }

                });

              }
          }
          { // Sticky
            var knack_sticky = function(top){

                "use strict";

                if(top >= 238){
                    $('body').find('.knack-navigation').addClass('knack-sticky');
                } else {
                    $('body').find('.knack-navigation').removeClass('knack-sticky');
                }
            }
          }
          { // Parallax
              var knack_parallax = function(top){

                  "use strict";

                  if(top <= 700){
                      var calc = Math.ceil(top / 30);
                      var scale;
                      if(calc < 10){
                          scale = "0"+calc;
                      } else {
                          scale = calc;
                      }
                      $('body').find('.knack-parallax .container-fluid').css({
                          '-webkit-transform' : 'scale(1.' + scale + ')',
                          '-moz-transform'    : 'scale(1.' + scale + ')',
                          '-ms-transform'     : 'scale(1.' + scale + ')',
                          '-o-transform'      : 'scale(1.' + scale + ')',
                          'transform'         : 'scale(1.' + scale + ')'
                      });
                  }
              }
          }
          {
              var cart = function(load){

                  "use strict";

                  jQuery.ajax({
                      url: ajaxurl,
                      type: "POST",
                      data: {
                          'action': 'knack_count'
                      },
                      dataType: "json"
                  }).done(function(data){

                      if(load === 'ajax'){
                          cart_get_data();
                          $('.knack-top-settings .cart .total-count').html(data.total);
                      }

                  }).fail(function(event){

                  });

              }
          }
          {
              var ajax_check = function(){

                  "use strict";

                  var add = jQuery('body').find(".add_to_cart_button");

                  add.unbind('click');

                  add.bind('click', function(){
                      jQuery( window ).on('ajaxSuccess', function() {
                          cart('ajax');
                          jQuery( window ).off('ajaxSuccess');
                      });
                  });

              }
          }
          {
              var wishlist_add = function(){

                  jQuery('body').find('.whishlist-button').on('click', function(e){

                      e.preventDefault();

                      var id = $(this).data('prod-id');
                      var button = $(this);

                      jQuery.ajax({
                          url:ajaxurl,
                          type:"POST",
                          data:{
                              'action':'knack_add_wish',
                              'id':id
                          },
                          dataType:"json"
                      }).done(function(data){
                          wishlist_get('click');
                          $(button).addClass('whishlist-button-added');
                      }).fail(function(event){
                      });

                  });

              }
          }
          {
              var signup_modal = function(){

                  jQuery('body').find('[data-modal="signup"]').on('click', function(e){

                      e.preventDefault();

                      $('body').find('.animate-loader').show();

                      var id = jQuery(this).data('prod');

                      jQuery.ajax({
                          url:ajaxurl,
                          type:"POST",
                          data:{
                              'action':'knack_signup_form',
                          },
                          dataType:"html"
                      }).done(function(data){
                          $('body').find('.modal-load').html(data);
                          $('body').find('.animate-loader').hide();
                          signup();
                      }).fail(function(event){
                          console.log(event);
                      });

                  });

              }
          }
          {
              var product_preview = function(){

                  jQuery('body').find('[data-modal="preview"]').on('click', function(e){

                      e.preventDefault();

                      $('body').find('.animate-loader').show();

                      var id = jQuery(this).data('prod');

                      jQuery.ajax({
                          url:ajaxurl,
                          type:"POST",
                          data:{
                              'action':'knack_preview',
                              'id':id
                          },
                          dataType:"html"
                      }).done(function(data){
                          $('body').find('.modal-load').html(data);
                          $('body').find('.animate-loader').hide();
                          forms();
                          wishlist_add();
                          owl_preview();
                      }).fail(function(event){
                      });

                  });

              }
          }
          {
              var wishlist_get = function(action) {

                  jQuery.ajax({
                      url: ajaxurl,
                      type: "POST",
                      data: {
                          'action': 'knack_get_wish'
                      },
                      dataType: "json"
                  }).done(function (data) {
                      $('.knack-top-settings .wishlist .total-count').html(data.count);
                      if(action === 'click'){
                          wishlist_get_data();
                      }
                  }).fail(function (event) {
                  });

              }

          }
          {
              var wishlist_get_data = function() {

                  jQuery.ajax({
                      url: ajaxurl,
                      type: "POST",
                      data: {
                          'action': 'knack_get_wish_data'
                      },
                      dataType: "html"
                  }).done(function (data) {

                      $('body').find('.wishlist .load-html').html(data);

                  }).fail(function (event) {
                  });

              }

          }
          {
              var cart_get_data = function() {

                  jQuery.ajax({
                      url: ajaxurl,
                      type: "POST",
                      data: {
                          'action': 'knack_get_cart'
                      },
                      dataType: "html"
                  }).done(function (data) {

                      if(data !== ''){
                          $('body').find('.cart .load-html').html(data);
                      }

                  }).fail(function (event) {
                  });

              }

          }
          {
              var toggle = function() {

                  jQuery('body').find('.knack-tool').each(function(index,element){

                      jQuery(this).on('click', function(){

                          var element = $(this).find('.knack-toolbox');

                          jQuery('body').find('.knack-tool').find('.knack-toolbox').each(function(i,e){
                              if(index !== i){
                                  $(this).attr('data-toggle', 'open');
                              }
                          });

                          var toggle = $(this).find('.knack-toolbox').attr('data-toggle');

                          if(toggle === 'open'){
                              $(this).find('.knack-toolbox').attr('data-toggle', 'close');
                          } else {
                              $(this).find('.knack-toolbox').attr('data-toggle', 'open');
                          }

                      });

                  });


              }

          }
          {
              var owl = function () {

                  $('.knack-carousel').owlCarousel({
                      loop:true,
                      margin:30,
                      nav:true,
                      autoplay:true,
                      autoplayTimeout:10000,
                      autoplayHoverPause:true,
                      navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],
                      responsive:{
                          0:{
                              items:1
                          },
                          600:{
                              items:2
                          },
                          1000:{
                              items:4
                          }
                      }
                  });

              }
          }
          {
              var owl_preview = function () {

                  $('.preview-gallery').owlCarousel({
                      loop:true,
                      margin:0,
                      nav:true,
                      autoplay:true,
                      autoplayTimeout:10000,
                      autoplayHoverPause:true,
                      navText:['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],
                      responsive:{
                          0:{
                              items:1
                          },
                          600:{
                              items:1
                          },
                          1000:{
                              items:1
                          }
                      }
                  });

              }
          }
          {
              var signup = function () {

                $('body').find('.signup-form .knack-button').on('click', function(){

                    var current_form_id = $(this).parents('form').attr('id');
                    var current_form = $(this).parents('form');
                    var form_data = $(current_form).serialize();

                    jQuery('#'+current_form_id+' input').removeClass('is-error');

                    $.ajax({
                        url: ajaxurl,
                        type: "POST",
                        data: {
                            'action': 'knack_signup',
                            'data': form_data
                        },
                        dataType: "json"
                    }).done(function (data) {

                        if(data.status){

                            jQuery('#'+current_form_id+' input').val('');

                        } else {

                            //CLEAR STATUS MESSAGE
                            jQuery.each(data.fields, function (index, value) {
                                if (!value) {
                                    jQuery('#'+current_form_id+' #' + index).addClass('is-error');
                                }
                            });

                        }

                    }).fail(function (event) {
                    });

                });

              }
          }
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Knack;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
