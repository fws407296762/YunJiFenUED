<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>异常监控-积分转账-SoCRM关系管理系统</title>
    <link href="/public/css/base.css" rel="stylesheet">
    <link href="/public/css/qrdata.css" rel="stylesheet">
    <!--    <script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>-->
    <script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
    <script src="/public/js/base.js" type="text/javascript" ></script>
    <script type="text/javascript" >
        $(function(){
            /*显示当前导航*/
            var $nav = $("#nav");
            $nav.find("a.subnav_sigin").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
            $nav.find("a[name='nav_rules']").addClass("navlicur");

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
        <div class="tabmenu"><a href="/qrcode/interaction.php" class="tabmenu_cur" >码上推规则<i class="tabmenupic"></i></a><a href="/rules/interaction_base_rule.php">订单打印系统接入规范<i class="tabmenupic"></i></a><a href="/rules/interaction_self_rule.php">
查询与报表<i class="tabmenupic"></i></a></div>

        <div class="h2_box pdtop15 ">
		    <h2>新建活动</h2>
		</div>
		<div class="steps">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td align="center" class="cur">
                        <em class="step_circle">1</em>
                        <span class="step_introduce">1、选择二维码数据源</span>
                    </td>
                    <td align="center">
                        <em class="step_circle">2</em>
                        <span class="step_introduce">2、设置积分奖励规则</span>
                    </td>
                    <td align="center">
                        <em class="step_circle">3</em>
                        <span class="step_introduce">3、完成</span>
                    </td>
                </tr>
            </tbody></table>
        </div>
        
        <div class="create_activities_form">
        	<div class="caf_item clfix">
        		<span class="cafi_title">活动名称：</span>
        		<div class="cafi_ele"><input type="text" class="input28" placeholder="请输入活动名称" value=""></div>
        	</div>
        	<div class="caf_item clfix">
        		<span class="cafi_title">数据类型：</span>
        		<div class="cafi_ele">
        			<div id="pl_selected_box" class=" selectbox">
                        <p class="seled" id="pl_selected" data-value="0">非订单相关</p>
                        <span class="sanjiao_left"></span>
                        <div id="pl_selected_list" class="selectlist">
                            <p data-value="0">非订单相关</p>
                            <p data-value="1">订单相关</p>
                        </div>
                    </div>
        		</div>
        	</div>
        	<div class="caf_item clfix">
        		<span class="cafi_title">二维码推广信息：</span>
        		<div class="cafi_ele">
        			<div id="orderProm" class="hide"><input type="text" class="input28" placeholder="请输入活动名称" value=""><em class="remind">（会员扫描二维后进入了解的信息页面，可以为店铺网址，商品网址，品牌资源网址等）</em></div>
        			<div id="noOrderProm" class="">系统自助为每一个订单自动生成二维码；二维码通填写第三方订单打印软件直接打印在发货单或快递单；</div>
        		</div>
        	</div>
        </div>
        <p class="pdtop10">
	        <a class="bigbtn" href="/qrcode/create_rule.php">下一步</a>
	    </p>
    </div>
    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<input type="hidden" name="" id="id" value="<?php echo $id; ?>" />
<input type="hidden" name="" id="type" value="<?php echo $type; ?>" />
</body>
<script src="/public/js/interaction.js"></script>

</html>