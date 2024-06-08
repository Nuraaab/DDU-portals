<?php 
include '../../auth/connection.php';
$departments = []; 
$result = mysqli_query($conn, "SELECT dept_name FROM department");
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $departments[] = $row['dept_name'];
  }
} else {
  echo "Error: " . mysqli_error($connection);
}
$message = "";
$errors = array();
if (isset($_POST['submit'])) {
    $username = $_POST['instructor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $department = $_POST['department']; 
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $role = "Instructor";
    $password = "$username#";
    $options = [
        'cost' => 12, 
    ];
    $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
    $sql = "INSERT INTO users(first_name, last_name, email, username, password, phone, address, role, age, sex, department) VALUES ('$first_name', '$last_name', '$email', '$username', '$hashedPass', '$phone', '$address', '$role', '$age', '$sex', '$department')";
    if ($conn->query($sql) === TRUE) {
        $message = "Instructor Added Successfully";
    } else {
        $message = "Registration failed: " . $conn->error;
    }
}
echo'<div class="content-wrapper m-3">
<div class="content-inner">
  <div class="container">
    <div class="row justify-content-center m-3 mt-2">
      <div class="col-12">
        <div class="card">
        <div class="card-header">
        <label class="label-floating">Register Instructor</label>
      </div>
      <div class="card-header">
      <label class="label-floating">'.$message.'</label>
      </div>
          <div class="card-body mx-5">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-12 form-group-floating mb-3">
                  <div class="position-relative mb-10">
                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="first_name">
                    <label class="label-floating">Enter First Name</label>
                  </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3">
                  <div class="position-relative mb-10">
                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="last_name">
                    <label class="label-floating">Enter Last Name</label>
                  </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="instructor_id">
                  <label class="label-floating">Enter Instructor Id</label>
                </div>
              </div>
                <div class="col-sm-12 form-group-floating mb-3" >
                                        <div class="position-relative mb-10 py-2">
                                            <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                            name="department" required>';
                                            foreach ($departments as $department) {
                                                echo '<option value="' . $department . '">' . $department . '</option>';
                                              }
                                       echo' </select>
                                            <label class="label-floating">Select Department</label>
                                        </div>
                                    </div>

                <div class="col-sm-12 form-group-floating mb-3">
                  <div class="position-relative mb-10">
                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="phone">
                    <label class="label-floating">Enter Phone Number</label>
                  </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3">
                  <div class="position-relative mb-10">
                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="address">
                    <label class="label-floating">Enter Address</label>
                  </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3" >
                                        <div class="position-relative mb-10 py-2">
                                            <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                            name="sex" required>
                                         
                                        <option value="Male">Male</option>    
                                        <option value="Female">Female</option> 
                                        </select>
                                            <label class="label-floating">Select Sex</label>
                    </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="age">
                    <label class="label-floating">Enter Age</label>
                </div>
                </div>
                <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="email" class="form-control form-control-outline" placeholder="Placeholder" name="email">
                  <label class="label-floating">Enter Email</label>
                </div>
              </div>
            </div>
                <div class="form-group mb-10 mt-10 ml-30">
                  <div class="row justify-content-center">
                    <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait..." />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>';

?>