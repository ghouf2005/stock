<?php
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: http://localhost/stock_management/DASHBOARD.php');
	exit();
}

$errors = array();

if($_POST) {		
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if(empty($username)) {
			$errors[] = "Username is required";
		} 

		if(empty($password)) {
			$errors[] = "Password is required";
		}
	} else {
		// Using prepared statements to prevent SQL injection
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = $connect->prepare($sql);
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows == 1) {
			$user = $result->fetch_assoc();
			$hashedPassword = password_hash($user['password'], PASSWORD_DEFAULT);
			if(password_verify($password, $hashedPassword)) {
				// Password correct, set session or proceed with further actions
				$_SESSION['userId'] = $user['user_id'];
				header('location: http://localhost/stock_management/DASHBOARD.php');
				exit();
			} else {
				$errors[] = "Incorrect Username/password combination";
			}
		} else {
			$errors[] = "Username does not exist";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="custom/css/custom.css">
	<script src="assests/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
	<script src="assests/jquery-ui/jquery-ui.min.js"></script>
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Welcome to Stock Management System</h3>
					</div>
					<div class="panel-body">
						<div class="messages">
							<?php 
							if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
											<i class="glyphicon glyphicon-exclamation-sign"></i> '
											.$value.
											'</div>';										
								}
							} 
							?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">
							<fieldset>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" />
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
									</div>
								</div> 
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>
