<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>手机VIP中心设置-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/sovipBack.css" />
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
$(function(){
    /*显示当前导航*/
    var $nav = $("#nav");
    $nav.find("a.subnav_mvip").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_zhuangxiu']").addClass("navlicur");

})
$(window).resize(function(){
    floatfoot();
});
</script>

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
        <div class="tabmenu">
            <a href="index.php">自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a class="tabmenu_cur" href="/design/alias">查询与报表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        <div class="h2_box mtop10">
            <h2 class="f18x">答卷有奖报表</h2>
        </div>
        
        <div class="s_conditionbox mtop15" id="condition-box">
            <input id="exsdate" readonly="readonly" type="text" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});">
            至 
            <input type="text" readonly="readonly" id="exedate" class="in_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'#F{$dp.$D(\'exsdate\')}'});">
            <a href="javascript:;" id="searchAll" class="smallbtn mleft5">查询</a>
            <a href="javascript:;" class="smallbtn mleft10" id="">导出查询结果</a>
            <a href="javascript:;" class="smallbtn mleft10" id="">导出所有未兑奖报表</a>
        </div>
        
        <div class="tablelist">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bdtable">
                 <thead>
                     <tr>
                         <th align="left" width="200px"><div class="pdlr10">会员ID</div></th>
                         <th align="left" width="300px"><div class="pdlr10">中奖时间</div></th>
                         <th align="left" scope="col"><div class="pdlr10">奖项名称</div></th>
                         <th align="left" width=""><div class="pdlr10">发奖备注</div></th>
                     </tr>
                 </thead>
                 <tbody id="list">
                    <tr>
                        <td>
                            <div class="pdlr10">1390039000</div>
                        </td>
                        <td>
                            <div class="pdlr10">2014-12-08 12:12:12</div>
                        </td>
                        <td>
                            <div class="pdlr10">xxxxxxxxxxxxxx</div>
                        </td>
                        <td>
                            <div class="pdlr10">已发奖</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="pdlr10">1390039000</div>
                        </td>
                        <td>
                            <div class="pdlr10">2014-12-08 12:12:12</div>
                        </td>
                        <td>
                            <div class="pdlr10">xxxxxxxxxxxxxx</div>
                        </td>
                        <td>
                            <div class="pdlr10"><a href="#" class="petitebtn open">发奖</a></div>
                        </td>
                    </tr>
                 </tbody>
            </table>
            <div id="pagination" class="pagebox"></div>  
        </div>

    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<script src="/public/plugins/My97DatePickerBeta/My97DatePicker/WdatePicker.js" type="text/javascript"></script>

<script src="/public/js/ajaxcrud.js"></script>
</body>
</html>