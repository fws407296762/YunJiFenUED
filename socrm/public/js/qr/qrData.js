var DEFAULT_PS = 20,DEFAULT_P = 0;

var tabProm = function(colspan,promtext,isreload){
	var reload = !!isreload ? '，<a id="reload">重新请求</a>' : '';
	return '<tr><td align="center" colspan='+parseInt(colspan,10)+' height="50">'+promtext+reload+'</td></tr>';
};
var PROM_TEXT = {
	nodata:"暂无数据",
	server_fail:"服务器加载失败",
}
var QR = {
	/* qrcodeList  加载已创建的规则
	 * @parm 
	 * data:ajax需要传的参数
	 * beforeSend：加载时样式
	 * box：存放数据列表的元素
	 * 
	 * */
	qrcodeList:function(options){
		var that = this;
		that.args = arguments.callee;
		QR.ajax({
			url:"/qrcode/qrcodeList",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
//			getdata = eval("("+getdata+")"),
			var code = parseInt(getdata.code);
			console.log(getdata)
			if(code){
				options.box.html(tabProm(6,getdata.msg,true));
				return false;
			}
			if(!getdata.data){return false;}
			var data = getdata.data;
			var totalnum = data.totalnum,
				list = data.list,
				len = list.length,
				html = '';
			if(!len){
				options.box.html(tabProm(6,PROM_TEXT.nodata));
				return false;
			}
			
			for(var i = 0;i<len;i++){
				html += '<tr>';
					html += '<td scope="col"><div class="pdlr10">'+list[i].add_time+'</div></td>';
					html += '<td scope="col"><div class="pdlr10">'+list[i].title+'</div></td>';
					var qrcode_type = parseInt(list[i].qrcode_type)=== 1 ? '订单相关' : '非订单相关';
					html += '<td scope="col"><div class="pdlr10">'+qrcode_type+'</div></td>';
					var score_rule_list = list[i].score_rule_list,
						score_rule_html = '';
					for(var j = 0;j<score_rule_list.length;j++){
						score_rule_html += '<p>'+(parseInt(score_rule_list[j].role) === 1 ? "推广者":"参与者")+":"+score_rule_list[j].rule_name+'</p>';
					}
					html += '<td scope="col"><div class="pdlr10">'+score_rule_html+'</div></td>';
					html += '<td scope="col"><div class="pdlr10 inter_action"><a ruld_id='+list[i].id+' class="rule_btn">规则详情</a><a class="edit_btn">编辑</a><a class="report_btn">查看报表</a><a class="obtain_btn" qrcode_link='+list[i].qrcode_link+'>获取二维码</a><a class="del_btn" status="3">删除</a></div></td>';
					var statusClass = parseInt(list[i].status) ? "已开启" : "已关闭";
					html += '<td scope="col"><div class="pdlr10"><a class="petitebtn petitebtn_focus">'+statusClass+'</a><a status='+(Math.abs(parseInt(list[i].status)+1))+' class="petitebtn mleft5">'+(parseInt(list[i].status) ? '关闭':'开启')+'</a></div></td>';
				html += '</tr>';
			}
			options.box.html(html);
		})
		.fail(function(){
			options.box.html(tabProm(6,PROM_TEXT.server_fail,true));
		});
		$("#rightcon").on("click","#reload",function(){
			that.args(options);
		});
	},
	updateStatus:function(options){
		var that = this;
		that.args = arguments.callee;
		QR.ajax({
			url:"/qrcode/updateStatus",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
			var getdata = eval('('+getdata+')'),
				code = parseInt(getdata.code);
			if(code){
				pop(getdata.msg+"是否重试？",2,function(){
					that.args(options);
				});
				return false;
			}
//			options.box.attr("status",)
		}).fail(function(){
			
		});
	},
	ajax:function(options){
		var dtd = $.Deferred();
		return $.ajax({
			url:options.url,
			type:options.type||"get",
			cache:false,
			data:options.data,
			beforeSend:options.beforeSend,
		});
	}
};

