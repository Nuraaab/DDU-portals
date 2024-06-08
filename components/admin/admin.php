<?php
include '../../auth/connection.php';
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "Admin";
    $options = [
        'cost' => 12, 
    ];
    $hashedPass = password_hash($password, PASSWORD_BCRYPT, $options);
    $query = "INSERT INTO users (first_name, last_name, role, email, password) VALUES ('$first_name', '$last_name', '$role', '$email', '$hashedPass')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Admin Added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $query = "UPDATE users SET  first_name = '$first_name', last_name= '$last_name', email = '$email' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Admin Updated successfully.";
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
    $admin_id = $_POST['admin_id'];
    $query = "DELETE FROM users WHERE id = '$admin_id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
    $message = "Admin Deleted successfully.";
    } else {
    $message = "Error: " . mysqli_error($conn);
    }
    }
$admin_query = "SELECT * FROM users WHERE role = 'Admin' ";
$admin_result = mysqli_query($conn, $admin_query);
echo' <div class="page-header page-header-light">
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
   <div class="d-flex">
       <div class="breadcrumb">
           <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
           <span class="breadcrumb-item active">Admin</span>
       </div>
       <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
   </div>
   <div class="d-flex">
       <div class="breadcrumb">
            <a class="breadcrumb-item" data-toggle="modal" data-target="#myModaldescription"><i class="icon-user mr-2"></i>Add Admin</a>
       </div>
       <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header bg-info">
           <h2> Add Admin </h2>
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
                                 <input type="email" class="form-control form-control-outline" placeholder="Placeholder" required name="email">
                                 <label class="label-floating">Enter Email</label>
                               </div>
                             </div>
                             <div class="col-sm-12 form-group-floating mb-3">
                               <div class="position-relative mb-10">
                                 <input type="password" class="form-control form-control-outline" placeholder="Placeholder" required name="password">
                                 <label class="label-floating">Enter Password</label>
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
if (mysqli_num_rows($admin_result) > 0) {
  echo '
  <div class="content">
  <div class="card">
 <div class="card-header">
  <h5>Hello ' . $_SESSION['first_name'] . '</h5>
   </div>
  <table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($admin_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['email'] . '</td>
              <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <form method="POST" action="">
                            <input type="hidden" name="admin_id" value="' .$row['id'].' ">
                            <button type="submit" name = "delete" class="dropdown-item" onclick="return confirm("Are you sure you want to delete this admin?")">
                                <i class="fas fa-trash-alt"></i> Delete Admin
                            </button>
                        </form>
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_'.$row['id'].' ">
                            <i class="fas fa-edit"></i> Edit Admin
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
              <h2> Edit Admin </h2>
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
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="first_name" value = "'.$row['first_name'].'" >
                                <label class="label-floating">Enter First Name</label>
                              </div>
                            </div>
                            <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                              <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="last_name" value = "'.$row['last_name'].'">
                              <label class="label-floating">Enter Last Name</label>
                            </div>
                          </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="email" class="form-control form-control-outline" placeholder="Placeholder" required name="email" value = "'.$row['email'].'">
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
