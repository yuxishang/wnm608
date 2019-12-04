$(function(){
    var userAgentInfo = navigator.userAgent.toLowerCase();
		var isWeixin = userAgentInfo.indexOf("micromessenger") != -1;
		
		if(isWeixin) {
			$('head').append('<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></sc'+'ript>');
			$('head').append('<script src="//consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/store/js/cbgwechatv1.js"></sc'+'ript>');
			$('head').append("<script>WechatShare({url: window.location.href,img: 'https://consumer.huawei.com/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p30-pro/img/share-img.jpg',title: $(document).attr('title'),descript: document.querySelector('meta[name=\"description\"]').getAttribute('content')}, function () { alert('Thanks for sharing.'); });</sc"+"ript>");
		}
})

;(function(undefined) {
    "use strict"
    var _global;

    function extend(o,n,override) {
        for(var key in n){
            if(n.hasOwnProperty(key) && (!o.hasOwnProperty(key) || override)){
                o[key]=n[key];
            }
        }
        return o;
    }

    function cEle(eClass){
    	var _ele = document.createElement('div');
    	_ele.classList.add(eClass);
    	return _ele;
    }

    function SimplePopUp(opt){
        this._init(opt);
    }
    SimplePopUp.prototype = {
        constructor: this,
        _init: function(opt) {
            var def = {
            	width: 0.8,
				closeColor:"#3C3C3C",
				beforeClose:function(){}
            };
            this.def = extend(def,opt,true);
        },
        pop:function(str){
        	var closeSvg = {
				color:this.def.closeColor,
				getDom:function(){
					return '<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg"><g fill="'+ this.color +'" fill-rule="evenodd"><path d="M8 7l17 17-1 1L7 8z"></path><path d="M7 24L24 7l1 1L8 25z"></path></g></svg>';
				}
			}

			var popCover = cEle("pop-cover"),
				popBg = cEle("pop-bg"),
				popContain = cEle("pop-contain"),
				popWrap = cEle("pop-wrap"),
				popClose = cEle("pop-close");

			var strCloseSvg = closeSvg.getDom(),
				strContent = "";
			if(typeof str !== "undefined"){
				strContent = str;
			}

			var _width= document.documentElement.clientWidth || document.body.clientWidth,
        _height= document.documentElement.clientHeight || document.body.clientHeight,
				containWidth = _width * this.def.width,
				containHeight;

				if(!this.def.ratio){
					containHeight = "auto";
				}else if(_height / _width > this.def.ratio || _height / _width == this.def.ratio){
					containWidth = _width * 0.8;
          containHeight = containWidth * this.def.ratio;
				}else{
          containHeight = _height * 0.8;
          containWidth = containHeight / this.def.ratio;
        }

			popContain.setAttribute('style','width: '+ containWidth +'px;height:'+ containHeight + 'px;');

			document.addEventListener("resize",function(){
				popContain.setAttribute('style','width: '+ containWidth +'px;height:'+ containHeight + 'px;');
			});

			if( typeof(strContent) == "string"){
				popWrap.innerHTML = strContent;
			}else if(typeof(strContent) == "object"){
				popWrap.appendChild(strContent);
			}

			popClose.innerHTML = strCloseSvg;
			popContain.appendChild(popWrap);
			popContain.appendChild(popClose);
			popCover.appendChild(popBg);
			popCover.appendChild(popContain);
			this._pop = popCover;

			var _this = this;
			document.querySelectorAll("body")[0].appendChild(this._pop);
			document.querySelectorAll("html")[0].classList.add("stop-scoll");

			popClose.addEventListener("click",function(){
				_this.close();
			});
			popBg.addEventListener("click",function(){
				_this.close();
			});
			popBg.addEventListener("touchmove",function(e){
				e.preventDefault();
			},{passive: false});
			popWrap.addEventListener("touchmove",function(e){
				e.preventDefault();
			},{passive: false});
        },
        close:function(){
			this.def.beforeClose();
        	document.querySelectorAll("body")[0].removeChild(this._pop);
        	document.querySelectorAll("html")[0].classList.remove("stop-scoll");
        }
    }


    _global = (function(){ return this || (0, eval)('this'); }());
    if (typeof module !== "undefined" && module.exports) {
        module.exports = SimplePopUp;
    } else if (typeof define === "function" && define.amd) {
        define(function(){return SimplePopUp;});
    } else {
        !('SimplePopUp' in _global) && (_global.SimplePopUp = SimplePopUp);
    }
}());


$(function(){


$('.p30-tvc-content .pop-video').data("ratio","0.5625");
$('#p30-see-both-sides-story-img .pop-video').data("ratio","0.5625");
$('.p30-AR-measure .pop-video').data("ratio","0.5625");
$("#p30-container").append('<video id="p30-ai-video" muted style="height:0!important;" src="/content/dam/huawei-cbg-site/common/mkt/pdp/phones/p30-pro/video/null.mp4"></video><div style="display:none!important;"></div>');


 var controller = new ScrollMagic.Controller({
      controller: "#p30-container"
  });
// var backgroundVideo = new ScrollMagic.Scene({
//           triggerElement: ".p30-mobile-accessorize",
//           duration: "100%",
//           triggerHook: 1
//       })
//       .setTween(".p30-accessorizebg", {
//           opacity: "0.3",
//           ease: Linear.easeNone,
//           delay: 0.5
//       })
//       .addTo(controller);
  var userAgentInfo = navigator.userAgent.toLowerCase();
  var isIE11 = userAgentInfo.toUpperCase().indexOf("RV") > -1;
  var isIE = userAgentInfo.toUpperCase().indexOf("MSIE") > -1;
  var isFF = userAgentInfo.toUpperCase().indexOf("FIREFOX") > -1;
  var isChrome = userAgentInfo.toUpperCase().indexOf("CHROME") > -1;

  var huaweiBrowser = false;
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
          var backgroundVideo = new ScrollMagic.Scene({
      triggerElement: "#p30-backgroundt2-trigger",
      duration: "150%",
      triggerHook: 0
    })
      .setTween("#p30-film-mob-video", {
        opacity: "0",
        ease: Linear.easeNone
      })
      .addTo(controller);
  } else {
      tvcVideo = document.querySelector("#p30-tvc-pc-video");
      cpuVideoID = ".p30-section-title4.p30-section .p30-section-content-title";
      aiVideo = $("#p30-ai-video");
      stableVideos = $("#p30-stableVideos");
      $(".p30-pc-video")
          .removeClass("video-hide")
          .addClass("video-show")
          .attr("preload", "load");
      $(".p30-mob-video")
          .removeClass("video-show")
          .addClass("video-hide");
  }
	var videoZoomVideos = $("#p30-videoZoomVideos");
  var p30stableVideos = new ScrollMagic.Scene({
          triggerElement: "#p30-videoZoomVideos",
          duration: "100%",
          triggerHook: 0.5
      })
      .on("enter", function(e) {
          videoZoomVideos.next().attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
          if (!huaweiBrowser) {
              videoZoomVideos[0].play();
          }
          videoZoomVideos.on('ended', function() {
              videoZoomVideos.next().attr('class', 'middle-playbtn p30-tvc-title')
          })
      })
      .on("leave", function(e) {
          if (!huaweiBrowser) {
              videoZoomVideos[0].pause();
          }
      })
      .addTo(controller)
  $('.p30-telephoto-camera-video').on('click', '.middle-playbtn.p30-tvc-title', function() {
      $(this).attr('class', 'middle-playbtn p30-tvc-title p30-playbtn')
      videoZoomVideos[0].play();
  })
});