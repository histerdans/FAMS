 <!-- <link href="Assets/css/menu.css" rel="stylesheet" type="text/css" />-->


 <div style="background-image: url('Assets/images/ele.png') border-radius:60px;margin:0px;"> 

    <!-- Caption Style -->
    <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 55px;
            text-align: left;
            border-radius: 4px;
            background-color: transparent;
        }
        .captionOrange
        {
            background: #fffc10;
            background-color: rgba(127,216,234,0.47);
            opacity: 30%;
        }

            .captionBlack
            {
                font-size:16px;
                background: #000;
                background-color: rgba(0, 0, 0, 0.4);
            }
            a.captionOrange, A.captionOrange:active, A.captionOrange:visited
            {
                color: #ffffff;
                text-decoration: none;
            }
            a.captionOrange:hover
            {
                color: #00810b;
                text-decoration: underline;
                background-color: #eeeeee;
                background-color: rgba(238, 238, 238, 0.7);
            }

        </style>
        <!-- use jssor.slider.min.js instead for release -->
        <!-- jssor.slider.min.js = (jssor.js + jssor.slider.js) -->
        <script type="text/javascript" src="Assets/jss/jssor.js"></script>
        <script type="text/javascript" src="Assets/jss/jssor.slider.js"></script>
        <script>
            jssor_slider1_starter = function (containerId) {
        //Reference http://www.jssor.com/development/slider-with-slideshow-no-jquery.html
        //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

        var _SlideshowTransitions = [
        //Collapse Random
        { $Duration: 1000, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $SlideOut: true, $Easing: $JssorEasing$.$EaseOutQuad }

        //Fade in LR Chess
        , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

        //Rotate VDouble+ out
        , { $Duration: 1000, x: -1, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.85 } }

        ////Swing Inside in Stairs
        , { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

        //Zoom HDouble+ out
        , { $Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

        ////Dodge Pet Inside in Stairs
        , { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

        //Rotate Zoom+ out BL
        , { $Duration: 1200, x: 4, y: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8 } }

        //Dodge Dance Inside in Random
        , { $Duration: 1500, x: 0.3, y: -0.3, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5 } }

        //Rotate VFork+ out
        , { $Duration: 1200, x: -3, y: 1, $Rows: 2, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $JssorEasing$.$EaseInExpo, $Top: $JssorEasing$.$EaseInExpo, $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.7 } }

        //Clip and Chess in
        , { $Duration: 1200, y: -1, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Top: [0.5, 0.5], $Clip: [0, 0.5] }, $Formation: $JssorSlideshowFormations$.$FormationStraight, $ChessMode: { $Column: 12 }, $ScaleClip: 0.5 }

        ////Swing Inside in Swirl
        , { $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationSwirl, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 1.3, $Top: 2.5} }

        ////Rotate Zoom+ out
        , { $Duration: 1200, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Zoom: $JssorEasing$.$EaseInCubic, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.7} }

        ////Dodge Pet Inside in ZigZag
        , { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 20, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationZigZag, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseOutQuad }, $Round: { $Left: 0.8, $Top: 2.5} }

        //Rotate Zoom- out TL
        , { $Duration: 1200, x: 0.5, y: 0.5, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

        //Rotate Zoom- in BR
        , { $Duration: 1200, x: -0.6, y: -0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $JssorEasing$.$EaseSwing, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseSwing }, $Opacity: 2, $Round: { $Rotate: 0.5 } }

        // Wave out Eagle
        , { $Duration: 1500, y: -0.5, $Delay: 60, $Cols: 24, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationCircle, $Easing: $JssorEasing$.$EaseInWave, $Round: { $Top: 1.5 } }

        //Expand Stairs
        , { $Duration: 1000, $Delay: 30, $Cols: 10, $Rows: 4, $Clip: 15, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 2050, $Easing: $JssorEasing$.$EaseInQuad }

        //Fade Clip out H
        , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

        ////Dodge Pet Inside in Random Chess
        , { $Duration: 1500, x: 0.2, y: -0.1, $Delay: 80, $Cols: 10, $Rows: 4, $Clip: 15, $During: { $Left: [0.2, 0.8], $Top: [0.2, 0.8] }, $ChessMode: { $Column: 15, $Row: 15 }, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseInWave, $Clip: $JssorEasing$.$EaseLinear }, $Round: { $Left: 0.8, $Top: 2.5} }
        ];

        //Reference http://www.jssor.com/development/slider-with-caption-no-jquery.html
        //Reference http://www.jssor.com/development/reference-ui-definition.html#captiondefinition
        //Reference http://www.jssor.com/development/tool-caption-transition-viewer.html

        var _CaptionTransitions = [];
        _CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
        _CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
        _CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
        _CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
        _CaptionTransitions["TR"] = { $Duration: 900, x: -0.6, y: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

        _CaptionTransitions["L|IB"] = { $Duration: 1200, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };
        _CaptionTransitions["R|IB"] = { $Duration: 1200, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };
        _CaptionTransitions["T|IB"] = { $Duration: 1200, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutBack }, $Opacity: 2 };

        _CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 3, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
        _CaptionTransitions["CLIP|TB"] = { $Duration: 900, $Clip: 12, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
        _CaptionTransitions["CLIP|L"] = { $Duration: 900, $Clip: 1, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };

        _CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
        _CaptionTransitions["MCLIP|T"] = { $Duration: 900, $Clip: 4, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };

        _CaptionTransitions["WV|B"] = { $Duration: 1200, x: -0.2, y: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Round: { $Left: 1.5} };

        _CaptionTransitions["TORTUOUS|VB"] = { $Duration: 1800, y: -0.2, $Zoom: 1, $Easing: { $Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $Opacity: 2, $During: { $Top: [0, 0.7] }, $Round: { $Top: 1.3} };

        _CaptionTransitions["LISTH|R"] = { $Duration: 1500, x: -0.8, $Clip: 1, $Easing: $JssorEasing$.$EaseInOutCubic, $ScaleClip: 0.8, $Opacity: 2, $During: { $Left: [0.4, 0.6], $Clip: [0, 0.4], $Opacity: [0.4, 0.6]} };

        _CaptionTransitions["RTT|360"] = { $Duration: 900, $Rotate: 1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2 };
        _CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };

        _CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };

        _CaptionTransitions["T|IE*IE"] = { $Duration: 1800, y: 0.8, $Zoom: 11, $Rotate: -1.5, $Easing: { $Top: $JssorEasing$.$EaseInOutElastic, $Zoom: $JssorEasing$.$EaseInElastic, $Rotate: $JssorEasing$.$EaseInOutElastic }, $Opacity: 2, $During: { $Zoom: [0, 0.8], $Opacity: [0, 0.7] }, $Round: { $Rotate: 0.5} };

        _CaptionTransitions["RTTS|R"] = { $Duration: 900, x: -0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} };
        _CaptionTransitions["RTTS|T"] = { $Duration: 900, y: 0.6, $Zoom: 1, $Rotate: 1, $Easing: { $Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $Round: { $Rotate: 1.2} };

        _CaptionTransitions["DDGDANCE|RB"] = { $Duration: 1800, x: -0.3, y: -0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} };
        _CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
        _CaptionTransitions["DDG|TR"] = { $Duration: 1200, x: -0.3, y: 0.3, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump }, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 0.8} };

        _CaptionTransitions["FLTTR|R"] = { $Duration: 900, x: -0.2, y: -0.1, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 1.3} };
        _CaptionTransitions["FLTTRWN|LT"] = { $Duration: 1800, x: 0.5, y: 0.2, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseInOutSine, $Top: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInOutQuad }, $Opacity: 2, $During: { $Left: [0, 0.7], $Top: [0.1, 0.7] }, $Round: { $Top: 1.3} };

        _CaptionTransitions["ATTACK|BR"] = { $Duration: 1500, x: -0.1, y: -0.5, $Zoom: 1, $Easing: { $Left: $JssorEasing$.$EaseOutWave, $Top: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $During: { $Left: [0.3, 0.7], $Top: [0, 0.7] }, $Round: { $Left: 1.3} };

        _CaptionTransitions["FADE"] = { $Duration: 900, $Opacity: 2 };

        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $AutoPlayInterval: 2500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
            
            $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideEasing: $JssorEasing$.$EaseOutQuint,        //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
            $SlideDuration: 900,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
            },

            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            },

            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 4,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            }
        };

        var jssor_slider1 = new $JssorSlider$(containerId, options);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 1320), 800));
            else
                $Jssor$.$Delay(ScaleSlider, 50);
        }

        ScaleSlider();
        $Jssor$.$AddEvent(window, "load", ScaleSlider);

        $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        //responsive code end
    }
