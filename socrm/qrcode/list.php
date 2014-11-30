<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>异常监控-积分转账-SoCRM关系管理系统</title>
<link href="/public/css/base.css" rel="stylesheet">
<link href="/public/css/rules.css" rel="stylesheet">
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
    $(function(){
        /*显示当前导航*/
        var $nav = $("#nav");
        $nav.find("a.subnav_interaction").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
        $nav.find("a[name='nav_yx']").addClass("navlicur");

    })
    $(window).resize(function(){
        floatfoot();
    });
</script>
<style>
    .cbf_row{padding-left: 70px; height: 45px;}
    .cbf_row_title{float: left; display: inline; width: 70px; margin-left: -70px; line-height: 30px; text-align: left;}
    .tablelist{background: none;}
    .tablelist .h2_box{margin-bottom: 10px;}
</style>
</head>
<body>
<!-- leftbox start -->
<?php include("/../base/leftbox.php") ?>
<!-- leftbox end -->

<div id="rightbox" class="rightbox">
    <!-- topsearch start -->
    <?php include("/../base/topsearch.php") ?>
    <!-- topsearch end -->

    <div id="rightcon" class="clfix rightcon">
        <div class="tabmenu"><a href="/qrcode/interaction.php">码上推规则<i class="tabmenupic"></i></a><a href="/rules/interaction_base_rule.php">订单打印系统接入规范<i class="tabmenupic"></i></a><a href="/rules/interaction_self_rule.php" class="tabmenu_cur">查询与报表<i class="tabmenupic"></i></a>
				</div>
        <div class="mtop20 reportnumbox">
            <div class="cbf_row">
                <label for="" class="cbf_row_title">互动行为：</label>
                <div class="cbf_row_cont">
                    <div class=" selectbox fl">
                        <p class="seled" id="actions_selected" data-value="0">全部</p>
                        <span class="sanjiao_left"></span>
                        <div id="actions_list" class="selectlist">
                            <p data-value="1">全部</p>
                        </div>
                    </div>
                    <div id="selectUser" class=" selectbox fl hide">
                        <p class="seled" id="category_actions_selected" data-value="0">参与者</p>
                        <span class="sanjiao_left"></span>
                        <div id="category_actions_list" class="selectlist">
                            <p data-value="1">参与者</p>
                            <p data-value="2">推广者</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbf_row">
                <label for="" class="cbf_row_title">时间/会员：</label>
                <div class="cbf_row_cont clfix options-area">
                    <div class=" selectbox fl">
                        <p class="seled" id="options_selected" data-value="1">会员ID</p>
                        <span class="sanjiao_left"></span>
                        <div id="options_list" class="selectlist">
                            <p data-value="1">会员ID</p>
                            <p data-value="2">互动时间</p>
                            <p data-value="3">互动总次数</p>
                            <p data-value="4">某时段互动次数</p>
                        </div>
                    </div>
                    <div class="select_date fl hide" id="date_box">
                        <input type="text" id="sdate" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'});"> -
                        <input type="text" id="edate" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'sdate\')}'});">
                    </div>
                    <div class="select_date fl mleft10 hide" id="num_box">
                        <input type="text" class="input28 w152" id="snum" value="">—<input type="text" id="enum" class="input28 w152" value="">
                    </div>
                   <input class="input28 w180 fl" type="text" name="" placeholer="请输入手机号" id="account"/>
                    <a class="smallbtn fl mleft5 mright5" id="seach_btn" type="1">查询</a>
                    <a class="smallbtn fl" id="export_btn" type="2">导出</a>
                </div>
            </div>
        </div>

        <div class="mtop20 tablelist hide" id="noOrderTab">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th width="200" align="left" scope="col"><div class="pdlr10">会员ID</div></th>
                    <th align="left" scope="col"><div class="pdlr10">互动时间</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">累计互动总次数</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">所属互动行为</div></th>
                    <th align="left" scope="col"><div class="pdlr10">发放积分</div></th>
                    <th align="left" scope="col"><div class="pdlr10">操作</div></th>
                </tr>
                </thead>
                <tbody id="noOrderPageContent">
                    <tr>
                        <td scope="col"><div class="pdlr10">13670032987</div></td>
                        <td scope="col"><div class="pdlr10">2013-10-12 12：12</div></td>
                        <td scope="col"><div class="pdlr10">34</div></td>
                        <td scope="col"><div class="pdlr10">微淘签到</div></td>
                        <td scope="col"><div class="pdlr10">30</div></td>
                        <td scope="col"><div class="pdlr10"><a href="/rules/interaction_list_first.php">查看</a></div></td>
                    </tr>
                </tbody>
            </table>
            <div id="noOrderPagination" class="pagebox"></div>
        </div>
        
        <div class="mtop20 tablelist hide" id="extendsionTab">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th align="left" scope="col"><div class="pdlr10">会员ID</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">累计互动总次数</div></th>
                    <th align="left" scope="col"><div class="pdlr10">所属互动行为</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">发放积分</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">操作</div></th>
                </tr>
                </thead>
                <tbody id="extendsionPageContent">
                    <tr>
                        <td scope="col"><div class="pdlr10">13670032987</div></td>
                        <td scope="col"><div class="pdlr10">34</div></td>
                        <td scope="col"><div class="pdlr10">微淘签到</div></td>
                        <td scope="col"><div class="pdlr10">30</div></td>
                        <td scope="col"><div class="pdlr10"><a href="/rules/interaction_list_first.php">查看</a></div></td>
                    </tr>
                </tbody>
            </table>
            <div id="extendsionPagination" class="pagebox"></div>
        </div>
        
        <div class="mtop20 tablelist hide" id="categoryTab">
        	<div id="categoryBox" class="h2_box">
			    <h2><em id="categoryName">推广者</em>：<em id="accountId">13316465551</em></h2>
			</div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th width="200" align="left" scope="col"><div class="pdlr10">会员ID</div></th>
                    <th align="left" scope="col"><div class="pdlr10">互动时间</div></th>
                    <th align="left" scope="col"><div class="pdlr10">所属互动行为</div></th>
                    <th width="200" align="left" scope="col"><div class="pdlr10">发放积分</div></th>
                </tr>
                </thead>
                <tbody id="categoryPageContent">
                    <tr>
                        <td scope="col"><div class="pdlr10">13670032987</div></td>
                        <td scope="col"><div class="pdlr10">2013-10-12 12：12</div></td>
                        <td scope="col"><div class="pdlr10">微淘签到</div></td>
                        <td scope="col"><div class="pdlr10">30</div></td>
                    </tr>
                </tbody>
            </table>
            <div id="categoryPagination" class="pagebox"></div>
        </div>

    </div>


    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
    <input type="hidden" name="" id="id" value="<?php echo $id; ?>" />
