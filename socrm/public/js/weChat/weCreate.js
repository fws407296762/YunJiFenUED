/*
* 微信图文创建页面
* 前端负责人：付文松
* 后端负责人：王洪武
* date:2014-12-10
* */

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
    ]
});

$(function(){

    var data = $.mockJSON.generateFromTemplate({
        "id":0,
        "author":"@LAST_NAME",
        'title':'@TITLE',
//        'description':'@DESCRIPTION',
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
//            'description':'@DESCRIPTION',
            'img_id|0-4':0,
            'pic_type|0-1':0,
            'article_type':1
        }]
    });
    loadData(data);

    //选择链接
    $(document).on("click",function(){
        $("#selectLinkBox").hide();
    });
    $(document).on("click","#setLink",function(e){
        e.preventDefault();
        e.stopPropagation();
        $("#selectLinkBox").toggle();
    });
     //设置链接到的页面地址
     $("#selectLinkBox").on("click","a",function(){
         $("#vip-links").show();
     });

     editor.clickToolbar('image',function(){   //上传图片事件
         alert(12);
     });

});


////删除localStorage中对应的数据
//function delStorage(index){
//    var appmsg = $.LS.get('appmsg');
//    var msgStorage = eval("("+appmsg+")");
//    removeAt(msgStorage,index);
//    var newAppMsg = aryTostr(msgStorage);
//    $.LS.set("appmsg",newAppMsg);
//}
//
////修改localStorage中对应的数据
//function updateStorage(index,msg){
//    var appmsg = $.LS.get('appmsg');
//    var msgStorage = eval("("+appmsg+")");
//    msgStorage[index] = msg;
//    var newAppMsg = aryTostr(msgStorage);
//    $.LS.set("appmsg",newAppMsg);
//}

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
