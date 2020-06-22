(function($) {
    "use strict";
    //
    // Home Page Hero Slider 
    //
    function home_hero_slider()  {
        $('.hero-slider-container').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            customPaging: function(slider, i) {
                return '<span class="thepilatesroom-slide-dots"></span>';
            },            
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 800,
            adaptiveHeight: true,
            pauseOnHover: false,
            pauseOnFocus: false,
            pauseOnDotsHover: false,            
        });        
        $('.slick-dots').attr('data-mycurrent', '01');
        $('.slick-dots').attr('data-mycount', '0' + $('.slick-dots li').length);
        
// On before slide change
        $('.hero-slider-container').on('afterChange', function(event, slick, currentSlide, nextSlide){
            // Slide Dots and Numbers 
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;

            $('.slick-dots').attr('data-mycount', '0' + slick.slideCount);
            $('.slick-dots').attr('data-mycurrent', '0' + i);
        });     
        $('.hero-slider-container').on('beforeChange', function(){

            // Slide Animation Restart
            // retrieve the element
            var element = document.getElementById("home-hero-slider-timer");
            
            // -> removing the class
            element.classList.remove("run-slide-timer");
            element.classList.remove("run-slide-timer2");
            void element.offsetWidth;
            
            // -> and re-adding the class
            element.classList.add("run-slide-timer2");

        }); 


        $('.home-hero-slider-timer').on('click', function(){
            $('.hero-slider-container').slick('slickNext');
        });


    }

    //
    // Maps Changer
    //

    $('.au-button').on('click', function(){
        $(this).addClass("active");
        $('.ch-button').removeClass("active");
        $('.ch-map').hide();
        $('.au-map').show();
    });
    $('.ch-button').on('click', function(){
        $(this).addClass("active");
        $('.au-button').removeClass("active");
        $('.au-map').hide();
        $('.ch-map').show();
    });    

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
    // WPML Dropdown
    //
    $('.wpml-ls-legacy-dropdown').on('click', function(e){
        $(this).toggleClass('wpml-aktif');
    });
    //
    // Open WeChat
    //
    $('.open-wechat').on('click', function(){
        $('.main-we-chat').addClass('opened-we-chat');
        $('body').css('overflow','hidden');
    });
    $('.we-chat-close').on('click', function(){
        $('.main-we-chat').removeClass('opened-we-chat');
        $('body').css('overflow', 'auto');        
    })
    //
    // Close All Windows ESC
    //
    $(document).on('keydown', function(event) {
        if (event.keyCode == 27) {
            $('.main-we-chat').removeClass('opened-we-chat');
            $('body').css('overflow', 'auto');
        }
    });    
    //
    // Isotope Code for Blog
    //
    function isotope_blog() {
 
        // with Isotope & jQuery
        // init Isotope
        var $grid = $('.all-blog-posts').isotope({
        // Isotope options...
        
        itemSelector: '.front-blog-item', 
        percentPosition: true,
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: '.grid-sizer',
          gutter: '.gutter-sizer'
        }        
        });
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });

        // INFINITE 
        // get Isotope instance
        var iso = $grid.data('isotope');

        // init Infinite Scroll
        $grid.infiniteScroll({
        // Infinite Scroll options...
        path: '.next.page-numbers',
        append: '.front-blog-item',
        outlayer: iso,
        status: '.scroller-status',
        scrollThreshold: 600
        });        
        

    }


    //
    // Sticky Effects

    function sticky_main_header() {
        var prevScrollpos = window.pageYOffset;
        // When the user scrolls the page, execute myFunction 
        window.onscroll = function() {header_anim();};

        // Get the header
        var header = document.getElementById("thepilatesroom-header");

        // Get the offset position of the navbar
        var head_anim = header.offsetTop;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function header_anim() {
            if (window.pageYOffset > head_anim) {
                header.classList.add("sticky-anim");
                header.classList.add("sticky-header");
            } else {
                header.classList.remove("sticky-anim");
                header.classList.remove("sticky-header");
            }
        }     
        
    } //  End outer function

    //
    // Document Ready
    $(document).ready(function(){
        sticky_main_header();
        isotope_blog();
        home_hero_slider();
    });

})(jQuery);    