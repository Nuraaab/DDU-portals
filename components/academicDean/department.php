<?php
include '../../auth/connection.php';
if (isset($_POST['submit'])) {
    $dept_name = $_POST['dept_name'];
    $head = $_POST['head'];
    $office_location = $_POST['office_location'];
    $contact = $_POST['contact'];
    $query = "INSERT INTO department (dept_name, head, office_location, contact) VALUES ('$dept_name', '$head', '$office_location', '$contact')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Department Added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
    if (isset($_POST['delete'])) {
      $dept_id = $_POST['dept_id'];
      $query = "DELETE FROM department WHERE id = '$dept_id' ";
      $result = mysqli_query($conn, $query);
      if ($result) {
      $message = "Department Deleted successfully.";
      } else {
      $message = "Error: " . mysqli_error($conn);
      }
      }
$department_query = "SELECT * FROM department";
$department_result = mysqli_query($conn, $department_query);
if (mysqli_num_rows($department_result) > 0) {
  echo '
  <div class="page-header page-header-light">
        
  <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
      <div class="d-flex">
          <div class="breadcrumb">
              <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <span class="breadcrumb-item active">Department</span>
          </div>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
      </div>


      <div class="d-flex">
          <div class="breadcrumb">
               <a class="breadcrumb-item" data-toggle="modal" data-target="#myModaldescription"><i class="icon-user mr-2"></i>Add Department</a>
          </div>
          <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
              <h2> Add Department </h2>
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
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="dept_name">
                                    <label class="label-floating">Enter Department Name</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="head">
                                    <label class="label-floating">Enter Department Head</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="office_location">
                                    <label class="label-floating">Enter Office Location</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="contact">
                                    <label class="label-floating">Enter Contact</label>
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
</div>
  <div class="content">
  <div class="card">
 <div class="card-header">
  <h5>Hello ' . $_SESSION['first_name'] . '</h5>
   </div>
  <table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Department Name</th>
                  <th>Department Head</th>
                  <th>Office Location</th>
                  <th>Contact</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($department_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['dept_name'] . '</td>
              <td>' . $row['head'] . '</td>
              <td>' . $row['office_location'] . '</td>
              <td>' . $row['contact'] . '</td>
               <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <form method="POST" action="">
                            <input type="hidden" name="dept_id" value="' .$row['id'].' ">
                            <button type="submit" name = "delete" class="dropdown-item" onclick="return confirm("Are you sure you want to delete this admin?")">
                                <i class="fas fa-trash-alt"></i> Delete Department
                            </button>
                        </form>
                        </div>
                    </div>
                     
                </div>
            </td>
        </tr>
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