

if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}
var _scrollTop = 0,
  scrollTop = 0;

$(function() {
  var screenWidth = $(window).width(),
      screenHeight = $(window).height();
  var devicePixelRatio = window.devicePixelRatio ?
      window.devicePixelRatio :
      window.screen.deviceXDPI / window.screen.logicalXDPI;

  var userAgentInfo = navigator.userAgent.toLowerCase();
  var isIE11 = !!window.ActiveXObject ? !!window.ActiveXObject :"ActiveXObject" in window;
  var isEdge = userAgentInfo.toUpperCase().indexOf("EDGE") > -1;
  var isIE = userAgentInfo.toUpperCase().indexOf("MSIE") > -1;
  var isFF = userAgentInfo.toUpperCase().indexOf("FIREFOX") > -1;
  var isChrome = userAgentInfo.toUpperCase().indexOf("CHROME") > -1;

  var huaweiBrowser = false;
  var elements = document.querySelectorAll(".p30-sticky");
  var elementsSpecail = document.querySelectorAll(".p30-sticky-specail");
  var extraProtectionY;
  var zoomNum;
  var cpuVideoID;
  var element = document.getElementById("p30-tvc-canvas");

  var elPerspective = $("#bg-scroll-to-full");
  var triggerPerspective = "#p30-a-redefined-perspective-animate";
  var scenePerspective;

  $(function() {
      var siteCode = window.digitalData.page.pageInfo.siteCode2;
      var productName = window.digitalData.page.category.subCategory1;
      $('.second-app-nav').append('<span class="other_pc_nav" style="font-family:inherit;padding: 0 20px;"><span style="border-left:2px solid #242728;height: 24%;margin-top: 24px;"></span></span><a cat="pdp_cta_click" act="product_switch_button" lab="HUAWEI P30" class="other_pc_nav a-common" href="/' + siteCode + '/phones/p30" style="float: left;height: 64px;line-height: 64px;font-family:inherit;font-size: 20px;color: #979696;">HUAWEI P30</a>');
      $('.second-ul').append('<li class="other_mobile_nav" style="border: 0; margin-bottom: 0;margin-top: 30px;"><a class="a-common" cat="pdp_cta_click" act="product_switch_button" lab="HUAWEI P30" href="/' + siteCode + '/phones/p30" style="font-family: inherit;line-height: 14px; font-size: 16px; height: auto; color: #242728;">HUAWEI P30</a></li>');
      $('body').append('<style> @media (min-width: 1024px) { .other_mobile_nav { display: none !important; } .other_pc_nav { display: inline !important; } } @media (max-width: 1023px) { .second-navigation .second-nav-wrap .second-nav .second-ul { padding: 30px 15% 20px; } .other_pc_nav { display: none !important; } .other_mobile_nav { display: block !important; } } @media (width: 1024px) { .second-title{ font-size: 16px !important; } a.other_pc_nav{ font-size: 14px !important; } }</style>')
  })

  var controller = new ScrollMagic.Controller({
      controller: "#p30-container"
  });
  $(".p30-section").each(function() {
      var p30Section = $(this);
      var p30SectionDuration =
          window.innerHeight * 3 + p30Section.outerHeight(true);
      var p30SectionShow = new ScrollMagic.Scene({
              triggerElement: this,
              duration: p30SectionDuration,
              offset: 0,
              triggerHook: 2,
              reverse: true
          })
          .setClassToggle(this, "shown")
          .addTo(controller);
      $(window).resize(function() {
          p30SectionShow.duration(
              window.innerHeight * 3 + p30Section.outerHeight(true)
          );
      });
  });

  $(".logo").attr(
      "src",
      "//consumer-img.huawei.com/content/dam/huawei-cbg-site/common/mkt/homepage/header-menu/img_con_v27_base_logo_20180327.svg"
  );

  $(window).scroll(function() {
      _scrollTop = $(window).scrollTop();
      scrollTop = $(window).scrollTop();
  });

  Stickyfill.add(elements);
  Stickyfill.add(elementsSpecail);

  if (
      (navigator.userAgent.toUpperCase().indexOf("HUAWEI") > -1 &&
          navigator.userAgent.toUpperCase().indexOf("CHROME") == -1) ||
      navigator.userAgent.toUpperCase().indexOf("HONOR") > -1 ||
      navigator.userAgent.toUpperCase().indexOf("MICROMESSENGER") > -1 ||
      navigator.userAgent.toUpperCase().indexOf("SXX-W09") > -1
  ) {
      huaweiBrowser = true;
      cpuVideoID = ".p30-section-title4.p30-section .p30-section-content-title";
      $(".p30-pc-video")
          .removeClass("video-show")
          .addClass("video-hide")
          .attr("preload", "none");
      $(".p30-mob-video")
          .removeClass("video-hide")
          .addClass("video-show");
  } else {
      tvcVideo = document.querySelector("#p30-tvc-pc-video");
      cpuVideoID = ".p30-section-title4.p30-section .p30-section-content-title";
      aiVideo = $("#p30-ai-video");
      stableVideos = $("#p30-stableVideos");
      darkLightVideos = $("#p30-darkLight");
      $(".p30-pc-video")
          .removeClass("video-hide")
          .addClass("video-show")
          .attr("preload", "load");
      $(".p30-mob-video")
          .removeClass("video-show")
          .addClass("video-hide");
  }

  /* * * * * * * * * * * * * * * * * * * * * * * * *
   *                                                *
   *           B R O W S E R   T E S T S            *
   *                                                *
   * * * * * * * * * * * * * * * * * * * * * * * * */

  $(window)
      .resize(function() {
          svgAdaptive();
          if (screenWidth >= 1024) {
              extraProtectionY = "-300vh";
          } else {
              extraProtectionY = "-" + (screenWidth * 5.15 - 250) + "px";
          }
          if (screenWidth < 2560) {
              zoomNum = "2.3";
          } else {
              zoomNum = "2.2";
          }if(!(isIE || isIE11)){animatePerspective(elPerspective, triggerPerspective);}
          
      })
      .resize();

  function svgAdaptive() {
      var sectionTitle = document.querySelectorAll(".p30-section-content-title");
      for (var i = 0; i < sectionTitle.length; i++) {
          var s1Width = sectionTitle[i].clientWidth || sectionTitle[i].innerWidth;
          var s1Height =
              sectionTitle[i].clientHeight || sectionTitle[i].innerHeight;
          if (s1Width * devicePixelRatio > 1880) {
            try{
                sectionTitle[i]
                  .querySelector("svg")
                  .setAttribute(
                      "viewBox",
                      "0 0 " +
                      s1Width * devicePixelRatio +
                      " " +
                      s1Height * devicePixelRatio
                  );
            }catch(e){}
              
          } else {
            try{
              var screenRatio = s1Height / s1Width;
              sectionTitle[i]
                  .querySelector("svg")
                  .setAttribute("viewBox", "0 0 1920 " + 1920 * screenRatio);
                }catch(e){}
          }
      }
  }

  /* * * * * * * * * * * * * * * * * * * * * * * * * * * *
   *                                                      *
   *    S E C T I O N   T I T L E   T R A N S I T I O N   *
   *                                                      *
   * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	function addCssByLink(url){ 
    var doc=document; 
    var link=doc.createElement("link"); 
    link.setAttribute("rel", "stylesheet"); 
    link.setAttribute("type", "text/css"); 
    link.setAttribute("href", url); 
   
    var heads = doc.getElementsByTagName("body"); 
    if(heads.length) 
        heads[0].appendChild(link); 
    else 
        doc.documentElement.appendChild(link); 
} 
  if (isFF) {
      var p30clipPathSupport = true;
      var p30stickySupport = true;
  } else if (isIE || isIE11 || isEdge) {
      var p30clipPathSupport = false;
      var p30stickySupport = false;
      $(".p30-idDesignbg-scale").addClass("is-ie");
      $(".p30-compactDesignbg-scale").addClass("is-ie");
      addCssByLink("/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p30-pro/css/p30-pro-ie.css?v9");
      if(devicePixelRatio > 1.2){
        $('body').append('<style>'+
        '@media (min-width: 1370px){'+
        '	.p30-section-title-font {'+
        '		font-size: 14vw;'+
        '	}'+
        '}'+
        '@media (max-width: 1366px){'+
        '	.p30-section-title-font {'+
        '        font-size: 12vw;'+
        '    }'+
        '}'+
        '@media (max-width: 1024px){'+
        '.p30-section-title-font {'+
        '        font-size: 13vw;'+
        '    }'+
        '}'+
        '@media (min-width: 1024px){'+
        '    #p30-intro-camera-slogan {'+
        '        font-size: 10vw;'+
        '    }'+
        '}'+
        '@media (min-width: 1441px){'+
        '    #p30-intro-camera-slogan {'+
        '        font-size: 8vw;'+
        '    }'+
        '}'+
        '@media (min-width: 2560px){'+
        '    #p30-intro-camera-slogan {'+
        '        font-size: 6vw;'+
        '    }'+
        '}'+
        '@media (min-width: 1280px) and (max-width: 1440px) {'+
        '    .p30-section-title-font {'+
        '        font-size: 12vw;'+
        '    }'+
        '}'+
        '</style>');
      }
  } else {
      if (
          CSS.supports("-webkit-clip-path", "inset(0 0 0 0)") == true ||
          CSS.supports("clip-path", "inset(0 0 0 0)") == true
      ) {
          var p30clipPathSupport = true;
      }

      if (
          CSS.supports("position", "-webkit-sticky") == true ||
          CSS.supports("position", "sticky") == true
      ) {
          var p30stickySupport = true;
      }
  }

  if (p30clipPathSupport == true) {
      var p30sectionTitleTransition = {
          WebkitClipPath: "inset(-1px 0% 100%)",
          clipPath: "inset(-1px 0% 100%)",
          ease: Linear.easeNone
      };
  } else {
      var p30sectionTitleTransition = {
          opacity: "0",
          ease: Linear.easeNone
      };
  }
  //title-clipPath
//[].forEach.call(
//    document.querySelectorAll(".p30-section-title-area"),
//    function(p30sectionTitleArea) {
//        var p30sectionTitle = p30sectionTitleArea.querySelector(
//            ".p30-section-title"
//        );
//
//        var p30sectionTitleAnimate = new ScrollMagic.Scene({
//                triggerElement: p30sectionTitleArea,
//                duration: "100%",
//                triggerHook: 0
//            })
//            .setTween(p30sectionTitle, p30sectionTitleTransition)
//            .addTo(controller);
//    }
//);
	if (!(isIE || isIE11)){
		var p30mobileSuperZoom = new ScrollMagic.Scene({
          triggerElement: "#p30-mobile-superZoom",
          duration: "100%",
          triggerHook: 1
      })
      .setTween("#p30-photo-zoom-content", {
          opacity: "0.5"
      })
      .addTo(controller);

  var p30IntroCameraAnimation = new TimelineMax().add([
      TweenMax.to("#p30-intro-camera-1", 1, {
          css: {
              x: "-75vw"
          }
      }),
      TweenMax.to("#p30-intro-camera-2", 1, {
          css: {
              x: "75vw"
          }
      }),
      TweenMax.to(".intro-camera-curtainbg", 0.5, {
          css: {
              opacity: 0
          },
          ease: Linear.easeNone
      }).delay(0.3)
  ]);
  var p30IntroCamera = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-camera-trigger",
          duration: "50%",
          triggerHook: 0
      })
      .setTween(p30IntroCameraAnimation)
      .addTo(controller);

 //    change-start
	var p30IntroCameraAnimation2 = new TimelineMax().add([
      TweenMax.to("#p30-intro-camera-logo", 1, {
          css: {
              opacity: "1"
          }
      }),
      TweenMax.to("#p30-intro-camera-logo", 1, {
              top: "15%"
      }),
      TweenMax.to(".p30-kv-video", 0.1, {
          css: {
              opacity: 1
          },
          ease: Linear.easeNone
      }).delay(0.7)
  ]);
  var p30IntroLogo = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-camera-trigger",
          duration: "80%",
          triggerHook: 0
      })
      .setTween(p30IntroCameraAnimation2)
      .addTo(controller);
//    change-end

  var p30IntroContent = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-camera-content",
          duration: "300%",
          triggerHook: 0
      })
      .setTween("#p30-intro-camera-slogan", {
          opacity: "0"
      })
      .addTo(controller);

//var p30IntroHero = new ScrollMagic.Scene({
//        triggerElement: "#p30-intro-hero2-trigger",
//        duration: "300%",
//        triggerHook: 0.5
//    })
//    .setTween(["#p30-intro-hero-right", "#p30-intro-hero-reflection"], {
//        y: "-25vh",
//        scale: "1"
//    })
//    .addTo(controller);

    
    //speedyRecovery
  var speedyRecoveryAnimation = new TimelineMax().add([
      TweenMax.fromTo(
          ".p30-speedyRecovery-phone",
          5, {
              x: "-50%",
              y: "0vh"
          }, {
              x: "-50%",
              y: "30vh"
          }
      ),
      TweenMax.fromTo(
          ".p30-speedyRecovery-number",
          3, {
              autoAlpha: "0"
          }, {
              autoAlpha: "1",
              onComplete: function() {
                  numberAnimation("p30-batterNumber", 4200);
                  $(".p30-speedyRecovery-battery-after").addClass("p30-fullBattery");
              }
          }
      ).delay(2.5)
  ]);
  var speedyRecovery = new ScrollMagic.Scene({
          triggerElement: "#p30-speedyRecovery-trigger",
          duration: "50%",
          triggerHook: 0
      })
      .setTween(speedyRecoveryAnimation)
      .on("leave", function(e) {
          if (e.scrollDirection == "REVERSE") {
              numberAnimation("p30-batterNumber", 0);
              $(".p30-speedyRecovery-battery-after").removeClass("p30-fullBattery");
          }
      })
      .addTo(controller);

  //power
  var powerAnimatedSlider1trigger,
      powerAnimatedSlider1duration,
      powerAnimatedSlider2trigger,
      powerAnimatedSlider2duration,
      powerAnimatedSlider3trigger,
      powerAnimatedSlider3duration;
  if (screenWidth >= 600) {
      powerAnimatedSlider1trigger = 0.5;
      powerAnimatedSlider1duration = "80%";
      powerAnimatedSlider2trigger = 0.6;
      powerAnimatedSlider2duration = "80%";
      powerAnimatedSlider3trigger = 0.6;
      powerAnimatedSlider3duration = "70%";
  } else {
      powerAnimatedSlider1trigger = 0.6;
      powerAnimatedSlider1duration = "80%";
      powerAnimatedSlider2trigger = 0.6;
      powerAnimatedSlider2duration = "80%";
      powerAnimatedSlider3trigger = 0.6;
      powerAnimatedSlider3duration = "70%";
  }
  var powerSlider1 = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-powerSlider1-trigger",
          duration: powerAnimatedSlider1duration,
          triggerHook: powerAnimatedSlider1trigger
      })
      .setClassToggle(".p30-power-animation", "animatedSlider1")
      .on('end',function(e){
      	if(e.scrollDirection == "FORWARD"){
      		$('#p30-powerSlider1').addClass('leave');
      	}else if(e.scrollDirection == "REVERSE"){
      		$('#p30-powerSlider1').removeClass('leave');
      	}
      })
      .addTo(controller);

  var powerSlider2 = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-powerSlider2-trigger",
          duration: powerAnimatedSlider2duration,
          triggerHook: powerAnimatedSlider2trigger
      })
      .setClassToggle(".p30-power-animation", "animatedSlider2")
      .on('end',function(e){
      	if(e.scrollDirection == "FORWARD"){
      		$('#p30-powerSlider2').addClass('leave');
      		$('#p30-powerSlider2').removeClass('enter');
      	}else if(e.scrollDirection == "REVERSE"){
      		$('#p30-powerSlider2').removeClass('leave');
      		$('#p30-powerSlider2').addClass('enter');
      	}
      })
      .on('start',function(e){
      	if(e.scrollDirection == "FORWARD"){
      		$('#p30-powerSlider2').addClass('enter');
      	}else if(e.scrollDirection == "REVERSE"){
      		$('#p30-powerSlider2').removeClass('enter');
      	}
      })
      .addTo(controller);

  var powerSlider3 = new ScrollMagic.Scene({
          triggerElement: "#p30-intro-powerSlider3-trigger",
          duration: powerAnimatedSlider3duration,
          triggerHook: powerAnimatedSlider3trigger
      })
      .setClassToggle(".p30-power-animation", "animatedSlider3")
      .on('start',function(e){
      	if(e.scrollDirection == "FORWARD"){
      		$('#p30-powerSlider3').addClass('enter');
      	}else if(e.scrollDirection == "REVERSE"){
      		$('#p30-powerSlider3').removeClass('enter');
      	}
      })
      .on('end',function(e){
      	if(e.scrollDirection == "FORWARD"){
      		$('#p30-powerSlider3').addClass('leave');
      		$('#p30-powerSlider3').removeClass('enter');
      	}else if(e.scrollDirection == "REVERSE"){
      		$('#p30-powerSlider3').removeClass('leave');
      		$('#p30-powerSlider3').addClass('enter');
      	}
      })
      .addTo(controller);

  //colourful mood, extra protection
      var detailsAnimate = new ScrollMagic.Scene({
          triggerElement: "#p30-blockt1-trigger",
          duration: "100%",
          triggerHook: 0
      })
      .setTween(".p30-component-figure-picBg", {
          scale: "1.8"
      })
      .addTo(controller);

  //section-title2
  var backgroundVideo = new ScrollMagic.Scene({
          triggerElement: "#p30-backgroundt2-trigger",
          duration: "150%",
          triggerHook: 0
      })
      .setTween("#p30-backgroundt2", {
          opacity: "0",
          ease: Linear.easeNone
      })
      .addTo(controller);

  var detailsAnimate = new ScrollMagic.Scene({
      triggerElement: "#p30-blockt2-title2-video-trigger",
      triggerHook: 0
  })

  .setTween(".p30-section-title2 .p30-component-figure", {
          opacity: "1",
          ease: Linear.easeNone
      })
      .setClassToggle(
          ".p30-section-title-area.p30-section-title2 .p30-component-tile.p30-telephoto-camera-video",
          "animated"
      )
      .addTo(controller);

  //p30-section-title3
//var phoneScale = new ScrollMagic.Scene({
//        triggerElement: "#p30-backgroundt3-trigger",
//        duration: "250%",
//        triggerHook: 0
//    })
//    .setClassToggle(".p30-idDesign-bgwarpper", "p30-scale")
//
//.addTo(controller);

  /*compact-design*/
var phoneScaleAnimation;
if (screenWidth >= 1024) {
      phoneScaleAnimation = new TimelineMax().add([
          TweenMax.to(".p30-compactDesign-bgwarpper", 5, {
              scale: "2.5",
              x: "42%",
              y: "-66%"
          })
      ]);
} else {
      phoneScaleAnimation = new TimelineMax().add([
          TweenMax.to(".p30-compactDesign-bgwarpper", 5, {
              y: "-40vh"
          })
      ]);
}
var compactDesign = new ScrollMagic.Scene({
          triggerElement: "#p30-compactDesign-trigger",
          duration: "100%",
          triggerHook: 1
      })
      .setTween(phoneScaleAnimation)
      .addTo(controller);

  //section-title4
  var backgroundVideo = new ScrollMagic.Scene({
          triggerElement: "#p30-backgroundt4-trigger",
          duration: "150%",
          triggerHook: 0
      })
      .setTween(cpuVideoID, {
          opacity: "0",
          ease: Linear.easeNone
      })
      .addTo(controller);


  var backgroundVideo = new ScrollMagic.Scene({
          triggerElement: "#p30-backgroundt4-trigger",
          duration: "50%",
          triggerHook: 0.5
      })
      .setClassToggle(".p30-980icon", "p30-block")
      .addTo(controller);

	 $(".p30-photo-gallery-container .p30-component-figure").each(function(
      index,
      el
  ) {
      var triggerEl = $(this).parents(".p30-photo-gallery-container")[0];
      var elHeight = $(this)
          .parents(".p30-photo-gallery-container")
          .height();
      if ($(this).hasClass("left-img-move")) {
          var imgEl = $(this).find(".p30-component-figure-wrap-after");
          var imgLeftMoveToRight = new ScrollMagic.Scene({
                  triggerElement: triggerEl,
                  duration: 0,
                  triggerHook: 0
              })
              .setTween(imgEl, {
                  width: "100%"
              })
              .addTo(controller);
      } else if ($(this).hasClass("p30-right-img-move")) {
          var imgEl = $(this).find(".p30-component-figure-wrap-before");
          var imgLeftMoveToRight = new ScrollMagic.Scene({
                  triggerElement: triggerEl,
                  duration: 0,
                  triggerHook: 0
              })
              .setTween(imgEl, {
                  width: "0%"
              })
              .addTo(controller);
      }
  });

  //a-redefined-perspective
  

    }
    
    //zoom-moon
    var p30zoomMoonTitleTM = new TimelineMax().add([
        TweenMax.fromTo("#p30-photo-zoom-title", 1, {
            x: "-50%",
            y: "-50%",
            scale: "1",
            opacity: "0"
        }, {
            x: "-50%",
            y: "-50%",
            scale: zoomNum,
            opacity: "1"
        })
    ]);
  
    var p30zoomMoonTitle = new ScrollMagic.Scene({
            triggerElement: "#p30-photo-zoom-end-trigger",
            duration: "250%",
            triggerHook: 0
        })
        .setTween(p30zoomMoonTitleTM)
        .addTo(controller);
        
    var p30zoomMoon5 = new TimelineMax().add([
        TweenLite.fromTo("#p30-photo-zoom-moon", 0.4, {
            x: "-50%",
            y: "-50%",
            scale: "0.006",
        }, {
                x: "-50%",
                y: "-50%",
                scale: "0.03",
            }),
        TweenLite.to("#p30-photo-zoom-slider-mask", 0.4, {
            y: "-4%",
        }),
        TweenLite.to("#p30-photo-zoom-number", 0.4, {
            y: "-2.7vh",
        })
    ]);
    var p30zoomMoon10 = new TimelineMax().add([
        TweenLite.to("#p30-photo-zoom-moon", 0.4, {
            x: "-50%",
            y: "-50%",
            scale: "0.06",
        }),
        TweenLite.to("#p30-photo-zoom-slider-mask", 0.4, {
            y: "-8%",
        }),
        TweenLite.to("#p30-photo-zoom-number", 0.4, {
            y: "-5.4vh",
        })
    ]);
    var p30zoomMoon50 = new TimelineMax().add([
        TweenLite.to("#p30-photo-zoom-moon", 0.4, {
            x: "-50%",
            y: "-50%",
            scale: "0.3",
        }),
        TweenLite.to("#p30-photo-zoom-slider-mask", 0.4, {
            y: "-50%",
        }),
        TweenLite.to("#p30-photo-zoom-number", 0.4, {
            y: "-54vh",
        })
    ]);
    var p30zoomMoonScene5 = new ScrollMagic.Scene({
        triggerElement: "#p30-photo-zoom-end-trigger",
        duration: "0",
        triggerHook: 0,
    })
        .setTween(p30zoomMoon5)
        .on('enter', function (e) {
            if (e.scrollDirection == 'FORWARD') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 1, 5);
            }
        })
        .on('leave', function (e) {
            if (e.scrollDirection == 'REVERSE') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 5, 1);
            }
        })
        .addTo(controller);

    var p30zoomMoonScene10 = new ScrollMagic.Scene({
        triggerElement: "#p30-photo-zoom-5-trigger",
        duration: "0",
        triggerHook: 0,
    })
        .setTween(p30zoomMoon10)
        .on('enter', function (e) {
            if (e.scrollDirection == 'FORWARD') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 5, 10);
            }
        })
        .on('leave', function (e) {
            if (e.scrollDirection == 'REVERSE') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 10, 5);
            }
        })
        .addTo(controller);
    var p30zoomMoonScene50 = new ScrollMagic.Scene({
        triggerElement: "#p30-photo-zoom-10-trigger",
        duration: "0",
        triggerHook: 0,
    })
        .setTween(p30zoomMoon50)
        .on('enter', function (e) {
            if (e.scrollDirection == 'FORWARD') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 10, 50);
            }
        })
        .on('leave', function (e) {
            if (e.scrollDirection == 'REVERSE') {
                numChangeAnimate($("#p30-photo-zoom-number-update"), 50, 10);
            }
        })
        .addTo(controller);
      
  
