/*
*  创建或编辑码上推规则页面
*  依赖文件：qrData.js
*  author：fuwensong
*  date；2014-12-01
**/

$(function(){
   var id = parseInt($("#id").val(),10);
   if (id > 0) {
        QR.qrDetail({
            data:{id:id,type:1},
            beforeSend:beforeSendfn
        }).done(function(data){
            $("#popbox").hide();
            var title = data.title,
                qrcode_type = parseInt(data.qrcode_type,10),
                link = decodeURIComponent(data.link);
            $("#activeName").val(title).attr("disabled",true).addClass(" disabled_input");
            var qrcode_text = "";
            switch(qrcode_type){
                case 1:
                    qrcode_text = "订单相关";
                    $("#orderProm").show();
                break;
                case 2:
                    qrcode_text = "非订单相关";
                    $("#qrLink").val(link).addClass(" disabled_input");
                    $("#noOrderProm").show();
                break;
            }
            $("#dataTyped").attr("data-value",qrcode_type).html(qrcode_text);
            $("#dataTypeBox").off("click").find(".sanjiao_left").hide();
        });
        $("#nextBtn").attr("href","/qrcode/create_rule.php");
        function beforeSendfn(){
            pop("正在加载数据...",0);
        }
        return false;
   }
   var dataType = parseInt($("#dataTyped").attr("data-value"),10);
    $("#noOrderProm").show();
   $("#dataTypeList").on("click","p",function(){
   		var dataValue = parseInt($(this).attr("data-value"),10);
   		$("#noOrderProm")[dataValue === 2 ? "show" : "hide"]();
   		$("#orderProm")[dataValue === 2 ? "hide" : "show"]();
   });
   $("#nextBtn").on("click",function(){
   		var that = $(this),
   			title = $("#activeName").val(),
   			qrcode_type = $("#dataTyped").attr("data-value"),
   			link = $("#qrLink").val();
   		var reg_html = /^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;
   		if(title == ""){
   			$("#createProm").addClass("error").html("请输入活动名称").show();
   			return false;
   		}
   		if(strLen(title) > 16){
   			$("#createProm").addClass("error").html("活动名称仅限16个字").show();
   			return false;
   		}
   		if($("#noOrderProm").is(":visible") && (link == "" || !reg_html.test(link)) ){
   			$("#createProm").addClass("error").html("请输入正确的网址").show();
   			return false;
   		}
   		QR.createQr({
   			data:{
   				title:title,
   				qrcode_type:qrcode_type,
   				link:link
   			},
   			beforeSend:function(){
   				$("#createProm").removeClass("error").show();
   			}
   		}).done(function(){
   			$("#createProm").removeClass("error").html('<img src="../public/images/admin/load20.gif" alt="" />正在创建...').hide();
   			location.href = '/qrcode/create_rule.php';
   		}).fail(function(msg){
   			$("#createProm").addClass("error").html(msg || "提交失败，请再试").show();
   		});
   });
});