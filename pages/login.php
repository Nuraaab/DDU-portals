<!DOCTYPE html>
<html lang="en">

<head>
<link href="../assets/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="../assets/admin_assets/assets/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php
include '../auth/connection.php';
$message = $errors = "";
$errors = array();
session_start(); // Starting the session

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $user['first_name']; 
            $_SESSION['last_name'] = $user['last_name']; 
            $_SESSION['role'] = $user['role']; 
            $_SESSION['username'] = $user['username']; 
            $_SESSION['id'] = $user['id']; 
            $_SESSION['department'] = $user['department']; 
            switch ($user['role']) {
                case "Registrar_Officer":
                    header("Location: users/registrarOfficer.php");
                    break;
                case "CDE_Officer":
                    header("Location: users/cdeOfficer.php");
                    break;
                case "Instructor":
                    header("Location: users/instructor.php");
                    break;
                case "Academic_Dean":
                    header("Location: users/acadamicDean.php");
                    break;
                case "Student":
                    header("Location: users/student.php");
                    break;
                case "Admin":
                    header("Location: users/admin.php");
                    break;
                default:
                    $message = "Invalid role";
            }
            exit;
        } else {
            $message = "Incorrect password";
        }
    } else {
        $message = "Email not found";
    }
}
?>

    <div class="content-inner login-cover">
        <div class="container">
            <div class="row justify-content-center mt-3">
			
                <form class="login-form col-5" method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="card ml-4 mt-5 col-12 mt-3 shadow-lg" style="width: 25rem">
						<div class="card-header">
                        <?php 
                            if ($message !== '') {
                                echo '<div class="alert alert-danger alert-dismissible">';
                                echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                echo '<ul>';
                                echo "<li>$message</li>";
                                echo '</ul>';
                                echo '</div>';
                            }
                            ?>
				    	</div>
                        <div class="card-body">
                            <div class="text-center mb-3">
								<h5 class="mt-1">Login to your account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" class="form-control mb-2" placeholder="email" name="email" required>
								<div class="form-control-feedback">
									<i class="icon-envelop3 text-muted"></i>
								</div>
                            </div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
                            <p>Are you new student? <a href="register.php">Here</a></p>
							<div class="form-group form-group-feedback form-group-feedback-left">
                                    <div class="form-group-floating mb-2">
                                        <div class="position-relative ">
                                           <input type="submit" value ="Login" name="submit" class="btn btn-primary btn-block" />
                                       </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
                </div>

            </div>
        </div>

<script src="../assets/admin_assets/global_assets/js/main/jquery.min.js"></script>
<script src="../assets/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>

<script src="../assets/admin_assets/global_assets/assets/js/app.js"></script>
</body>

</html>