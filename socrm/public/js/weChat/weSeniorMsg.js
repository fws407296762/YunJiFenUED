/**
 * Created by wensong on 14-12-16.
 */


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
        'article_type':2,
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
            'article_type':2
        }]
    });

    loadData(data);

});