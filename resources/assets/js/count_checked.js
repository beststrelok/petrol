/*------------------------------------------------
| COUNT CHEKED
------------------------------------------------*/
function countChecked($num, $str1, $str2, $str3) {
	$val = $num % 100;

	if ($val > 10 && $val < 20) {
		return $num+' '+$str3;
	} else {
		$val = $num % 10;
		if ($val == 1) {
			return $num+' '+$str1;
		} else if ($val > 1 && $val < 5) {
			return $num+' '+$str2;
		} else {
			return $num+' '+$str3;
		}
	}
}

var message = countChecked(0, 'элемент', 'элемента', 'элементов');
$(".selected_quantity").text('Выбрано: '+message);
$(".admin_items_footer .admin_uni_button").addClass('disabled');

$( ".admin_main_content_items input[type=checkbox]" ).on("click", function() {
	var n = $(".admin_main_content_items input:checked").length;
	var message = countChecked(n, 'элемент', 'элемента', 'элементов');
	$(".selected_quantity").text('Выбрано: '+message);

	if (n == 0) {
		$(".admin_uni_button").addClass('disabled');
	} else {
		$(".admin_uni_button").removeClass('disabled');
	}
});
/*------------------------------------------------
| GET CHECKED IDS
------------------------------------------------*/
IDS = [];
$(".admin_main_content_items input[type=checkbox]").on("change", function(){
	var checkedID = $(this).data("id");
	IDS.push(checkedID);
});