function animatePerspective(element, triggerEl) {
      if (scenePerspective) {
          scenePerspective.destroy(true);
          element.attr("style", "");
      }
      if (screenWidth > 768 && screenWidth / screenHeight > 1) {
          var tlPerspective = new TimelineLite({ paused: true });
          var t1Perspective = TweenLite.to(elPerspective, 0.5, {
              transform: "translateX(-23vw)"
          });
          if(screenWidth == 1024 && screenHeight == 768){
            var t2PerspectiveHeight = $(window).height() - 130 + 'px';
          }else{
          	var t2PerspectiveHeight = "calc(100vh - 65px)";
          }
          var t2Perspective = TweenLite.to(elPerspective, 0.2, {
              height: t2PerspectiveHeight,
              right: "0vw",
              transform: "translateX(0)",
              width: "100vw",
              top: 0
          });
          tlPerspective.add([t1Perspective, t2Perspective], 0, "sequence", 0);

          scenePerspective = new ScrollMagic.Scene({
                  triggerElement: triggerEl,
                  triggerHook: 0
              })
              .addTo(controller)
              .on("enter", function() {
                  TweenLite.set(elPerspective, { clearProps: "all" });
                  t1Perspective.invalidate();
                  t2Perspective.invalidate();
                  tlPerspective.restart();
              })
              .on("leave", function() {
                  tlPerspective.reverse();
              });
      } else {
          if (scenePerspective) {
              scenePerspective.destroy(true);
              element.attr("style", "");
          }
          scenePerspective2 = new ScrollMagic.Scene({
                  triggerElement: triggerEl,
                  triggerHook: 0,
                  offset: $("#p30-a-redefined-perspective-animate .p30-component-description").outerHeight(true)
              })
              .setClassToggle("#p30-a-redefined-perspective-animate .p30-component-figure .p30-component-figure-img", "p30-contain")
              .addTo(controller)
      }
  }
  if (typeof element != "undefined" && element != null) {
//    var introTvcLine = new ScrollMagic.Scene({
//            tweenChanges: true,
//            triggerElement: "#p30-tvc-canvas-trigger",
//            duration: "100%",
//            triggerHook: 1
//        })
//        .setTween("#p30-tvc-canvas", {
//            WebkitClipPath: "inset(0% 0% 0% 0%)",
//            clipPath: "inset(0% 0% 0% 0%)"
//        })
//        .addTo(controller);

      var introTvc = new ScrollMagic.Scene({
              triggerElement: "#p30-tvc-canvas-trigger",
              duration: "100%",
              triggerHook: 0
          })
//        .setTween("#p30-tvc-canvas video", {
//            y: "-75%",
//            ease: Linear.easeNone
//        })
          .on("enter", function(e) {
              if (!huaweiBrowser) {
                  tvcVideo.play();
              }
          })
          .on("leave", function(e) {
              if (!huaweiBrowser) {
                  tvcVideo.pause();
              }
          })
          .setClassToggle("#p30-tvc-canvas", "animated")
          .addTo(controller);

      if (!huaweiBrowser) {
          var tvcCanvas = document.querySelector(
              "#p30-tvc-canvas .p30-tvc-canvas-crop canvas"
          );
          var tvcCtx = tvcCanvas.getContext("2d");

          var tvcW = tvcCanvas.clientWidth;
          var tvcH = tvcCanvas.clientHeight;

          var tvcSourceW = document.querySelector("#p30-tvc-canvas video")
              .clientWidth;
          var tvcSourceH = document.querySelector("#p30-tvc-canvas video")
              .clientHeight;

          tvcCanvas.width = tvcW;
          tvcCanvas.height = tvcH;

          tvcVideo.addEventListener("play", function() {
              drawBlur();
          });

          function drawBlur() {
              if (tvcVideo.paused || tvcVideo.ended) return false;
              tvcCtx.drawImage(tvcVideo, tvcW - tvcH * 2, 0, tvcH * 2, tvcH);
              requestAnimationFrame(function() {
                  drawBlur();
              });
          }
      }
  }

  

  //section-title1
