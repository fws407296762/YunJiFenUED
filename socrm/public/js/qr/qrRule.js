/**
 * 前端负责人：付文松；后端负责人：黄贺
 * 依赖文件：qrData.js,
 * 依赖接口：
 * 		接口名：获取码上推活动详情,
 * 		请求地址：/qrcode/qrDetail
 * 		创建码上推活动的基础规则（含编辑）
 * 		请求地址：qrcode/createBasics
 **/


		var givetype = [
		    {value:1,text:'固定值'},
		    {value:2,text:'随机'},
		    {value:3,text:'递增'},
		    {value:4,text:'按比例'}
		];
		var frequencyType = [
			{value:0,text:'不限'},
		    {value:1,text:'仅一次'}
		]
		$(function() {
			//		规则详情
			$.mockjax({
				url: '/qrcode/qrDetail',
				data:{id:1,type:1},
				status:200,
				responseTime:750,
				responseText:$.mockJSON.generateFromTemplate({
					code:0,
					msg:'',
					data:{
						title:"",
						qrcode_type:2
					}
				})
			});
			$.mockjax({
				url: '/qrcode/qrDetail',
				data:{id:1,type:2},
				status:200,
				responseTime:750,
				responseText:$.mockJSON.generateFromTemplate({
					code:0,
					msg:'',
					data:{
						"list|1-2":[{
							"role|1-2":1,
							"basics_id|2-4":2
						}]
					}
				})
			});
			$.mockjax({
				url: '/qrcode/createBasics',
				status:200,
				responseTime:750,
				responseText:$.mockJSON.generateFromTemplate({
					code:0,
					msg:''
				})
			});
			
			$.mockjax({
				url: '/interact/ruleDetail',
				status:200,
				responseTime:750,
				responseText:$.mockJSON.generateFromTemplate({
					"code" : 0,
					"msg" : "",
					"data" : {
						"basics_rule" : {
							"basics_id" : "18",
							"basics_title" : "手机会员中心签到",
							"frequency" : "3",
							"days" : "0",
							"score_type" : "3",
							"score" : "10",
							"rand_score_s" : "1",
							"rand_score_e" : "1",
							"add_score" : "5",
							"max_add" : "10",
							"ip_limit" : "0"
						},
						"specific_rule" : [{
								"id" : "37",
								"specific_title" : "吊死扶伤",
								"valid_type" : "0",
								"valid_sdate" : "2014-11-13 00:00:00",
								"valid_edate" : "2014-11-13 00:00:00",
								"happen_type" : "0",
								"days" : "0",
								"rule_type" : "2",
								"badge_type" : "0",
								"bind_time" : "2014-11-18 15:52:18",
								"rule_value" : "10.00",
								"badge_list" : []
							}, {
								"id" : "39",
								"specific_title" : "wer",
								"valid_type" : "0",
								"valid_sdate" : "2014-11-18 00:00:00",
								"valid_edate" : "2014-11-18 00:00:00",
								"happen_type" : "0",
								"days" : "0",
								"rule_type" : "2",
								"badge_type" : "1",
								"bind_time" : "2014-11-18 15:53:37",
								"rule_value" : "-1.00",
								"badge_list" : [{
										"badge_id" : "2",
										"rule_value" : "11.00",
										"badge_name" : "普通会员"
									}, {
										"badge_id" : "3",
										"rule_value" : "22.00",
										"badge_name" : "高级会员"
									}, {
										"badge_id" : "4",
										"rule_value" : "33.00",
										"badge_name" : "vip会员"
									}, {
										"badge_id" : "5",
										"rule_value" : "44.00",
										"badge_name" : "至尊VIP会员1"
									}
								]
							}
						]
					}
				})
			});
			//全局参数
			var id = parseInt($("#id").val()),
				interact_id = parseInt($("#interact_id").val()),
				operate_type = parseInt($("#operate_type").val());
				
			//推广者元素
			var $extension_basics_title = $("#extension_basics_title"),
				$pl_extension_box = $("#pl_extension"),
				$extension_givetype_selected = $("#extension_givetype_selected"),
				$extension_score = $("#extension_score"),
				$extension_iplimit_input = $("#extension_iplimit_input"),
				$extension_rand_score_s = $("#extension_rand_score_s"),
				$extension_rand_score_e = $("#extension_rand_score_e"),
				$extension_proportion_val = $("#extension_proportion_val"),
				$extension_suer_btn = $("#extension_suer_btn");
				
			//参与者元素	
			var	$part_basics_title = $("#part_basics_title"),
				$pl_part = $("#pl_part"),
				$part_givetype_selected = $("#part_givetype_selected"),
				$part_score = $("#part_score"),
				$part_rand_score_s = $("#part_rand_score_s"),
				$part_rand_score_e = $("#part_rand_score_e"),
				$part_iplimit_input = !!$("#part_iplimit_input").is(":checked"),
				$part_suer_btn = $("#part_suer_btn");
				
			//进入页面判断是订单相关类型还是非订单相关类型
			QR.qrDetail({
				data:{id:id,type:1},
				beforeSend:beforeSendFn
			}).done(showRule);
			
			function showRule(data){
				$("#popbox").hide();
				var qrcode_type = parseInt(data.qrcode_type,10);  //qrcode_type：二维码类型，1订单相关，2非订单相关
				$("#partTitle").text(qrcode_type === 1 ? '参与者：积分奖励规则，扫描二维码获得积分数；同一ID多次扫描只计一次积分；' : '参与者（即扫描者）奖励积分规则');
				/***
				 * 首先用qrcode_type判断类型：1订单相关、2非订单相关
				 * 如果是订单相关，还需要判断3种情况：1、参与者；2、推广者；3参与者和推广者。这里还需要请求一遍qrDetail，type：请求类型，1获取活动基本信息，2活动规则详细信息
				 * 再用operate_type判断是新建还是编辑：1新建、2编辑
				 ***/ 
				//判断角色
				QR.qrDetail({
					data:{id:id,type:2},
					beforeSend:beforeSendFn
				}).done(function(data){
					$("#popbox").hide();
					var list = data.list,
						len = list.length,
						basics_id_0,
						basics_id_1;
					var role = 0;
					
				//遍历list，获取role角色
					for(var i = 0;i<len;i++){
						var i_role = parseInt(list[i].role)
						switch(i_role){
							case 2:
								basics_id_0 = list[i].basics_id;
							break;
							case 1:
								basics_id_1 = list[i].basics_id;
							break;
						}
						role += i_role;
					}
					
					switch(qrcode_type){
						case 2:
							if(operate_type === 1){
								$("#partBox").show();
								createRule();
							}
						break;
						case 1:
							if(operate_type === 1){
								$(".cfR-range").show();
								if(role & 1){
									$("#extendsionCheck").attr('checked',true);
									$("#extendsionBox").show();
								}
								if(role & 2){
									$("#partCheck").attr('checked',true);
									$("#partBox").show(function(){
										$("#pl_part").attr("data-value",'1').text("仅一次").siblings(".sanjiao_left").remove();
										$("#pl_part_list,#partIplimit").remove();
									});
								}
								createRule();
							}
						break;
					}
					$part_suer_btn.on("click",function(){
						var $this = $(this);
						createBasic({
							$this:$this,
							$createRuleBox:$("#partBox"),
							$showRuleBox:$("#partRule"),
							$ruleShowBox:$("#partRuleShow"),
							$detailsShowBox:$("#partdetailsShow"),
							basics_title:$part_basics_title,
							frequency:$pl_part,
							score_type:$part_givetype_selected,
							score:$part_score,
							rand_score_s:$part_rand_score_s,
							rand_score_e:$part_rand_score_e,
							ip_limit:$part_iplimit_input,
							role:2,
							basics_id:basics_id_0
						});
					});
					
					$extension_suer_btn.on("click",function(){
						var $this = $(this);
						createBasic({
							$this:$this,
							basics_title:$extension_basics_title,
							frequency:$pl_extension_box,
							score_type:$extension_givetype_selected,
							score:$extension_score,
							proportion_val:$extension_proportion_val,
							rand_score_s:$extension_rand_score_s,
							rand_score_e:$extension_rand_score_e,
							ip_limit:$extension_iplimit_input,
							role:1,
							basics_id:basics_id_1
						});
					});
				});	
			}
			
			$.extend($.fn, {clearNoNum: clearNoNum});
			
			$("input[name='range']").each(function(){
				$(this).on("click",function(){
					var rangedLen = $("input[name='range']:checked").length,
						val = parseInt($(this).val(),10);
					if(rangedLen < 1){
						$("#rangeError").show().delay(3000).fadeOut("slow");
						return false;
					}
					
					switch(val){
						case 1:
							$("#extendsionBox")[$(this).is(":checked") ? "show" : "hide"]();
						break;
						case 2:
							$("#partBox")[$(this).is(":checked") ? "show" : "hide"]();
						break;
					}
				});
			});
			
			var nonum_reg = /[^0-9]/,
				num_reg = /^[1-9]\d*$/,
				ltzero = /^0|[^0-9]/,
				nofloat_reg = /[^0-9\.]/g,
				float_reg = /^[1-9]+([.]{1}[0-9]{1})?$/;

			$("#rightcon").on("keyup", "input:text", function() {
				var dataReg = $(this).attr("data-reg");
				switch (dataReg) {
					case "num":
						$(this).clearNoNum(nonum_reg);
						break;
					case "ltzero":
						$(this).clearNoNum(ltzero);
						break;
					case "nofloat":
						$(this).clearNoNum(nofloat_reg);
						break;
				}
			});
			
			
			function createBasic(options){
				var scoreStatus = options.score && options.score.is(":visible"),
					rand_score_sStatus = options.rand_score_s && options.rand_score_s.is(":visible"),
					rand_score_eStatus = options.rand_score_e && options.rand_score_e.is(":visible"),
					proportion_valStatus = options.proportion_val && options.proportion_val.is(":visible");
					
				var $this = options.$this,
					$createRuleBox = options.$createRuleBox,
					$showRuleBox = options.$showRuleBox,
					$ruleShowBox = options.$ruleShowBox,
					$detailsShowBox = options.$detailsShowBox,
					$error = $this.next(),
					basics_title = options.basics_title &&　options.basics_title.val(),
					frequency = options.frequency && options.frequency.attr("data-value"),
					score_type = options.score_type && options.score_type.attr("data-value"),
					score = options.score && options.score.val(),
					proportion_val = options.proportion_val && options.proportion_val.val(),
					rand_score_s = options.rand_score_s　&&　parseInt(options.rand_score_s.val(),10) || "",
					rand_score_e = options.rand_score_e && parseInt(options.rand_score_e.val(),10) || "",
					ip_limit =  options.ip_limit ? 1 : 0,
					role = options.role,
					id = options.id,
					basics_id = options.basics_id;
					
				var prom_html = '<img src="/public/images/load20.gif" alt=""/>正在保存...';
				if(basics_title == ""){
					$error.addClass("error").html("请输入基础规则名").show();
					return false;
				}
				if (scoreStatus && !score) {
					$error.addClass("error").html("请输入积分").show();
					return false;
				}
				if (rand_score_sStatus && rand_score_eStatus && (!rand_score_s || !rand_score_e)) {
					$error.addClass("error").html("请输入随机积分数").show();
					return false;
				}
				if (rand_score_sStatus && rand_score_eStatus && rand_score_s > rand_score_e) {
					$error.addClass("error").html("随机数后面必须要大于前面").show();
					return false;
				}
				if(proportion_valStatus && !proportion_val){
					$error.addClass("error").html("请输入比例").show();
					return false;
				}
				var dataObj = {
					interact_id:interact_id,  //全局参数
					basics_id:options.basics_id,
					basics_title:"码上推："+basics_title,
					frequency : frequency,
					score_type:score_type,
					score:score || proportion_val,
					rand_score_s:rand_score_s,
					rand_score_e:rand_score_e,
					ip_limit:ip_limit,
					role:role,
					id : id  //全局参数
				};
				QR.createBasics({
					data:dataObj,
					beforeSend:function(){
						$error.removeClass("error").html(prom_html).show();
					}
				}).done(function(){
//					$error.removeClass("error").html("创建成功").show();
					$createRuleBox.fadeOut("slow").delay(1000).remove();
					ruleDetail(basics_id,$showRuleBox,$ruleShowBox,$detailsShowBox);
				}).fail(function(msg){
					$error.addClass("error").html(msg || PROM_TEXT.server_fail).show();
				});
			}
			$("#bind_rule").on("click", function() {
				$("#bind_rule_btn").attr("basics_id", $(this).attr("basics_id"));
				$("#rule_des_btn").attr("basics_id", $(this).attr("basics_id"));
				$("#bind_rule_box").show();
//            	Interact.getBasicsRule({
//                	url:'/interact/specificByBind',
//                	element:$("#br_options")
//            	});
			});
//				$(".create_base_form").remove();
//				$(".show_base").show("slow");
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
			
			function createRule(){
				frequency({
					scoreData:givetype,
					new_scoreData:[{value:1,text:'固定值'},{value:2,text:'随机'},{value:4,text:'按比例'}],
					pl:"pl_extension",
					scoreType:"#extension_givetype_box",
					iplimitBox:"#extensionIplimit",
					fjnumBox:"#extension_fj_num_box",
					givefjnumBox:"#extension_givefj_num_box",
					increasingBox:"#extension_set_box",
					proportionBox:"#extensionProportionBox"
				});
				frequency({
					scoreData:givetype,
					new_scoreData:[{value:1,text:'固定值'},{value:2,text:'随机'}],
					pl:"pl_part",
					scoreType:"#part_givetype_box",
					iplimitBox:"#partIplimit",
					fjnumBox:"#part_fj_num_box",
					givefjnumBox:"#part_givefj_num_box",
					increasingBox:"#part_set_box"
				});
			}
		});
		
		
		function ruleDetail(basics_id,showRuleBox,ruleShowBox,detailsShowBox){
			Interact.ruleDetail(3,{
			  type:1,
			  basics_id:basics_id
			}).done(function(result,options){
			  var basics_rule = options.basicsResult,
				specific_html = options.specific_html;
			  var basics_html = '<a class="editBtn" href="/interact/addBasics?basics_id='+basics_id+'">编辑</a>';
			  basics_html += '<div class="cbf_row">';
				  basics_html += '<label class="cbf_row_title">基础规则名称：</label>';
				  basics_html += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.basics_title+'</div>';
			  basics_html += '</div>';
			
			  basics_html += '<div class="cbf_row">';
				  basics_html += '<label class="cbf_row_title">频率：</label>';
				  var frequency = '';
				switch(parseInt(basics_rule.frequency)){
                     case 0:
                         frequency = '不限制';
                     break;
                     case 1:
                         frequency = '仅一次';
                     break;
                     case 2:
                         frequency = parseInt(basics_rule.days)+'天';
                     break;
                     case 3:
                         frequency = '每天';
                     break;
                     case 4:
                         frequency = '每周';
                     break;
                     case 5:
                         frequency = '每月';
                     break;
                     case 6:
                         frequency = '每季';
                     break;
                     case 7:
                         frequency = '每年';
                     break;
                }
				  basics_html += '<div class="cbf_row_cont edit_row_cont">'+frequency+'</div>';
			  basics_html += '</div>';
			
			  basics_html += '<div class="cbf_row">';
				  basics_html += '<label class="cbf_row_title">赠送积分类型：</label>';
			  basics_html += '<div class="cbf_row_cont edit_row_cont">';
			
			  var limitText = '',randomStatus = 'hide',firstScore = '',firstText = '';
			  switch(parseInt(basics_rule.score_type)){
				  case 1:
					  basics_html += '固定植';
					  firstText = '赠送积分数';
					  break;
				  case 2:
					  basics_html += '随机';
					  randomStatus = '';
					  firstScore = 'hide';
					  break;
				  case 3:
					  basics_html += '递增';
					  
						limitText += '<div class="cbf_row">';
							limitText += '<label class="cbf_row_title">连续每次增加：：</label>';
							limitText += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.add_score+'积分</div>';
						limitText += '</div>';
					  
						limitText += '<div class="cbf_row">';
						  limitText += '<label class="cbf_row_title">最大连续次数：</label>';
						  limitText += '<div class="cbf_row_cont edit_row_cont">'+(parseInt(basics_rule.max_add) || "不限制")+'</div>';
						limitText += '</div>';
						
					  firstText = '首次互动';
					 break;
			  }
			  basics_html += '</div>';
			  basics_html += '</div>';
			
			  basics_html += '<div class="cbf_row '+randomStatus+'">';
			  basics_html += '<label class="cbf_row_title">随机起止值：</label>';
			  basics_html += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.rand_score_s+'积分-'+basics_rule.rand_score_e+'积分</div>';
			  basics_html += '</div>';
			
			  basics_html += '<div class="cbf_row '+firstScore+'">';
			  basics_html += '<label class="cbf_row_title">'+firstText+'：</label>';
			  basics_html += '<div class="cbf_row_cont edit_row_cont">'+basics_rule.score+'积分</div>';
			  basics_html += '</div>';
			  basics_html += limitText;
			  showRuleBox.show();
			  ruleShowBox.html(basics_html);
			  detailsShowBox.html(specific_html);
			});
		
		}
		
		//数据加载效果
		function beforeSendFn(){
			pop("正在加载数据...",0);
		}
		
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
/*
 *  @parm 参数以对象的形式传过去，作用在于方便扩展
 * 	pl:频率
 *  iplimitBox：IP限制
 * 	scoreType：赠送积分类型
 * 	scoreData：原本的数据结构
 * 	new_scoreData：新的数据结构
 * 	fjnumBox：积分数
 * 	givefjnumBox：随机赠送积分数
 * 	increasingBox：递增
 * 	proportionBox：比例
 * */

