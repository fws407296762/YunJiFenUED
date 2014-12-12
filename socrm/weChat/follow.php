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
            <a href="javascript:;" class="tabmenu_cur" >自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        <!--secondary menu-->
        <p id="badge_tab" class="badge_tab">
            <a href="index.php"  data-id="2">关键词自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="follow.php" class="cur" data-id="1">关注后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="bindAccount.php" data-id="3">会员绑定账号后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="common.php" data-id="4">消息托管</a>
        </p>
        <!--secondary menu end-->
        <div class="tablelist mtop10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th align="left"><div class="pdlr10">规则:<span class="r-title">关注后自动回复</span></div></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="pdlr10">
                                <div class="mtop10">
                                    <span class="send_lefttxt">回复：</span>
                                    <div class="send_r_con">
                                        <ul class="reply-list">
                                            <li>
                                                <span class="r-content"><span class="light">文本</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        

    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>

<script src="/public/js/ajaxcrud.js"></script>
</body>
</html>