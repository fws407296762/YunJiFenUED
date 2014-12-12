<!doctype html>
<html lang="en">
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
                <a href="/weChat/createWcMsg.php">微信图文</a><a href="" class="amn-cur">高级图文</a>
            </div>
            <div class="amb-main">
               <div class="ambm-preview fl">
                   <div class="ambm-cont">
                       <div class="js-appmsg-item ambm-first">
                           <div class="cover-appmsg">
                               <h4 class="appmsg-title">标题</h4>
                               <p class="appmsg-date mtop5">2014/12/8</p>
                               <div class="appmsg-thum mtop5">封面图片</div>
                               <div class="appmsg-edit-mask">
                                   <a onclick="return false;" class="icon-wc-edit" href="javascript:;">编辑</a>
                               </div>
                           </div>
                       </div>
                       <div class="js-appmsg-item ambm-item">
                           <i class="default-thumb">缩略图</i>
                           <h4 class="appmsg-title">标题</h4>
                           <div class="appmsg-edit-mask">
                               <a onclick="return false;" class="icon-wc-edit" href="javascript:;">编辑</a>
                               <a onclick="return false;" class="icon-wc-delete" href="javascript:;">删除</a>
                           </div>
                       </div>
                   </div>
                   <div class="appmsg-action">
                       <a href="" class="ama-read">阅读全文</a>
                       <a class="appmsg-add" id="appMsgAddBtn">+新增一条</a>
                   </div>
               </div>
               <div class="ambc-eidt fl">
                   <span class="arrow-box">
                       <i class="arrow arrow_out"></i>
                       <i class="arrow arrow_in"></i>
                   </span>

                   <dl class="edit-item">
                       <dt>标题</dt>
                       <dd><input class="input28" type="text" name="" id=""/></dd>
                   </dl>
                   <dl class="edit-item">
                       <dt>封面 <em class="remind">（大图片建议尺寸：900像素 * 500像素）</em></dt>
                       <dd>
                           <div class="ei-img-action"><a class="ei-add-img" href="">+添加图片</a></div>
                           <div class="edit-thumb hide"><img id="etImg" src="http://gtms02.alicdn.com/tps/i2/TB1FsYoGVXXXXaRXXXXvKyzTVXX-520-280.jpg" alt=""/><a
                                   id="deleteImg">删除</a></div>
                       </dd>
                   </dl>
                   <dl class="edit-item">
                       <dt>摘要</dt>
                       <dd>
                           <textarea name="" id="editAbstract" cols="30" rows="10"></textarea>
                           <p>还可以输入 <em id="abstractNum">200</em> 字</p>
                       </dd>
                   </dl>
                   <dl class="edit-item">
                       <dt></dt>
                       <dd class="whereLink">
                            <span class="link-tip">链接到：</span>
                           <div id="links">
                               <p id="selectedLinkBox"><input type="text" class="input28" name="" id="selectedLink"/></p>
                               <a href="">自定义链接</a><a href="">VIP中心各类链接</a><a href="">品牌资讯</a>
                               <a id="otherLinks">其它<em class="set-arrow"></em></a>
                           </div>
                       </dd>
                   </dl>
               </div>
           </div>
            <a class="bigbtn bigbtn_focus" id="saveBtn">保存</a>
            <a href="" id="mobilePreview">手机浏览</a>
        </div>
    </div>
    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<script>
    $(function(){
        autoImg({
            image:$("#etImg"),
            maxwidth:200,
            maxheight:100
        })
        function autoImg(options){
            var img = options.image[0],
                mw = options.maxwidth,
                mh= options.maxheight;
            img.onload = function(){
                var iw = parseInt(this.width,10),
                    ih = parseInt(this.height,10);
                if(iw > mw){
                    img.style.width = mw+"px";
                    img.style.height = mw/iw*ih+'px';
                }else if(ih > mh){
                    img.style.height = mh+"px";
                }
                options.callback && options.callback();
            }
        }
    });
</script>
</body>
</html>