//var backgroundVideo = new ScrollMagic.Scene({
//        triggerElement: "#p30-backgroundt1-trigger",
//        duration: "60%",
//        triggerHook: 0
//    })
//    .setTween("#p30-backgroundt1", {
//        opacity: "0",
//        ease: Linear.easeNone
//    })
//    .addTo(controller);

  
  

  //title-5
  //var backgroundChange = new ScrollMagic.Scene({
  //  triggerElement: "#p30-backgroundt5-trigger",
  //  duration: "100%",
  //  triggerHook: 0
  //})
  //  .setTween(".p30-section-title5 .p30-section-title-white", {
  //    backgroundColor: "rgba(62, 182, 154, 0.1)",
  //    ease: Linear.easeNone
  //  })
  //  .addTo(controller);

  //title-6
  //var backgroundChange = new ScrollMagic.Scene({
  //  triggerElement: "#p30-backgroundt6-trigger",
  //  duration: "100%",
  //  triggerHook: 0
  //})
  //  .setTween(".p30-section-title6 .p30-section-title-white", {
  //    backgroundColor: "rgba(62, 182, 154, 0.1)",
  //    ease: Linear.easeNone
  //  })
  //  .addTo(controller);

  //function
  function numberAnimation(con, index) {
      var percent_number_step = $.animateNumber.numberStepFactories.append(
          " mAh"
      );
      $("." + con).animateNumber({
              number: index,
              easing: "easeInQuad",
              numberStep: percent_number_step
          },
          500
      );
  }

  function numAnimate(con, start, end) {
      con.prop("number", start).animateNumber({
              number: end,
              easing: "easeInQuad",
              numberStep: function(now, tween) {
                  var target = $(tween.elem);
                  target.attr("transform", "matrix(1,0,0,1,0," + now + ")");
              }
          },
          800
      );
  }
  function numChangeAnimate(con, start, end) {
    con
        .prop('number', start)
        .animateNumber(
            {
                number: end
            },
            400
        );
}
  //left-right start
  //photo gallery part
 
  // beauty in every layer
  var tmLeicaStyle = new TimelineMax().add([
      TweenMax.to("#leicaStyle .p30-component-figure-wrap-after", 1, {
          opacity: 1
      })
  ]);

  var leicaStyleScene = new ScrollMagic.Scene({
          triggerElement: "#leicaStyle",
          triggerHook: 0,
          duration: "60%"
      })
      .addTo(controller)
      .setTween(tmLeicaStyle);

  //motion-sensing-game
  var motionScene = new ScrollMagic.Scene({
          triggerElement: "#p30-motion-sensing-game-trigger",
          duration: "100%",
          triggerHook: 0
      })
      .addTo(controller)
      .setTween("#p30-motion-sensing-game-img", { opacity: 0.3 });
  //free-your-eyes
  //var freeYourEyesScene = new ScrollMagic.Scene({
  //  triggerElement: "#p30-free-your-eyes",
  //  duration: "100%",
  //  triggerHook: 0
  //})
  //  .addTo(controller)
  //  .setTween("#p30-free-your-eyes-img", { opacity: 0.3 });
  // share-in-seconds
