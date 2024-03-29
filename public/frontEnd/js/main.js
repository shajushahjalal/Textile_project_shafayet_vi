/*
Template Name: Raza
	
    
    Table of content
    1. Preloader
    2. client carousel
    3. onepage nav
    4. animated counter
    5. back to top
    6. wow js
*/

(function ($) {
    "use strict";

    /* 1 preloader*/

    $(window).on('load', function () {
        $('.preloader').fadeOut('slow', function () {
            $(this).remove();
        })
    });

    /* 2 client carousel */
    $(".js-client").owlCarousel({
        dots: false,
        autoplay: true,
        autoplaySpeed: 500,
        loop: true,
        margin:60,
        autoplayHoverPause:true,
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 1
            },

            768: {
                items: 2
            },

            800: {
                items: 4
            },

            1024: {
                items: 5
            }
        },
    });

    /* 3 onepage nav */
    function scrollToSection(event) {
        event.preventDefault();
        var $section = $($(this).attr('href'));
        $('html, body').animate({
            scrollTop: $section.offset().top
        }, 500);
    }
    $('[data-scroll]').on('click', scrollToSection);


    /* 4 animated counter */
    $(".jsCounter").each(function () {
        $(".jsCounter").appear(function () {
            $(".jsCounter").countTo();
        })
    })

    /* 5 back to top  */
    $('#back-to-top').on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    /* 6 magnificPopup*/
    $(document).ready(function () {
        $('.js-zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function (element) {
                    return element.find('img');
                }
            }

        });
    });

    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        loop:true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows : true,
        },
        pagination: {
          el: '.swiper-pagination',
        },
      });
    // 6 wow js active
    new WOW().init();

    //dom ready end
    $(function() {
        // This will select everything with the class smoothScroll
        // This should prevent problems with carousel, scrollspy, etc...
        $('.smoothScroll').click(function() {
          if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000); // The number here represents the speed of the scroll in milliseconds
              return false;
            }
          }
        });
      });
      
      // Change the speed to whatever you want
      // Personally i think 1000 is too much
      // Try 800 or below, it seems not too much but it will make a difference
      $('.portfolio_item').isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });
    
    $('.portfolio_menu ul li').click(function() {
        $('.portfolio_menu ul li').removeClass('active');
        $(this).addClass('active');
    
        var selector = $(this).attr('data-filter');
        $('.portfolio_item').isotope({
            filter: selector
        });
        return false;
    });

    // Feature Product
    $('.feature-section .owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:3500,
        responsiveClass:true,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
            },
            576:{
                items:2,
            },
            768:{
                items:2,
            },
            912:{
                items:3,
            },
            1200:{
                items:3,
            },
            1600:{
                items:4,
            }
        }
    });

    // Submit a from using Ajax
    $(document).on('submit','#ajax-form',function(e){
        e.preventDefault();
        var button = $(this).find('#submit');
        var prev_btn_text = button.text();
        button.text('Loading...');
        button.attr('disabled',true);
        var data = new FormData($(this)[0]); 
        $.ajax({
            method: "POST",
            url: $(this).attr("action"),
            dataType: "json",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            success:function(output){

                //hide modal If Exists
                if(output.modal_id != null){
                    $('#'+output.modal_id).modal('hide');
                }

                // Check Status
                if(output.status == 'success'){
                    successMessage(output.message, true);                   
                }else{
                    errorMessage(output.message);
                }
                // Restore Button State and text
                button.text(prev_btn_text);
                button.removeAttr('disabled');                
            }
        });
        
    });

})(jQuery);

function successMessage(mgs){
    Swal.fire({
        type: 'success',
        title: 'Success',
        text: mgs === null ? 'Done successfully' : mgs,
        showConfirmButton: true,
    });
}

function errorMessage(mgs){
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: mgs === null ? 'Something Went Wrong':mgs,
    });
}