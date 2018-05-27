<?php $bodyClass = "login-page" ?>
<?php include "header.php"; ?>
	<section class="login-section">
		<div class="login-inner container">
			<div class="login-box z-depth-4">
				<div class="row">
					<div class="col s12">
						<img src="img/sspc-logo.jpg" class="responsive-img" alt="">
					</div>
				</div>
				<div class="row error-msg scale-transition scale-out z-depth-4 hide-on-click">
					<div class="col s12 center red lighten-3">
						<p class="center">Invalid Username and/or Password.</p>
					</div>
				</div>
				<form method="POST" target="">
				<div class="row">
					<div class=" input-field col s12">
      					<i class="material-icons prefix">account_circle</i>
						<input id="txtUsername" name="txtUsername" required="required" value="<?php echo (isset($_POST['txtUsername']) ? $_POST['txtUsername'] : ''); ?>" type="text" class="validate">
						<label for="txtUsername">Username</label>
					</div>
				</div>
				<div class="row">
					<div class=" input-field col s12">
      					<i class="material-icons prefix">lock</i>
      					<input id="txtPassword" name="txtPassword" required="required" value="<?php echo (isset($_POST['txtPassword']) ? $_POST['txtPassword'] : ''); ?>" type="password" class="validate">
						<label for="txtPassword">Password</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<input type="submit" class="btn blue lighten-1" id="btnSubmit" name="btnSubmit">
					</div>
				</div>
				</form>
			</div>
		</div>
	</section>
<?php include "footer.php"; ?>

<?php if (isset($_POST['btnSubmit'])): ?>
	<?php 
	$user = $_POST['txtUsername'];
	$pass = $_POST['txtPassword'];
	include('includes/mysql_connect.php');
	$query = "SELECT * FROM tbl_users WHERE username='$user' AND password=sha1('$pass')";
	$query = $conn->query($query);
	if($query->num_rows > 0) {
		$result = $query->fetch_assoc();
		$name = $result['firstname'].' '.$result['lastname'];
		$uType = $result['user_type'];
		$empID = $result['user_id'];
		?> 
		<script>
			createCookie('username', '<?php echo $user; ?>', 0);
			createCookie('cooUserType', '<?php echo $uType; ?>', 0);
			createCookie('empID', '<?php echo $empID; ?>', 0);
		</script>
		<?php
		insertAuditLog("$name", "Log In", $conn);
		echo "<script>window.location.href='dashboard.php';</script>";
	} else {
		?> <script>
			$(document).ready(function() {
				$('.error-msg').removeClass('scale-out').addClass('scale-in');
			});
		</script> <?php
	}


mysqli_close($conn); ?>
<?php endif ?>