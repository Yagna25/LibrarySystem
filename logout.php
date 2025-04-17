<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logout Confirmation</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
		body {
			background-color: #f5f5f5;
			padding-top: 100px;
		}
	</style>
</head>
<body>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h4 class="modal-title" id="logoutLabel">Logout Confirmation</h4>
			</div>
			<div class="modal-body text-center">
				<p>Are you sure you want to logout of this account?</p>
			</div>
			<div class="modal-footer">
				<form method="post" action="">
					<button type="submit" name="confirm_logout" class="btn btn-danger">Yes</button>
					<a href="home.php" class="btn btn-default">No</a>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if (isset($_POST['confirm_logout'])) {
		session_unset();
		session_destroy();
		echo "<script>window.location.href = 'index.php';</script>";
	}
?>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
		$('#logoutModal').modal({
			backdrop: 'static',
			keyboard: false
		});
	});
</script>

</body>
</html>
