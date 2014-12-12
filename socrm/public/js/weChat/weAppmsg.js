$(function(){
    $("#pageContent").on("click",".am-edit",function(){
        pop("正在编辑...",0);
    });
    $("#pageContent").on("click",".am-delete",function(){
        var currentTr = $(this).parents('tr');
        currentTr.fadeOut();
    });

});