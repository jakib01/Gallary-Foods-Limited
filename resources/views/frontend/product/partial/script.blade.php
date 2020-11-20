<!-- All Script -->
<script src="{{asset('JS/vendor/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('JS/bootstrap.min.js')}}"></script>
<script src="{{asset('JS/smoothscroll.js')}}"></script>
<!-- Scroll up js
============================================ -->
<script src="{{asset('JS/jquery.scrollUp.js')}}"></script>
<script src="{{asset('JS/menu.js')}}"></script>


<script src="{{asset('JS/flexslider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('JS/image-lightbox/imagelightbox.js')}}"></script>


<script src="{{asset('JS/owl.carousel.min.js')}}"></script>
<script src="{{asset('JS/main.js')}}"></script>






<script type="text/javascript">
    /*-----------------------------------------------------------------------------------*/
    /* Flex Slider
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().flexslider) {

        // Product Page Flex Slider
        $('.product-slider').flexslider({
            animation: "slide",
            animationLoop: false,
            slideshow: false,
            prevText: '<i class="fa fa-angle-left"></i>',
            nextText: '<i class="fa fa-angle-right"></i>',
            animationSpeed: 250,
            controlNav: "thumbnails"
        });

    }


    /*-----------------------------------------------------------------------------------*/
    /* Product Carousel
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().owlCarousel) {
        var productCarousel = $("#product-carousel");
        productCarousel.owlCarousel({
            loop: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                900: {
                    items: 3
                },
                1100: {
                    items: 4
                }
            }
        });

        // Custom Navigation Events
        $(".product-control-nav .next").on("click", function() {
            productCarousel.trigger('next.owl.carousel');
        });

        $(".product-control-nav .prev").on("click", function() {
            productCarousel.trigger('prev.owl.carousel');
        });
    }



    /*-----------------------------------------------------------------------------------*/
    /* Tabs
     /*-----------------------------------------------------------------------------------*/
    $(function() {
        var $tabsNav = $('.tabs-nav'),
            $tabsNavLis = $tabsNav.children('li');

        $tabsNav.each(function() {
            var $this = $(this);
            $this.next().children('.tab-content').stop(true, true).hide()
                .first().show();
            $this.children('li').first().addClass('active').stop(true, true).show();
        });

        $tabsNavLis.on('click', function(e) {
            var $this = $(this);
            $this.siblings().removeClass('active').end()
                .addClass('active');
            var idx = $this.parent().children().index($this);
            $this.parent().next().children('.tab-content').stop(true, true).hide().eq(idx).fadeIn();
            e.preventDefault();
        });

    });


    /*-----------------------------------------------------------------------------------*/
    /*	Tabs Widget
     /*-----------------------------------------------------------------------------------*/
    $('.footer .tabbed .tabs li:first-child, .tabbed .tabs li:first-child').addClass('current');
    $('.footer .block:first, .tabbed .block:first').addClass('current');


    $('.tabbed .tabs li').on("click", function() {
        var $this = $(this);
        var tabNumber = $this.index();

        /* remove current class from other tabs and assign to this one */
        $this.siblings('li').removeClass('current');
        $this.addClass('current');

        /* remove current class from current block and assign to related one */
        $this.parent('ul').siblings('.block').removeClass('current');
        $this.closest('.tabbed').children('.block:eq(' + tabNumber + ')').addClass('current');
    });



    /*-----------------------------------------------------------------------------------*/
    /*	Image Lightbox
     /*  http://osvaldas.info/image-lightbox-responsive-touch-friendly
     /*-----------------------------------------------------------------------------------*/
    if (jQuery().imageLightbox) {

        // ACTIVITY INDICATOR

        var activityIndicatorOn = function() {
                $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
            },
            activityIndicatorOff = function() {
                $('#imagelightbox-loading').remove();
            },


            // OVERLAY

            overlayOn = function() {
                $('<div id="imagelightbox-overlay"></div>').appendTo('body');
            },
            overlayOff = function() {
                $('#imagelightbox-overlay').remove();
            },


            // CLOSE BUTTON

            closeButtonOn = function(instance) {
                $('<button type="button" id="imagelightbox-close" title="Close"></button>').appendTo('body').on('click touchend', function() {
                    $(this).remove();
                    instance.quitImageLightbox();
                    return false;
                });
            },
            closeButtonOff = function() {
                $('#imagelightbox-close').remove();
            },

            // ARROWS

            arrowsOn = function(instance, selector) {
                var $arrows = $('<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>');

                $arrows.appendTo('body');

                $arrows.on('click touchend', function(e) {
                    e.preventDefault();

                    var $this = $(this),
                        $target = $(selector + '[href="' + $('#imagelightbox').attr('src') + '"]'),
                        index = $target.index(selector);

                    if ($this.hasClass('imagelightbox-arrow-left')) {
                        index = index - 1;
                        if (!$(selector).eq(index).length)
                            index = $(selector).length;
                    } else {
                        index = index + 1;
                        if (!$(selector).eq(index).length)
                            index = 0;
                    }

                    instance.switchImageLightbox(index);
                    return false;
                });
            },
            arrowsOff = function() {
                $('.imagelightbox-arrow').remove();
            };

        // Lightbox for individual image
        var lightboxInstance = $('a[data-imagelightbox="lightbox"]').imageLightbox({
            onStart: function() {
                overlayOn();
                closeButtonOn(lightboxInstance);
            },
            onEnd: function() {
                closeButtonOff();
                overlayOff();
                activityIndicatorOff();
            },
            onLoadStart: function() {
                activityIndicatorOn();
            },
            onLoadEnd: function() {
                activityIndicatorOff();
            }
        });

        // Lightbox for product gallery
        var gallerySelector = 'a[data-imagelightbox="gallery"]';
        var galleryInstance = $(gallerySelector).imageLightbox({
            quitOnDocClick: false,
            onStart: function() {
                overlayOn();
                closeButtonOn(galleryInstance);
                arrowsOn(galleryInstance, gallerySelector);
            },
            onEnd: function() {
                overlayOff();
                closeButtonOff();
                arrowsOff();
                activityIndicatorOff();
            },
            onLoadStart: function() {
                activityIndicatorOn();
            },
            onLoadEnd: function() {
                activityIndicatorOff();
                $('.imagelightbox-arrow').css('display', 'block');
            }
        });

    }



</script>
