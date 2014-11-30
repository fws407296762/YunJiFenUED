<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>异常监控-积分转账-SoCRM关系管理系统</title>
		<link href="/public/css/base.css" rel="stylesheet">
		<link href="/public/css/qrdata.css" rel="stylesheet">
		<!--    <script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>-->
		<script type="text/javascript">
			if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {
				document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>
		<script src="/public/js/base.js" type="text/javascript"></script>
		<script src="/public/js/interaction_action.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				/*显示当前导航*/
				var $nav = $("#nav");
				$nav.find("a.subnav_sigin").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast", function() {
					floatfoot();
				});
				$nav.find("a[name='nav_rules']").addClass("navlicur");

			})
			 $(window).resize(function() {
				floatfoot();
			});
		</script>
		<style>
			.cbf_row{padding-left: 100px; height: 45px;}
			        .cbf_row_title{float: left; display: inline; width: 100px; margin-left: -100px; line-height: 30px; text-align: right;}
			        .iplimit{ line-height: 16px;}
			        .assign-days-box{vertical-align: top; line-height: 30px;}
			        .rule_show{ background: #fff;border: 1px solid #e0e0e0; padding: 10px; position: relative; width: 700px;}
			        .editBtn{ position: absolute; top: 10px; right: 20px;}
			        .edit_row_cont{ line-height: 30px; font-weight: bold;}
			        .rules_details_list li{margin-top: 10px;}
			        .rd_bg{background: #f0f0f0;}
			        .rb_list_box{padding: 10px; position: relative;}
			        .rb_list_box div {line-height: 25px;}
			        .rd_text {display: inline-block;margin-right: 20px;}
			        .cancel_binding{ position: absolute; top: 10px; right: 10px;}
		</style>
	</head>

	<body>
		<!-- leftbox start -->
		<?php include( "/../base/leftbox.php") ?>
		<!-- leftbox end -->

		<div id="rightbox" class="rightbox">
			<!-- topsearch start -->
			<?php include( "/../base/topsearch.php") ?>
			<!-- topsearch end -->

			<div id="rightcon" class="clfix rightcon">
				<div class="tabmenu"><a href="/qrcode/interaction.php" class="tabmenu_cur">码上推规则<i class="tabmenupic"></i></a><a href="/rules/interaction_base_rule.php">订单打印系统接入规范<i class="tabmenupic"></i></a><a href="/rules/interaction_self_rule.php">查询与报表<i class="tabmenupic"></i></a>
				</div>
				
				<div class="create_form">
			        
			        <!--规则内容设置开始-->
					<div id="setBox">
						<!--范围选择开始-->
						<div class="cfR-range caf_item clfix hide">
				        	<span class="cafi_title">奖励范围：</span>
				        	<div class="cafi_ele">
				        		<label class="mright10"><input type="checkbox" name="range" value="1" class="vermiddle mright5" id="extendsionCheck" />推广者 （即订单购买者）</label>
				        		<label><input type="checkbox" name="range" value="2" class="vermiddle mright5" id="partCheck" />参与者 （即扫描者）</label>
				        	</div>
				        </div>
				        <!--范围选择结束-->
						<!--推广者规则内容设置开始-->
						<div id="extendsionBox" class="hide">
							
				        	
							<div class="h2_box pdtop15 ">
								<h2>推广者：积分奖励规则，二维码每被参与者有效扫描一次获得积分数；</h2>
							</div>
							
							<div id='extensionSet' class="create_box mtop20">
								<div class="cbf_row">
									<label class="cbf_row_title">基础规则名称：</label>
									<div class="cbf_row_cont">
										<input type="text" name="" class="input28 w170" id="extension_basics_title" value="" />
									</div>
								</div>
		
								<div class="cbf_row">
									<label class="cbf_row_title">频率：</label>
									<div class="cbf_row_cont clfix">
										<div id="pl_extension_box" class=" selectbox fl">
											<p class="seled" id="pl_extension" data-value="0">不限</p>
										</div>
									</div>
								</div>
		
								<div class="cbf_row">
									<label class="cbf_row_title">赠送积分类型：</label>
									<div class="cbf_row_cont">
										<div id="extension_givetype_box" class=" selectbox">
											<p class="seled" id="extension_givetype_selected" data-value="1">固定值</p>
											<span class="sanjiao_left"></span>
											<div class="selectlist score-type" id="extension_score_type">
												<p data-value="1">固定值</p>
												<p data-value="2">随机</p>
												<p data-value="4">按比例</p>
											</div>
										</div>
									</div>
								</div>
		
								<div id="extension_set_box" class="set_box hide">
									<div class="cbf_row">
										<label class="cbf_row_title">首次互动：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="extension_first_score" />　积分
										</div>
									</div>
		
									<div class="cbf_row">
										<label class="cbf_row_title">连续每次增加：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="extension_add_score" />　积分
										</div>
									</div>
		
									<div class="cbf_row">
										<label class="cbf_row_title">最大连续次数：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="extension_max_add" />　次
											<span class="remind">积分不再增加，继续连续签到当日领取签到积分与这日相同； （大于等于2的整数）</span>
										</div>
									</div>
								</div>
		
								<div id="extension_givefj_num_box" class="cbf_row givefj_num_box hide">
									<label class="cbf_row_title">赠送积分数：</label>
									<div class="cbf_row_cont">
										<input class="input28 w70" type="text" data-reg="num" name="" id="extension_rand_score_s" /> —
										<input class="input28 w70" data-reg="num" type="text" name="" id="extension_rand_score_e" />　积分<em class="remind mleft10">每次随机赠送该范围内积分</em>
									</div>
								</div>
		
								<div id='extension_fj_num_box' class="cbf_row fj_num_box hide">
									<label class="cbf_row_title">积分数：</label>
									<div class="cbf_row_cont">
										<input class="input28 w70" data-reg="num" type="text" name="" id="extension_score" />　积分
									</div>
								</div>
								<div id="extensionProportionBox" class="cbf_row proportion_box hide">
									<label for="" class="cbf_row_title">比例：</label>
									<div class="cbf_row_cont"><input class="input28 w70" data-reg="num" type="text" name="" id="extension_proportion_val"></div>
								</div>
								<div id="extensionIplimit" class="cbf_row iplimit_box hide">
									<label class="cbf_row_title iplimit">IP限制：</label>
									<div class="cbf_row_cont">
										<label for="" class="mleft10">
											<input type="checkbox" name="" class="vertop2" id="extension_iplimit_input">&nbsp;多次互动，同一ID每天只计一次积分</label>
									</div>
								</div>
								
								<a class="normalbtn" id="extension_suer_btn">保存</a>
								<em class="remind hide"><img src="/public/images/load20.gif" alt=""/>提交中...</em>
								<em class="error hide">创建失败，请再试</em>
							</div>
						</div>
						<!--推广者规则内容设置结束-->
	
						<!--参与者规则设置开始-->
						<div id="partBox" class="hide">
							<div class="h2_box pdtop15 ">
								<h2 id='partTitle'></h2>
							</div>
							<div id="partSet" class="create_box mtop20">
								<div class="cbf_row">
									<label class="cbf_row_title">基础规则名称：</label>
									<div class="cbf_row_cont">
										<input type="text" name="" class="input28 w170" id="part_basics_title" value="" />
									</div>
								</div>
		
								<div class="cbf_row">
									<label class="cbf_row_title">频率：</label>
									<div class="cbf_row_cont clfix">
										<div id="pl_part_box" class=" selectbox fl">
											<p class="seled" id="pl_part" data-value="0">不限</p>
											<span class="sanjiao_left"></span>
											<div class="selectlist pl-list" id="pl_part_list">
												<p data-value="0">不限</p>
												<p data-value="1">仅一次</p>
											</div>
										</div>
									</div>
								</div>
		
								<div class="cbf_row">
									<label class="cbf_row_title">赠送积分类型：</label>
									<div class="cbf_row_cont">
										<div id="part_givetype_box" class=" selectbox">
											<p class="seled" id="part_givetype_selected" data-value="1">固定值</p>
											<span class="sanjiao_left"></span>
											<div class="selectlist score-type" id="part_score_type">
												<p data-value="1">固定值</p>
												<p data-value="2">随机</p>
											</div>
										</div>
									</div>
								</div>
		
								<div id="part_set_box" class="set_box hide">
									<div class="cbf_row">
										<label class="cbf_row_title">首次互动：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="part_first_score" />　积分
										</div>
									</div>
		
									<div class="cbf_row">
										<label class="cbf_row_title">连续每次增加：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="part_add_score" />　积分
										</div>
									</div>
		
									<div class="cbf_row">
										<label class="cbf_row_title">最大连续次数：</label>
										<div class="cbf_row_cont">
											<input class="input28 w170" data-reg="num" type="text" name="" id="part_max_add" />　次
											<span class="remind">积分不再增加，继续连续签到当日领取签到积分与这日相同； （大于等于2的整数）</span>
										</div>
									</div>
								</div>
		
								<div id="part_givefj_num_box" class="cbf_row givefj_num_box hide">
									<label class="cbf_row_title">赠送积分数：</label>
									<div class="cbf_row_cont">
										<input class="input28 w70" type="text" data-reg="num" name="" id="part_rand_score_s" /> —
										<input class="input28 w70" data-reg="num" type="text" name="" id="part_rand_score_e" />　积分<em class="remind mleft10">每次随机赠送该范围内积分</em>
									</div>
								</div>
		
								<div id="part_fj_num_box" class="cbf_row fj_num_box hide">
									<label class="cbf_row_title">积分数：</label>
									<div class="cbf_row_cont">
										<input class="input28 w70" data-reg="num" type="text" name="" id="part_score" />　积分
									</div>
								</div>
								<div id="partIplimit" class="cbf_row iplimit_box hide">
									<label class="cbf_row_title iplimit">IP限制：</label>
									<div class="cbf_row_cont">
										<label for="" class="mleft10">
											<input type="checkbox" name="" class="vertop2" id="part_iplimit_input">&nbsp;多次互动，同一ID每天只计一次积分</label>
									</div>
								</div>
								<a class="normalbtn" id="part_suer_btn">保存</a>
								<em class="remind hide"><img src="/public/images/load20.gif" alt=""/>提交中...</em>
								<em class="error hide">创建失败，请再试</em>
							</div>
						</div>
						<!--参与者规则设置结束-->
					</div>
					<!--规则内容设置结束-->
					
					<!--规则显示开始-->
					<div id="ruleBox">
						<!--推广者规则内容展示开始-->
						<div id="extensionRule" class="show_rule mtop20 hide">
							<div class="rule_show"></div>
							<div class="rule_show mtop20">
								<ul class="rules_details_list"></ul>
							</div>
							<p class="mtop20"><a class="smallbtn" id="extension_bind_rule">增加绑定个性化规则</a><span class="remind">（若条件符合，计算积分方式为叠加）</span>
							</p>
						</div>
						<!--推广者规则内容展示结束-->
						
						<!--参与者规则展示开始-->
						<div id="partRule" class="show_rule mtop20 hide">
							<div class="rule_show"></div>
							<div class="rule_show mtop20">
								<ul class="rules_details_list"></ul>
							</div>
							<p class="mtop20"><a class="smallbtn" id="part_bind_rule">增加绑定个性化规则</a><span class="remind">（若条件符合，计算积分方式为叠加）</span>
							</p>
						</div>
						<!--参与者规则展示结束-->
					</div>
					<!--规则显示结束-->
					
					<!--下一步开始-->
					<a id="nextBtn" class="bigbtn mtop20">下一步</a>
					<!--下一步结束-->
					
				</div>
				

				<div class="exchange_setfinish hide">
					<p class="success_activity">
						基础积分规则创建成功
					</p>
					<p class="mtop10">
						<span class="graycolor">3秒后自动跳到基础积分规则管理页面</span>
						<a href="/coupon/index.php" class="mleft10">立即前往</a>
					</p>
				</div>
			</div>
			<!-- footer start -->
			<?php include( "/../base/footer.php") ?>
			<!-- footer end -->
		</div>
		<div id="bind_rule_box" class="popbox">
			<div id="bind_rule" class="pop pop450" style="height: 200px">
				<div class="pop_hd">
					<strong class="pop_title">绑定规则</strong>
					<a href="javascript:hide('bind_rule_box');" class="pop_hide" style="display: block;"></a>
				</div>
				<div class="pop_bd">
					<div id="bind_rule_con">
						<div class="clfix">
							<label for="" class="fl mtop5">选择要绑定的个性规则：</label>
							<div class="selectbox fl">
								<p class="seled" id="br_selected" data-value="">请选择规则</p>
								<span class="sanjiao_left"></span>
								<div class="selectlist" id="br_options"></div>
							</div>
							<div id="br_options_error" class="error"></div>
						</div>
						<p class="mtop10" style="padding-left: 132px"><a id="rule_des_btn">规则详情</a>
						</p>
						<p class="mtop10" style="padding-left: 132px"><a href="/interact/addSpecific">没有合适，新建个性化规则</a>
						</p>

					</div>
				</div>
				<p id="bind_rule_btnbox" class="" align="center">
					<a id="bind_rule_btn" class="smallbtn">确定</a>
					<span class="load hide"><img src="/public/images/load20.gif" alt="加载中" class="mleft10">正在加载...</span>
					<span class="error"></span>
				</p>
			</div>
		</div>
		<input type="hidden" id="id" value="<?php echo $id; ?>" name="" />
		<input type="hidden" id="interact_id" value="<?php echo $interact_id; ?>" name="" />
		<input type="hidden" id="operate_type" value="<?php echo $operate_type; ?>" name="" />
	</body>
	<script src="/public/js/interaction.js"></script>
</html>