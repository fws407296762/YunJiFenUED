<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>图文素材管理-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/appmsg.css" />
<script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript"> if (typeof(jQuery) == 'undefined' || typeof($) == 'undefined') {document.write(unescape("%3Cscript src='/public/js/jquery-1.7.2.min.js' type='text/javascript'%3E%3C/script%3E")); } </script>
<script src="/public/js/base.js" type="text/javascript" ></script>
<script type="text/javascript" >
$(function(){
    /*显示当前导航*/
    var $nav = $("#nav");
    $nav.find("a.subnav_weixin").parent("li").addClass("subnav_cur").parents("ul").slideDown("fast",function(){ floatfoot(); });
    $nav.find("a[name='nav_jiaohu']").addClass("navlicur");
});
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
            <a href="javascript:;">自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage" class="tabmenu_cur" >图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        <div class="appmsg-box">
            <div id="amNav" class="am-nav">
                <a href="" class="amn-cur">微信图文</a><a href="">高级图文</a>
            </div>
            <div class="am-type-nav">
                <a href="">+单条图文</a><a href="">+多条图文</a>
            </div>
            <div class="am-tab mtop20">
                <div class="amt-title">
                    <div class="fr am-seach">
                        <input class="ts_input middle-inp" type="text" name="" placeholer="请输入关键字搜索" id="amsValue"/>
                        <a class="smallbtn smallbtn_focus mleft5" id="amsBtn">搜索</a>
                    </div>
                    <span class="amtt-text">图文消息共 <em id="amNum">5</em> 个</span>
                </div>
                <!-- 已创建的列表 开始 -->
                <div class="am-tab-list tablelist mtop20">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th align="left" scope="col"><div class="pdlr10">标题</div></th>
                                <th width="20%" align="left" scope="col"><div class="pdlr10">创建时间</div></th>
                                <th width="120" align="left" scope="col"><div class="pdlr10"></div></th>
                            </tr>
                        </thead>
                        <tbody id="pageContent">
                            <tr>
                                <td scope="col"><div class="pdlr10 amtl-title amtl-title-multi">
                                        <i class="icon-wc-msgtype amtl-msgtype">图文</i>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                </div></td>
                                <td scope="col"><div class="pdlr10">2014/12/3   19:00</div></td>
                                <td scope="col">
                                    <div class="pdlr10">
                                        <a class="am-edit icon-wc-edit" title="编辑"></a>
                                        <a class="am-delete icon-wc-delete" title="删除"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col"><div class="pdlr10 amtl-title">
                                        <i class="icon-wc-msgtype amtl-msgtype">图文</i>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                    </div></td>
                                <td scope="col"><div class="pdlr10">2014/12/3   19:00</div></td>
                                <td scope="col">
                                    <div class="pdlr10">
                                        <a class="am-edit icon-wc-edit" title="编辑"></a>
                                        <a class="am-delete icon-wc-delete" title="删除"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col"><div class="pdlr10 amtl-title amtl-title-multi">
                                        <i class="icon-wc-msgtype amtl-msgtype">图文</i>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                    </div></td>
                                <td scope="col"><div class="pdlr10">2014/12/3   19:00</div></td>
                                <td scope="col">
                                    <div class="pdlr10">
                                        <a class="am-edit icon-wc-edit" title="编辑"></a>
                                        <a class="am-delete icon-wc-delete" title="删除"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col"><div class="pdlr10 amtl-title">
                                        <i class="icon-wc-msgtype amtl-msgtype">图文</i>
                                        <p>积分赢大礼 <a href="">阅读全文</a></p>
                                    </div></td>
                                <td scope="col"><div class="pdlr10">2014/12/3   19:00</div></td>
                                <td scope="col">
                                    <div class="pdlr10">
                                        <a class="am-edit icon-wc-edit" title="编辑"></a>
                                        <a class="am-delete icon-wc-delete" title="删除"></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="pagination" class="pagebox"></div>
                </div>
                <!-- 已创建的列表 结束 -->
            </div>

        </div>
    </div>
    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<script type="text/javascript" src="/public/plugins/pagination/pagination.js"></script>
<script type="text/javascript" src="/public/js/weChat/weAppmsg.js"></script>
</body>
</html>