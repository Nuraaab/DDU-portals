<?php
include '../../auth/connection.php';
$instructors = [];
$result = mysqli_query($conn, "SELECT * FROM users WHERE role = 'Instructor' ");
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $fullName = $row['first_name'] . ' ' . $row['last_name'];
    $instructors[$id] = $fullName;
  }
} else {
  echo "Error: " . mysqli_error($conn);
}
$message = "";
if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    $instructor = $_POST['instructor'];
    $query = "UPDATE courses SET instructor_id = '$instructor' WHERE id = $course_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Instructor Assigned successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
$courses_query = "SELECT * FROM courses";
$courses_result = mysqli_query($conn, $courses_query);
if (mysqli_num_rows($courses_result) > 0) {
  echo '<div class="content">';
  echo '<div class="card">';
  echo '<div class="card-header">
  <h5>Hello ' . $_SESSION['first_name'] . '</h5>
  <h6>You Can Assign Instructor For This Courses.</h6>
   </div>
   <div class="card-header">
      <label class="label-floating">'.$message.'</label>
      </div>
  <table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Duration</th>
                  <th>Credit</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($courses_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['course_code'] . '</td>
              <td>' . $row['course_name'] . '</td>
              <td>' . $row['duration'] . '</td>
              <td>' . $row['credits'] . '</td>
              <td class="text-center">
              <div class="list-icons">
                  <div class="dropdown">
                      <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_' . $row['id'] . '"><i class="fas fa-hand-pointer"></i> Assign Instructor</a>
                      </div>
                   </div>
              </div>
          </td>
        </tr>
        <div class="modal fade" id="myModaldescription_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h2> Assign Instructor for ' . $row['course_name'] . '</h2>
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
                        <div class="card-header">
                      </div>
                          <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                
                              <div class="col-sm-12 form-group-floating mb-3" >
                                        <div class="position-relative mb-10 py-2">
                                            <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                            name="instructor" required>';
                                            foreach ($instructors as $id => $fullName) {
                                                echo '<option value="' . $id . '">' . $fullName . '</option>';
                                              }
                                       echo' </select>
                                            <label class="label-floating">Select Instructor</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="course_id" value=" ' .$row['id']. ' "/>
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
        </div>';
  }
  echo '</tbody>
        </table> 
        </div>
        </div>';
} else {
    echo '<div class="content mt-5">';
    echo '<div class="card">
    <div class="card-header">
      <label class="label-floating">'.$message.'</label>
      </div>
            <div class="card-body">
            <p>No results found</p>
            </div>
        </div>
        </div>';
}
mysqli_close($conn);
echo '';
?>