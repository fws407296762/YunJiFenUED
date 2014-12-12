<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>消息托管-云貅VIP运营平台</title>
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
            <a href="follow.php" data-id="1">关注后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="bindAccount.php" data-id="3">会员绑定账号后自动回复</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="common.php" class="cur" data-id="4">消息托管</a>
        </p>
        <!--secondary menu end-->
        
        <div id="enablebox" class="enablebox mtop20">
            <i class="enabledIcon">&nbsp;</i>
            <em class="en_txt enabletxt ">已开启</em>
            <em class="en_txt closetxt">已关闭</em>
            <div class="en_btnBox">
                <a href="javascript:enablefn(0,'bonus');">关闭</a>
                <span class="en_stat" onclick="enablefn(undefined,'bonus')">&nbsp;</span>
                <a href="javascript:enablefn(1,'bonus');">开启</a>
                <img src="/public/images/load20.gif" alt="加载中" class="en_load" id="en_load">
            </div>
        </div>
        
        <div class="config">
            <div class="mtop10">
                <span class="send_lefttxt">开启时段:</span>
                <div class="send_r_con">
                    <input id="sdate" readonly="readonly" type="text" class="in_date" onclick="WdatePicker({dateFmt:'H:m'});">
                    至
                    <input type="text" readonly="readonly" id="edate" class="in_date" onclick="WdatePicker({dateFmt:'H:m',minDate:'#F{$dp.$D(\'sdate\')}'});">
                </div>
            </div>
            <div class="mtop10">
                <span class="send_lefttxt">周几生效:</span>
                <div class="send_r_con">
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="7" />周日</label>
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="1" />周一</label>
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="2" />周二</label>
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="3" />周三</label>
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="4" />周四</label>
                    <label class="mright10"><input type="checkbox" class="ckmiddle" data-week="5" />周五</label>
                    <label><input type="checkbox" class="ckmiddle" data-week="6" />周六</label>
                </div>
            </div>
            <div class="mtop10">
                <span class="send_lefttxt">无应答开启:</span>
                <div class="send_r_con">
                    <input type="number" class="input25" id="no-respose" /> 分钟内无回复才触发回复
                </div>
            </div>
            <div class="mtop10">
                <span class="send_lefttxt">不重复开启:</span>
                <div class="send_r_con">
                    <input type="number" class="input25" id="no-repeat" /> 分钟内只回复一次
                </div>
            </div>
        </div>

        <div class="tablelist rules mtop10">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th align="left"><div class="pdlr10">自动回复(随机一条）</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="pdlr10">
                                    <div class="mtop10">
                                        <div>
                                            <span class="send_lefttxt">回复:</span>
                                            <div class="send_r_con">
                                                <a href="#" class="add-replay">+添加回复</a>
                                            </div>
                                        </div>
                                        <div class="mtop10">
                                            <div class="send_r_con">
                                                <ul class="reply-list">
                                                    <li>
                                                        <span class="r-content"><span class="light">文本</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                                    </li>
                                                    <li>
                                                        <span class="r-content"><span class="light">图文</span>欢迎来到云积分，积分兑换，签到赢积分，会员互动，粘住老客户。</span>
                                                    </li>
                                                </ul>
                                                <?php include("/../base/weChatEditBox.php") ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mtop10 fr clfix">
                                        <a href="#" class="normalbtn_focus normalbtn save">保存</a>
                                        <a href="#" class="normalbtn del">删除</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="mtop10">
            <a href="#" class="normalbtn">保存</a>
        </div>
    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<script src="/public/plugins/My97DatePickerBeta/My97DatePicker/WdatePicker.js" type="text/javascript" charset="utf-8"></script>
<script src="/public/js/ajaxcrud.js"></script>
</body>
</html>