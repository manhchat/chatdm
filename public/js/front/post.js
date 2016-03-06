
$(document).ready(function () {
	$('#category').change(function() {
		$('#child_category').remove();
		var token = $("input[name=_token]").val();
		var category_id = $(this).val();
		var data = {category_id: category_id, _token: token};
		ajax(data);
	});
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