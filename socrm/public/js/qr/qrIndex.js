/* 
 * 作用页面：已创建码上推规则列表
 * 依赖JS文件：qrData.js
 * fuwensong
 * 
 * */

$(function(){
	if(true){
//		列表展示
		$.mockJSON.data.LINK = [
		    'http://www.baidu.com', 'http://www.qq.com', 'http://www.taobao.com', 'http://www.meituan.com'
		];
		$.mockJSON.data.QRCODE_LINK = [
		    'http://gtms02.alicdn.com/tps/i2/TB14ng8GFXXXXXJXFXXvKyzTVXX-520-280.jpg', 'http://i.mmcdn.cn/simba/img/TB1VQ9SGpXXXXcpaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1a504GFXXXXbMaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1V8I5GXXXXXcYXFXXSutbFXXX.jpg',''
		];
		$.mockjax({
			url: '/qrcode/qrcodeList',
			status: 200,
			responseTime: 750,        
			responseText: $.mockJSON.generateFromTemplate({
				code:0,
				msg:'',
				data:{
					totalnum:20,
					"list|10-20":[{
						"id|+1":1,
						"add_time":"@DATE_YYYY"+"@DATE_MM"+"@DATE_DD",
						"title":"@FEMALE_FIRST_NAME",
						"qrcode_type|1-2":1,
						"link":"@LINK",
						"qrcode_link":"@QRCODE_LINK",
						"print_stat|0-1":0,
						"status|0-1":0,
						"score_rule_list|1-2":[
							{
								"role|1-2":1,
								"rule_name":"@LAST_NAME"
							}
						]
					}]
				}
			})
		});
//		修改状态
		$.mockjax({
			url: '/qrcode/updateStatus',
			status:200,
			responseTime:750,
			responseText:$.mockJSON.generateFromTemplate({
				code:0,
				msg:''
			})
				
		});
		
//		规则详情
		$.mockjax({
			url: '/interact/ruleDetail',
			status:200,
			responseTime:750,
			responseText:$.mockJSON.generateFromTemplate({
				code:0,
				msg:''
			})
				
		})
		
	}
	QR.qrcodeList({  //加载已创建的规则
		data:{ps:DEFAULT_PS,p:DEFAULT_P},
		box:$("#pageContent"),
		beforeSend:function(){
			$("#pageContent").html(tabProm(6,'<img src="/public/images/load20.gif">正在加载...'));
		}
	}).done(function(data){
		var list = data.list,
		    len = list.length;
		var isbind = {},
		    orderRuld = '';
		for(var i = 0;i<len;i++){
			var print_stat = parseInt(list[i].print_stat,10),
			    qrcode_type = parseInt(list[i].qrcode_type,10);
			if (qrcode_type === 1) {
				orderRuld += '<p data-value="'+list[i].id+'">'+list[i].title+'</p>';
			}
			if (print_stat) {
				isbind.title = list[i].title,
				isbind.id = list[i].id
			}
		}
		$("#ruleOptions").html(orderRuld);
		if ($.isEmptyObject(isbind)) {
			$("#printRuleBtn").show();
		}else{
			$("#ruleSelected").text(isbind.title).attr("data-value",isbind.id);
			$("#currentRule").attr('rule_id',isbind.id).text(isbind.title).show();
			$("#changeRuleBtn").show();
		}
	});
	$("#printRuleBtn").on("click",function(){
		$(this).hide();
		$("#cancleRuleBtn").attr("print-click",'1');
		var $firstOptions = $("#ruleOptions p:first");
		var firstId = '0',firstText = '请选择打印规则';
		if ($firstOptions) {
			firstId = $firstOptions.attr("data-value"),
		        firstText = $firstOptions.text();
		}
		$("#ruleSelected").attr("data-value",firstId).text(firstText);
		$(".select-rule,#bindRuleBtn,#cancleRuleBtn").css("display","inline-block");
	});
	$("#changeRuleBtn").on("click",function(){
		$("#currentRule,#changeRuleBtn").hide();
		var title = $("#currentRule").text(),
		    rule_id =  $("#currentRule").attr("rule_id");
		$("#ruleSelected").attr("data-value",rule_id).text(title);
		$(".select-rule,#bindRuleBtn,#cancleRuleBtn").css("display","inline-block");	
	});
	$("#cancleRuleBtn").on("click",function(){
		var printClick = parseInt($(this).attr("print-click"),10);
		$(".select-rule,#bindRuleBtn,#cancleRuleBtn").hide();
		if (printClick) {
			$("#printRuleBtn").show();
			return false;
		}
		$("#currentRule,#changeRuleBtn").show();
	});
	$("#bindRuleBtn").on("click",function(){
		var $that = $(this),
		    id = parseInt($("#ruleSelected").attr("data-value"),10),
		    status = 4,
		    title = $("#ruleSelected").text();
		if (id === 0) {
			pop("请选择打印规则",1);
			return false;
		}
		QR.updateStatus({
			data:{id:id,status:status},
			beforeSend:beforeSendFn
		}).done(function(){
			$(".select-rule,#bindRuleBtn,#cancleRuleBtn").hide();
			$("#currentRule").text(title).attr("rule_id",id);
			$("#currentRule,#changeRuleBtn").show();
			$that.html("确定");
		}).fail(function(){
				
		});
		
		function beforeSendFn() {
			$that.html("正在绑定规则...");
			$("#cancleRuleBtn").on("click",function(){
				return false;	
			})
		}
	})
	
//	状态的修改
	$("#pageContent").on("click",".status_switch",function(){
		var	$that = $(this),
			status = parseInt($(this).attr("status"),10),
			id = $(this).attr("rule_id"),
			statusText = status === 1 ? "开启":"关闭",
			changeStatusText = status === 1 ? "关闭":"开启";
		QR.updateStatus({
			data:{id:id,status:status},
			beforeSend:beforeSendFn
		}).done(function(){
			$that.attr("status",Math.abs(3-status)).html(changeStatusText);
			console.log($that.prev(".status_text"))
			$that.prev(".status_text").text('已'+statusText);
		}).fail(function(){
			$that.html(statusText);
			pop(statusText+"规则失败",1);
		});
		function beforeSendFn(){
			$that.html("正在"+statusText+"...");
		}
	});
	
	$("#pageContent").on("click",".del_btn",function(){
		
		var	$that = $(this),
			status = parseInt($(this).attr("status"),10),
			id = parseInt($(this).attr("rule_id"),10),
			qrcode_type = parseInt($(this).attr("qrcode_type")),
			parentEle = $that.parent();
		var 	printID = parseInt($("#currentRule").attr("rule_id"),10);
		var promText = '是否确定删除？'
		if (id === printID) {
			promText = "删除的规则正在打印，是否确定删除？";
		}
		pop(promText,2,function(){
			$("#popbox").hide();
			QR.updateStatus({
				data:{id:id,status:status},
				beforeSend:beforeSendFn
			}).done(function(){
				parentEle.html("删除成功").delay(5000).parents("tr").fadeOut("slow",function(){
					$(this).remove();	
				});
				if (id === printID) {
					$("#ruleSelected").attr("data-value","").text("请绑定打印规则");
					$("#bindRuleBtn,#currentRule,#changeRuleBtn").hide();
					$("#currentRule").text("");
					$("#printRuleBtn").show();
				}
				if (qrcode_type=== 1) {
					$("#ruleOptions p[data-value="+id+"]").remove();
				}
			}).fail(function(msg){
				if (msg) {
					pop(msg,1);
				}
				parentEle.html($that);
			});	
		});	
		
		
		function beforeSendFn(){
			parentEle.html("正在删除...");
		}
	});
//	规则详情查看
	$("#pageContent").on("click",".rule_btn",function(){
            var basics_id = $(this).attr("basics_id"),
                type = $(this).attr("type");
		QR.qrDetail({
			data:{
				id:basics_id,
				type:2
			}	
		}).done(function(data){
			var list = data.list,
			    len = list.length,
			    html = '';
			for(var i = 0;i<len;i++){
				var role = parseInt(list[i].role,10),
				    basics_id = parseInt(list[i].basics_id,10),
				    role_text = role === 1 ? "推广者" : "参与者";
				
				Interact.ruleDetail(3,{
					type:type,
					basics_id:basics_id
				},false,function(){
					$("#rules_details_con").html("<img src='/public/images/load20.gif'>正在加载...")
				}).done(function(result,options){
					html += '<h3>'+role_text+'</h3>';
					html += options.basics_html;
				});
			}
			
			$("#rules_details_box").html(html).show();
		}).fail(function(msg){
			if(msg){
				$("#rules_details_box").html(msg).show();
			}	
		});
        });
	
	$("#pageContent").on("click",".getqrcode_btn",function(){
		$("#noOrderQrcode,#orderQrcode").hide();
		var qrcode_link = $(this).attr("qrcode_link"),
		    title = $(this).attr("title");
		if (!qrcode_link) {
			$("#orderQrcode").show();
			$("#getQrcode").show();
			return false;
		}
		$("#noOrderQrcode").show();
		$("#qrcodeImg").attr("src",qrcode_link);
		$("#qrcodeValue").val(qrcode_link);
		$(".qrcodeact-name").text(title);
		$("#getQrcode").show();
	});
	
//	复制链接
	ZeroClipboard.setMoviePath( '/public/js/ZeroClipboard.swf' );  //和ZeroClipboard.js不在同一目录需设置setMoviePath  
        ZeroClipboard.setMoviePath( '/public/js/ZeroClipboard10.swf' ); 
	var clip = new ZeroClipboard.Client();
        clip.setHandCursor( true );
        clip.setText('');
        clip.addEventListener('complete', function () {
		$("#create_link_box").hide();
		pop('复制成功');
        });
        clip.glue('d_clip_button','d_clip_buttonBox');
	$("#copyLink").on('mouseenter',function() {
		clip.setText($('#qrcodeValue').val());
		var leftx = $(this).offset().left,
                topy = $(this).offset().top,
                _w = $(this).width()+40,
                _h = $(this).height()+2;
		$("#d_clip_buttonBox").css({'left':leftx,'top':topy, 'width':_w, 'height':_h});
        });
	
});
