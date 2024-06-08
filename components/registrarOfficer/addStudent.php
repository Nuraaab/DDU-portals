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
echo'
<div class="page-header page-header-light mt-3">   
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
            <span class="breadcrumb-item active">Add Student</span>
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
        <label class="label-floating">Add Student</label>
      </div>
      <div class="card-header">
      <label class="label-floating">'.$message.'</label>
      </div>
          <div class="card-body mx-5">
            
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
                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="id">
                  <label class="label-floating">Enter Student ID</label>
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
                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="address">
                <label class="label-floating">Enter Student Address</label>
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
                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="age">
                  <label class="label-floating">Enter Age</label>
                </div>
              </div> 

              <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="result">
                  <label class="label-floating">Enter Entrance Result( Out of 700)</label>
                </div>
              </div> 
              <div class="col-sm-12 form-group-floating mb-3">
                <div class="position-relative mb-10">
                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="payment">
                  <label class="label-floating">Add Payment Amount</label>
                </div>
              </div> 

              <div class="col-sm-12 form-group-floating mb-3">
              <div class="position-relative mb-10">
                <input type="email" class="form-control form-control-outline" placeholder="Placeholder" required name="email">
                <label class="label-floating">Enter Student Email</label>
              </div>
            </div>  

               </div>
                <div class="form-group mb-10 mt-10 ml-30">
                  <div class="row justify-content-center">
                    <input value="Submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait..."  data-toggle="modal" data-target="#myModaldescription"/>
                  </div>

                  <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                      <h2> Add course </h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="content-wrapper">
                        <div class="content-inner">
                          <div class="container">
                            <div class="row justify-content-center m-3 mt-2">
                              <div class="col-12">
                                <div class="card">
                                  <div class="card-body">
                                  <form method="POST" action="https://api.chapa.co/v1/hosted/pay" >
                                    <input type="hidden" name="public_key" value="CHAPUBK_TEST-V0NjNmEu64e7trsPRLLZFO4HNVxhophU" />
                                    <input type="hidden" name="tx_ref" value="negade-tx-12345678sss9" />
                                    <input type="hidden" name="amount" value="10" />
                                    <input type="hidden" name="currency" value="ETB" />
                                    <input type="hidden" name="email" value="ahmednuru215@gmail.com" />
                                    <input type="hidden" name="first_name" value="Israel" />
                                    <input type="hidden" name="last_name" value="Goytom" />
                                    <input type="hidden" name="title" value="Let us do this" />
                                    <input type="hidden" name="description" value="Paying with Confidence with cha" />
                                    <input type="hidden" name="logo" value="https://chapa.link/asset/images/chapa_swirl.svg" />
                                    <input type="hidden" name="callback_url" value="https://example.com/callbackurl" />
                                    <input type="hidden" name="return_url" value="https://example.com/returnurl" />
                                    <input type="hidden" name="meta[title]" value="test" />
                                    <button type="submit">Pay Now</button>
                                </form>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>';

?>