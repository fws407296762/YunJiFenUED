/**
 * Created by 付文松 on 14-8-20.
 */
var Interact = {
    CUR_P:0, //获取当前在第几页，默认是第一页，在loadPage函数中获取到当前页码数
    _badge_loaded:0,
//    加载互动行为列表
    interactList:function(options){
        var This = this;
        This.argsCaller = arguments.callee;
		var deferred = $.Deferred();
        pop("正在加载...",0);
        $.ajax({
            url:"/interact/list",
            type:"get",
            data:options.data,
            cache:false,
            error:function(){
                pop("服务器请求失败，是否重试？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
			$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
					var tr = '';
                if(code === 0){
                    var data = getdata.data,
                        totalnum = data.totalnum,
                        list = data.list,
                        listLen = list.length;
                    if(listLen > 0){
                        
                        for(var i = 0;i<listLen;i++){
                            tr += '<tr>';
                                tr += '<td scope="col"><div class="pdlr10">'+list[i].add_time+'</div></td>';
                                tr += '<td scope="col"><div class="pdlr10">'+list[i].interact_name+'</div></td>';
                                tr += '<td scope="col"><div class="pdlr10">'+(list[i].open_time || "暂未生效")+'</div></td>';
                                var basics_rule = parseInt(list[i].basics_rule);
                                tr += '<td scope="col"><div class="pdlr10">'+(basics_rule > 0 ? (list[i].basics_title || "规则名暂无") : "未绑定")+'</div></td>';
                                tr += '<td scope="col"><div class="pdlr10 inter_action">';
									var is_show = 'hide';
                                    switch(parseInt(list[i].interact_type)){
                                        case 1:
											
											if(parseInt(list[i].basics_rule) === 0){
												
												tr += '<a class="bind_rule '+is_show+'" interact_id="'+list[i].id+'" basics_id="'+list[i].basics_rule+'">绑定规则</a>';
											}else{
												tr += '<a class="rule_btn" type="1" basics_id="'+list[i].basics_rule+'">规则详情</a>';
											}
                                        break;
                                        case 2:
												if(parseInt(list[i].basics_rule) === 0){
													is_show = "show";
													tr += '<a class="bind_rule '+is_show+'" interact_id="'+list[i].id+'" basics_id="'+list[i].basics_rule+'">绑定规则</a><a class="del_rule" interact_id="'+list[i].id+'" basics_id='+list[i].basics_rule+'>删除</a>';
												}else{
													 tr += '<a class="rule_btn" type="1" basics_id="'+list[i].basics_rule+'">规则详情</a><a class="createlink_btn" type="1" link="'+list[i].link+'" basics_id="'+list[i].basics_rule+'">生成链接</a><a class="cancel_btn" interact_id="'+list[i].id+'">取消绑定</a><a class="del_rule" basics_id='+list[i].basics_rule+' interact_id="'+list[i].id+'">删除</a>';
												}
                                        break;
                                    }
                                tr += '</div></td>';
                                tr += '<td scope="col"><div class="pdlr10"><a href="javascript:;" class="petitebtn petitebtn_focus">'+(parseInt(list[i].status,10) === 1 ? "已开启" : "已关闭")+'</a><a href="javascript:;" class="petitebtn mleft5 interact_status" interact_id='+list[i].id+(parseInt(list[i].status,10) === 1 ? " status=2>关闭" : " status=1>开启")+'</a></div></td>';
                            tr += '</tr>';
                        }
                        Interact.loadPage({
                            totalnum:totalnum,
                            ps:options.data.ps,
                            p:options.data.p,
                            callBack:This.argsCaller,
                            args:options,
							set_p:options.data
                        });
                    }else{
                        tr += '<tr><td colspan="6" align="center">暂无数据</td></tr>';
                    }
                    
					deferred.resolve();
                }else{
					 tr += '<tr><td>暂无数据</td></tr>';
				}
				$("#pageContent").html(tr);
            }
        });
		return deferred;
    },
//    规则详情
    ruleDetail:function(ruel_type,options,showCannelBtn){
        var html = '',This = this;
        This.argsCaller = arguments.callee;
		var ruel_type = parseInt(ruel_type);
		var deferred = $.Deferred();
		pop("正在加载...",0);
        $.ajax({
            url:"/interact/ruleDetail",
            type:'get',
            data:options,
			cache:false,
            error:function(){
                html += '数据请求失败,<a class="againCaller">点击重新请求</a>';
                $("#rules_details_con").html(html);
                $("body").off().on("click",".againCaller",function(){
                    This.argsCaller.apply(This,arguments);
                });
            },
            success:function(getdata){
				$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code),
                    data = getdata.data,
					result = {},
					basicsResult = {};
				var basics_html = '',specific_html = '';
                if(code === 0){
                    if((ruel_type&1)>0){
                        var basics_rule = data.basics_rule;
                        if(basics_rule){
							basicsResult = basics_rule;
                            basics_html += '<h3>基础规则</h3>';
                            basics_html += '<ul class="rules_details_list">';
                                basics_html += '<li>';
                                    basics_html += '<div class="rd_bg rb_list_box">';
                                        basics_html += '<div>';
                                            basics_html += '<span class="rd_text"><strong>基础规则名称：</strong>'+basics_rule.basics_title+'</span>';
                                            basics_html += '<span class="rd_text"><strong>频率：</strong>';
                                                switch(parseInt(basics_rule.frequency)){
                                                    case 0:
                                                        basics_html += '不限制';
                                                    break;
                                                    case 1:
                                                        basics_html += '仅一次';
                                                    break;
                                                    case 2:
                                                        basics_html += parseInt(basics_rule.days)+'天';
                                                    break;
                                                    case 3:
                                                        basics_html += '每天';
                                                    break;
                                                    case 4:
                                                        basics_html += '每周';
                                                    break;
                                                    case 5:
                                                        basics_html += '每月';
                                                    break;
                                                    case 6:
                                                        basics_html += '每季';
                                                    break;
                                                    case 7:
                                                        basics_html += '每年';
                                                    break;
                                                }
                                            basics_html += '</span>';
                                            basics_html += '<span class="rd_text"><strong>赠送积分类型：</strong>';
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
													limitText += '<span class="rd_text"><strong>连续每次增加：</strong>'+basics_rule.add_score+'积分</span>';
													limitText += '<span class="rd_text"><strong>最大连续次数：</strong>'+(parseInt(basics_rule.max_add) || "不限制")+'</span>';
													firstText = '首次互动';
                                                break;
                                            }
                                            basics_html += '</span>';
                                        basics_html += '</div>';
										basics_html += '<div class='+randomStatus+'>';
											basics_html += '<span class="rd_text"><strong>随机起止值：</strong>'+basics_rule.rand_score_s+'积分-'+basics_rule.rand_score_e+'积分</span>';
										basics_html += '</div>';
                                        basics_html += '<div class='+firstScore+'>';
                                            basics_html += '<span class="rd_text"><strong>'+firstText+'：</strong>'+basics_rule.score+'积分</span>';
											basics_html += limitText;
                                        basics_html += '</div>';
										var ip_limit_class = parseInt(basics_rule.ip_limit) === 0 ? "hide" : "";
                                        basics_html += '<div class='+ip_limit_class+'>';
                                            basics_html += '<span class="rd_text rd_limt_text"><strong>IP限制：</strong>多次互动，同一ID每天只记一次积分</span>';
                                        basics_html += '</div>';
                                    basics_html += '</div>';
                                basics_html += '</li>';
                            basics_html += '</ul>';
                        }
						html += basics_html;
                    }
                    if((ruel_type&2)>0){
                        var specific_rule = data.specific_rule;
						result = specific_rule;
                        if(specific_rule){
                            specific_html += '<h3 class="mtop10">个性化规则</h3>';
                            var srLen = specific_rule.length;
							if($.isArray(specific_rule)){
								if(srLen >0){
									specific_html += '<ul class="rules_details_list rules_self_list">';
									for(var i = 0;i<srLen;i++){
										specific_html += '<li>';
											specific_html += '<div class="rd_bg rb_list_box" style="position:relative;">';
												specific_html += '<div style="position:absolute;right: 10px;top: 5px;">';
													specific_html += '<span class="remind" style="display:inline;">绑定时间：'+specific_rule[i].bind_time+'</span>';
													var is_hide = showCannelBtn ? "hide" : "";
													specific_html += '<a class="cancel_binding '+is_hide+'" basics_id='+basics_rule.basics_id+' specific_id='+specific_rule[i].id+'>取消绑定</a>';
												specific_html += '</div>'
												specific_html += '<div>';
												var valid_type = parseInt(specific_rule[i].valid_type,10);
												var selfRuleDate = specific_rule[i].valid_sdate+'—'+specific_rule[i].valid_edate;
												if(valid_type == 0){
													selfRuleDate = '一直有效';
												}
													specific_html += '<span class="rd_text"><strong>个性化规则名称：</strong>'+specific_rule[i].specific_title+'</span>';
													specific_html += '<span class="rd_text"><strong>规则生效时间：</strong>'+selfRuleDate+'</span>';
												specific_html += '</div>';
												specific_html += '<div>';
													specific_html += '<span class="rd_text"><strong>互动发行时间：</strong>';
													switch(parseInt(specific_rule[i].happen_type)){
														case 0:
															specific_html += '不限';
														break;
														case 1:
															specific_html += '生日当天';
														break;
														case 2:
															specific_html += '生日前一周';
														break;
														case 3:
															specific_html += '生日当月';
															break;
														case 4:
															specific_html += '日期尾数：'+specific_rule[i].days;
															break;
														case 5:
															specific_html += '日期：'+specific_rule[i].days;
															break;
														case 6:
															specific_html += '星期几：'+specific_rule[i].days;
															break;
													}
													specific_html += '</span>';
												specific_html += '</div>';

												var rule_type = parseInt(specific_rule[i].rule_type);
												if(parseInt(specific_rule[i].rule_value) === -1){
													specific_html += '<div class="rd_medal">';
														specific_html += '<span class="rd_text"><strong>勋章与积分：</strong></span>';
														specific_html += '<div class="rd_medal_cont">';
															var badge_type = parseInt(specific_rule[i].badge_type);
															if(badge_type>0){
																var badge_list = specific_rule[i].badge_list;
																for(var j = 0;j<badge_list.length;j++){
																	specific_html += '<p>'+badge_list[j].badge_name+"－"+badge_list[j].rule_value+(rule_type === 1 ? "倍":"积分")+'</p>';
																}
															}else{
																specific_html += '<p style="line-height:25px;">未绑定</p>';
															}
														specific_html += '</div>';
													specific_html += '</div>';
												}else{
													specific_html += '<div>';
													specific_html += '<span class="rd_text"><strong>积分倍数或者积分值：</strong>'+specific_rule[i].rule_value+(rule_type === 1 ? "倍":"积分")+'</span>';
												specific_html += '</div>';
												}
												
											specific_html += '</div>';
										specific_html += '</li>';
									}
								}else{
									specific_html += '<li>暂无数据</li>';
								}
								specific_html += '</ul>';
							}else{
								var valid_type = parseInt(specific_rule.valid_type,10);
								specific_html += '<ul class="rules_details_list rules_self_list">';
									specific_html += '<li>';
										specific_html += '<div class="rd_bg rb_list_box">';
											specific_html += '<div>';
												specific_html += '<span class="rd_text"><strong>个性化规则名称：</strong>'+specific_rule.specific_title+'</span>';
												var selfRuleDate = specific_rule.valid_sdate+'—'+specific_rule.valid_edate;
												if(valid_type == 0){
													selfRuleDate = '一直有效';
												}
												specific_html += '<span class="rd_text"><strong>规则生效时间：</strong>'+selfRuleDate+'</span>';
											specific_html += '</div>';
											specific_html += '<div>';
												specific_html += '<span class="rd_text"><strong>互动发行时间：</strong>';
												switch(parseInt(specific_rule.happen_type)){
													case 0:
														specific_html += '不限';
													break;
													case 1:
														specific_html += '生日当天';
													break;
													case 2:
														specific_html += '生日前一周';
													break;
													case 3:
														specific_html += '生日当月';
														break;
													case 4:
														specific_html += '日期尾数：'+specific_rule.days;
														break;
													case 5:
														specific_html += '日期：'+specific_rule.days;
														break;
													case 6:
														specific_html += '星期几：'+specific_rule.days;
														break;
												}
												specific_html += '</span>';
											specific_html += '</div>';
											var rule_type = parseInt(specific_rule.rule_type);
											if(parseInt(specific_rule.rule_value) === -1){
												specific_html += '<div class="rd_medal">';
													specific_html += '<span class="rd_text"><strong>勋章与积分：</strong></span>';
													specific_html += '<div class="rd_medal_cont">';
														var badge_type = parseInt(specific_rule.badge_type);
														if(badge_type>0){
															var badge_list = specific_rule.badge_list;
															for(var j = 0;j<badge_list.length;j++){
																specific_html += '<p>'+badge_list[j].badge_name+"－"+badge_list[j].rule_value+(rule_type === 1 ? "倍":"积分")+'</p>';
															}
														}else{
															specific_html += '<p style="line-height:25px;">未绑定</p>';
														}
													specific_html += '</div>';
												specific_html += '</div>';
											}else{
												specific_html += '<div>';
													specific_html += '<span class="rd_text"><strong>积分倍数或者积分值：</strong>'+specific_rule.rule_value+(rule_type === 1 ? "倍":"积分")+'</span>';
												specific_html += '</div>';
											}
										specific_html += '</div>';
									specific_html += '</li>';
								specific_html += '</ul>';
							}
                        }
						html += specific_html;
                    }
                }else{
                    html += getdata.msg;
                }
            $("#rules_details_con").html(html);
			deferred.resolve(result,{basicsResult:basicsResult,basics_html:basics_html,specific_html:specific_html});  //result：个性化规则 的数据，basicsResult基础规则的数据，basics_html：基础规则的结构，specific_html：个性化规则的结构
            }
        });
		return deferred;
    },