function frequency(options){
	var pl = selectfn(options.pl),
		pl_v = parseInt(pl.v,10);
	$(options.iplimitBox)[pl_v === 0 ? "show" : "hide"]();
	if(pl_v === 0 || pl_v === 1 || pl_v === 2){
		Interact.createOptions({
			box:$(options.scoreType),
			data:options.new_scoreData
		});
		showTypeInp(options.new_scoreData[0].value)
	}else{
		Interact.createOptions({
			box:$(options.scoreType),
			data:options.scoreData
		});
		showTypeInp(options.scoreData[0].value)
	}
	
	$("#"+options.pl).siblings(".selectlist").on("click",'p',function(){
		var pl_v = parseInt($(this).attr("data-value"),10);
		$(options.iplimitBox)[pl_v === 0 ? "show" : "hide"]();
	});
	
	$(options.scoreType).on("click","p",function(){
		var score_type_v = parseInt($(this).attr("data-value"),10);
		showTypeInp(score_type_v);
	});
	
	
	function showTypeInp(score_type_v){
		$(options.fjnumBox)[score_type_v === 1 ? "show" : "hide"](function(){
             $(this).find("input[type='text']").val("");
        });
        $(options.givefjnumBox)[score_type_v === 2 ? "show" : "hide"](function(){
			 $(this).find("input[type='text']").val("");
		});
		$(options.increasingBox)[score_type_v === 3 ? "show":"hide"](function(){
			 $(this).find("input[type='text']").val("");
		});
        $(options.proportionBox)[score_type_v === 4 ? "show" : "hide"](function(){
             $(this).find("input[type='text']").val("");
        });
	}
}