</script>
<!-- Jssor Slider Begin -->
<!-- You can move inline styles to css file or css block. --> 
<div id="slider1_container" style="position: relative; width: 1720px;
height : 800px; overflow: hidden;" class="text-center">

<!-- Loading Screen --> 
<div u="loading" style="position: absolute; top: 0px; left: 0px;align-content: center;">
    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;

    background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"> 
</div> 
<div style="position: absolute; display: block; background: url(Assets/imgg/loaderIcon.gif) no-repeat center center;

top: 0px; left: 0px;width: 100%;height:100%;">
</div> 
</div> 

<!-- Slides Container --> 
<div u="slides" style="cursor: move; position: absolute; top: 0px; width: 1720px; height: 800px;
overflow: hidden;" class="text-center">

<div>
    <img u="image" src="Assets/images/18.jpg" style=""/>
<div u=caption t="CLIP|TB" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/13.jpg" style=""/>

</div>
<div>
    <img u="image" src="Assets/images/5.jpg" style=""/>
<div u=caption t="RTT|10" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/6.jpg" style=""/>
<div u=caption t="T|IE*IE" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/16.jpg" style="" />
<div u=caption t="CLIP|LR" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/7.jpg" style=""/>
<div u=caption t="RTTS|R" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/8.jpg" style=""/>
<div u=caption t="DDGDANCE|RB" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/9.jpg" style=""/>
<div u=caption t="ZMF|10" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/10.jpg" style=""/>
<div u=caption t="WV|B" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/11.jpg" style=""/>
<div u=caption t="FADE" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/12.jpg" style=""/>
<div u=caption t="FLTTRWN|LT" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/14.jpg" style=""/>
<div u=caption t="ATTACK|BR" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div><div u=caption t="TORTUOUS|VB" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
    <img u="image" src="Assets/images/15.jpg" style=""/>