</div>
</body>
<script src="/public/plugins/My97DatePickerBeta/My97DatePicker/WdatePicker.js" type="text/javascript"></script>
<script src="/public/js/interaction.js"></script>
<script>
    var ps = 20, p = 0;
    $(function(){
//      getAction();
        $("#options_list").on("click","p",function(){
            var val = parseInt($(this).attr("data-value"),10);
            $(".options-area").find('input[type="text"]').val("");
            $("#account")[val === 1 ? "show" : "hide"]();
            $("#num_box")[(val === 3 || val === 4) ? "show" : "hide"]();
            $("#date_box")[(val === 2 || val === 4) ? "show" : "hide"]();
        });
        var date = new Date();
        var edate = date.getFullYear()+"-"+((parseInt(date.getMonth())+1) < 10 ?  "0"+(parseInt(date.getMonth())+1) : (parseInt(date.getMonth())+1)) + "-" + date.getDate()+" "+(parseInt(date.getHours()) < 10 ? "0"+parseInt(date.getHours()):parseInt(date.getHours())) +":"+date.getMinutes(),
            sdateTime = date.getTime()-6*24*60*60*1000,
            start_date = new Date(sdateTime),
            sdate = start_date.getFullYear()+"-"+((parseInt(start_date.getMonth())+1) < 10 ?  "0"+(parseInt(start_date.getMonth())+1) : (parseInt(start_date.getMonth())+1)) + "-" + start_date.getDate()+" "+(parseInt(start_date.getHours()) < 10 ? "0"+parseInt(start_date.getHours()):parseInt(start_date.getHours())) +":"+start_date.getMinutes();
//      Interact.reportSearch({
//          type:1,
//          interact_id:0,
//          account:"",
//          sdate:sdate,
//          edate:edate,
//          snum:"",
//          enum:"",
//          ps:ps,
//          p:p
//      },$("#pageContent"));
        $("#seach_btn").on("click",function(){
            var type = $(this).attr("type"),
                interact_id = $("#actions_selected").attr("data-value"),
                account = $("#account").val(),
                sdate = $("#sdate").val(),
                edate = $("#edate").val(),
                snum = $("#snum").val(),
                enum_v = $("#enum").val();
            Interact.reportSearch({
                type:type,
                interact_id:interact_id,
                account:account,
                sdate:sdate,
                edate:edate,
                snum:snum,
                enum:enum_v,
                ps:ps,
                p:p
            },$("#pageContent"));
        });
    });
    function getAction(){
        var This = this;
        This.argsCaller = arguments.callee;
        $.ajax({
            url:"/interact/list",
            type:"get",
            data:{ps:20,p:0},
            error:function(){
               pop("互动行为加载失败,是否重新加载？",2,function(){
                   This.argsCaller();
               });
            },
            success:function(getdata){
                var getdata = eval("("+getdata+")"),
                    code = getdata.code;
                var data_ary = [];
                if(code === 0){
                    var data = getdata.data,
                        list = data.list,
                        len = list.length;
                    if(len > 0){
                        for(var i = 0;i<len;i++){
                            var data_obj = {};
                            data_obj.value = list[i].id;
                            data_obj.text = list[i].interact_name;
                            data_ary.push(data_obj);
                        }
                        Interact.createOptions({
                            box:$("#actions_list"),
                            data:data_ary
                        });
                    }else{
                        Interact.createOptions({
                            box:$("#actions_list"),
                            data:[{value:"0",text:"全部"}]
                        });
                    }
                }else{
                    pop(getdata.msg,2,function(){
                        This.argsCaller();
                    });
                }
            }
        });
    }
</script>
</html>