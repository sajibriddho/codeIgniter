<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function set_confirmation_msg($data, $true_msg, $false_msg)
{
	$mx = &get_instance();
	$confirm = 0;
	if ($data == FALSE) {
		$mx->session->set_flashdata('error', $false_msg);
	} else {
		$mx->session->set_flashdata('success', $true_msg);
		$confirm = 1;
	}
	return $confirm;
}

function alert_check_for_delete()
{
	$mx = &get_instance();

	if ($success = $mx->session->flashdata('success')) {
?>
		<script>
			alert("Successfully deleted Selected Item's")
		</script>
		<div class="alert alert-sm alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4> <?= $success; ?></h4>
		</div>
	<?php } ?>

	<?php
	if ($error = $mx->session->flashdata('error')) {
		echo '<script>alert("Select At Least One Checkbox")</script>';
	?>

	<?php }
}



function alert_check()
{
	$driverInstanse = &get_instance();

	if ($success = $driverInstanse->session->flashdata('success')) {
	?>
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4> <?= $success; ?></h4>
		</div>
	<?php } ?>

	<?php
	if ($error = $driverInstanse->session->flashdata('error')) {
	?>
		<div class="alert alert-danger">
			<strong>Error!</strong> <?= $error; ?>
		</div>
	<?php }
}

function pegination_genarate($links)
{
	?>
	<div style="padding: 60px;">
		<nav aria-label="Page navigation">
			<div class="pagination">
				<ul class="pagination">
					<?php foreach ($links as $link) {
						echo "<li>" . $link . "</li>";
					} ?>
			</div>
		</nav>
	</div>


<?php

}

function active_nav($nav, $check_nav)
{
	if ($nav == $check_nav) {
		return "active";
	}
}

function active_open($nav, $check_nav)
{
	if ($nav == $check_nav) {
		return "menu-open";
	}
}