<div u=caption t="MCLIP|T" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/21.jpg" style=""/>
<div u=caption t="WV|B" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>
<div>
    <img u="image" src="Assets/images/22.jpg" style=""/>
<div u=caption t="LISTH|R" du="1500" style="position:absolute;top:700px;text-align: center;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px; padding: 3px; font-size: 18px;"><span >Creates solutions that empower farmers to work, develop and communicate in new and innovative ways.</span> </label></div></a>
</div>
</div>







<!-- Example to add fixed static share buttons in slider BEGIN -->
<!-- Remove it if no need -->
<!-- Share Button Styles -->
<style>
    .share-icon {
        display: inline-block;
        float: left;
        margin: 4px;
        width: 32px;
        height: 32px;
        cursor: pointer;
        vertical-align: middle;
        background-image: url(Assets/images/share-icons.png);
    }

    .share-facebook {
        background-position: 0px 0px;
    }

    .share-facebook:hover {
        background-position: 0px -40px;
    }

    .share-twitter {
        background-position: -40px 0px;
    }

    .share-twitter:hover {
        background-position: -40px -40px;
    }

    .share-googleplus {
        background-position: -120px 0px;
    }

    .share-googleplus:hover {
        background-position: -120px -40px;
    }

</style>
<div u="any" style="position:absolute;top:300px;left:425px;">
  <a href="" class=""> <div class="nav side-menu site_title navbar-brand" > <label  class="slogan" ><i class="fa fa-tree"></i> <span>Farm Management System</span> </label></div></a>
</div>
<div u="any" style="position:absolute;top:500px;left:680px;">
  <a href="" > <div style="color: #fff;"> <label style=" background-color: rgba(0, 0, 0, 0.4); border-radius: 5px;padding-right: 8px; padding-left: 8px;padding-top: 2px;padding-bottom: 2px; font-size: 24px"><span >Agriculture Through Technology</span> </label></div></a>
</div>





<!-- Example to add fixed static share buttons in slider END -->

<!-- Example to add fixed static QR code in slider BEGIN -->
<!-- Remove it if no need -->
<!-- QR Code Style -->
<style>
    @media only screen and (max-width: 2220px) {
        .qr_code {
            display: none;
        }
    }
</style>

<!-- Example to add fixed static QR code in slider END -->
</div> 

<!-- Bullet Navigator Skin Begin -->
<style>
    /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av
        {
            background: url(Assets/images/b03.png) no-repeat;
            overflow:hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }
    </style>
    <!-- bullet navigator container -->
    <div u="navigator" class="jssorb03" style="position: absolute; bottom: 16px; left: 6px;">
        <!-- bullet navigator item prototype -->
        <div u="prototype" style="POSITION: absolute; WIDTH: 21px; HEIGHT: 21px; text-align:center; line-height:21px; color:White; font-size:12px;"><div u="numbertemplate"></div></div>

    </div>
    <!-- Bullet Navigator Skin End -->

    <!-- Arrow Navigator Skin Begin -->
    <style>
        /* jssor slider arrow navigator skin 20 css */
        /*
        .jssora20l              (normal)
        .jssora20r              (normal)
        .jssora20l:hover        (normal mouseover)
        .jssora20r:hover        (normal mouseover)
        .jssora20ldn            (mousedown)
        .jssora20rdn            (mousedown)
        */
        .jssora20l, .jssora20r, .jssora20ldn, .jssora20rdn
        {
            position: absolute;
            cursor: pointer;
            display: block;
            background: url(Assets/images/a20.png) no-repeat;
            overflow:hidden;
        }
        .jssora20l { background-position: -3px -33px; }
        .jssora20r { background-position: -63px -33px; }
        .jssora20l:hover { background-position: -123px -33px; }
        .jssora20r:hover { background-position: -183px -33px; }
        .jssora20ldn { background-position: -243px -33px; }
        .jssora20rdn { background-position: -303px -33px; }
    </style>
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora20l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora20r" style="width: 55px; height: 55px; top: 123px; right: 8px">
    </span>
    <!-- Arrow Navigator Skin End -->
    <a style="display: none" href="#">jQuery Carousel</a>
    <!-- Trigger --> 
    <script>
        jssor_slider1_starter('slider1_container');
    </script> 
</div> 
<!-- Jssor Slider End --> 
</div>
