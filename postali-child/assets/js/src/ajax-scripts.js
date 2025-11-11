jQuery(document).ready(function($) {

	// Location Filter for attorneys
	$('select#location-filter').on('change', function(e) {
		var location = $(this).find(":selected").val();
		$.ajax({
			type: "POST",
			dataType: "html",
			url: ajax_filter_attorneys.ajaxurl,
			data: {
				action: 'filter_by_location',
				id: location
			},
			success: function(data){
				$(".attorney-bind").empty();
				$(".attorney-bind").append(data);
			},
			error : function(jqXHR, textStatus, errorThrown) {
				console.log('error: ' + errorThrown);
			}
		});
	});

	// Auto-populates attorneys based on user search
	$("#attorney-filter").keyup(function () {
		var word = $(this).val();
		var searchType = "live";
		console.log(word)

		$.ajax({
			url:'../wp-content/themes/postali-child/db_attorneys.php',
			type:'GET',
			data:'word=' + word +'&search_type='+searchType,
			cache: 'false',
			success: function(data){
				$('#search-results').html($(data));

			},
			error: function(err){
				console.log(err.responseText);
			}
		});
	});
	
});