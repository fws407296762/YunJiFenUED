var DEFAULT_PS = 20,DEFAULT_P = 0;

var tabProm = function(colspan,promtext,isreload){
	var reload = !!isreload ? '，<a id="reload">重新请求</a>' : '';
	return '<tr><td align="center" colspan='+parseInt(colspan,10)+' height="50">'+promtext+reload+'</td></tr>';
};
var PROM_TEXT = {
	nodata:"暂无数据",
	server_fail:"服务器加载失败",
}

/*
*	接口文档：云貅SOCRM接口文档；后台负责人：黄贺；前端负责人：付文松
*/
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
		var dtd = $.Deferred();
		that.args = arguments.callee;
		QR.ajax({
			url:"/qrcode/qrcodeList",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
			//getdata = eval("("+getdata+")"),
			var	code = parseInt(getdata.code);
			if(code){
				options.box.html(tabProm(6,getdata.msg,true));
				dtd.reject(getdata.msg);
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
				var print_stat = parseInt(list[i].print_stat,10);
				html += '<tr print_stat='+print_stat+'>';
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
					html += '<td scope="col"><div class="pdlr10 inter_action"><a basics_id='+list[i].id+' type="1" class="rule_btn">规则详情</a><a class="edit_btn" href="/qrcode/create?id='+list[i].id+'">编辑</a><a class="report_btn" href="/qrcode/report?id='+list[i].id+'">查看报表</a><a class="getqrcode_btn" title='+list[i].title+'  qrcode_link='+list[i].qrcode_link+'>获取二维码</a><span><a class="del_btn" rule_id='+list[i].id+' status="3" qrcode_type='+list[i].qrcode_type+'>删除</a></span></div></td>';
					var statusClass = parseInt(list[i].status) ? "已开启" : "已关闭";
					html += '<td scope="col"><div class="pdlr10"><a class="status_text petitebtn petitebtn_focus">'+statusClass+'</a><a rule_id='+list[i].id+' status='+(Math.abs(parseInt(list[i].status)+1))+' class="status_switch petitebtn mleft5">'+(parseInt(list[i].status) ? '关闭':'开启')+'</a></div></td>';
				html += '</tr>';
				
			}
			options.box.html(html);
			dtd.resolve(data);
		})
		.fail(function(){
			options.box.html(tabProm(6,PROM_TEXT.server_fail,true));
			dtd.reject();
		});
		$("#rightcon").on("click","#reload",function(){
			that.args(options);
		});
		return dtd;
	},
/*
*  更新码上推规则状态
*  @parm
*  data:
*  	id：活动id
*  	status:状态 1开启，2关闭，3删除，4 更改打印规则
*  beforeSend：加载样式
*/
	updateStatus:function(options){
		var that = this;
		that.args = arguments.callee;
		var dtd = $.Deferred();
		QR.ajax({
			url:"/qrcode/updateStatus",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
			//getdata = eval("("+getdata+")"),
			var	code = parseInt(getdata.code);
			if(code){
				dtd.reject(getdata.msg);
				return false;
			}
			dtd.resolve();
		}).fail(function(){
			dtd.reject();
		});
		return dtd;
	},
/*
*  更新码上推规则状态
*  @parm
*  data:
*  	id：活动id
*  	type:1获取活动基本信息，2活动规则详细信息
*  beforeSend：加载样式
*/
	qrDetail:function(options){
		var dtd = $.Deferred();
		QR.ajax({
			url:"/qrcode/qrDetail",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
			/*getdata = eval("("+getdata+")")*/
			var	code = parseInt(getdata.code);
			if(code){
				dtd.reject(getdata.msg);
				return false;
			}
			var data = getdata.data;
			dtd.resolve(data);
		}).fail(function(){
			dtd.reject();
		});
		return dtd;
	},
	createQr:function(options){
		var dtd = $.Deferred();
		QR.ajax({
			url:"/qrcode/createQr",
			data:options.data,
			beforeSend:options.beforeSend
		}).done(function(getdata){
			var getdata = eval("("+getdata+")"),
				code = parseInt(getdata.code);
			if(code){
				dtd.reject(getdata.msg);
				return false;
			}
			dtd.resolve();
		}).fail(function(){
			dtd.reject();
		});
		return dtd;
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
	},
	verifi:function(){
		
	}
};

