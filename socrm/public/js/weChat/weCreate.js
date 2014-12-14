/*
* 微信图文创建页面
* 前端负责人：付文松
* 后端负责人：王洪武
* date:2014-12-10
* */

if(parseInt($.browser.version,10) === 9){
    if (document.all && !window.setInterval.isPolyfill) {
        var __nativeSI__ = window.setInterval;
        window.setInterval = function (vCallback, nDelay /*, argumentToPass1, argumentToPass2, etc. */) {
            var aArgs = Array.prototype.slice.call(arguments, 2);
            return __nativeSI__(vCallback instanceof Function ? function () {
                vCallback.apply(null, aArgs);
            } : vCallback, nDelay);
        };
        window.setInterval.isPolyfill = true;
    }
}
var articleAry = []; //存放多条图文的数组
var storageAry = [];
//    编辑器配置

window.editor = KindEditor.create('#content',{
    minWidth : '570px',
    height:"400px",
    resizeType:0,  //进制拖动
    items:[
        'source', '|', 'undo', 'redo', '|', 'template', 'cut', 'copy', 'paste',
        'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
        'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
        'media', 'table', 'hr', 'pagebreak', '|', 'about'
    ],
    afterChange : function() {
        KindEditor('#eidtConNum').html(10000-this.count('text'));
    }
});
editor.clickToolbar('image',function(){   //上传图片事件
    alert(12);
});
 $(function(){
    console.log(eval('('+$.LS.get('appmsg')+')'));
    $.mockJSON.data.CONTENT =[
        '今年12月13日是首个南京大屠杀死难者国家公祭日。当天上午，党和国家领导人将出席在侵华日军南京大屠杀遇难同胞纪念馆举行的国家公祭仪式。',
        '今天，我国首套南京大屠杀公祭全民读本在南京发布。读本包含日军书信、报告，西方中立人士的报道、证词等603条铁证，让南京大屠杀的历史事实不容否认。77年前惨绝人寰的南京大屠杀，30多万同胞惨遭杀戮，血与泪的历史不容遗忘！(央视记者周培培)',
        '中新网12月11日电 综合香港媒体报道，今天(11日)上午，香港法庭执达主任及申请禁制令的“跨境全日通”代表律师谢伟俊在金钟“占领区”宣布开始进行清除障碍物。金钟清障行动进行了两个半小时，“跨境全日通”的代理人午间宣布，完全清除禁制令范围内所有障碍物。',
        '最高人民法院、最高人民检察院2007年11月5日联合公布刑法确定罪名补充规定，补充、修改了刑法罪名。规定包括取消“公司、企业人员受贿罪”罪名，由“非国家工作人员受贿罪”替代等内容。调整后的新罪名于2007年11月6日起施行。《补充规定》称，取消“公司、企业人员受贿罪”罪名，由“非国家工作人员受贿罪”替代。“对非国家工作人员行贿罪”替代了“对公司、企业人员行贿罪”。',
        '非国家工作人员受贿罪，是指公司、企业或者其他单位的工作人员利用职务上的便利，索取他人财物或者非法收受他人财物，为他人谋取利益，数额较大的行为。属妨害对公司、企业管理秩序罪的一种。'
    ];
    $.mockJSON.data.URL = [
        'http://www.baidu.com','http://www.qq.com','http://www.sina.com','http://www.taobao.com'
    ];
    $.mockJSON.data.TITLE = [
        '非国家工作人员受贿罪','侵犯的客体是国家对公司','犯罪主体是特殊主体，即公司、企业或者其他单位的工作人员。','划清非国家工作人员受贿罪与非罪行为的界限。'
    ];
    $.mockJSON.data.DESCRIPTION = [
        '如果一个jQuery对象表示一个DOM元素的集合， .find()方法允许我们能够通过查找DOM树中的这些元素的后代元素，匹配的元素将构造一个新的jQuery对象。.find()和.children()方法是相似的，但后者只是再DOM树中向下遍历一个层级（愚人码头注：就是只查找子元素，而不是后代元素）。',
        '一男子约了某妹子在苏州绿宝广场吃饭,男子将车停在地下车库,居然光天化日之下跟妹子玩起了车震,没料到,男子老婆看到了自家车,',
        ' 日前，一组号称“最美女纹身师”的图片在微博爆红，而其中几张照片更是因为酷似冠希哥而被网友称作“女版陈冠希”。一起来欣赏下吧！',
        ''
    ];
    $.mockJSON.data.IMGURL = [
        'http://i.mmcdn.cn/simba/img/TB1GwKZGVXXXXaCXXXXSutbFXXX.jpg',
        'http://i.mmcdn.cn/simba/img/TB1_ibeGVXXXXX3aXXXSutbFXXX.jpg',
        'http://gtms03.alicdn.com/tps/i3/TB1SCfnGVXXXXX9aXXXvKyzTVXX-520-280.jpg',
        'http://i.mmcdn.cn/simba/img/TB146vcGVXXXXb4XFXXSutbFXXX.jpg',
        'http://i.mmcdn.cn/simba/img/TB1J5a5GVXXXXa7XpXXSutbFXXX.jpg'
    ];
    var imgData = [
        {id:1,url:"http://i.mmcdn.cn/simba/img/TB1GwKZGVXXXXaCXXXXSutbFXXX.jpg"},
        {id:2,url:"http://i.mmcdn.cn/simba/img/TB1_ibeGVXXXXX3aXXXSutbFXXX.jpg"},
        {id:3,url:"http://gtms03.alicdn.com/tps/i3/TB1SCfnGVXXXXX9aXXXvKyzTVXX-520-280.jpg"},
        {id:4,url:"http://i.mmcdn.cn/simba/img/TB146vcGVXXXXb4XFXXSutbFXXX.jpg"},
        {id:5,url:"http://i.mmcdn.cn/simba/img/TB1J5a5GVXXXXa7XpXXSutbFXXX.jpg"}
    ];
    var data = $.mockJSON.generateFromTemplate({
        "id":0,
        "author":"@LAST_NAME",
        'title':'@TITLE',
        'description':'@DESCRIPTION',
        "content":'@CONTENT',
        'url':'@URL',
        'picurl':'@IMGURL',
        'pic_type|0-1':0,
        'is_mul':1,
        'article_type':1,
        'mul_articles|1-7':[{
            "id|+1":1,
            'title':'@TITLE',
            "author":"@LAST_NAME",
            "content":'@CONTENT',
            'url':'@URL',
            'picurl':'@IMGURL',
            'description':'@DESCRIPTION',
            'img_id|0-4':0,
            'pic_type|0-1':0,
            'article_type':1
        }]
    });
    loadData(data);

    $("#saveBtn").on("click",function(){
        console.log(articleAry)
    });
    //选择链接
    $(document).on("click",function(){
        $("#selectLinkBox").hide();
    });
    $(document).on("click","#setLink",function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#selectLinkBox").toggle();
    });
    $("#selectLinkBox").on("click","a",function(){
        alert(1212)
    });

});


