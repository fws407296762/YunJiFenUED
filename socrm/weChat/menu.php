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
    $nav.find("a.subnav_weixin").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_jiaohu']").addClass("navlicur");

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
            <a href="index.php" class="tabmenu_cur" >自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        
        <div id="enablebox" class="enablebox ">
            <i class="enabledIcon">&nbsp;</i>
            <em class="en_txt enabletxt ">已开启</em>
            <em class="en_txt closetxt">已关闭</em>
            <div class="en_btnBox">
                <a href="javascript:enablefn(0);">关闭</a>
                <span class="en_stat" onclick="enablefn()">&nbsp;</span>
                <a href="javascript:enablefn(1);">开启</a>
                <img src="/public/images/load20.gif" alt="加载中" class="en_load" id="en_load">
            </div>
        </div>
        
        <div class="w-wrap mtop20">
            <div class="m-example ct-box">
                <div class="tablelist m-footer">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bdtable">
                        <tbody>
                            <tr>
                                <td width="43px"><i class="menu-ico"></i></td>
                                <td align="center">标题</td>
                                <td align="center">标题</td>
                                <td align="center">标题</td>
                            </tr>
                        </tbody>
                    </table>
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