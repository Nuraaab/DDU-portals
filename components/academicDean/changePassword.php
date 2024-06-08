<?php
include '../../auth/connection.php';
$message ="";
if (isset($_POST['submit'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $cpassword = $_POST['cpassword'];
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $options = [
        'cost' => 12, 
    ];
    $hashedPass = password_hash($new_password, PASSWORD_BCRYPT, $options);
    $check_pass_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_pass_sql);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($new_password !== $cpassword) {
           $message  = "Passwords do not match";
        }else if (password_verify($old_password, $user['password'])) {
            $query = "UPDATE users SET password = '$hashedPass' WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                        echo "<script type='text/javascript'>
                            window.location.href = '../login.php';
                        </script>";
                    exit;
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        }else{
            $message  = "User not Found.";
        }
    }
   
}
echo'
<div class="page-header page-header-light mt-3">   
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Change Password</span>
        </div>
        <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
    </div>
</div>
</div>
<div class="content-wrapper m-3">
<div class="content-inner">
  <div class="container">
    <div class="row justify-content-center m-3 mt-2">
      <div class="col-12">
        <div class="card">
      <div class="card-header">
      <label class="label-floating">'.$message.'</label>
      </div>
            <div class="card-body">
            <form method="POST" action = "">
              
              <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="password" class="form-control form-control-outline" placeholder="Placeholder" required name="old_password" >
                  <label class="label-floating">Enter Old Password</label>
                </div>
              </div> 

              <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="password" class="form-control form-control-outline" placeholder="Placeholder" required name="new_password" >
                  <label class="label-floating">Enter New Password</label>
                </div>
              </div> 
              <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="password" class="form-control form-control-outline" placeholder="Placeholder" required name="cpassword" >
                  <label class="label-floating">Confirm New Password</label>
                </div>
              </div> 
              <button class="btn btn-success pay-btn" type="submit" name ="submit">Change Password</button>
          </form>
            
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>';


?>