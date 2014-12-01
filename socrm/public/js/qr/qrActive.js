/*
*  创建或编辑码上推规则页面
*  依赖文件：qrData.js
*  author：fuwensong
*  date；2014-12-01
**/

$(function(){
    $.mockJSON.data.QRCODE_LINK = [
		    'http://gtms02.alicdn.com/tps/i2/TB14ng8GFXXXXXJXFXXvKyzTVXX-520-280.jpg', 'http://i.mmcdn.cn/simba/img/TB1VQ9SGpXXXXcpaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1a504GFXXXXbMaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1V8I5GXXXXXcYXFXXSutbFXXX.jpg',''
		];
    //		规则详情
		$.mockjax({
			url: '/qrcode/qrDetail',
			status:200,
			responseTime:750,
			responseText:$.mockJSON.generateFromTemplate({
				code:0,
				msg:'',
                                data:{
                                    title:"这是一个测试活动",
                                    "qrcode_type|1-2":1,
                                    "link":"@QRCODE_LINK"
                                }
			})
				
		})
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
   }
});