//    分页加载以及回调函数的调用
   loadPage:function(options){
       var This = this;
        $("#pagination").show().pagination(options.totalnum,{
            current_page : options.p,
            items_per_page:options.ps,
            num_display_entries:0,
            num_edge_entries:0,
            callback:function(curpage,obj){
				options.set_p.p = curpage;
                options.callBack(options.args);
            }
        });
    },
/**
 * 获取需要绑定的列表
 * @parm
 *  url:请求的地址
 *  结构选用的是Base.js文件中的自定义下拉列表结构
 * */

    getBasicsRule:function(options){
        var html = '',This = this,element = options.element,errorElement = options.errorElement;
        This.argsCaller = arguments.callee;
        $.ajax({
            url:options.url,
            type:"get",
            data:null,
			cache:false,
            error:function(){
                html += '';
				pop("规则加载失败，是否重新加载？",2,function(){
					This.argsCaller(options);
				});
                
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code,10),
                    data = getdata.data;
                if(code === 0){
					if(data.length > 0){
						$("#popbox").hide();
						for(var i = 0;i<data.length;i++){
							if(data[i].basics_title){
								html += '<p data-value="'+data[i].id+'">'+data[i].basics_title+'</p>';
							}
							if(data[i].specific_title){
								html += '<p data-value="'+data[i].id+'">'+data[i].specific_title+'</p>';
							}
						}
						element.siblings("p").attr("data-value",data[0].id).html(data[0].specific_title ? data[0].specific_title : data[0].basics_title);
						element.html(html);
						$("#bind_rule_box").show();
						floatfoot();
					}else{
						pop("暂无规则",1);
					}
                }else{
					pop(getdata.msg,2,function(){
						This.argsCaller(options);
					});
                }
            }
        });
    },
