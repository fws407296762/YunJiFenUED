		var basics_id = 0;
		var id = parseInt($("#id").val()), 
			interact_id = parseInt($("#interact_id").val(),10）,
			operate_type = parseInt($("#operate_type").val(),10),
			isshowpart = 3;
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
			$("#partTitle").text(id ? '参与者：积分奖励规则，扫描二维码获得积分数；同一ID多次扫描只计一次积分；' : '参与者（即扫描者）奖励积分规则');
			
			switch(id){
				case 0:
					$("#partBox").show();
				break;
				case 1:
					$(".cfR-range").show();
					if(isshowpart & 1){
						$("#extendsionCheck").attr('checked',true);
						$("#extendsionBox").show();
					}
					if(isshowpart & 2){
						$("#partCheck").attr('checked',true);
						$("#partBox").show(function(){
							$("#pl_part").attr("data-value",'1').text("仅一次").siblings(".sanjiao_left").remove();
							$("#pl_part_list,#partIplimit").remove();
						});
					}
				break;
			}
			$.extend($.fn, {clearNoNum: clearNoNum});
			
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
