
$(document).ready(function () {
	$('#price').number(true);
	var token = $("input[name=_token]").val();
	Dropzone.autoDiscover = false;
	$(".dropzone").dropzone({
        url: ROOT_PATH+"/post/upload",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        paramName: "image", // The name that will be used to transfer the file
        acceptedFiles: 'image/*',
        accept: function (file, done) {
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
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        maxFilesize: 2, // MB
        maxFiles: 4,
        parallelUploads: 1,
        addRemoveLinks: true,
        dictDefaultMessage: 'Bấm vào đây hoặc kéo thả ảnh vào đây để tải lên.',
        dictMaxFilesExceeded: "Bạn chỉ có thể tải lên tối đa 4 ảnh",
        dictRemoveFile: "Xóa",
        dictCancelUploadConfirmation: "Bạn chắc chắn muốn hủy tải lên?",
        dictCancelUpload: "Hủy",
        dictFileTooBig: 'Ảnh bạn tải lên quá lớn. Dung lượng ảnh tối đa là 2MB',
        dictFallbackMessage: 'Trình duyệt mà bạn đang sử dụng không hỗ trợ chức năng này.',
        success: function(file, response){
        	response = jQuery.parseJSON(response);
        	if (response.flg == true) {
        		var inputHiden = '<input type="hidden" value="'+response.id+'" name="image[]" class="image_'+response.id+'">';
        		$('#dropzone_value').append(inputHiden);
        		file.previewElement.querySelector("img").src = response.path;
        		file.responseServer = response;
        	}
        },
        removedfile: function(file) {
        	if (file.responseServer != undefined) {
	        	var id = file.responseServer.id;
	        	$('.image_'+id).remove();
	        	var _token = $('meta[name="csrf-token"]').attr('content');
	        	var data = {_token: _token, id: id}
	        	ajaxRemoveImage(data);
    		}
	        var _ref;
	        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
	      }
    });
	
	$('#btnPost').click(function() {
		$('input').removeClass('error');
		var category = $('#category').val();
		var address_id = $('#address_id').val();
		var title = $('#title').val();
		var description = CKEDITOR.instances['description'].getData();
		var price = $('#price').val();
		var name = $('#name').val();
		var phone = $('#phone').val();
		var email = $('#email').val();
		var _token = $('meta[name="csrf-token"]').attr('content');
		var data = {
				category: category,
				address_id: address_id,
				title: title,
				description: description,
				price: price,
				name: name,
				phone: phone,
				email: email,
				_token: _token
		};
		validateData(data);
		return false;
	});
});

function ajaxRemoveImage(data) {
	
	var action = ROOT_PATH+'/post/remove-image';
	$.ajax({
		url: action,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(response) {
			if (response.flg == true) {
				return true;
			} else {
				return false;
			}
		}
	});
}

function validateData(data) {
	
	var action = ROOT_PATH+'/post/validate';
	$.ajax({
		url: action,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(response) {
			if (response.flg == true) {
				$('#postForm').submit();
			} else {
				var html = '<div class="alert alert-danger">'+response.message+'</div>';
				$('#error_area').html(html);
				$.each(response.field, function (index, item) {
					var id = '#'+item;
					$(id).addClass('error');
					$(window).scrollTop($('#error_area').offset().top);
				});
			}
		}
	});
}