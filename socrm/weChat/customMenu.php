<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>自定义菜单-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/sovipBack.css" />
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
$(function(){
    /*显示当前导航*/
    var $nav = $("#nav");
    $nav.find("a.subnav_weixin").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_jiaohu']").addClass("navlicur");

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
            <a href="index.php">自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage" class="tabmenu_cur">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="report.php">查询与报表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        
        <div id="enablebox" class="enablebox ">
            <i class="enabledIcon">&nbsp;</i>
            <em class="en_txt enabletxt ">已开启</em>
            <em class="en_txt closetxt">已关闭</em>
            <span class="mleft5 fz14">由于微信接口延迟，自定义菜单修改后最长可能需要30分钟才会更新。如需即时查看，可先取消关注，再重新关注。</span>
            <div class="en_btnBox">
                <a href="javascript:enablefn(0);">关闭</a>
                <span class="en_stat" onclick="enablefn()">&nbsp;</span>
                <a href="javascript:enablefn(1);">开启</a>
                <img src="/public/images/load20.gif" alt="加载中" class="en_load" id="en_load">
            </div>
        </div>
        
        <div class="w-wrap position mtop20">
            <div class="m-example ct-box fl">
                <div class="tablelist m-footer">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bdtable">
                        <tbody>
                            <tr>
                                <td width="43px"><i class="menu-ico"></i></td>
                                <td align="center">标题</td>
                                <td align="center">标题</td>
                                <td align="center">标题</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="m-menu">
                    <ul>
                        <li>标题</li>
                        <li>标题</li>
                        <li>标题</li>
                    </ul>
                </div>
            </div>
            <div class="m-aside ct-box position fl">
                <div class="m-menu fl">
                    <div class="m-header pdlr10 clfix">
                        <a href="#" class="add-fmenu fr">+添加一级菜单</a>
                        菜单管理
                    </div>
                    <div class="m-menus">
                        <div class="m-mitem">
                            <h4 class="m-fname pdleft10">云积分产品</h4>
                            <ul>
                                <li>标题</li>
                                <li class="edit">
                                    <div class="ct-box">
                                        <div><input type="text" class="input25 menu-name w150" /></div>
                                        <div class="clfix mtop10 tar">
                                            <a href="#" class="petitebtn petitebtn_focus ok">确定</a>
                                            <a href="#" class="petitebtn cancel">取消</a>
                                        </div>
                                    </div>
                                </li>
                                <li>标题</li>

                            </ul>
                            <div class="mtop10">
                                <a href="#" class="add-smenu">添加二级菜单</a>
                            </div>
                        </div>
                        <div class="m-mitem">
                            
                        </div>
                    </div>
                </div>
                <div class="m-content fl">
                    <div class="m-header pdlr10 clfix">
                        <span class="fr">
                            <a href="#" class="w-function mright10 w-links">链接</a>
                            <a href="#" class="w-function mright10 w-imagetxt">图文</a>
                            <a href="#" class="w-function mright10 w-funclinks">VIP中心各类功能链接</a>
                            <div class="selectbox vermiddle">
                                <p class="seled" data-value="1">更多</p>
                                <span class="sanjiao_left"></span>
                                <div class="selectlist">
                                    <p data-value="1">更多</p>
                                    <p data-value="2">数据属性关键字</p>
                                    <p data-value="3">流程属性的关键字</p>
                                    <p data-value="4">品牌资讯</p>
                                </div>
                            </div>
                        </span>
                        设置动作
                    </div>
                    <div class="no-functions">
                        <?php include("/../base/weChatEditBox.php") ?>
                    </div>
                </div>
                <div class="caret-left">
                    <div class="caret-left-inner"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>

<script src="/public/js/ajaxcrud.js"></script>
</body>
</html>