/**
 * 绑定规则
 * @parm
 *  url：请求的地址
 *  interact_id：互动行为ID
 *  basics_id：basics_id
 *  load：加载提示语的容器
 *  error：错误提示语的容器
 *  callback：请求完成过后的执行的事件
 * */
    bindBasics:function(options,onlyCallback){
        var html = '',This = this;
        This.argsCaller = arguments.callee;
        options.load.show();
        $.ajax({
            url:options.url,
            type:"get",
            data:options.data,
			cache:false,
            error:function(){
                options.load.hide();
                html += '规则加载失败，<a class="againCaller">点击重新请求加载</a>';
                options.error.html(html).show();
                $("body").off().on("click",".againCaller",function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
                options.load.hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    options.error.hide();
                    $("#bind_rule_box").hide();
					if(onlyCallback){onlyCallback();return false;}
                    This[options.data.specific_id ? "getBasicsList":"interactList"](options.callbackArgs);
                }else{
					$("#bind_rule_box").hide();
					pop(getdata.msg,1);
                }
            }
        })
    },
//    删除规则
    delRule:function(options){
        var This = this,url = '',rule_id = {};
        This.argsCaller = arguments.callee;
		var deferred = $.Deferred();
        pop("正在删除...",0);
        if(options.basics_id){
            url = '/interact/delBasics'
            rule_id = {basics_id:options.basics_id};
        }
        if(options.specific_id){
            url = '/interact/delSpecific'
            rule_id = {specific_id:options.specific_id};
        }
        $.ajax({
            url:url,
            type:"get",
            data:rule_id,
			cache:false,
            error:function(){
                pop("删除失败，是否重试？",2,function(){
                    This.argsCaller(options);
                });
				deferred.reject();
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    pop("删除成功",0);
                    setTimeout(function(){
                       $("#popbox").hide();
                    },300);
					deferred.resolve(This.CUR_P);
                }else{
                    pop(getdata.msg,1);
                }
				
            }
        });
		return deferred;
    },
