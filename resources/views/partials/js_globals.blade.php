@if(isset($towns))
	TOWNS = <?php echo json_encode($towns) ?>;
@endif

@if(isset($extremes))
	EXTREMES = <?php echo json_encode($extremes) ?>;
@endif

ROUTE = "{{ r() }}";

CSRF_TOKEN = "{{ csrf_token() }}";

<?php
	$encrypter = app('Illuminate\Encryption\Encrypter');
	$encrypted_token = $encrypter->encrypt(csrf_token());
?>
{{-- CSRF_TOKEN = "{{ $encrypted_token }}";

URL_IMG = "{{ url_path('estates') }}"; // resource

URL_ESTATE = "{{ URL::to('/estates') }}"; // partial

URL_ESTATE_ADMIN = "{{ URL::to('/admin/change_estate/') }}"; // admin

URL_ESTATE_ADMIN_DELETE = "{{ URL::to('/admin/delete_estate') }}"; // delete

URL_AJAX_SELECT = "{{ URL::to('/ajax_select_estate') }}";

URL_AJAX_ESTATES = "{{ l('ajax_estates') }}"; // full



				
				