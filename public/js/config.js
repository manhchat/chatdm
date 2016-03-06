$(document).ready(function () {
	$('#category').change(function() {
		var category_id = $(this).val();
		var data = {category_id: category_id};
		ajax(data);
	});
});

function ajax(data) {
	// Toggle loading container when ajax call
	var loadingContainer = $('#loading-container', this.el);
		loadingContainer.ajaxStart(function () {
	    loadingContainer.show();
	});
	loadingContainer.ajaxStop(function () {
	    loadingContainer.hide();
	});
	
	var action = ROOT_PATH+'/post/get-child';
	$.ajax({
		url: action,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function(response) {
			
		}
	});
}