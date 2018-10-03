// JS file for name search, v1, 3rd Oct 18

// If search button clicked:
$('#searchbtn').click(function(e)
{
doSearch();
});

// If enter/return button pressed:
$("#namesearchform").submit(function (e) {
    e.preventDefault();
	doSearch();
});

function doSearch() {
$('#searchbtn > i').removeClass('fa-search').addClass('fa-spinner fa-spin');
// Make an AJAX request to the backend to perform the search on the database and display returned results via callback:
$.ajax({
	headers: { 'X-CSRF-TOKEN': $('#namesearchform > input[name="_token"]').val() },
	type: 'POST',
	url: 'dosearch',
	dataType: 'json',
	data: { terms: $('#terms').val(), avoiddupes: $('#avoiddupes').prop('checked') },
	success: function (data) {
		$('#searchbtn > i').removeClass('fa-spinner fa-spin').addClass('fa-search');
		$('#results').empty(); // Clear any old items in results list
		if(data.length == 0) { // No results
			$('#results').append('<tr><th class="col-xs-2">Sorry, no results!</th></tr>'); // Inject table header
			}
		else {
			$('#results').append('<tr><th class="col-xs-1">First Name</th><th class="col-xs-1">Last Name</th></tr>'); // Inject table header
			// Iterate through results list, generating HTML list entry for each result:
			$.each(data, function(index, name_obj) {
				// Inject a result row:
				$('#results').append('<tr><td class="col-xs-1">' + name_obj.firstname + '</td><td class="col-xs-1">' + name_obj.lastname + '</td></tr>');
				});
			}
		},
	error: function (data) { // Server error
		$('#searchbtn > i').removeClass('fa-spinner fa-spin').addClass('fa-search');
		alert('Server Error: ', data.responseText);
		}
	});
}