//    取消规则
    cancelRule:function(options,onlyCallback){
		pop("正在取消绑定...",0);
        var This = this,
            url = '',
            rule_id = {};
        This.argsCaller = arguments.callee;
        if(options.data.interact_id){
            url = '/interact/removeBasics';
        }
        if(options.data.specific_id && options.data.basics_id){
            url = '/interact/removeSpecific';
        }
        $.ajax({
            url:url,
            type:"get",
			cache:false,
            data:options.data,
            error:function(){
                pop("取消绑定失败，是否重试？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    pop("取消绑定成功",0);
                    setTimeout(function(){
						$("#popbox").hide();
						if(onlyCallback){onlyCallback(); return;}
						This[options.data.specific_id ? "getBasicsList":"interactList"](options.callbackArgs);
                    },300);
                }else{
                    pop(getdata.msg,1);
                }
            }
        })
    },
/*
    互动行为操作
    options{
    interact_id：互动行为ID
    status:
        1、开启；
        2、关闭；
        3、删除
    }
* */

    editAction:function(options){
        pop("正在操作...",0);
        var This = this;
        This.argsCaller = arguments.callee;
        $.ajax({
            url:"/interact/updateInteractStat",
            type:"get",
            data:options.data,
			cache:false,
            error:function(){
                pop("操作失败，是否重试？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    pop("操作成功",0);
					var status = parseInt(options.data.status,10),
						type = parseInt(options.type,10) || 0;
					if(type === 2){
						$("#popbox").hide();
						 if (status == 2) { /*0 关闭*/
							$("#enablebox").addClass("enable_closed");
						} else {
							$("#enablebox").removeClass("enable_closed");
						}
						options.callBackFun && options.callBackFun();
					}else{
						setTimeout(function(){
							This.interactList(options.callbackArgs);
						},300)
					}					
                }else{
                    pop(getdata.msg,1);
                }
            }
        })
    },
