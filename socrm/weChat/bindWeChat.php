<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>手机VIP中心设置-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/sovipBack.css" />
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
$(function(){
    /*显示当前导航*/
    var $nav = $("#nav");
    $nav.find("a.subnav_mvip").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_zhuangxiu']").addClass("navlicur");

})
$(window).resize(function(){
    floatfoot();
});
</script>

</head>
<body>
<!-- leftbox start -->
<?php include("/../base/leftbox.php") ?>
<!-- leftbox end -->

<div id="rightbox" class="rightbox">
    <!-- topsearch start -->
    <?php include("/../base/topsearch.php") ?>
    <!-- topsearch end -->

    <div id="rightcon" class="clfix rightcon">
        <div class="tabmenu">
            <a href="index.php">自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="bindWeChat.php" class="tabmenu_cur">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        
        <div class="m-container notbind">
            <div class="h2_box mtop20">
                <h2>请先绑定公众微信号</h2>
            </div>

            <p class="mtop10">绑定成功后，云貅可以管理您的公众微信号！</p>

            <div class="mtop10">
                <a href="#" class="normalbtn">立即绑定</a>
                <a href="#" class="mleft10">了解绑定后，可以实现的运营方式</a>
            </div>
        </div>

        <div class="m-container binded">
            <div class="h2_box mtop20">
                <h2>已绑定公众微信号</h2>
            </div>
            
            <div>
                <div class="mtop10">
                    <span class="send_lefttxt">公众微信号:</span>
                    <div class="send_r_con">
                        <span id="w-account">mydearpig</span>
                        <a href="#" class="mleft5">绑定到其他微信号</a>
                    </div>
                </div>

                <div class="mtop10">
                    <span class="send_lefttxt">公众号的昵称:</span>
                    <div class="send_r_con">
                        <span id="w-nick">小圆脸与小方脸</span>
                    </div>
                </div>
                <div class="mtop10">
                    <span class="send_lefttxt">微信账号类型:</span>
                    <div class="send_r_con">
                        <p><span>认证订阅号/未认证服务号</span>| 账号已升级？点此：<a href="#">重新授权</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>

<script src="/public/js/ajaxcrud.js"></script>
</body>
</html>