$.fn.extend({
    updataText:function(callback){
        var bv = parseInt($.browser.version,10);
        var event = bv < 9 ? 'onpropertychange' : 'oninput';
        var $this = $(this);
        if(bv === 9){
            var timer = null;
            $this.off().on({
                "focus":function(){
                    timer = setInterval(callback,0,$this);
                },
                'blur':function(){
                    clearInterval(timer);
                }
            });
        }else{
            $this[0][event] = callback;
        }
    }
});



//加载数据
function loadData(data){
    var is_mul = parseInt(data.is_mul,10); //获取是否是多图文
    is_mul ? mutilSpace(data) : singleSpace(data);  //多图文执行mutilSpace，单图文执行singleSpace
    var id = data.id,
        title = data.title,
        author = data.author,
        description = data.description,
        content = data.content,
        url = data.url,
        picurl = data.picurl,
        pic_type = data.pic_type,
        article_type = data.article_type;
    //加载第一条图文信息，该信息多条图文和单条图文都有
    $("#appmsgItem1").data({
        id:id,
        title:title,
        author:author,
        description:description,
        content:content,
        url:url,
        picurl:picurl,
        pic_type:pic_type,
        article_type:article_type
    });
    $("#appmsgItem1").attr("data-id",id);
    $(".ambc-edit").attr("data-id",id);
    $("#appmsgItem1").find('.appmsg-title').text(title);
    $("#appmsgItem1").find('.appmsg-thum').html('<img src="'+picurl+'" width="100%" height="100%">').addClass("has-thumb");
    storageAry.push($("#appmsgItem1").data());
    updateData('appmsgItem1');
    fillData($("#appmsgItem1").data());
}

