(function($) {
    "use strict"; 

    //
    // Mobile Menu
    //
    $('.mobile-menu-icon').on('click', function(){
        $('.mobile-menu-container').addClass('opened-mobile-menu');
        $('body').css('overflow','hidden');
    });

    $('.mobile-menu-nav > div > ul > li.menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
        $(this).parent('li').toggleClass('mobile-dropdown');
        $(this).parent('li').find('> .sub-menu').slideToggle();
    });

    $('.mobile-overlay').on('click', function() {
        $('.mobile-menu-container').removeClass('opened-mobile-menu');
        $('body').css('overflow', 'auto');
    });
    
    $('.mobile-menu-closing').on('click', function() {
        $('.mobile-menu-container').removeClass('opened-mobile-menu');
        $('body').css('overflow', 'auto');
    });

    //
    // Close All Windows ESC
    //
    $(document).on('keydown', function(event) {
        if (event.keyCode == 27) {
            $('.main-we-chat').removeClass('opened-we-chat');
            $('.site-lightbox').removeClass('opened-video-box');
            $('.site-lightbox-frame').html('');
            $('body').css('overflow', 'auto');
        }
    });
    //
    // Play Video 
    //

    /**
     * Helper For Vimeo
     */
    function getIdFromVimeoURL(url) {
        return /(vimeo(pro)?\.com)\/(?:[^\d]+)?(\d+)\??(.*)?$/.exec(url)[3];
    }    
    function tpr_play_video() {
        $('.trigger-video').on('click', function() {
            $('.site-lightbox').addClass('opened-video-box');
            $('body').css('overflow','hidden');
            var title = $(this).data('vidtitle');
            var vimeo = $(this).data('vimeo');
            $('.site-light-box-title').html(title);
            $('.site-lightbox-frame').html('<iframe src="https://player.vimeo.com/video/'+getIdFromVimeoURL(vimeo)+'?title=false" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>');
            
        });
        $('.site-light-box-close').on('click', function() {
            $('.site-lightbox').removeClass('opened-video-box');
            $('.site-lightbox-frame').html('');
            $('body').css('overflow', 'auto');
        })
    }

    //
    // Sticky Effects

    function sticky_main_header() {
        var prevScrollpos = window.pageYOffset;
        // When the user scrolls the page, execute myFunction 
        window.onscroll = function() {header_anim();};

        // Get the header
        var header = document.getElementById("thepilatesroom-content");
        var real_header = document.getElementById("thepilatesroom-header");
        var mob_header = document.getElementById('mob-menu');
        // Get the offset position of the navbar
        var head_anim = header.offsetTop + 40;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function header_anim() {
            if (window.pageYOffset > head_anim) {
                real_header.classList.add("sticky-anim");
                real_header.classList.add("sticky-header");
                mob_header.classList.add("mob-sticky");
            } else {
                real_header.classList.remove("sticky-anim");
                real_header.classList.remove("sticky-header");
                mob_header.classList.remove("mob-sticky");
            }
        }     
        
    } //  End outer function


    //
    // Testimonials Slider
    function testimonials_slider() {
        $('.home-testimonials-slider').flickity({
            // options
            wrapAround: true,
            prevNextButtons: false,
            pageDots: false            
        });        
    }    
    //
    // Select2 Style for Video_Library dropdown
    function tdf_select2() {
        $('.video-library-select').select2({
          placeholder: "All videos",
          minimumResultsForSearch: Infinity
        });  
    }    
	//
	// Year
	function add_year() {
		var year = new Date().getFullYear();
		$('.footer-year').html(year);
    }    
    
    //
    // Checkbox For Membership
    function checkbox(){
        if ( $('.mp_login_form').length ) {
            $('<span class="custom-checkbox"></span>').insertAfter("#rememberme");    
        }
        if ( $('.mepr-signup-form').length ) {
            $('#mepr_agree_to_privacy_policy1').parents('.mp-form-row').addClass("custom-tpr");
            $('<span class="custom-checkbox"></span>').insertAfter('#mepr_agree_to_privacy_policy1');
            $('<div class="note-for-block form-note">Subscription billed monthly and can be cancelled at any time.</div>').insertAfter('.mp-form-submit');
        }
    }

    //
    // FAQ Widget
    function faq() {
        $('.faq-title').on('click', function() {
            $(this).toggleClass('faqopend');
            $(this).next('.faq-box-content').slideToggle();
        });
    }
    //
    // Document Ready
    $(document).ready(function(){
        add_year();
        tpr_play_video();
        sticky_main_header();
        testimonials_slider();
        tdf_select2();
        checkbox();
        faq();
    });
    $( document ).ajaxComplete(function() {
        tpr_play_video();
    });

})(jQuery);    