//var shareInSecondsScene = new ScrollMagic.Scene({
//        triggerElement: "#p30-share-in-seconds-trigger",
//        duration: "100%",
//        triggerHook: 0
//    })
//    .addTo(controller)
//    .setTween("#p30-share-in-seconds-img", { opacity: 0.6 });
  //left-right end
  //video

  $('#integratedAIVideoContainer').on('click', '.middle-playbtn.p30-tvc-title', function() {
      $(this).attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
      aiVideo[0].play();
  })
  var p30stableVideos = new ScrollMagic.Scene({
          triggerElement: "#p30-stableVideosContainer",
          duration: "100%",
          triggerHook: 0.5
      })
      .on("enter", function(e) {
          stableVideos.next().attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
          if (!huaweiBrowser) {
              stableVideos[0].play();
          }
          stableVideos.on('ended', function() {
              stableVideos.next().attr('class', 'middle-playbtn p30-tvc-title')
          })
      })
      .on("leave", function(e) {
          if (!huaweiBrowser) {
              stableVideos[0].pause();
          }
      })
      .addTo(controller)
  $('#p30-stableVideosContainer').on('click', '.middle-playbtn.p30-tvc-title', function() {
      $(this).attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
      stableVideos[0].play();
  })
  
   var p30darkLighVideos = new ScrollMagic.Scene({
          triggerElement: "#p30-darkLightContainer",
          duration: "100%",
          triggerHook: 0.5
      })
      .on("enter", function(e) {
          darkLightVideos.next().attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
          if (!huaweiBrowser) {
              darkLightVideos[0].play();
          }
          darkLightVideos.on('ended', function() {
              darkLightVideos.next().attr('class', 'middle-playbtn p30-tvc-title')
          })
      })
      .on("leave", function(e) {
          if (!huaweiBrowser) {
              darkLightVideos[0].pause();
          }
      })
      .addTo(controller)
  $('#p30-darkLightContainer').on('click', '.middle-playbtn.p30-tvc-title', function() {
      $(this).attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
      darkLightVideos[0].play();
  })



});


