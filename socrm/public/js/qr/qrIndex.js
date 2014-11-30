/* 
 * 已创建码上推规则列表
 * 依赖JS文件：qrData.js
 * fuwensong
 * */

$(function(){
	if(true){
		$.mockJSON.data.LINK = [
		    'http://www.baidu.com', 'http://www.qq.com', 'http://www.taobao.com', 'http://www.meituan.com'
		];
		$.mockJSON.data.QRCODE_LINK = [
		    'http://gtms02.alicdn.com/tps/i2/TB14ng8GFXXXXXJXFXXvKyzTVXX-520-280.jpg', 'http://i.mmcdn.cn/simba/img/TB1VQ9SGpXXXXcpaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1a504GFXXXXbMaXXXSutbFXXX.jpg', 'http://i.mmcdn.cn/simba/img/TB1V8I5GXXXXXcYXFXXSutbFXXX.jpg'
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
	}
	QR.qrcodeList({  //加载已创建的规则
		data:{ps:DEFAULT_PS,p:DEFAULT_P},
		box:$("#pageContent"),
		beforeSend:function(){
			$("#pageContent").html(tabProm(6,'<img src="/public/images/load20.gif">正在加载...'));
		}
	});	
	
});