//    加载基础规则列表
    getBasicsList:function(options){
        pop("正在加载数据...",0);
        var This = this;
        This.argsCaller = arguments.callee;
		var deferred = $.Deferred();
        $.ajax({
            url:"/interact/basicsList",
            type:"get",
            data:options.data,
			cache:false,
            error:function(){
                pop("操作失败，是否重试？",2,function(){
                    This.argsCaller(options.data);
                });
            },
            success:function(getdata){
				$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    var data = getdata.data,
                        list = data.list,
                        listLen = list.length,
                        totalnum = parseInt(data.totalnum),
                        html = '';
					if(listLen >0){
						for(var i = 0;i < listLen; i++){
							var specific_list = list[i].specific_list,
								specific_list_len = specific_list.length;
							var specificHtml = "";
							var edit_show = 'hide';
							var interact_id = parseInt(list[i].interact_id,10);
							if(!interact_id){
								edit_show = "show"
							}
							html += '<tr basics_id="'+list[i].id+'">';
								specificHtml += '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="contTable">';
									specificHtml += '<tr>';
										specificHtml += '<td scope="col" width="150"><div class="pdlr10">'+list[i].add_time+'</div></td>';
										specificHtml += '<td scope="col" width="150"><div class="pdlr10">'+list[i].basics_title+'</div></td>';
										specificHtml += '<td scope="col" width="200"><div class="pdlr10">'+list[i].interact_str+'</div></td>';
										specificHtml += '<td scope="col" width="150"><div class="pdlr10"></div></td>';
										specificHtml += '<td scope="col" width="150"><div class="pdlr10"></div></td>';
										specificHtml += '<td scope="col" width="250"><div class="pdlr10"><a type="1" class="rule_btn" basics_id="'+list[i].id+'">规则详情</a><a href="/interact/addBasics?basics_id='+list[i].id+'" class="eidt_btn mleft5 '+edit_show+'" basics_id="'+list[i].id+'">编辑</a><a class="bind_rule mleft5"  basics_id="'+list[i].id+'">绑定个性化规则</a><a class="del_rule mleft5 '+edit_show+'" basics_id="'+list[i].id+'" isbind='+(list[i].interact_str=="" ? 0 : 1) +'>删除</a></div></td>';
									specificHtml += '</tr>';
								specificHtml += '</table>';
								if(specific_list_len > 0){
								for(var j = 0;j < specific_list_len;j++){
									specificHtml += '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="contTable selfTab">';
										specificHtml += '<tr class="formset">';
											specificHtml += '<td width="150"></td>';
											specificHtml += '<td width="150"></td>';
											specificHtml += '<td  width="200"></td>';
											specificHtml += '<td width="150"></td>';
											specificHtml += '<td width="150"></td>';
											specificHtml += '<td width="250"></td>';
										specificHtml += '</tr>';
										specificHtml += '<tr>';
										specificHtml += '<td colspan="3"></td>';
										specificHtml += '<td scope="col"><div class="pdlr10">'+specific_list[j].specific_title+'</div></td>';
										specificHtml += '<td scope="col"><div class="pdlr10">'+specific_list[j].bind_time+'</div></td>';
										specificHtml += '<td scope="col"><div class="pdlr10"><a class="cancel_binding" basics_id="'+list[i].id+'" specific_id="'+specific_list[j].specific_id+'">取消绑定</a></div></td>';
										specificHtml += '</ul></div></td>';
									specificHtml += '</tr></table>';
								}
								}
								html += '<td scope="col" colspan="6">'+specificHtml+'</td>';
								
								html += '';
							html += '</tr>';
							
						}
						Interact.CUR_P = options.data.p;
						Interact.loadPage({
							totalnum:totalnum,
							ps:options.data.ps,
							p:options.data.p,
							callBack:This.argsCaller,
							args:options,
							set_p:options.data
						});
					}else{
						html = '<tr><td colspan="6" align="center" style="height:36px">暂无数据</td></tr>'
					}
                    
					
					deferred.resolve();
                }else{
					html += '<tr><td colspan="6" align="center" style="height:36px">'+getdata.msg+'</td></tr>';
				}
				$("#pageContent").html(html);
            }
        });
		return deferred;
    },
	/* 
		获取基础规则信息
	*/
	getBasicsInfo:function(options){
		var deferred = $.Deferred();
		$.ajax({
			url:"/interact/getBasicsInfo",
			type:"get",
			cache:false,
			data:options.data,
			error:function(){
				deferred.reject();
			},
			success:function(getdata){
				var getdata = eval("("+getdata+")"),
					code = parseInt(getdata.code),
					result;
					
				if(code === 0){
					var data = getdata.data;
					result = {
						basics_id:data.basics_id,
						basics_title:data.basics_title,
						frequency:parseInt(data.frequency),
						days:data.days,
						score_type:data.score_type,
						score:data.score,
						rand_score_s:data.rand_score_s,
						rand_score_e:data.rand_score_e,
						add_score:data.add_score,
						max_add:data.max_add,
						ip_limit:data.ip_limit
					}
				}else{
					result = getdata.msg;
				}
				deferred.resolve(result);
			}
		});
		return deferred;
	},
    /**
     * 创建下拉选项
     * @parm
     *  options 中有三个参数
     *  box:选项的容器
     *  data:两种形式，一种是数字，那么data-value和text是相同的数字，一种是数组，形式:[{value:1,text:"XXXX"},{value:1,text:"XXXX"}]
     *  start，这个参数是针对数字形式的，从几开始，比如data传入9，start传入2，则从2开始计算，一直循环到9，也就是2、3、4、5、6、7、8、9,生成8行数据，如果不填写，默认从0开始
     * */
    createOptions:function(options){
        var text = '';
        if($.isArray(options.data)){
            var len = options.data.length;
            if(len > 0){
                for(var i = 0;i < len;i++){
                    text += '<p data-value="'+options.data[i].value+'">'+options.data[i].text+'</p>';
                }
                options.box.find(".seled").attr('data-value',options.data[0].value);
                options.box.find(".seled").text(options.data[0].text);
            }else{
                text = '暂无数据';
            }
        }
        if($.isNumeric(parseInt(options.data))){
            var data = options.data;
            if(data <= 0){
                text = '暂无数据';
                options.box.find(".selectlist").html(text);
                return false;
            }
            var i = parseInt(options.start) || 0
            options.box.find(".seled").attr('data-value',i);
            options.box.find(".seled").text(i);
            for(;i <= data;i++){
                text += '<p data-value="'+i+'">'+i+'</p>';
            }
        }
        options.box.find(".selectlist").html(text);
    },
    createBasics:function(options,callback){
        var This = this;
        This.argsCaller = arguments.callee;
		var deferred = $.Deferred();
        $.ajax({
            url:"/interact/createBasics",
            type:'get',
            data:options,
			cache:false,
            error:function(){
                deferred.reject()
            },
            success:function(getdata){
                var getdata = eval('('+getdata+')'),
                    code = parseInt(getdata.code);
                if(code === 0){
                    callback && callback();
                }else{
					pop(getdata.msg,1);
				}
				deferred.resolve()
            }
        });
		return deferred;
    },
    loadBadgeList:function(){       /* 获取勋章列表 */
		var $box = $("#badgelist ul"),
        loadImg = "<li><img src='/public/images/load20.gif' class='vermiddle' /> 加载中……</li>",
        isload = $box.attr('data-isload'),
		This = this;
        if( isload  && isload=='1' ) return false;
        $box.attr('data-isload','1').html(loadImg);
        $.ajax({
            url:'/basics/getBadgeList',
            data:{},
            type:'get',
            cache:false,
            error:function(XMLHttpRequest,textStatus,errorThrown){
                var errorStr = '<li>加载失败，请 <a style="cursor:pointer;">重新加载</a></li>';
                $box.attr('data-isload','0').html(errorStr)
                    .find("a").on('click',function(){
                        loadBadgeList();
                    });
            },
            success:function(getdata){
                if( typeof(getdata) == 'string' && getdata.indexOf('{')==0 ) var getdata = eval("("+getdata+")");
                var code = parseInt(getdata.code);
                if( code == 0 ){
                    var _list = getdata.data,
                        _len = _list.length,
                        _listhtml = '';
                    for( var i=0; i<_len; i++ ){
                        _listhtml += '<li data-id="'+_list[i].badge_id+'"><a href="javascript:;" class="badge_tag" data-name="'+_list[i].badge_name+'" data-id="'+_list[i].badge_id+'">'+_list[i].badge_name+'</a></li>';

                    }
                    if(_listhtml == ''){
                        _listhtml ='<li>没有勋章</li>';
                    }
                    $box.attr('data-isload','0').html(_listhtml);
                    This.badgeOrInfo();
                }else{
                    $box.attr('data-isload','0').html('<li>'+getdata.msg+'</li>');
                }

            }
        });
    },
    badgeOrInfo:function(){
    if(this._badge_loaded==1){
        $("#highMode").children('.fl:first').find('input').each(function(){
            var $this = $(this),
                thisid = $this.attr('data-id');
            $("#badgelist").find('li[data-id="'+thisid+'"]').find('a').addClass('badge_seltag');
        });
    }
},
    createSpecific:function(options){
		var deferred = $.Deferred();
        $.ajax({
            url:"/interact/createSpecific",
            type:"post",
			cache:false,
            data:options,
            error:function(){
				var text = "服务器创建失败，请重试";
				deferred.reject(text);
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code,10);
                if(code === 0){
					deferred.resolve();
                }else{
					deferred.reject(getdata.msg);
				}
            }
        });
		return deferred;
    },
    specificList:function(options){
        pop("正在加载数据...",0);
        var This = this;
        This.argsCaller = arguments.callee;
		var deferred = $.Deferred();
        $.ajax({
            url:"/interact/specificList",
            type:"get",
            data:options.data,
			cache:false,
            error:function(){
                pop("数据加载失败，是否重新加载？",2,function(){
                    This.argsCaller(options);
                });
				deferred.reject();
            },
            success:function(getdata){
			$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    var data = getdata.data,
                        totalnum = data.totalnum,
                        list = data.list,
                        len = list.length,
                        html = ''; 
					if(len>0){
						for(var i = 0;i < len;i++){
							html += '<tr>';
								html += '<td scope="col"><div class="pdlr10">'+list[i].add_time+' </div></td>';
								html += '<td scope="col"><div class="pdlr10">'+list[i].specific_title+' </div></td>';
								html += '<td scope="col"><div class="pdlr10">'+(list[i].basics_title || "未绑定基础规则")+' </div></td>';
								html += '<td scope="col"><div class="pdlr10"><a class="rule_btn" specific_id='+list[i].id+' type="2" basics_id="'+list[i].basics_id+'">规则详情</a><a class="del_rule mleft5" specific_id="'+list[i].id+'" basics_id="'+list[i].basics_id+'">删除</a></div></td>';
							html += '</tr>';
						}
						Interact.loadPage({
							totalnum:totalnum,
							ps:options.data.ps,
							p:options.data.p,
							callBack:This.argsCaller,
							set_p:options.data,
							args:options
						});
					}else{
						html += '<tr><td colspan="4" align="center">暂无数据</td></tr>';
					}
                    
                }else{
                    html += '<tr><td scope="col" colspan="4" align="center"><div class="pdlr10">'+getdata.msg+'</div></td></tr>';
                }
				options.box.html(html);
				deferred.resolve();
            }
        });
		return deferred;
    },
    reportSearch:function(options){
        pop("正在加载数据...",0);
        var This = this;
        This.argsCaller = arguments.callee;
        $.ajax({
            url:'/interact/reportSearch',
            type:"get",
            cache:false,
            data:options.data,
            error:function(){
                pop("数据加载失败，是否重新加载？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
				$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    var data = getdata.data,
                        totalnum = data.totalnum,
                        list = data.list,
                        len = list.length,
                        html = '';
                    if(len > 0){
                        for(var i = 0;i < len;i++){
                            html += '<tr>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].account+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].add_time+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].num+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].interact_name+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].score+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10"><a href="/interact/scoreList?memberid='+list[i].memberid+'&interact_id='+list[i].interact_id+'">查看</a></div></td>';
                            html += '</tr>';
                        }
						Interact.loadPage({
							totalnum:totalnum,
							ps:options.data.ps,
							p:options.data.p,
							callBack:This.argsCaller,
							set_p:options.data,
							args:options
						});
                    }else{
                        html += '<tr><td scope="col" colspan="6" align="center">暂无数据</td></tr>';
                    }
                }else{
                    html += '<tr><td scope="col" colspan="6" align="center">'+getdata.msg+'</td></tr>';
                }
                options.box.html(html);
				floatfoot();
            }
        });
    },
    searchByMember:function(options){
        pop("正在加载数据...",0);
        var This = this;
        This.argsCaller = arguments.callee;
        var deferred = $.Deferred();
        $.ajax({
            url:"/interact/searchByMember",
            type:"get",
            cache:false,
            data:options.data,
            error:function(){
                pop("数据加载失败，是否重新加载？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
			$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code);
                if(code === 0){
                    var data = getdata.data,
                        totalnum = data.totalnum,
                        interact_name = data.interact_name,
                        account = data.account,
                        list = data.list,
                        len = list.length,
                        html = '';
                    if(len > 0){
                        for(var i = 0;i<len;i++){
                            html += '<tr>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].add_time+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10">'+list[i].score+'</div></td>';
                                html += '<td scope="col"><div class="pdlr10"><a href="/interact/detail?id='+list[i].id+'">详情</a></div></td>';
                            html += '</tr>';
                        }
                        Interact.loadPage({
                            totalnum:totalnum,
                            ps:options.data.ps,
                            p:options.data.p,
                            callBack:This.argsCaller,
                            args:options,
							set_p:options.data
                        });
                    }else{
                        html += '<tr><td scope="col" colspan="3" align="center">暂无数据</td></tr>';
                    }
                    deferred.resolve({
                        interact_name:interact_name,
                        account:account
                    });
                }else{
                    html += '<tr><td scope="col" colspan="3" align="center">'+getdata.msg+'</td></tr>';
                }
                options.box.html(html);
            }
        });
        return deferred;
    },
    detailById:function(options){
        pop("正在加载数据...",0);
        var This = this;
        This.argsCaller = arguments.callee;
        var deferred = $.Deferred();
        $.ajax({
            url:"/interact/detailById",
            type:"get",
            cache:false,
            data:options.data,
            error:function(){
                pop("数据加载失败，是否重新加载？",2,function(){
                    This.argsCaller(options);
                });
            },
            success:function(getdata){
				$("#popbox").hide();
                var getdata = eval("("+getdata+")"),
                    code = parseInt(getdata.code), html = '';
                if(code === 0){
                    var data = getdata.data,
                        interact_name = data.interact_name,
                        account = data.account,
                        add_time = data.add_time,
                        list = data.list,
                        len = list.length;
                    if(len > 0){
                        for(var i = 0; i < len;i++){
                            html += '<tr>';
								html += '<td scope="col"><div class="pdlr10">'+list[i].remark+'</div></td>';
								html += '<td scope="col"><div class="pdlr10">'+list[i].score+'</div></td>';
                            html += '</tr>';
                        }
                    }else{
                        html += '<tr><td scope="col" colspan="2" align="center">暂无数据</td></tr>';
                    }
                    deferred.resolve({
                        interact_name:interact_name,
                        account:account,
                        add_time:add_time
                    });
                }else{
                    html += '<tr><td scope="col" colspan="2" align="center">'+getdata.msg+'</td></tr>';
                }
                options.box.html(html);
            }
        });
		return deferred
    }
};



