<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>手机VIP中心设置-云貅VIP运营平台</title>
<link href="/public/css/base.css" rel="stylesheet">
<link rel="stylesheet" href="/public/css/sovipBack.css" />
<!-- <script src="http://cdn.bootcss.com/jquery/1.7.2/jquery.min.js" type="text/javascript" ></script> -->
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
            <a href="javascript:;" class="tabmenu_cur" >自动回复设置<i class="tabmenupic"></i></a><a href="/design/hd_manage">图文素材<i class="tabmenupic"></i></a><a href="/design/mall_manage">自定义菜单<i class="tabmenupic"></i></a><a href="/design/push_manage">已绑定会员列表<i class="tabmenupic"></i></a><a href="/design/alias">公众微信号绑定<i class="tabmenupic"></i></a>
        </div>
        <!--secondary menu-->
        <p id="badge_tab" class="badge_tab">
            <a href="index.php" class="cur" data-id="1">微信图文</a>&nbsp;&nbsp; | &nbsp;&nbsp;
            <a href="follow.php" data-id="2">高级图文</a>
        </p>
        <!--secondary menu end-->
        
        <div class="w-media underlinen">
            <div class="preview">
                <div class="example">
                    <div class="w-header">
                        <h4>这里是标题</h4>
                        <p class="graycolor">
                            2014-12-05
                        </p>
                    </div>
                    <div class="w-sheader">
                        <h4>标题</h4>
                        <div class="w-thumb">
                            
                        </div>
                    </div>
                    <div class="w-sheader">
                        <p class="add-header">
                            +新增一条
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-sidebar ct-box">
                <span class="caret"></span>
                <div class="form-group">
                    <label for="title">标题</label>
                    <input type="text" id="title" class="input25" />
                </div>
                <div class="form-group mtop10">
                    <label for="author">作者<span class="graycolor">（选填）</span></label>
                    <input type="text" id="author" class="input25" />
                </div>
                <div class="form-group mtop10">
                    <div class="cover hide">
                        <div class="cover-close"> <a href="#" class="delete">×</a> </div>
                        <img class="cover" src="" alt="图片" />
                    </div>
                    <a href="#" class="btn add-img">+添加图片</a>
                </div>
                <div class="form-group mtop10">
                    <label for="abstract">摘要</label>
                    <textarea name="abstract" id="abstract" cols="30" rows="10"></textarea>
                </div>
                <div class="main mtop10">
                    <label>正文</label>
                    <textarea name="" id="editor" cols="30" rows="10"></textarea>
                </div>
                <div class="links mtop10">
                    
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