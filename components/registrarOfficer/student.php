<?php
include '../../auth/connection.php';
$message = "";
$errors = array();
if (isset($_POST['submit'])) {
  $user_id = $_POST['user_id'];
    $id = $_POST['id'];
    
    $sql = "UPDATE users SET username = '$id' WHERE id= '$user_id' ";
    if ($conn->query($sql) === TRUE) {
        $message = "Student Approved Successfully";
    } else {
        $message = "Approving failed: " . $conn->error;
    }
}
$student_query = "SELECT * FROM users WHERE role = 'Student' ";
$student_result = mysqli_query($conn, $student_query);
echo'  <div class="page-header page-header-light">
        
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
  <div class="d-flex">
      <div class="breadcrumb">
          <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <span class="breadcrumb-item active">Student</span>
      </div>
      <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
  </div>
</div>
</div>';
if (mysqli_num_rows($student_result) > 0) {
  echo '

  <div class="content">
  <div class="card">
 <div class="card-header">
  <h5>Hello ' . $_SESSION['first_name'] . '</h5>
   </div>
   <div class="card-header">
  <h5>'.$message.' </h5>
   </div>
  <table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>ID</th>
                  <th>Department</th>
                  <th>Sex</th>
                  <th>Payment Status</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($student_result)) {
        if($row['payment_status']==1){
          $status = "Payed";
      }else{
          $status = "Not Payed";
      }
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['username'] . '</td>
              <td>' . $row['department'] . '</td>
              <td>' . $row['sex'] . '</td>
              <td>' . $status . '</td>
                 <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                    <button id="menuButton" style="border:none;" ><i class="icon-menu9"></i></button>
                  </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_' . $row['id'] . '"><i class="fas fa-plus"></i> Approve</a>
                        </div>
                     </div>
                    
                </div>
            </td>';
       echo' </tr>
        <div class="modal fade" id="myModaldescription_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-info">
            <h2> Approve payment for ' . $row['first_name'] . '</h2>
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
                        <form method="POST" action="">
                          <input type ="hidden" name ="user_id" value = "'.$row['id'].'"/>
                          <div class="col-sm-12 form-group-floating mb-3">
                            <div class="position-relative mb-10">
                              <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="id">
                              <label class="label-floating">Give ID for '.$row['first_name'].'</label>
                            </div>
                          </div> 
                          <button class="btn btn-success" type="submit" name ="submit" >Approve</button>
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