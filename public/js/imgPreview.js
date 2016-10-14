/**
 * Created by pasenger on 2016/10/14.
 */

/**
 * 上传图片预览
 * @param uploadImgObj  上传图片的input对象
 * @param imgPreviewObj 图片预览对象
 *
 * <input type="file" id="fileElem" multiple accept="image/*"  onchange="handleFiles(this)">
 * <div id="fileList" style="width:200px;height:200px;"></div>
 */
function imgPreview(uploadImgObj, imgPreviewObjId) {
    window.URL = window.URL || window.webkitURL;

    var files = uploadImgObj.files,
        img = new Image();

    var imgPreviewObj = document.getElementById(imgPreviewObjId);

    if (window.URL) {
        //File API
        img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
        img.width = 200;
        img.height = 200;

        img.att

        img.onload = function (e) {
            window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
        }
        imgPreviewObj.appendChild(img);
    } else if (window.FileReader) {
        //opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
        reader.onload = function (e) {
            img.src = this.result;
            img.width = 200;
            img.height = 200;

            img.addClass('img-responsive');
            imgPreviewObj.appendChild(img);
        }
    } else {
        //ie
        uploadImgObj.select();
        uploadImgObj.blur();
        var nfile = document.selection.createRange().text;
        document.selection.empty();
        img.src = nfile;
        img.width = 200;
        img.height = 200;

        img.addClass('img-responsive');

        imgPreviewObj.appendChild(img);
    }
}