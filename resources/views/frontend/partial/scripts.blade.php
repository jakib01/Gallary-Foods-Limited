
    <!-- All script -->
    <script src="js/vendor/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <!-- Scroll up js
    ============================================ -->
    <script src="js/jquery.scrollUp.js"></script>
    <script src="js/menu.js"></script>


    <script src="js/pluginse209.js?v=1.0.0"></script>

    <!-- Magnific Popup -->
    <!--<script src="/JS/jquery.magnific-popup.min.js"></script> -->

    <script src="js/jquery.countdown.min.js"></script>


    <script src="js/jquery.scrolly.js"></script>


    <!-- External libraries: jQuery & GreenSock -->
    <script src="/layerslider/js/greensock.js" type="text/javascript"></script>
    <!-- LayerSlider script files -->
    <script src="/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
    <script src="/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>


    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/scripts.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {

            "use strict";

            //** Slider  **//
            jQuery("#layerslider").layerSlider({
                responsive: true,
                responsiveUnder: 1170,
                layersContainer: 1170,
                skin: 'v5',
                hoverPrevNext: true,
                navPrevNext: true,
                navStartStop: false,
                navButtons: false,
                skinsPath: 'layerslider/skins/'
            });


            /*=================== Parallax ===================*/
            $('.parallax').scrolly({bgParallax: true});


            /* Owl carousel */
            $(".owl-carousel").owlCarousel({
                slideSpeed : 500,
                rewindSpeed : 1000,
                mouseDrag : true,
                stopOnHover : true
            });
            /* Own navigation */
            $(".owl-nav-prev").click(function(){
                $(this).parent().next(".owl-carousel").trigger('owl.prev');
            });
            $(".owl-nav-next").click(function(){
                $(this).parent().next(".owl-carousel").trigger('owl.next');
            });

        });

    </script>
