var selfAdaptionImage = function(obj,width,height,flag,fn){
	var w,h;
	
	w = 1920;
	h = 1000;
	if(w/h > width/height){
		 obj.style.height = height + 'px';
		 obj.style.marginLeft = (width - w*height/h)/2 + 'px';
	}else{
		obj.style.height = 'auto';
		obj.style.width = '100%';
	}
	
}
// 所有页面公共
// var Common = {
	
// 	initialize : function(){
		
// 		this.mainMenuSlide();// 导航下拉菜单
// 	},
	
// 	mainMenuSlide : function(){
// 		$('.menu>li').hover(function(){
// 			clearTimeout(this.t);
// 			$(this).children('ol').stop(true,true).fadeIn();
// 		},function(){
// 			var self = this;
// 			this.t = setTimeout(function(){
// 				$(self).children('ol').stop(true,true).fadeOut();
// 			},100);
// 		});
// 	}
// }



//首页
var HomePage = {

	initialize : function(){
		this.slideBlock = $('.slide-handle span');
		this.slideBlockPoint = [0,60,120,180]; // 滑块上的点坐标
		this.fullScrollHandle = null;
		var z = 100;
		$('.home-list-item').each(function(){
			$(this).css('zIndex' , z++);
		});
		
		// this.firstScreenScroll(); 第一屏滚动效果
		// this.bubbleAnim();
		this.resetBackground();// 设置全屏背景
		this.fullScroll();// 全屏滚动
		//this.caseScroll();  第二屏轮播
		//this.newsScroll();  新闻滚动
		this.slideHandle(); // 滑块滚动
		
		// this.caseHover();
	},
	
	resetBackground : function(){
		$('.home-list-bg img').each(function(){
			selfAdaptionImage(this,$(window).width(),$(window).height());
		});
	},
	// case 鼠标划过效果
	// caseHover : function(){
	// 	$('.case-slide-box .item').hover(function(){
	// 			$(this).stop(true,true).animate({opacity : 1});
	// 			$(this).find('.case-title').animate({bottom : '0'},300);
	// 		},function(){
	// 			$(this).stop(true,true).animate({opacity : 0.5});
	// 			$(this).find('.case-title').animate({bottom : -35},300);
	// 	});
	// },
	
	// firstScreenScroll : function(){
	// 	$('.home-first-list li').css({width:$(window).width(),height:$(window).height()});
	// 	$('.home-first-list li').each(function(){
	// 		var pic = $(this).find('.bg');
	// 		var picWidth = 1920,
	// 			picHeight = 1000,
	// 			winHeight = $(window).height(),
	// 			winWidth = $(window).width();
	// 		pic.css({width : picWidth * winHeight / picHeight, marginLeft : (winWidth -picWidth * winHeight / picHeight)/2});
	// 	});
		
	// 	var count = $('.home-first-list li').length;
		
	// 	$('.home-first-list').cycle({
	// 		pager : '.first-list-pager',
	// 		activePagerClass : 'cur',
	// 		pause : 1,
	// 		timeout : 3000,
	// 		before : function(before,after){
	// 			var image = $(after).find('.bg');
	// 			if(image.attr('lazy')){
	// 				image.attr('src',image.attr('lazy'));
	// 				image.removeAttr('lazy');
	// 			}
	// 		}
	// 	});
	// },
	
	
	fullScroll : function(){
		// var self = this;
		// var bgs = $('.home-list-item');
		// var count = 4;
		// this.fullScrollHandle = $('.home-list').fullscreenScroll({
		// 	speed : 800,
		// 	wheel : function(num){
		// 		self.slideBlock.stop(true,true).animate({top : self.slideBlockPoint[num]},300);
		// 	},
		// 	before:function(i){
		// 		if(count >= 0){
		// 			var img = bgs.eq(i).find('.home-list-bg img');
		// 			img.attr('src',img.attr('lazy'));
		// 		}
		// 		count--;
		// 	}
		// });
		var self=this;
		var Height0=$('.intro').height();
		var Height1=$('#carousel-example-generic0').height();
		if($(window).scrollTop()<Height0){
			
			$(window).scrollTop(Height0);
		}
		
		//s.skip(3);
	},
	
	// caseScroll : function(){
	// 	$('.case-slide-in').xcarousel({
	// 		size : 3,
	// 		scroll : 1,
	// 		prev : '.case-prev',
	// 		next : '.case-next',
	// 		fx : 'fx',
	// 		auto : false
	// 	});
	// },

	slideHandle : function(){
		var hold = false;
		var y,t=0;
		var self = this;
		var current = 0;
		this.slideBlock.bind({
			'mousedown' : function(e){
				
				hold = true;
				y = e.pageY - $(this).position().top;
				e.preventDefault();
			}
		});
		$(document).bind({
			mousemove : function(e){
				if(!hold) return;
				t = e.pageY - y;
				t < 0 ? t = 0 : t > 180 ? t = 180 : true;

				for(var i = 0; i < self.slideBlockPoint.length; i++){
					if ( t > self.slideBlockPoint[i] && t <= self.slideBlockPoint[i+1]){

						var binary = (self.slideBlockPoint[i+1] - self.slideBlockPoint[i])/2 + self.slideBlockPoint[i];

						if( t > binary){
							// self.fullScrollHandle.skip(i+1,current);
							self.fullScroll();
							current ++;
							// console.log(current);
						}else{
							// self.fullScrollHandle.skip(i,current);
						// 	current = i;
						// 	console.log(current);
						}
					}
				}
				self.slideBlock.css('top',t);
			},
			mouseup : function(){
				if(hold){
					console.log(current);
					self.slideBlock.css('top',self.slideBlockPoint[current] );
					hold = false;
				}
			}
		});
	},
	
	// newsScroll : function(){
	// 	var newsWrap = $('.news-list-wrap');
		
	// 	newsWrap.on('mouseenter','li',function(){
	// 		$(this).addClass('hover');
	// 	}).on('mouseleave','li',function(){
	// 		$(this).removeClass('hover');
	// 	});
		
	// 	$('.news-carosel').xcarousel({
	// 		size : 4,
	// 		scroll : 1,
	// 		prev : '.news-prev',
	// 		next : '.news-next',
	// 		fx : 'fx',
	// 		speed : 400
	// 	});
	// }
	
}




