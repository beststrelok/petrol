$('.datepicker').datepicker({
	dateFormat: "dd/mm/yy",
	onSelect: function(dateText, obj) {
		var data = {
			'date': dateText		
		};

		// $.ajaxSetup({
		// 	headers: {
		// 		// 'X-CSRF-TOKEN': TOKEN
		// 		'X-CSRF-TOKEN': TOKEN_ENCRYPTED
		// 	}
		// });

		$.ajax({
			url: 'http://localhost:8000/ajax_set_date',
			type: 'GET',
			dataType: "json",
			data: data,
			success: function(data) {
				template(data);
			},
			error: function(data, error, error_details){
				console.log("err:", error, error_details);
				console.log(data);
				console.log(data.responseText);
			}
		});
	}
});

function template(quotations) {
	var $tbody = $('.quotations tbody');
	var data = [];

	for (var i=0; i<quotations.length; i++) {
		var q = quotations[i];
		var $tr = $('<tr></tr>');

		var $td1 = $('<td>'+q.region_title+'</td>');
		var $td2 = $('<td class="text-center">'+parseFloat(q.A76_80).toFixed(2)+'</td>');
		var $td3 = $('<td class="text-center">'+parseFloat(q.A92).toFixed(2)+'</td>');
		var $td4 = $('<td class="text-center">'+parseFloat(q.A95).toFixed(2)+'</td>');

		$tr.append($td1);
		$tr.append($td2);
		$tr.append($td3);
		$tr.append($td4);

		data.push($tr);
	}

	$tbody.html(data);
}