//把编辑区域和图文绑定，方便修改对应栏目，同时修改localStorage
function updateData(ele){
    var $ele = $("#"+ele);
    var $title = $ele.find(".appmsg-title");
    var bv = parseInt($.browser.version) === 9;

    //修改标题
    $("#title").updataText(function($this){
        var $this = bv ? $this : $(this);
        var val = $this.val();
        $("#"+ele).find(".appmsg-title").text(val);

    });

    //修改描述
    $("#description").updataText(function($this){
        var $this = bv ? $this : $(this);
        var val = $this.val();
        var valLen = strLen(val);
        if(valLen > 120){
            $(".des-num-box").addClass("error").html('已超过<em id="descriptionNum">'+(valLen - 120)+'</em>个字');
        }else{
            $(".des-num-box").removeClass("error").html('还能输入<em id="descriptionNum">'+(120 - valLen)+'</em>个字');
        }
    });

    //删除图片
    $("#deleteImg").off("click").on("click",function(){
        $("#etImg").attr("src","");
        $(".edit-thumb").hide();
        $(".ei-img-action").show();
        $ele.find(".has-thumb").html("封面图片");
    });


}
/**
 * 如果是多个图文，执行多个图文环境函数，如果是单个图文，则执行单个图文函数
 * 这里主要是为了方便查看代码，以及各个环境所需的操作和元素
 * */

//单条图文执行环境
function singleSpace(options){
    $("#add-abstract").show();
}

//多条图文执行环境
function mutilSpace(data){
    // 增加'multi'class名，显示多个图文布局
    $(".ambm-preview").addClass("multi");

    var mul_articles = data.mul_articles,
        articlesLen = mul_articles.length,
        articlesHtml = '';
    for(var i=0;i<articlesLen;i++){
        var index = i+2;
        articlesHtml ='<div id="appmsgItem'+index+'" class="js-appmsg-item ambm-item">' +
            '<i class="default-thumb has-thumb"><img width="100%" height="100%" src="'+mul_articles[i].picurl+'" alt=""/></i>'+
            '<h4 class="appmsg-title">'+mul_articles[i].title+'</h4>'+
            '<div class="appmsg-edit-mask">'+
            '<a onclick="return false;" class="icon-wc-edit js-edit" data-id="'+index+'" href="javascript:;">编辑</a>'+
            '<a onclick="return false;" class="icon-wc-delete js-del" data-id="'+index+'" href="javascript:;">删除</a>'+
            '</div>'+
            '</div>';
        $(".ambm-cont").append(articlesHtml);
        $("#appmsgItem"+index).data({
            id:mul_articles[i].id,
            title:mul_articles[i].title,
            author:mul_articles[i].author,
            description:mul_articles[i].description,
            content:mul_articles[i].content,
            url:mul_articles[i].url,
            picurl:mul_articles[i].picurl,
            pic_type:mul_articles[i].pic_type,
            article_type:mul_articles[i].article_type
        });
        articleAry.push($("#appmsgItem"+index).data());
        storageAry.push($("#appmsgItem"+index).data());
    }
    $.LS.set('appmsg',aryTostr(storageAry));
    //图文上显示编辑按钮
    $(".ambm-cont").on({
        "mouseenter":function(){
            $(this).addClass("hover-appmsg-item");
        },
        "mouseleave":function(){
            $(this).removeClass("hover-appmsg-item");
        }
    },".js-appmsg-item");

    //图文消息的行数
    var appMsgLen = articleAry.length+1;
    //图文消息的结构
    var addAppMsg = function(i){
        return  '<div id="appmsgItem'+i+'" class="js-appmsg-item ambm-item">' +
                    '<i class="default-thumb">封面图片</i>'+
                    '<h4 class="appmsg-title">标题</h4>'+
                    '<div class="appmsg-edit-mask">'+
                        '<a onclick="return false;" class="icon-wc-edit js-edit" data-id="'+i+'" href="javascript:;">编辑</a>'+
                        '<a onclick="return false;" class="icon-wc-delete js-del" data-id="'+i+'" href="javascript:;">删除</a>'+
                    '</div>'+
                '</div>';
    };

    //点击编辑把编辑区域显示在对应的位置，同时获取到数据
    $(".ambm-cont").on("click",".js-edit",function(){
        var id = parseInt($(this).attr("data-id"),10);
        var index = $("#appmsgItem"+id).index()+1;
        var appmsg = $("#appmsgItem"+id).data();
        moveEditArea(index,appmsg);
        updateData('appmsgItem'+id);
        console.log('appmsgItem'+id)
    });

    //删除图文
    $(".ambm-cont").on("click",".js-del",function(){
        if(appMsgLen === 2){
            pop("无法删除，多条图文至少需要2条消息。");
            return false;
        }
        var id = parseInt($(this).attr("data-id"),10);
        var nextIndex = $("#appmsgItem"+id).index()+1;
        var nextEle = $("#appmsgItem"+id).next();
        var prevIndex = $("#appmsgItem"+id).index();
        var prevEle = $("#appmsgItem"+id).prev();
        $("#appmsgItem"+id).remove();
        nextEle.length ? moveEditArea(nextIndex,nextEle.data()) : moveEditArea(prevIndex,prevEle.data());
        appMsgLen--;
    });

    //新增图文消息
    $("#appMsgAddBtn").on("click",function(){
        if(appMsgLen >= 8){
            pop("你最多只可以加入8条图文消息");
            return false;
        }
        appMsgLen++;
        $(".ambm-cont").append(addAppMsg(appMsgLen));
        $("#appmsgItem"+appMsgLen).data({
            id:0,
            author:"",
            title:"",
            content:"",
            url:"",
            picurl:0,
            pic_type:0,
            article_type:data.article_type
        });
        articleAry.push($("#appmsgItem"+appMsgLen).data());
    });

    //显示摘要编辑区域
    $("#addAbstractBtn").on("click",function(){
        $(".add-abstract").hide();
        $("#editDescription").show()
    });
}

