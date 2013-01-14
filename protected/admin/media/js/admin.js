$(document).ready(function(){
	//ckfinder初始化ckediter
    
    $("textarea[fmt='fck']").each(function(i){
    	CKFinder.setupCKEditor( null, '/ckfinder/');
        var myname = this.name;
        CKEDITOR.replace(myname,{width : '750px'});
     });
     


    $("#browseServer").bind("click", function(){
    	var finder = new CKFinder('/ckfinder/');
    	finder.selectActionFunction = SetFileField;
        finder.popup();
	});



});

function SetFileField(fileUrl) {
	$('#xFilePath').val(fileUrl);
}

function captcha_click() {$("#captcha").click(
      function () {
        $(this).attr("src",$(this).attr("src") + "/");

      }
    );
}
