$.extend( jQuery.easing,
	{
		fx :function (x, t, b, c, d) {
			return -c * ((t=t/d-1)*t*t*t - 1) + b;
		}
	});
;(function($){
	$.fn.fullscreenScroll = function(options){
		
		var def = {
			index : 0,
			speed : 1000,
			fx : 'fx',
			after : $.noop,
			before:$.noop,
			wheel : $.noop,
			pager : null,
			className : 'cur',
			events : 'click'	
		}
		
		var setting = $.extend(def,options);
		
		var self = this;
		
		var len,height,curIndex,list;
		
		curIndex = setting.index;
		
		this.init = function(){
			list = $(this).children();
			len = list.length;
			height = list.height();
			if(setting.pager){
				for(var i = 0,s = '' ; i < len; i++){
					s += '<a href="javascript:;">'+(i+1)+'</a>';
				}
				$(setting.pager).empty().append(s);
			}
			
			self.children().eq(0).siblings().css('top',$(window).height());
		}
		
		
		
		this.skip = function(num,bef,flag){
			
			num < 0 ? num = 0 : num > len - 1 ? num = len - 1 : true;
			if(num == curIndex) return;
			
			setting.before.call(this,num);
			bef = bef || 0;
			self.children().eq(num).css('zIndex' , 100).stop(true,true).animate({top : 0},setting.speed,setting.fx);
			if(bef != 0){
				self.children().eq(bef).css('zIndex' , 1000).stop(true,true).animate({top : $(window).height()},setting.speed,setting.fx);
			}
			curIndex = num;
			if(flag){
				setting.wheel.call(this,curIndex);
			}
		}
		
		// 初始化
		this.init();
		this.skip(setting.index);
		
		//events   
		if($(document).mousewheel){
			
			var delayTime = 10, timeHandle = null;
			$(this).mousewheel(function(e,d){
				clearTimeout(delayTime);
				timeHandle = setTimeout(function(){
					self.skip(curIndex-d,curIndex,true);
				},delayTime);
			});
		}else{
			alert('缺少滚轮事件支持！');
		}
		
		if(setting.pager){
			$(setting.pager).delegate('a',setting.events,function(){
				self.skip($(this).index(),curIndex);
			});
		}
		
		$(window).resize(function(){
			self.init();
			self.skip(curIndex);
		});
		
		return this;
	}
})(jQuery);