//移动编辑区域，同时填满数据
function moveEditArea(index,appmsg){
    var top = index == 1 ? 0 :(index <= 4 ? 190+(index-2)*109 : 190/2+(index-4)*109-10);
    var arrowTop = index > 4 ? 350 : 44;
    $(".ambc-edit").css("margin-top",top);
    $(".arrow-box").css("top",arrowTop);
    fillData(appmsg);
}

//将数据填充在编辑内容区域中
function fillData(options){
    var id = options.id,
        title = options.title,
        author = options.author,
        picurl = options.picurl,
        pic_type = parseInt(options.pic_type,10),
        img_id = parseInt(options.img_id,10),
        description = options.description,
        content = options.content,
        url = options.url,
        article_type = parseInt(options.article_type,10);

    $("#title").val(title);
    editor.html(content);
    $("#author").val(author);
    $("#picType").attr("checked",pic_type ? true:false);

    if(picurl){
        $("#etImg").attr("src",picurl);
        $(".ei-img-action").hide();
        $(".edit-thumb").show();
    }else{
        $(".ei-img-action").show();
        $(".edit-thumb").hide();
    }
    if(description != void 0){
        if(description){
            $(".add-abstract").hide();
            $("#editDescription").show();
        }else{
            $(".add-abstract").show();
            $("#editDescription").hide();
        }
        var desLen = strLen(description);
        $("#description").val(description);
        if(desLen > 120){
            $(".des-num-box").addClass("error").html('已超过<em id="descriptionNum">'+(desLen - 120)+'</em>个字');
        }else{
            $(".des-num-box").removeClass("error").html('还能输入<em id="descriptionNum">'+(120 - desLen)+'</em>个字');
        }
    }else{
        $("#editDescription").hide();
    }
    $("#linkBox")[url ? "show":"hide"](function(){
        $("#url").val(url);
    });

}

//编辑数据，将数据存放到localStorage中
function storageData(){

}

function aryTostr(ary){
    var str = '[';
    for(var i = 0;i<ary.length;i++){
        var obj = ary[i],
            objstr = "{";
        for(var j in obj){
            objstr += '\"'+j+'\"\:' +'\"'+obj[j]+'\"'+",";
        }
        str += objstr.substring(0,objstr.length-1)+'},';
    }
    str =  str.substring(0,str.length-1)+']';
    return str;
}