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
                        <div class="ei-img-action">
                           <span id="uploadBox" class="" >
<!--                                <a href="javascript:;" class="ei-add-img" id="tipBtn">+添加图片</a>-->
                                <span id="uploadBtn" >
                                    <span id="upload_type1" class="upload_type" ><em id="spanButtonPlaceHolder"></em></span>
                                </span>
                                <img src="/public/images/load20.gif" style="display:none; margin:0px 0 0 30px;" id="upload_loadimg">
                                <div id="divStatus" class="hide">0 个文件已上传</div>
                           </span>
                            <input id="btnCancel" type="hidden" value="取消所有上传" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
                        </div>


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

<!--选择链接-->
<div id="vip-links" class="popbox hide">
    <div class="pop pop650">
        <div class="pop_hd">
            <strong class="pop_title">VIP中心各类功能链接</strong>
            <a href="javascript:hide('vip-links');" class="pop_hide"></a>
        </div>
        <div class="pop_bd">
            <div class="tablelist">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th align="left"><div class="pdlr10">关键字</div></th>
                        <th align="left" width="70px"><div class="pdlr10">操作</div></th>
                    </tr>
                    </thead>
                    <tbody id="viplinks-list">
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer/signin">签到</a></div></td>
                        <td><div class="pdlr10"><a data-id="1" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer/signin" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=exchange">兑换商城</a></div></td>
                        <td><div class="pdlr10"><a data-id="2" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=exchange" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#user-score">我的积分(积分记录)</a></div></td>
                        <td><div class="pdlr10"><a data-id="3" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#user-score" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#user-level">我的等级</a></div></td>
                        <td><div class="pdlr10"><a data-id="4" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myPrivilegeBtn">我的特权</a></div></td>
                        <td><div class="pdlr10"><a data-id="5" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myPrivilegeBtn" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myExchangeBtn">我的兑换</a></div></td>
                        <td><div class="pdlr10"><a data-id="6" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myExchangeBtn" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="pdlr10"><a target="_blank" href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myTagdBtn">我的标签</a></div></td>
                        <td><div class="pdlr10"><a data-id="7" data-href="http://vip.socrm.cn/?sid=OZ%2Fins8O3QU%3D&amp;ref=customer#myTagdBtn" href="#" class="selectvip petitebtn">选取</a></div></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="pop_text mtop10">
                <a href="javascript:hide('vip-links');" class="cancel smallbtn mleft5">取消</a>
            </div>
        </div>
    </div>
</div>
<!--    选择链接结束-->

<!--    图片选择开始  -->
<div id="albumBox" class="popbox hide">
    <div class="pop pop650">
        <div class="pop_hd">
                <span class="pop_title">
                    <a class="album-title album-active">用过的图片</a>
                    <a class="album-title">网络图片</a>
                </span>
            <a href="javascript:hide('albumBox');" class="pop_hide"></a>
        </div>
        <div class="pop_bd">
            <ul class="album-list">
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
                <li>
                    <a class="album-thumb"><img src="/public/images/weChat/1.jpg" alt=""/></a>
                    <span class="album-title">樱桃红了</span>
                    <span class="album-selected"><i class="icon-select"></i></span>
                </li>
            </ul>
            <div id="netImg" class="hide">
                <strong class="net-img-title">网络图片</strong>
                <p class="net-img-box"><input type="text" name="" id="" placeholder="请选择网络图片地址" class="input28"/></p>
                <a class="smallbtn smallbtn_focus">提取</a>
            </div>
            <?php include("/../base/pagination.php") ?>
            <div class="pop_text mtop10">
                <a href="javascript:hide('vip-links');" class="sure smallbtn smallbtn_focus mleft5">确定</a>
                <a href="javascript:hide('albumBox');" class="cancel smallbtn mleft5">取消</a>
            </div>
        </div>
    </div>
</div>
<!--    图片选择结束  -->

</div>
<script charset="utf-8" src="/public/plugins/kindeditor-4.1.10/kindeditor-min.js"></script>
<script charset="utf-8" src="/public/plugins/kindeditor-4.1.10/lang/zh_CN.js"></script>
<script type="text/javascript" src="/public/plugins/SWFUpload/swfupload.js"></script>
<script type="text/javascript" src="/public/plugins/SWFUpload/swfupload.queue.js"></script>
<script type="text/javascript" src="/public/plugins/SWFUpload/fileprogress.js"></script>
<script type="text/javascript" src="/public/plugins/SWFUpload/handlers.js"></script>
<script src="/public/js/jquery.mockjson.js"></script>
<script src="/public/js/storage.js"></script>
<script src="/public/js/weChat/weChatMsg.js"></script>
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