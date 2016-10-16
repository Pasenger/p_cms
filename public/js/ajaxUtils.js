/**
 * Created by pasenger on 2016/10/15.
 */

/**
 * Ajax表单提交
 * @param form
 */
function formSave(form, url) {
    var formData = new FormData($(form)[0]);    //文件上传必须使用formData提交
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        async: true,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        error: function() {
            swal("", "提交数据失败,请稍后再试!", "error");

            $("#saveButton").removeAttr('disabled');
        },
        success: function(response) {
            if(response.code == 0){
                swal("", "提交成功", "success");
                $('#addForm')[0].reset();
            }else{
                swal("", response.message, "error");
            }

            $("#saveButton").removeAttr('disabled');
        }
    });
}