// 成功案例
// var Works = {
//     initialize: function () {

//         this.ov = this.videoPlay();
//         var self = this;
//         $('.closePlay').click(function () {
//             self.ov.hide();
//         })

//         this.timeLine();
//         this.tabSwitch();
//         this.worksList();
//         this.videoList();

//         this.picDetialCarousel();


//     },

//     tabSwitch: function () {
//         $('.works-tab-hd>a').tab({
//             contents: '.works-tab-cnt>div'
//         });
//     },

//     timeLine: function () {
//         $('.works-timeline').each(function () {
//             $(this).xcarousel({
//                 size: 5,
//                 scroll: 5,
//                 cycle: false,
//                 prev: $(this).find('.prev'),
//                 next: $(this).find('.next'),
//                 speed: 800,
//                 auto: 0
//             });
//         });
//     },

//     videoList: function () {
//         var self = this;
//         $('.work-video-list li').click(function () {

//             if ($(this).attr("ref") == "javascript:void(0)") {
//                 self.ov.show(this);
//             }

//         });
//     },

//     worksList: function () {
//         $('.work-list li').hover(function () {
//             $(this).addClass('hover');
//             $(this).children('.mask').stop(true, true).fadeIn(200);
//         }, function () {
//             $(this).removeClass('hover');
//             $(this).children('.mask').stop(true, true).fadeOut(200);
//         });
//     },

//     videoPlay: function () {
//         var ov = $('.overlay');
//         var vp = $('.videoPlay');
//         return {
//             show: function (li) {

//                 $.ajax({
//                     type: "get",
//                     url: "/Tools/GetVideo.ashx?id=" + $(li).attr("rel"),
//                     dataType: "json",
//                     success: function (result) {

//                         $(".detail .title").html(result.title);
//                         $(".detail .content").html(result.content);
//                         $(".detail .subTitle").html(result.subTitle);

//                         $("#videobody").html("<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"1060\" height=\"600\">"
//                                             + "<param name=\"movie\" value=\"flv_player.swf?flv_url=" + result.filepath + "&btn_color=0xFFFFFF\"> "
//                                             + "<param name=\"BarColor\" value=\"0xffffff\" />"
//                                             + "<param name=\"BarTransparent\" value=\"20\" />"
//                                             + "<param name=\"quality\" value=\"high\"/> "
//                                             + "<param name=\"allowFullScreen\" value=\"true\" /> "
//                                             + "<embed src=\"flv_player.swf?flv_url=" + result.filepath + "&btn_color=0xFFFFFF\" allowFullScreen=\"true\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"1060\" height=\"600\"> "
//                                             + "</embed> "
//                                             + "</object>");

//                         ov.css({ width: $(window).width(), height: $(document).height() });
//                         var t = ($(window).height() - 730) / 2 + $(document).scrollTop();
//                         t < 0 ? t = 0 : true;
//                         vp.css('top', t);
//                         ov.fadeIn(300);
//                         vp.fadeIn(300);
//                     }
//                 });

