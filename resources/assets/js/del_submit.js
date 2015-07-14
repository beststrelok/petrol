/*------------------------------------------------
| DELETE ICON FORM SUBMIT
------------------------------------------------*/
$('.delete_items_group_icon').on('click', function(evt) { //icon class
	evt.preventDefault();
	if (confirm('Подтвердить удаление')) {
		$form = $(this).closest('form');
		$form.trigger('submit');
	} else {
		return false;
	}
});