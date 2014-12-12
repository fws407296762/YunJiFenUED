<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>关键词自动回复-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/sovipBack.css" />
<!-- <script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script> -->
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
            <a href="javascript:;" class="tabmenu_cur" >自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="customMenu.php">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="report.php">查询与报表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        <!--secondary menu-->
        <p id="badge_tab" class="badge_tab">
            <a href="index.php"  class="cur" data-id="2">关键词自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="follow.php" data-id="1">关注后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="bindAccount.php" data-id="3">会员绑定账号后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="common.php" data-id="4">消息托管</a>
        </p>
        <!--secondary menu end-->
        
        <div class="we-wrap">
            <div class="mtop10">
                <div class="fr">
                    <input type="text" class="ts_input w108" placeholder="请输入关键字搜索……">
                    <a href="#" class="search smallbtn">搜索</a>
                </div>
                <a href="#" class="new-rule normalbtn normalbtn_focus">新建规则</a>
            </div>
            <div class="mtop20 rules fz14">
                <div class="tablelist">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th align="left">
                                <div class="pdlr10"><span class="fr"><a href="#" class="edit-icon">修改</a></span>
                                规则<span class="r-title">1：常规规则</span></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="pdlr10">
                                        <div>
                                            <span class="send_lefttxt">生效时间:</span>
                                            <div class="send_r_con">
                                                2014/12/3 12：00 - 2014/12/6 14：00
                                            </div>
                                        </div>
                                        <div class="mtop10">
                                            <span class="send_lefttxt lh40">关键字:</span>
                                            <div class="send_r_con">
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                                <span class="w-keyword">
                                                    <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                                    <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mtop10">
                                            <span class="send_lefttxt">回复：</span>
                                            <div class="send_r_con">
                                                <ul class="reply-list">
                                                    <li>
                                                        <span class="r-content"><span class="light">文本</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                                    </li>
                                                    <li>
                                                        <span class="r-content"><span class="light">图文</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
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
                <div class="pagebox" id="itpage"></div>
            </div> 
            <div class="mtop10">
                <a href="#" data-isbottom="true" class="normalbtn normalbtn_focus new-rule">新建规则</a>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>

<?php include("/../base/weChatDialog.php") ?>

<div class="templates hide">
    <div class="tablelist mtop10">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th align="left"><div class="pdlr10">新规则</div></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="pdlr10">
                            <div>
                                <span class="send_lefttxt">规则名:</span>
                                <div class="send_r_con">
                                    <input type="text" class="title input25 w150" />
                                </div>
                            </div>
                            <div class="mtop10">
                                <span class="send_lefttxt">生效时间:</span>
                                <div class="send_r_con">
                                    <div class="selectbox vermiddle mright10">
                                        <p class="seled" data-value="1">一直生效</p>
                                        <span class="sanjiao_left"></span>
                                        <div class="selectlist vttype">
                                            <p data-value="1">一直生效</p>
                                            <p data-value="2">指定时间</p>
                                            <p data-value="3">每天按指定时间段生效</p>
                                        </div>
                                    </div>
                                    <span class="select-date hide">
                                         <input id="sdate" readonly="readonly" type="text" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});">
                                         至
                                         <input type="text" readonly="readonly" id="edate" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'#F{$dp.$D(\'sdate\')}'});">
                                    </span>
                                    <span class="select-time hide">
                                         <input id="stime" readonly="readonly" type="text" class="in_date" onclick="WdatePicker({dateFmt:'H:m'});">
                                         至
                                         <input type="text" readonly="readonly" id="etime" class="in_date" onclick="WdatePicker({dateFmt:'H:m',minDate:'#F{$dp.$D(\'stime\')}'});">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="pdlr10">
                            <div>
                                <div>
                                    <span class="send_lefttxt">关键字:</span>
                                    <div class="send_r_con">
                                        <a href="#" class="add-keyword">+添加关键字</a>
                                    </div>
                                </div>
                                <div class="mtop10">
                                    <div class="send_r_con r-keywords">
                                        <span class="w-keyword">
                                            <span class="w-kcontent">关键字</span><span class="w-ktype">全匹配</span>
                                            <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                        </span>
                                        <span class="w-keyword">
                                            <span class="w-kcontent">搞笑呢</span><span class="w-ktype">全匹配</span>
                                            <span class="close-icon"><span class="gremovestat mleft10"></span></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="pdlr10">
                            <div>
                                <span class="send_lefttxt lhn">回复:</span>
                                <div class="send_r_con">
                                    <ul class="reply-list">
                                        <!-- <li>
                                            <div class="r-cwrap">
                                                <span class="r-content">
                                                <span class="light">文本</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                                <span class="operation">
                                                    <a href="#" class="edit-icon">修改</a>
                                                    <a href="#" class="mleft5 del-icon">删除</a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="r-content"><span class="light">图文</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                            <span class="operation">
                                                <a href="#" class="edit-icon">修改</a>
                                                <a href="#" class="mleft5 del-icon">删除</a>
                                            </span>
                                        </li> -->
                                    </ul>
                                    <div class="mtop10"><a href="#" class="add-reply">+添加回复</a></div>
                                </div>
                            </div>
                            <div class="mtop10 fr clfix">
                                <a href="#" class="smallbtn_focus smallbtn save">保存</a>
                                <a href="#" class="smallbtn del">删除</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include("/../base/weChatEditBox.php") ?>
</div>
<script src="/public/js/ajaxcrud.js"></script>
<script src="/public/plugins/My97DatePickerBeta/My97DatePicker/WdatePicker.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/public/plugins/pagination/pagination.js"></script>
<script src="/public/js/weChat.js"></script>
</body>
</html>