//             },
//             hide: function () {
//                 ov.fadeOut(300);
//                 vp.fadeOut(300);
//             }
//         }
//     },

//     picDetialCarousel: function () {

//         var i = 0;
//         var len = $('.carousel-in li').length;

//         $('.carousel-in').xcarousel({
//             size: 4,
//             scroll: 4,
//             prev: '.previn',
//             next: '.nextin',
//             cycle: false,
//             auto: 0
//         });


//         $('.carousel-in li').click(function () {
//             $(this).addClass('cur').siblings().removeClass('cur');
//             i = $(this).index();
//             $('.large img').attr('src', $(this).find('img').attr('rel'));


//         });
//         $('.carousel-in li:eq(' + i + ')').trigger('click');

//         //            $('.works-pic .prev').click(function () {
//         //                if (i > 0) {
//         //                    i--;
//         //                    $('.carousel-in li:eq(' + i + ')').trigger('click');
//         //                }

//         //            });
//         //            $('.works-pic .next').click(function () {
//         //                if (i < len - 1) {
//         //                    i++;
//         //                    $('.carousel-in li:eq(' + i + ')').trigger('click');
//         //                }
//         //            });

//         $('.works-pic .large').click(function (e) {

//             var y = e.pageX - $(this).offset().left;

//             if (y > ($(this).width() / 2)) {
//                 if (i < len - 1) {
//                     i++;
//                     $('.carousel-in li:eq(' + i + ')').trigger('click');
//                 }
//             } else {
//                 if (i > 0) {
//                     i--;
//                     $('.carousel-in li:eq(' + i + ')').trigger('click');
//                 }
//             }

//         });

//     }
// }



/* 0605 */
// var Cantact = {
//     initialize: function () {
//         this.mapHover();
//         this.tabMap();
//         this.photoScroll();
//     },
//     mapHover: function () {
//         $('.map').hover(function () {
//             $(this).find('.m1').stop(true, true).fadeOut(300);
//         }, function () {
//             $(this).find('.m1').stop(true, true).fadeIn(300);
//         });
//     },
//     tabMap: function () {
//     	if(!$.fn.tab) return;
//         $('.cantact .tree p').tab({
//             contents: '.cantact .tab-cnt'
//         });
//     },
//     photoScroll : function(){
//     	$(".Product_anlilist").xcarousel({
//     		scroll : 4,
//     		size : 4,
//     		prev : '.Product_anli .pleft',
//     		next : '.Product_anli .pright'
//     	});
//     }
// }


// 员工
// var Emp = {
// 	initialize : function(){
		
// 		this.imagesScroll();
// 		this.setFocus();
		
// 	},
	
// 	imagesScroll : function(){
// 		$('.emp-scroll').xcarousel({
// 			size : 4,
// 			scroll : 1,
// 			cycle : false,
// 			auto : false,
// 			prev : '.emp-small .prev',
// 			next : '.emp-small .next'
// 		});
// 	},
	
// 	setFocus : function(){
		
// 		var emp = $('.emp-detail');
// 		emp.each(function(){
// 			var i = 0;
// 			var self = this;
// 			var list = $(this).find('.emp-scroll li');
// 			var large = $(this).find('')
// 			var len = list.length;
// 			list.click(function(){
// 				$(this).css('opacity',1).addClass('cur').siblings().removeClass('cur').css('opacity',0.5);
// 				 $(self).find('.emp-large').children('img').attr('src',$(this).find('img').attr('rel'));
// 			});
// 			 list.eq(i).trigger('click');
		
// 			 $(this).find('.emp-large .prev').click(function(){
// 				i--;
// 				if(i < 0) i = 0;
// 				$(self).find('.emp-scroll li:eq('+i+')').trigger('click');
				 
// 			});
			
// 			 $(this).find('.emp-large .next').click(function(){
// 				i++;
// 				if(i > len - 1) i = len - 1;
// 				 $(self).find('.emp-scroll li:eq('+i+')').trigger('click');
// 			});
			
// 		});
		
// 	}
// }



// $(function () {
//     $(".search").toggle(function () {
//         $(".sousuo").show();
//     }, function () {
//         $(".sousuo").hide();
//     });

//     $(".ranniu").click(function () {


//         if ($(".ltext") != "") {
//             window.location.href = "/search.html?key=" + $(".ltext").val();
//         }

//     });

//     $(".ltext").keydown(function (e) {
//         var e = e || event, keycode = e.which || e.keyCode;
//         if (keycode == 13) {
//             $(".ranniu").trigger("click");
//         }
//     });

//     //首页案例
//     $(".case-slide-box a").each(function () {

//         $(this).prev().wrap('<a href=' + $(this).attr("href") + ' />');
//     });
// });













