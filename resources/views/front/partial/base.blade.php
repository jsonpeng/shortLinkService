<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<html class="no-js" style="font-size: 40px;" lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- seo 里包含title meta 
            <title></title>
            
            <meta name="description" content="">
        -->
        @yield('seo')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <!-- <script type="text/javascript">
            if (/Android (\d+\.\d+)/.test(navigator.userAgent)) {
                var version = parseFloat(RegExp.$1);
                if (version > 2.3) {
                    var phoneScale = parseInt(window.screen.width) / 640;
                    document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi, user-scalable=no">');
                } else {
                    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
                }
            } else {
                document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
            }
         
            window.alert = function(name){
            var iframe = document.createElement("IFRAME");
            iframe.style.display="none";
            iframe.setAttribute("src", 'data:text/plain,');
            document.documentElement.appendChild(iframe);
            window.frames[0].window.alert(name);
            iframe.parentNode.removeChild(iframe);
            }

            //alert('xxx');
        </script> -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> 
        
        <link href="https://cdn.bootcss.com/animate.css/3.0.0/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">   
        
        
        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{ asset('vendor/html5shiv.min.js') }}"></script>
            <script src="{{ asset('vendor/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lte IE 8]>
            <p class="chromeframe">您正在使用<strong>过时的</strong> 浏览器. 请 <a href="http://browsehappy.com/">升级您的浏览器（点击进入下载页面）</a> 以提升上网体验。</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @include('front.partial.nav')
        @yield('content')
        @include('front.partial.footer')

        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
        <script src="{{asset('vendor/layui/layui.all.js')}}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- <script src="{{asset('js/powerange.min.js')}}"></script> -->
        <script src="{{asset('js/touch.js')}}"></script>
        <script src="{{asset('js/wow.js')}}"></script>
        <script>
            $(document).ready(function(){
                new WOW().init();
                $('.carousel').carousel({
                    interval: 2000
                })
                $("#carousel-example-generic0,#carousel-example-generic").swipe({
                    swipeLeft: function() { $(this).carousel('next'); },
                    swipeRight: function() { $(this).carousel('prev'); },
                }); 
                // var elem = document.querySelector('.js-min-max-start');//选择input元素
                // var init = new Powerange(elem, { 
                //     min: 0, 
                //     max: 266, 
                //     start: 133, 
                //     vertical:true ,
                //     hideRange:true,
                //     step:133,
                //     callback:function(e){
                //         console.log(elem.value);
                //         var stepIndex;
                //         if(elem.value==266){
                //             $("#carousel-example-generic0").carousel('next');
                //         };
                //         if(elem.value==0){
                //             $("#carousel-example-generic0").carousel('prev');
                //         }
                        
                //     }
                // });
                // var caseSwiper = new Swiper ('.case .swiper-container', {
                //     loop:false,
                //     pagination: '.swiper-pagination',
                //     prevButton: '.swiper-button-prev',
                //     nextButton: '.swiper-button-next',
                //     onSlideChangeEnd:function(swiper){
                //         $('.case-item').each(function(index, el) {
                //             if(index==swiper.activeIndex){
                //                 $(this).css('display', 'block').siblings('.case-item').css('display','none');
                //             }
                //         });
                //         console.log(swiper.activeIndex);
                //        // swiper.activeIndex 这个就是索引， 从 0 开始！ 可看一共有多少元素！
                //     },
                // });
                $('.dropdown').mouseover(function(e) {
                            
                            $(this).addClass('open');
                }).mouseleave(function(e){
                            
                            $(this).removeClass('open');
               
                });
            });
        </script>
        <script type="text/javascript">
            $(function () {
                /**通用-banner大图自定义缩放**/
                var zoomWidth = 992; //缩放阀值992px, 即所有小于992px的视口都会对原图进行缩放, 只是缩放比例不同
                var maxWidth = 1920; //最大宽度1920px
                var ratio = 1; //缩放比例
                var viewWidth = window.innerWidth; // 视口宽度
                var zoomSlider = function () {
                    if (viewWidth < 768) { //当视口小于768时(移动端), 按992比例缩放
                        ratio = viewWidth / zoomWidth; //视口宽度除以阀值, 计算缩放比例
                    } else if (viewWidth < zoomWidth) { //当视口界于768与992之间时, bootstrap主宽度为750, 这区间图片缩放比例固定.
                        ratio = zoomWidth / (zoomWidth + (zoomWidth - 750));
                    } else { // PC端不缩放
                        ratio = 1;
                    }
                    //ratio = viewWidth / zoomWidth; //视口宽度除以阀值, 计算缩放比例
                    //ratio = (ratio<=1) ? ratio : 1; //如果比例值大于1, 说明视口宽度高于阀值, 则不进行任何缩放
                    var width = maxWidth * ratio; //缩放宽度
                    $(".banner-slide img").each(function () {
                        $(this).css({
                            "width": width,
                            "max-width": width,
                            "margin-left": -(width - viewWidth) / 2
                        }); //图片自适应居中, 图片宽度与视口宽度差除以2的值, 设置为负margin
                    });
                    $(".case-slide img").each(function () {
                        $(this).css({
                            "width": width,
                            "max-width": width,
                            "margin-left": -(width - viewWidth) / 2
                        }); //图片自适应居中, 图片宽度与视口宽度差除以2的值, 设置为负margin
                    });
                }
                zoomSlider(); //页面加载时初始化并检查一次.
                /**视口发生变化时的事件**/
                $(window).resize(function () {
                    viewWidth = window.innerWidth; // 重置视口宽度
                    zoomSlider();//判断是否绽放banner
                });
            });
            function getFixed(obj){
                function getStyle(obj,styleName){
                    if(obj.currentStyle){
                        return obj.currentStyle[styleName];
                    }else{
                        return getComputedStyle(obj,null)[styleName];
                    }
                }
            }
        </script>
        <?php 
            $index = 0;
            if(Request::is('page/zizhi') || Request::is('page/dashiji')){
                $index = 1;
            }
            elseif (Request::is('cat/4') || Request::is('cat/5') || Request::is('cat/6')) {
                $index = 2;
            }
            elseif (Request::is('cat/7') || Request::is('cat/8') || Request::is('cat/9') || Request::is('cat/10')) {
                $index = 3;
            }
        ?>
        <script type="text/javascript">
            var index = parseInt('{{ $index }}');
            if(index!=0){
                $('#bs-example-navbar-collapse-1 > ul > li:eq('+index+')').addClass('show');
            }
        </script>
        <script src="{{ asset('vendor/jquery.lazyload.js') }}"></script>
        <script>
            $("img.lazy").lazyload({effect: "fadeIn"});
        </script>
        @yield('js')
        
        <!-- JS统计代码 -->
   


    </body>
</html>
