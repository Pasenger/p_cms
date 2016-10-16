/**
 * Created by pasenger on 2016/10/16.
 */


/**
 * 分页处理
 */
function pager(pageCount) {
    if(pageCount > 1 && pageCount < 5){
        for (var i=2; i < 5; i++){
            $("#pageLast").before('<li id="' + i + '" class="pageNav"><a href="#">' + i + '</a></li>');
        }
    }else if(pageCount > 5){
        for (var i=2; i < 5; i++){
            $("#pageLast").before('<li id="' + i + '" class="pageNav"><a href="#">' + i + '</a></li>');
        }

        $("#pageLast").before('<li><a href="#">...</a></li>');
        $("#pageLast").before('<li id="' + (pageCount - 1) + '" class="pageNav"><a href="#">' + (pageCount - 1) + '</a></li>');
        $("#pageLast").before('<li id="' + pageCount + '" class="pageNav"><a href="#">' + pageCount + '</a></li>');
    }
}