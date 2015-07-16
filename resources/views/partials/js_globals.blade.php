@if (isset($quotations))
	QUOTATIONS = <?php echo json_encode($quotations); ?>;
@endif

TOKEN = "<?php echo csrf_token(); ?>";
TOKEN_ENCRYPTED = "<?php echo Crypt::encrypt(csrf_token()); ?>";