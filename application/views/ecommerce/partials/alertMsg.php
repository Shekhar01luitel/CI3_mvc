<?php
$error = $this->session->flashdata('message');
$success = $this->session->flashdata('success');

if (!$error && !$success) {
	return;
} else if ($error) {
	$type = 'error';
} else {
	$type = 'success';
}
?>


<?php if ($type === 'error') { ?>
	<div class="alert alert-danger"><?= $error ?></div>
<?php } else { ?>
	<div class="alert alert-success"><?= $success ?></div>
<?php } ?>
