	var givetype = [
	    {value:1,text:'固定值'},
	    {value:2,text:'随机'},
	    {value:3,text:'递增'},
	    {value:4,text:'按比例'}
	];
	var frequencyType = [
		{value:0,text:'不限'},
	    {value:1,text:'仅一次'}
	]
function frequency(){
	var pl_extension = selectfn("pl_extension");
	var pl_part = selectfn("pl_part");
    var ple_v = parseInt(pl_extension.v,10),
    	plp_v = parseInt(pl_part.v,10),
        new_givetype = [];
    $("#extensionIplimit")[ple_v === 0 ? "show" : "hide"]();
    $("#partIplimit")[plp_v === 0 ? "show" : "hide"]();
    if(ple_v === 0 || ple_v === 2){
        new_givetype = givetype.slice(0,2);
        Interact.createOptions({
            box:$("#extension_givetype_box"),
            data:new_givetype
        });
    }else{
    	Interact.createOptions({
            box:$("#extension_givetype_box"),
            data:givetype
        });
    }
    var score_type_v = parseInt(selectfn("givetype_selected").v,10);
        $(".set_box")[ score_type_v === 3 ? "show":"hide"]();
        $(".givefj_num_box")[score_type_v === 2 ? "show" : "hide"]();
        $(".fj_num_box")[score_type_v === 1 ? "show" : "hide"]();
        $("#pl_selected_list").on("click","p",function(){
            pl_v = parseInt($(this).attr("data-value"),10);
            $(".iplimit_box")[pl_v === 0 ? "show" : "hide"]();
            if(pl_v === 0 ||  pl_v === 1){
                Interact.createOptions({
                    box:$("#givetype_box"),
                    data:new_givetype
                });
            }else{
                Interact.createOptions({
                    box:$("#givetype_box"),
                    data:givetype
                });
            }
        });
        
    $(".score-type").each(function(){
    	var parentsEle =  $(this).parents(".cbf_row");
    	$(this).on("click","p",function(){
            score_type_v = parseInt($(this).attr("data-value"),10);
            parentsEle.siblings(".set_box")[ score_type_v === 3 ? "show":"hide"](function(){
                $(this).find("input[type='text']").val("");
            });
            parentsEle.siblings(".givefj_num_box")[score_type_v === 2 ? "show" : "hide"](function(){
                $(this).find("input[type='text']").val("");
            });
            parentsEle.siblings(".fj_num_box")[score_type_v === 1 ? "show" : "hide"](function(){
                $(this).find("input[type='text']").val("");
            });
        });
    });
}
