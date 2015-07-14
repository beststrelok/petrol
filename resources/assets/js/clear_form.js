// CLEAR ITEM BUTTON
$('.clear_item_button').on('click', function(e) {
	e.preventDefault();
	var $form = $('.update_item_form'); 
	$form.find('input[name="title"]').val("");
	$form.find('input[name="code"]').val("");
	$form.find('select[name="category"]').val("Механическое_en");
	send_category("Механическое_en");
	var first_p = $form.find('select[name="producer_id"] option').eq(0).val();
	$form.find('select[name="producer_id"]').val(first_p);
	$form.find('input[name="price"]').val("");
	$form.find('input[name="currency"]').val("РУБ");
	$form.find('input[name="procurement"]').prop("checked", true)
	$form.find('textarea[name="description"]').val("");
	$form.find('input[name="special"]').prop("checked", false)
	$form.find('input[name="hit"]').prop("checked", false)
});