//video pop
$(function() {
  $("body").on("click", ".pop-video", function(e) {
      e.preventDefault();
      var _this = $(this),
          eventAction = 0,
          oldEventAction = 0,
          videoStart = 0,
          _video = $("<video></video>");

      _video.attr({ "src": _this.attr("href"), "poster": _this.data("poster"), "autoplay": "autoplay", "controls": "controls" });
      _video.on("play", function() {
          if (videoStart == 0) {
              try {
                  trackEvent("Video Milestone", "Video Start", _this.data("label"), "");
              } catch (e) {
                  console.error('trackEvent error');
              }
              videoStart = 1;
          }
      });
      _video.on("timeupdate", function(event) {
          eventAction = (this.currentTime / this.duration) * 100
          if (eventAction <= 25) {
              eventAction = 25;
          } else if (eventAction <= 50) {
              eventAction = 50;
          } else if (eventAction <= 75) {
              eventAction = 75;
          } else if (eventAction < 100) {
              eventAction = 100;
          }
          if (eventAction > oldEventAction) {
              oldEventAction = eventAction;
          }
      });
      _video.on("ended", function(event) {
          try {
              trackEvent("Video Milestone", "Video Complete", _this.data("label"), "");
          } catch (e) {
              console.error('trackEvent error');
          }
      });
      var _vRatio = Number(_this.data("ratio"));
      _video.on("loadedmetadata",function(){
          _vRatio = this.videoHeight / this.videoWidth;
      });

      var _pop = new SimplePopUp({
          ratio: _vRatio,
          closeColor: "white",
          beforeClose: function() {
              try {
                  trackEvent("Video Milestone", "Video " + eventAction + "%", _this.data("label"), "");
              } catch (e) {
                  console.error('trackEvent error');
              }
          }
      });

      if (_vRatio > $(window).height() / $(window).width()) {
          _pop.def.width = 0.4;
      }

      _pop.pop(_video[0]);
  });
});

