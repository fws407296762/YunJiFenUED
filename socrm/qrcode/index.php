<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>码上推-已创建列表-SoCRM关系管理系统</title>
<link href="/public/css/base.css" rel="stylesheet">
<link href="/public/css/qrdata.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
$(function(){
    /*显示当前导航*/
    var $nav = $("#nav");
    $nav.find("a.subnav_qrcode").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_rules']").addClass("navlicur");

})
$(window).resize(function(){
    floatfoot();
});
</script>
<style>
	.inter_action a{margin-right: 10px;}
    .rules_details_list li{ margin-top: 10px;}
    .rd_bg{ background: #f0f0f0;}
    .rb_list_box{ padding: 10px;}
    .rb_list_box div{ line-height: 25px;}
    .rd_text{ display: inline-block; margin-right:20px;}
    .rd_limt_text{ width: auto;}
    h3{ font-weight: bold;}
    .rd_medal{ padding-left: 100px; overflow: hidden;*zoom:1}
    .rd_medal .rd_text{ float: left; width: 100px; margin-left: -100px;}
    .rd_medal_cont{ line-height: 25px;}
    .rename_error{ color: #f00;}
    #br_options_error{ height: 28px; line-height: 28px;}
</style>
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
        <div class="tabmenu"><a href="/qrcode/interaction.php" class="tabmenu_cur" >码上推规则<i class="tabmenupic"></i></a><a href="/rules/interaction_base_rule.php">订单打印系统接入规范<i class="tabmenupic"></i></a><a href="/rules/interaction_self_rule.php">
查询与报表<i class="tabmenupic"></i></a></div>

        <div class="h2_box pdtop15 ">
		    <h2>码上推</h2>
		</div>
	    <p class="pdtop10">
	        <a class="bigbtn" href="/qrcode/create?id=0">新建</a>
	    </p>
	    <div id="selecedRuleBox" class="mtop20">
		当前向第三方系统订单打印系统输出二维码的规则：<em id="currentRule" class="hide"></em><a id="printRuleBtn" class="hide">设置</a>
		<div class="select-rule selectbox hide">
                    <p class="seled" id="ruleSelected" data-value="">请选择规则</p>
                    <span class="sanjiao_left"></span>
                    <div class="selectlist" id="ruleOptions"></div>
                </div>
		<a id="bindRuleBtn" class="petitebtn petitebtn_focus hide">确定</a><a id="cancleRuleBtn" class="hide">返回</a>
		<a id="changeRuleBtn" class="hide">更改</a>
	    </div>
	    <div class="mtop20 tablelist">
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
		        <thead>
		            <tr>
		                <th width="200" align="left" scope="col"><div class="pdlr10">创建时间</div></th>
		                <th align="left" scope="col"><div class="pdlr10">活动名称</div></th>
		                <th width="200" align="left" scope="col"><div class="pdlr10">二维码信息源类型</div></th>
		                <th width="200" align="left" scope="col"><div class="pdlr10">积分奖励规则</div></th>
		                <th align="left" scope="col"><div class="pdlr10">操作</div></th>
		                <th width="200" align="left" scope="col"><div class="pdlr10">状态</div></th>
		            </tr>
		        </thead>
		        <tbody id="pageContent">
		            <tr>
		                <td scope="col"><div class="pdlr10">2012.10.23 10:00 </div></td>
		                <td scope="col"><div class="pdlr10">微淘签到</div></td>
		                <td scope="col"><div class="pdlr10">订单相关</div></td>
		                <td scope="col"><div class="pdlr10"><p>推广者：基础规则名称XXX</p><p>参与者：基础规则名称XXX</p></div></td>
		                <td scope="col"><div class="pdlr10 inter_action"><a class="rule_btn">规则详情</a><a class="edit_btn">编辑</a><a class="report_btn">查看报表</a><a class="obtain_btn">获取二维码</a><a class="del_btn">删除</a></div></td>
		                <td scope="col">
		                	<div class="pdlr10">
		                        <a href="" class="petitebtn petitebtn_focus">已开启</a>
		                        <a href="" class="petitebtn mleft5">关闭</a>
		                    </div>
		                </td>
		            </tr>
		            <tr>
		                <td scope="col"><div class="pdlr10">2012.10.23 10:00 </div></td>
		                <td scope="col"><div class="pdlr10">微淘签到</div></td>
		                <td scope="col"><div class="pdlr10">订单相关</div></td>
		                <td scope="col"><div class="pdlr10"><p>推广者：基础规则名称XXX</p></div></td>
		                <td scope="col"><div class="pdlr10 inter_action"><a class="rule_btn">规则详情</a><a class="edit_btn">编辑</a><a class="report_btn">查看报表</a><a class="obtain_btn">获取二维码</a><a class="del_btn">删除</a></div></td>
		                <td scope="col">
		                	<div class="pdlr10">
		                        <a href="" class="petitebtn petitebtn_focus">已开启</a>
		                        <a href="" class="petitebtn mleft5">关闭</a>
		                    </div>
		                </td>
		            </tr>
		            <tr>
		                <td scope="col"><div class="pdlr10">2012.10.23 10:00 </div></td>
		                <td scope="col"><div class="pdlr10">微淘签到</div></td>
		                <td scope="col"><div class="pdlr10">订单相关</div></td>
		                <td scope="col"><div class="pdlr10"><p>推广者：基础规则名称XXX</p></div></td>
		                <td scope="col"><div class="pdlr10 inter_action"><a class="rule_btn">规则详情</a><a class="edit_btn">编辑</a><a class="report_btn">查看报表</a><a class="obtain_btn">获取二维码</a><a class="del_btn">删除</a></div></td>
		                <td scope="col">
		                	<div class="pdlr10">
		                        <a href="" class="petitebtn petitebtn_focus">已开启</a>
		                        <a href="" class="petitebtn mleft5">关闭</a>
		                    </div>
		                </td>
		            </tr>
		        </tbody>
		    </table>
            <div id="pagination" class="pagebox"></div>
		</div>

    </div>


    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>

<div id="rules_details_box" class="popbox">
    <div id="rules_details" class="pop pop650">
        <div class="pop_hd">
            <strong class="pop_title">规则详情</strong>
            <a href="javascript:hide('rules_details_box');" class="pop_hide" style="display: block;"></a>
        </div>
        <div class="pop_bd">
            <div id="rules_details_con"></div>
        </div>
    </div>
</div>

<div id="getQrcode" class="popbox">
    <div id="getQrcodeBox" class="pop pop650">
        <div class="pop_hd">
            <strong class="pop_title">获取活动二维码</strong>
            <a href="javascript:hide('getQrcode');" class="pop_hide" style="display: block;"></a>
        </div>
        <div class="pop_bd">
            <div id="getQrcodeCont">
		<div id="noOrderQrcode" class="hide">
		    <span class="qrcode-img fl">
			<img src="" id="qrcodeImg" alt="">
		    </span>
		    <h3 class="qrcodeact-name"></h3>
		    <input type="text" class='input28' style="width:300px;margin-right:10px" disabled="disabled" name="" value="{{qrHref}}" id="qrcodeValue"><a class="petitebtn petitebtn_focus" id="copyLink">复制链接</a>
		    <p class="qr-prom">温馨提示：若需要生成其它尺寸的二维码，复制以上链接前往<a href="http://cli.im/url" target="_blank">此处生成&gt;&gt;</a></p>
		</div>
		<div id="orderQrcode" class="hide">
		    <p>订单相关二维码信息，请通过订单打印系统的操作规则进行处理。<a href="/qrcode/standard">点击查看&gt;&gt;</a></p>
		</div>
	    </div>
	    
        </div>
    </div>
</div>
<div id="d_clip_buttonBox" class="hide"><div id="d_clip_button"><a></a></div></div>
</body>
<script src="/public/js/qr/jquery.mockjax.js" type="text/javascript" charset="utf-8"></script>
<script src="/public/js/qr/jquery.mockjson.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/public/js/ZeroClipboard.js"></script>
<script src="/public/js/interaction.js"></script>
<script src="/public/js/qr/qrData.js"></script>
<script src="/public/js/qr/qrIndex.js"></script>
</html>