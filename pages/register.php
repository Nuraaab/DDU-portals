<!DOCTYPE html>
<html lang="en">

<head>
    <?php  
     include '../components/styles.php';
    ?>
<link rel="shortcut icon" href="../assets/admin_assets/global_assets/images/logo.jpg" type="image/x-icon">
<link rel="icon" href="../assets/admin_assets/global_assets/images/logo.jpg" type="image/x-icon">
<link href="../assets/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="../assets/admin_assets/assets/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php
    session_start();
        include '../auth/connection.php';
        $departments = []; 
        $result = mysqli_query($conn, "SELECT dept_name FROM department");
        if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $departments[] = $row['dept_name'];
        }
        } else {
        echo "Error: " . mysqli_error($connection);
        }
        $message = $errors = "";
        $errors = array();

        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $department =$_POST['department'];
            $confirm_password = $_POST['confirm_password']; 
            $phone = $_POST['phone'];
            $role = "Student";
            $options = [
                'cost' => 12, 
            ];
            $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
            if ($password !== $confirm_password) {
                array_push($errors, "Passwords do not match");
            }
            $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($check_email_sql);
            if ($result->num_rows > 0) {
                array_push($errors, "Email already exists");
            }

            if (!preg_match('/^[a-zA-Z]+$/', $first_name) || empty($first_name) || preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $first_name) || preg_match('/[\s]+/', $first_name)) {
                array_push($errors, "Full name must be characters or alphabets!!");
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid email format");
            }
            if (count($errors) == 0) {
                $sql = "INSERT INTO users (first_name, last_name, email, password, phone, role, age, sex, department) VALUES ('$first_name',  '$last_name', '$email', '$hashedPass', '$phone', '$role', '$age', '$sex', '$department')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['email'] = $email;
                    $_SESSION['first_name'] = $first_name; 
                    $_SESSION['last_name'] = $last_name; 
                    $_SESSION['department'] = $department; 
                    $_SESSION['role'] = $role; 
                    $message = "Registered successfully";
                    header("Location: users/student.php");
                } else {
                    $message = "Registration failed: " . $conn->error;
                }
            } else {
                $message = "Registration failed: " . implode(", ", $errors);
            }
        }
?>

<div class="content-inner login-cover">
        <div class="container">
            <div class="row justify-content-center mt-3">
			
                <form class="login-form col-5" method='POST' action="<?php echo $_SERVER["PHP_SELF"];?>">
                    
                    <!-- @csrf -->
                   
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
								<!-- <img   class="img-fluid"  src="../assets/admin_assets/global_assets/images/logo.jpg" alt="logo" style="width:300px"> -->
								
								<h5 class="mt-1">Create new account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control mb-2" placeholder="First Name" name="first_name" required>
								<div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
								</div>
                           </div>
                           <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control mb-2" placeholder="Last Name" name="last_name" required>
								<div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
								</div>
                           </div>
                           <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control mb-2" placeholder="Age" name="age" required>
								<div class="form-control-feedback">
                                <i class="icon-calendar text-muted"></i>
								</div>
                           </div>
                           <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control mb-2" placeholder="Sex" name="sex" required>
								<div class="form-control-feedback">
                                <i class="fas fa-venus-mars text-muted"></i>
								</div>
                           </div>
                           <div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control mb-2" placeholder="Phone Number" name="phone" required>
								<div class="form-control-feedback">
                                <i class="icon-phone2 text-muted"></i>
								</div>
                           </div>
                        <?php echo'<div class="col-sm-12 form-group-floating mb-2" style="border: 1px solid #ccc; border-radius: 5px;">
                                <select class="form-control mb-2" data-fouc placeholder="Placeholder" name="department"  required>';
                                foreach ($departments as $department) {
                                    echo '<option value="' . $department . '">' . $department . '</option>';
                                  }   
                                  echo'  </select>
                                <label class="label-floating" id="role-label">Select Department</label>
                            </div>
                            ';
                                    ?>
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
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
		
                           
							<div class="form-group form-group-feedback form-group-feedback-left">
                                    <div class="form-group-floating mb-2">
                                        <div class="position-relative ">
                                           <input type="submit" name = "submit" value = "Sign Up" class="btn btn-primary btn-block" />
                                       </div>
                                    </div>
                                </div>

                            
                        </div>
                    </div>
                </form>
            
      
                </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script>
            $(document).ready(function() {
                $('#role-select').on('change', function() {
                    var selectedRole = $(this).val();
                    $('#role-label').text(selectedRole);
                });
            });
        </script> -->
    <script src="../assets/admin_assets/global_assets/js/main/jquery.min.js"></script>
	<script src="../assets/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../assets/admin_assets/global_assets/assets/js/app.js"></script>
    <?php  
        include '../components/scripts.php';
        ?>
</body>

</html>