$(function(){
    var screenWidth = $(window).width()
    $('.superscript').each(function(){
        if(screenWidth > 1023){
            $(this).on('click', function (e) {
                var x =$(this).data("index") - 1;
                $('html,body').animate({ scrollTop: $('.des-container').offset().top-65 }, 500);
                $('.des-container .component-footnotes li:eq('+ x +')').addClass('current').siblings().removeClass('current');
                e.preventDefault();
            });
        }else{
            $(this).on('click', function (e) {
                var x =$(this).data("index") - 1;
                $('html,body').animate({ scrollTop: $('.des-container .component-footnotes li:eq('+ x +')').offset().top-65 }, 500);
                $('.des-container .component-footnotes li:eq('+ x +')').addClass('current').siblings().removeClass('current');
                e.preventDefault();
            });
        }
    })
})




    $(function(){
        var colorSwiper = new Swiper("#p30-intro-colors-showcase-container",{
            loop : true,
      noSwiping : true,
      effect : 'fade',
      navigation: {
            nextEl: '#p30-intro-colors-showcase .swiper-button-next',
            prevEl: '#p30-intro-colors-showcase .swiper-button-prev',
        },
      pagination: {
        el: "#p30-intro-colors-showcase .swiper-pagination",
        clickable: true,
      },
            on:{
                slideChange: function(){
                    var _index = this.realIndex + 1;
                    $("#p30-intro-colors").attr("class","p30-fullscreen-1 animated p30-intro-colors-slide" + _index);
                },
            },
        });
      var accSwiper = new Swiper(".p30-extraProtection-more",{
            loop : true,
            slidesPerView : 2,
            spaceBetween : '5%',
            breakpoints: { 
              1024: {
                slidesPerView: 1,
                spaceBetween : 0,
              }
            },
      navigation: {
            nextEl: '.p30-accSwiper .swiper-button-next',
            prevEl: '.p30-accSwiper .swiper-button-prev',
        },
        });
    var gaClass = "a-interaction a-common"
    $(".swiper-button-prev").addClass(gaClass).attr("cat","Content Interactions").attr("act","Scroll Left").attr("lab","<product name> - <page title>");
    $(".swiper-button-next").addClass(gaClass).attr("cat","Content Interactions").attr("act","Scroll Right").attr("lab","<product name> - <page title>");
    $(".swiper-pagination-bullet").each(function(){
      $(this).addClass(gaClass).attr("cat","Content Interactions").attr("act","Switch" + $(this).attr("aria-label").split("Go to")[1]).attr("lab","<product name> - <page title>");
    });
    });