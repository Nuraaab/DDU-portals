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
    $check_username_sql = "SELECT * FROM users WHERE username = '$username' AND role ='Instructor' ";
    $result = $conn->query($check_username_sql);
    if ($result->num_rows > 0) {
        $message  = "Instructor found with this ID.";
    }else{
        $sql = "INSERT INTO users(first_name, last_name, email, username, password, phone, address, role, age, sex, department) VALUES ('$first_name', '$last_name', '$email', '$username', '$hashedPass', '$phone', '$address', '$role', '$age', '$sex', '$department')";
        if ($conn->query($sql) === TRUE) {
            $message = "Instructor Added Successfully";
        } else {
            $message = "Registration failed: " . $conn->error;
        }
    }    
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = $_POST['instructor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $department = $_POST['department']; 
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $query = "UPDATE users SET  first_name = '$first_name', last_name= '$last_name', email = '$email', username= '$username', department= '$department', phone = '$phone', address = '$address', sex = '$sex', age= '$age', email= '$email' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Instructor Updated successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['activate'])) {
    $id = $_POST['id'];
    $query = "UPDATE users SET  status = '1' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Account Activated.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['deactivate'])) {
    $id = $_POST['id'];
    $query = "UPDATE users SET  status = '0' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Account Deactivated.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
    $message = "Instructor Deleted successfully.";
    } else {
    $message = "Error: " . mysqli_error($conn);
    }
    }
$instructor_query = "SELECT * FROM users WHERE role = 'Instructor' ";
$instructor_result = mysqli_query($conn, $instructor_query);
echo'  <div class="page-header page-header-light">
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
  <div class="d-flex">
      <div class="breadcrumb">
          <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <span class="breadcrumb-item active">Instructor</span>
      </div>
      <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
  </div>
  <div class="d-flex">
      <div class="breadcrumb">
           <a class="breadcrumb-item" data-toggle="modal" data-target="#myModaldescription"><i class="icon-user mr-2"></i>Add Instructor</a>
      </div>
      <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
          <h2> Add Instructor </h2>
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
                                <label class="label-floating">Enter Instructor ID</label>
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
                                <label class="label-floating">Enter Address</label>
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
                                <input type="email" class="form-control form-control-outline" placeholder="Placeholder" required name="email">
                                <label class="label-floating">Enter Email</label>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>';
if (mysqli_num_rows($instructor_result) > 0) {
  echo '
  <div class="content">
  <div class="card">
 <div class="card-header">
  <h5>Hello ' . $_SESSION['first_name'] . '</h5>
   </div>';
   if($message!== ''){
echo'<div class="card-header">
<h5>' . $message. '</h5>
 </div>';
   }
  echo'<table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Department</th>
                  <th>Email</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($instructor_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['username'] . '</td>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['department'] . '</td>
              <td>' . $row['email'] . '</td>
              <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="' .$row['id'].' ">
                            <button type="submit" name = "delete" class="dropdown-item" onclick="return confirm("Are you sure you want to delete this admin?")">
                                <i class="fas fa-trash-alt"></i> Delete Instructor
                            </button>
                        </form>
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_'.$row['id'].' ">
                            <i class="fas fa-edit"></i> Edit Instructor
                        </a>';
                        if ($row['status'] == 0) {
                            echo '<form method="POST" action="">
                                <input type="hidden" name="id" value="' .$row['id'].'">
                                <button class="dropdown-item" name="activate" type="submit">
                                    <i class="fa fa-check-circle me-3"></i> Activate Account
                                </button>
                            </form>';
                        } else if ($row['status'] == 1) {
                            echo '<form method="POST" action="">
                                <input type="hidden" name="id" value="' .$row['id'].'">
                                <button class="dropdown-item" name="deactivate" type="submit">
                                    <i class="fa fa-times-circle me-3"></i> Deactivate Account
                                </button>
                            </form>';
                        }
                    echo'</div>
                    </div>
                     
                </div>
            </td>
        </tr>

        <div class="modal fade" id="myModaldescription_'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
              <h2> Edit Instructor </h2>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="row">
                              <div class="col-sm-12 form-group-floating mb-3">
                                <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="first_name" value = "'.$row['first_name'].' ">
                                    <label class="label-floating">Enter First Name</label>
                                </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="last_name" value = "'.$row['last_name'].' ">
                                <label class="label-floating">Enter Last Name</label>
                                </div>
                            </div>

                            <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="instructor_id" value = "'.$row['username'].' ">
                                <label class="label-floating">Enter Instructor ID</label>
                            </div>
                            </div>

                            <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="phone" value = "'.$row['phone'].' ">
                                <label class="label-floating">Enter Phone Number</label>
                            </div>
                            </div>

                            <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="address" value = "'.$row['address'].' ">
                                <label class="label-floating">Enter Address</label>
                            </div>
                            </div>

                            <div class="col-sm-12 form-group-floating mb-3" >
                                    <div class="position-relative mb-10 py-2">
                                        <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                        name="department" required>';
                                        foreach ($departments as $department) {
                                            $selected = ($department == $row['department']) ? 'selected' : '';
                                            echo '<option value="' . $department . '" ' . $selected . '>' . $department . '</option>';
                                          }
                                   echo' </select>
                                        <label class="label-floating">Select Department</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                    <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                    name="sex" required>';
                                    $selected = ($department == $row['department']) ? 'selected' : '';
                              echo'<option value="Male" ' . $selected . '>Male</option>    
                                <option value="Female" ' . $selected . '>Female</option> 
                                </select>
                                    <label class="label-floating">Select Sex</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="age" value = "'.$row['age'].' ">
                                <label class="label-floating">Enter Age</label>
                            </div>
                            </div>

                            <div class="col-sm-12 form-group-floating mb-3">
                              <div class="position-relative mb-10">
                                <input type="email" class="form-control form-control-outline" placeholder="Placeholder" required name="email" value = "'.$row['email'].' ">
                                <label class="label-floating">Enter Email</label>
                              </div>
                            </div>
                                <input name = "id" value =" '.$row['id'].'" type = "hidden" />
                                <div class="form-group mb-10 mt-10 ml-30">
                                  <div class="row justify-content-center">
                                    <input type="submit" name="edit" value="Submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait..." />
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
              </div>
            </div>
          </div>
        </div>
   ';
  }
  echo '</tbody>
        </table> 
        </div>
        </div>';
} else {
    echo '<div class="content mt-5">';
    echo '<div class="card">
            <div class="card-body">
            <p>No results found</p>
            </div>
        </div>
        </div>
        ';
}
mysqli_close($conn);
echo '';
?>

