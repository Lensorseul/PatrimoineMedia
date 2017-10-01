<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Toulouze Franck" />
        <meta name="description" content="Site de patrimoines et médias">
        <link rel="icon" href="favicon.ico" />
        <!-- Document title -->
        <title>Patrimoines et Médias</title>
        <!-- Stylesheets & Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

        <!-- LOADING FONTS AND ICONS -->
        <link href="http://fonts.googleapis.com/css?family=Rubik:500%2C400%2C700" rel="stylesheet" property="stylesheet" type="text/css" media="all">

        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/fonts/font-awesome/css/font-awesome.css">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/css/settings.css">		

        <style type="text/css">.tiny_bullet_slider .tp-bullet:before{content:" ";  position:absolute;  width:100%;  height:25px;  top:-12px;  left:0px;  background:transparent}</style>
        <style type="text/css">.bullet-bar.tp-bullets{}.bullet-bar.tp-bullets:before{content:" ";position:absolute;width:100%;height:100%;background:transparent;padding:10px;margin-left:-10px;margin-top:-10px;box-sizing:content-box}.bullet-bar .tp-bullet{width:60px;height:3px;position:absolute;background:#aaa;  background:rgba(204,204,204,0.5);cursor:pointer;box-sizing:content-box}.bullet-bar .tp-bullet:hover,.bullet-bar .tp-bullet.selected{background:rgba(204,204,204,1)}.bullet-bar .tp-bullet-image{}.bullet-bar .tp-bullet-title{}</style>

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <!-- SLICEY ADD-ON FILES -->
        <script type='text/javascript' src='js/plugins/revolution/revolution-addons/slicey/js/revolution.addon.slicey.min.js?ver=1.0.0'></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    </head>

    <body class="no-page-loader">


        <!-- Wrapper -->
        <div id="wrapper">
	

            <?php
            include('view/header.php');
            if (!isset($_GET['Page'])) {
                include('view/slider.php');
            } else {
                $page = $_GET['Page'];
                include ("view/$page.php");
            }
            ?>


            <?php
            include('view/footer.php');
            ?>
            <!-- end: Footer -->

        </div>
        <!-- end: Wrapper -->

        <!-- Go to top button -->

        <!--Plugins-->
        <script src="js/jquery.js"></script>
        <script src="js/plugins.js"></script>

        <!--Template functions-->
        <script src="js/functions.js"></script>

        <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="js/plugins/revolution/css/navigation.css">

        <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

        <script type="text/javascript">
            var tpj = jQuery;

            var revapi30;
            tpj(document).ready(function () {
                if (tpj("#rev_slider_30_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_30_1");
                } else {
                    revapi30 = tpj("#rev_slider_30_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "on",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 50,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "hermes",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div>	<div class="tp-arr-titleholder">{{title}}</div>	</div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 0,
                                    v_offset: 0
                                }
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [868, 768, 960, 720],
                        lazyType: "smart",
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            }); /*ready*/

        </script>

    </body>

</html>