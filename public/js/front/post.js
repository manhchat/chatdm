
$(document).ready(function () {
	var token = $("input[name=_token]").val();
	Dropzone.autoDiscover = false;
	$(".dropzone").dropzone({
        url: ROOT_PATH+"/post/upload",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        paramName: "image", // The name that will be used to transfer the file
        acceptedFiles: 'image/*',
        accept: function (file, done) {
            console.log(file)
            if ((file.type).toLowerCase() != "image/jpg" &&
                    (file.type).toLowerCase() != "image/gif" &&
                    (file.type).toLowerCase() != "image/jpeg" &&
                    (file.type).toLowerCase() != "image/png"
                    ) {
                done("Invalid file");
            }
            else {
                done();
            }
        },
        maxFilesize: 1, // MB
        maxFiles: 4,
        parallelUploads: 4,
        addRemoveLinks: true,
        dictDefaultMessage: 'Bấm vào đây hoặc kéo thả ảnh vào đây để tải lên.',
        dictMaxFilesExceeded: "Bạn chỉ có thể tải lên tối đa 4 ảnh",
        dictRemoveFile: "Xóa",
        dictCancelUploadConfirmation: "Bạn chắc chắn muốn hủy tải lên?",
        dictFileTooBig: 'Ảnh bạn tải lên quá lớn. Dung lượng ảnh tối đa là 1MB',
        dictFallbackMessage: 'Trình duyệt mà bạn đang sử dụng không hỗ trợ chức năng này.',
        success: function(file, response){
            console.log(response);
        },
      }
    });
	/*$('#filedragdrop').dropzone({
			url: ROOT_PATH+"/post/upload",
			maxFilesize: 1, 
			paramName: 'image',
			acceptedFiles: 'image/*',
			addRemoveLinks: true,
			removedfile: function(file) { 
		      console.log(file);
		    },
			dictDefaultMessage: 'aaaa',
			dictCancelUpload: 'Hủy',
			clickable: true,
			
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});*/
});

function ajax(data) {
	// Toggle loading container when ajax call
	/*$(document).ajaxStart(function () {
		$.isLoading({ text: "Đang tải" });
	});
	$(document).ajaxStop(function () {
		$.isLoading( "hide" );
	});*/
	
	var action = ROOT_PATH+'/post/get-child';
	$.ajax({
		url: action,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(response) {
			if (response.hit > 0) {
				var select_child = '<select name="child_category" id="child_category">';
				var i = 0;
				for (i; i<response.hit; i++) {
					select_child += '<option value="'+response.list[i]['id']+'">'+response.list[i]['title']+'</option>'
				}
				select_child += '</select>';
				$('#category_append').append(select_child);
			}
		}
	});
}