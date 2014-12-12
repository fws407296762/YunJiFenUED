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
                <a href="" class="amn-cur">微信图文</a><a href="/weChat/createSeniorMsg.php">高级图文</a>
            </div>
            <div class="amb-main">
               <div class="ambm-preview fl">
                   <div class="ambm-cont">
                       <div id="appmsgItem1" class="js-appmsg-item ambm-first">
                           <div class="cover-appmsg">
                               <h4 class="appmsg-title">标题</h4>
                               <p class="appmsg-date mtop5">2014/12/8</p>
                               <div class="appmsg-thum mtop5">封面图片</div>
                               <div class="appmsg-edit-mask">
                                   <a onclick="return false;" class="icon-wc-edit js-edit" data-id="1" href="javascript:;">编辑</a>
                               </div>
                           </div>
                       </div>
<!--                       <div id="appmsgItem2" class="js-appmsg-item ambm-item">-->
<!--                           <i class="default-thumb">缩略图</i>-->
<!--                           <h4 class="appmsg-title">标题</h4>-->
<!--                           <div class="appmsg-edit-mask">-->
<!--                               <a onclick="return false;" class="icon-wc-edit js-edit" data-id="2" href="javascript:;">编辑</a>-->
<!--                               <a onclick="return false;" class="icon-wc-delete js-del" data-id="2" href="javascript:;">删除</a>-->
<!--                           </div>-->
<!--                       </div>-->
                   </div>
                   <div class="appmsg-action">
                       <a href="" class="ama-read">阅读全文</a>
                       <a class="appmsg-add" id="appMsgAddBtn">+新增一条</a>
                   </div>
               </div>

               <div class="ambc-edit multi-edit fl">
                   <span class="arrow-box">
                       <i class="arrow arrow_out"></i>
                       <i class="arrow arrow_in"></i>
                   </span>

                   <dl class="edit-item">
                       <dt>标题</dt>
                       <dd><input class="input28" type="text" name="" id="title"/></dd>
                   </dl>
                   <dl class="edit-item">
                       <dt>作者 <em class="remind">（选填）</em></dt>
                       <dd><input class="input28" type="text" name="" id="author"/></dd>
                   </dl>
                   <dl class="edit-item">
                       <dt>封面 <em class="remind">（大图片建议尺寸：900像素 * 500像素）</em></dt>
                       <dd>
                           <div class="ei-img-action"><a class="ei-add-img" href="">+添加图片</a></div>
                           <div class="edit-thumb hide"><img id="etImg" src="" alt=""/><a
                                   id="deleteImg">删除</a></div>
                           <div class="edit-tips mtop20">
                               <label for="editShow" class="eidt-show-text"><input type="checkbox" name="" id="picType" class="eidt-show"/>封面图片显示在正文中</label>
                           </div>
                       </dd>
                   </dl>
                   <div class="edit-tips add-abstract mtop20"><a id="addAbstractBtn">添加摘要</a></div>
                   <dl id="editDescription" class="edit-item hide">
                       <dt>摘要</dt>
                       <dd>
                           <textarea name="" id="description" cols="30" rows="10"></textarea>
                           <p class="limt-str-len des-num-box">还能输入<em id="descriptionNum">120</em>字</p>
                       </dd>
                   </dl>
                   <dl class="edit-item">
                       <dt>正文</dt>
                       <dd>
                           <textarea id="content" name="content"></textarea>
                           <p class="limt-str-len">还能输入 <em id="eidtConNum">10000</em>个字 </p>
                       </dd>
                   </dl>
                   <dl class="edit-item">
                       <dt></dt>
                       <dd>
                           <p id="linkBox"><input class="input28" type="text" name="" id="url"/></p>
                           <a id="setLink">设置链接到的页面地址 <em class="set-arrow"></em></a>
                           <div id="selectLinkBox" class="select-link-box">
                               <a >百度</a>
                               <a>腾讯 </a>
                               <a>谷歌</a>
                               <a>新浪</a>
                               <a>珠穆朗玛峰</a>
                           </div>
                       </dd>
                   </dl>
               </div>
           </div>
            <a class="bigbtn bigbtn_focus" id="saveBtn">保存</a>
        </div>
    </div>
    <!-- footer start -->
    <?php include("/../base/footer.php") ?>
    <!-- footer end -->
</div>
<script charset="utf-8" src="/public/plugins/kindeditor-4.1.10/kindeditor-min.js"></script>
<script charset="utf-8" src="/public/plugins/kindeditor-4.1.10/lang/zh_CN.js"></script>
<script src="/public/js/jquery.mockjson.js"></script>
<script src="/public/js/weChat/weCreate.js"></script>
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