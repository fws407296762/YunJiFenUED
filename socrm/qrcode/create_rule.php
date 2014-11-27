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
				<div class="tabmenu"><a href="/qrcode/interaction.php" class="tabmenu_cur">码上推规则<i class="tabmenupic"></i></a><a href="/rules/interaction_base_rule.php">订单打印系统接入规范<i class="tabmenupic"></i></a><a href="/rules/interaction_self_rule.php">

查询与报表<i class="tabmenupic"></i></a>
				</div>
				
				<div class="create_form">
					<div class="cfR-range caf_item clfix">
		        		<span class="cafi_title">奖励范围：</span>
		        		<div class="cafi_ele">
		        			<label class="mright10"><input type="checkbox" name="range" class="vermiddle mright5" id="" />推广者 （即订单购买者）</label>
		        			<label><input type="checkbox" name="range" class="vermiddle mright5" id="" />参与者 （即扫描者）</label>
		        		</div>
		        	</div>
					<div class="h2_box pdtop15 ">
						<h2>推广者：积分奖励规则，二维码每被参与者有效扫描一次获得积分数；</h2>
					</div>
					
					<div id='extensionSet' class="create_box mtop20">
						<div class="cbf_row">
							<label class="cbf_row_title">基础规则名称：</label>
							<div class="cbf_row_cont">
								<input type="text" name="" class="input28 w170" id="basics_title" value="" />
							</div>
						</div>

						<div class="cbf_row">
							<label class="cbf_row_title">频率：</label>
							<div class="cbf_row_cont clfix">
								<div id="pl_extension_box" class=" selectbox fl">
									<p class="seled" id="pl_extension" data-value="0">不限</p>
									<span class="sanjiao_left"></span>
									<div class="selectlist pl-list" id="pl_extension_list">
										<p data-value="0">不限</p>
										<p data-value="1">仅一次</p>
									</div>
								</div>
							</div>
						</div>

						<div class="cbf_row">
							<label class="cbf_row_title">赠送积分类型：</label>
							<div class="cbf_row_cont">
								<div id="extension_givetype_box" class=" selectbox">
									<p class="seled" id="extension_givetype_selected" data-value="1">固定值</p>
									<span class="sanjiao_left"></span>
									<div class="selectlist score-type" id="score_type">
										<p data-value="1">固定值</p>
										<p data-value="2">随机</p>
										<p data-value="3">递增</p>
										<p data-value="4">按比例</p>
									</div>
								</div>
							</div>
						</div>

						<div class="set_box">
							<div class="cbf_row">
								<label class="cbf_row_title">首次互动：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="first_score" />　积分
								</div>
							</div>

							<div class="cbf_row">
								<label class="cbf_row_title">连续每次增加：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="add_score" />　积分
								</div>
							</div>

							<div class="cbf_row">
								<label class="cbf_row_title">最大连续次数：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="max_add" />　次
									<span class="remind">积分不再增加，继续连续签到当日领取签到积分与这日相同； （大于等于2的整数）</span>
								</div>
							</div>
						</div>

						<div class="cbf_row givefj_num_box hide">
							<label class="cbf_row_title">赠送积分数：</label>
							<div class="cbf_row_cont">
								<input class="input28 w70" type="text" data-reg="num" name="" id="rand_score_s" /> —
								<input class="input28 w70" data-reg="num" type="text" name="" id="rand_score_e" />　积分<em class="remind mleft10">每次随机赠送该范围内积分</em>
							</div>
						</div>

						<div class="cbf_row fj_num_box hide">
							<label class="cbf_row_title">积分数：</label>
							<div class="cbf_row_cont">
								<input class="input28 w70" data-reg="num" type="text" name="" id="score" />　积分
							</div>
						</div>
						<div id="extensionIplimit" class="cbf_row iplimit_box hide">
							<label class="cbf_row_title iplimit">IP限制：</label>
							<div class="cbf_row_cont">
								<label for="" class="mleft10">
									<input type="checkbox" name="" class="vertop2" id="iplimit_input">&nbsp;多次互动，同一ID每天只计一次积分</label>
							</div>
						</div>
						<a class="normalbtn" id="suer_btn">保存</a>
						<em class="remind hide"><img src="/public/images/load20.gif" alt=""/>提交中...</em>
						<em class="error hide">创建失败，请再试</em>
					</div>

					<div id="extensionRule" class="show_rule mtop20">
						<div class="rule_show">1212</div>
						<div class="rule_show mtop20">
							<ul class="rules_details_list">121212</ul>
						</div>
						<p class="mtop20"><a class="smallbtn" id="bind_rule">增加绑定个性化规则</a><span class="remind">（若条件符合，计算积分方式为叠加）</span>
						</p>
					</div>

					<div class="h2_box pdtop15 ">
						<h2 id='partTitle'></h2>
					</div>
					<div id="partSet" class="create_box mtop20">
						<div class="cbf_row">
							<label class="cbf_row_title">基础规则名称：</label>
							<div class="cbf_row_cont">
								<input type="text" name="" class="input28 w170" id="basics_title" value="" />
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
									<div class="selectlist score-type" id="score_type">
										<p data-value="1">固定值</p>
										<p data-value="2">随机</p>
									</div>
								</div>
							</div>
						</div>

						<div class="set_box">
							<div class="cbf_row">
								<label class="cbf_row_title">首次互动：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="first_score" />　积分
								</div>
							</div>

							<div class="cbf_row">
								<label class="cbf_row_title">连续每次增加：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="add_score" />　积分
								</div>
							</div>

							<div class="cbf_row">
								<label class="cbf_row_title">最大连续次数：</label>
								<div class="cbf_row_cont">
									<input class="input28 w170" data-reg="num" type="text" name="" id="max_add" />　次
									<span class="remind">积分不再增加，继续连续签到当日领取签到积分与这日相同； （大于等于2的整数）</span>
								</div>
							</div>
						</div>

						<div class="cbf_row givefj_num_box hide">
							<label class="cbf_row_title">赠送积分数：</label>
							<div class="cbf_row_cont">
								<input class="input28 w70" type="text" data-reg="num" name="" id="rand_score_s" /> —
								<input class="input28 w70" data-reg="num" type="text" name="" id="rand_score_e" />　积分<em class="remind mleft10">每次随机赠送该范围内积分</em>
							</div>
						</div>

						<div class="cbf_row fj_num_box hide">
							<label class="cbf_row_title">积分数：</label>
							<div class="cbf_row_cont">
								<input class="input28 w70" data-reg="num" type="text" name="" id="score" />　积分
							</div>
						</div>
						<div id="partIplimit" class="cbf_row iplimit_box hide">
							<label class="cbf_row_title iplimit">IP限制：</label>
							<div class="cbf_row_cont">
								<label for="" class="mleft10">
									<input type="checkbox" name="" class="vertop2" id="iplimit_input">&nbsp;多次互动，同一ID每天只计一次积分</label>
							</div>
						</div>
						<a class="normalbtn" id="suer_btn">保存</a>
						<em class="remind hide"><img src="/public/images/load20.gif" alt=""/>提交中...</em>
						<em class="error hide">创建失败，请再试</em>
					</div>
					
					<div id="partRule" class="show_rule mtop20">
						<div class="rule_show">1212</div>
						<div class="rule_show mtop20">
							<ul class="rules_details_list">121212</ul>
						</div>
						<p class="mtop20"><a class="smallbtn" id="bind_rule">增加绑定个性化规则</a><span class="remind">（若条件符合，计算积分方式为叠加）</span>
						</p>
					</div>
					<a id="nextBtn" class="bigbtn mtop20">下一步</a>
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
	</body>
	<script src="/public/js/interaction.js"></script>
	<script>
		var basics_id = 0;
		var id = 0;
		$(function() {
			
			$("#partTitle").text(id ? '参与者（即扫描者）奖励积分规则' : '参与者：积分奖励规则，扫描二维码获得积分数；同一ID多次扫描只计一次积分；');
			$.extend($.fn, {
				clearNoNum: clearNoNum
			});
			var basics_id_num = parseInt(basics_id, 10);

			var nonum_reg = /[^0-9]/,
				num_reg = /^[1-9]\d*$/,
				ltzero = /^0|[^0-9]/;
			$("#rightcon").on("keyup", "input:text", function() {
				var dataReg = $(this).attr("data-reg");
				switch (dataReg) {
					case "num":
						$(this).clearNoNum(nonum_reg);
						break;
					case "ltzero":
						$(this).clearNoNum(ltzero);
						break;
				}
			});

			if (basics_id_num === 0) {
				//      $(".show_base").remove();
				frequency();
				$("#bind_rule").on("click", function() {
					$("#bind_rule_btn").attr("basics_id", $(this).attr("basics_id"));
					$("#rule_des_btn").attr("basics_id", $(this).attr("basics_id"));
					$("#bind_rule_box").show();
					//            Interact.getBasicsRule({
					//                url:'/interact/specificByBind',
					//                element:$("#br_options")
					//            });
				});

				var $score = $("#score"),
					$rand_score_s = $("#rand_score_s"),
					$rand_score_e = $("#rand_score_e"),
					$first_score = $("#first_score"),
					$add_score = $("#add_score"),
					$max_add = $("#max_add");

				$("#suer_btn").on("click", function() {
					var $error = $(this).siblings(".error");
					$error.hide();
					var scoreStatus = $score.is(":visible"),
						rand_score_sStatus = $rand_score_s.is(":visible"),
						rand_score_eStatus = $rand_score_e.is(":visible"),
						first_scoreStatus = $first_score.is(":visible"),
						add_scoreStatus = $add_score.is(":visible"),
						max_addStatus = $max_add.is(":visible"),
						scoreVal = $score.val(),
						rand_score_sVal = parseInt($rand_score_s.val(), 10),
						rand_score_eVal = parseInt($rand_score_e.val(), 10),
						first_scoreVal = $first_score.val(),
						add_scoreVal = $add_score.val(),
						max_addVal = parseInt($max_add.val(), 10);
					if (scoreStatus && !scoreVal) {
						$error.html("请输入积分").show();
						return false;
					}
					if (rand_score_sStatus && rand_score_sStatus && (!rand_score_sVal || !rand_score_eVal)) {
						$error.html("请输入随机积分数").show();
						return false;
					}
					if (rand_score_sStatus && rand_score_sStatus && rand_score_sVal > rand_score_eVal) {
						$error.html("随机数后面必须要大于前面").show();
						return false;
					}
					if (first_scoreStatus && !first_scoreVal) {
						$error.html("请输入首次互动积分数").show();
						return false;
					}
					if (add_scoreStatus && !add_scoreVal) {
						$error.html("请输入连续每次增加积分数").show();
						return false;
					}
					if (max_addStatus) {
						if (!max_addVal) {
							$error.html("请输入最大连续次数").show();
							return false;
						}
						if (max_addVal < 2) {
							$error.html("最大连续次数必须大于2").show();
							return false;
						}
					}
					var basics_title = $("#basics_title").val(),
						frequency = $("#pl_selected").v,
						score_type = parseInt(selectfn("givetype_selected").v, 10),
						score = (score_type === 1 && scoreVal) || (score_type === 3 && first_scoreVal),
						rand_score_s = rand_score_sVal,
						rand_score_e = rand_score_eVal,
						add_score = $("#add_score").val(),
						max_add = $("#max_add_check").attr("checked") ? 0 : $("#max_add").val(),
						ip_limit = $("#iplimit_input").attr("checked") ? 0 : 1;
					//          Interact.createBasics({
					//              basics_id:basics_id,
					//              basics_title:basics_title,
					//              frequency:frequency,
					//              score:score,
					//              rand_score_s:rand_score_s,
					//              rand_score_e:rand_score_e,
					//              add_score:add_score,
					//              max_add:max_add,
					//              ip_limit:ip_limit
					//          },function(){
					//              $(".create_base_form").hide();
					//              $(".exchange_setfinish").show();
					//              setTimeout(function(){
					//                  window.location.href="/interact/basics";
					//              },3000);
					//          });
				});
			} else {
				$(".create_base_form").remove();
				$(".show_base").show("slow");
				//      pop("正在加载数据...",0);
				//      Interact.ruleDetail(3,{
				//          type:1,
				//          basics_id:basics_id
				//      }).done(function(result,options){
				//          var basics_rule = options.basicsResult
				//          specific_html = options.specific_html;
				//          var basics_html = '<a class="editBtn" href="/interact/addBasics?basics_id='+basics_id+'">编辑</a>';
				//
				//          basics_html += '<div class="cbf_row">';
				//              basics_html += '<label class="cbf_row_title">基础规则名称：</label>';
				//              basics_html += '<div class="cbf_row_cont edit_row_cont"></div>';
				//          basics_html += '</div>';
				//
				//          basics_html += '<div class="cbf_row">';
				//              basics_html += '<label class="cbf_row_title">频率：</label>';
				//              basics_html += '<div class="cbf_row_cont edit_row_cont">每天</div>';
				//          basics_html += '</div>';
				//
				//          basics_html += '<div class="cbf_row">';
				//              basics_html += '<label class="cbf_row_title">赠送积分类型：</label>';
				//          basics_html += '<div class="cbf_row_cont edit_row_cont">';
				//
				//          var limitText = '',randomStatus = 'hide',firstScore = '',firstText = '';
				//          switch(parseInt(basics_rule.score_type)){
				//              case 1:
				//                  basics_html += '固定植';
				//                  firstText = '赠送积分数';
				//                  break;
				//              case 2:
				//                  basics_html += '随机';
				//                  randomStatus = '';
				//                  firstScore = 'hide';
				//                  break;
				//              case 3:
				//                  basics_html += '递增';
				//                  limitText += '<span class="rd_text"><strong>连续每次增加：</strong>'+basics_rule.add_score+'积分</span>';
				//                  limitText += '<span class="rd_text"><strong>最大连续次数：</strong>'+(parseInt(basics_rule.max_add) || "不限制")+'</span>';
				//                  firstText = '首次互动';
				//                  break;
				//          }
				//          basics_html += '</div>';
				//          basics_html += '</div>';
				//
				//          basics_html += '<div class="cbf_row '+randomStatus+'">';
				//          basics_html += '<label class="cbf_row_title">随机起止值：</label>';
				//          basics_html += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.rand_score_s+'积分-'+basics_rule.rand_score_e+'积分</div>';
				//          basics_html += '</div>';
				//
				//          basics_html += '<div class="cbf_row '+randomStatus+'">';
				//          basics_html += '<label class="cbf_row_title">'+firstText+'：</label>';
				//          basics_html += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.score+'积分</div>';
				//          basics_html += '</div>';
				//          $(".rule_show").html(basics_html);
				//          $(".rules_details_list").html(specific_html);
				//      });
			}


		});

		function clearNoNum(rule) {
			var obj = this,
				timer = null;
			var objName = obj[0].nodeName.toLowerCase(),
				objType = $(obj).attr("type").toLowerCase();

			if (objName !== "input" && objType !== "text") {
				throw "执行的元素不是文本框";
				return false;
			}
			clearInterval(timer);
			timer = setInterval(function() {
				var objVal = $(obj).val();
				if (objVal === "" || !rule.test(objVal)) {
					clearInterval(timer);
				}
				$(obj).val(objVal.replace(rule, ""));
			}, 10);
		}
	</script>

</html>