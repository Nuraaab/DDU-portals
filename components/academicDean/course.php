<?php
include '../../auth/connection.php';
$instructors = [];
$message ="";
$result = mysqli_query($conn, "SELECT * FROM users WHERE role = 'Instructor' ");
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'] . ',' . $row['department'];
      $fullName = $row['first_name'] . ' ' . $row['last_name'];
      $instructors[$id] = $fullName;
  }
} else {
  echo "Error: " . mysqli_error($conn);
}
if (isset($_POST['submit'])) {
    $course_code = $_POST['course_code'];
    $course_name = $_POST['course_name'];
    $instructor = $_POST['instructor'];
    $parts = explode(',', $instructor);
    $id = trim($parts[0]); 
    $department = trim($parts[1]); 
    $query = mysqli_query($conn, "SELECT * FROM department WHERE dept_name = '$department' ");
    $row = mysqli_fetch_assoc($query);
    $dept_id = $row['id'];
    $credit_hour = $_POST['credit_hour'];
    $prerequisites = $_POST['prerequisites'];
    $credit_point = $_POST['credit_point'];
    $academic_year = $_POST['academic_year'];
    $semester = $_POST['semester'];
    $query = "INSERT INTO courses (course_code, course_name, instructor_id, duration, prerequisites, credits, academic_year, semester, department_id) VALUES ('$course_code', '$course_name', '$id', '$credit_hour', '$prerequisites', '$credit_point', '$academic_year', '$semester', '$dept_id')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Course Added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['delete'])) {
  $id = $_POST['course_id'];

  try {
      $query = "DELETE FROM courses WHERE id = '$id'";
      $result = mysqli_query($conn, $query);

      if ($result) {
          $message = "Courses deleted successfully.";
      } else {
          throw new Exception("Unknown error occurred.");
      }
  } catch (mysqli_sql_exception $e) {
      if ($e->getCode() == 1451) {
          $message = "You cannot delete this Course because It is added in schedule. Please delete the schedule first.";
      } else {
          $message = "Error: " . $e->getMessage();
      }
  } catch (Exception $e) {
      $message = "Error: " . $e->getMessage();
  }
}
$courses_query = "
    SELECT courses.*, users.first_name AS name 
    FROM courses 
    JOIN users ON courses.instructor_id = users.id
";
$courses_result = mysqli_query($conn, $courses_query);
if (mysqli_num_rows($courses_result) > 0) {
  echo '
  <div class="page-header page-header-light">
        
  <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
      <div class="d-flex">
          <div class="breadcrumb">
              <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <span class="breadcrumb-item active">Course</span>
          </div>
          <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
      </div>


      <div class="d-flex">
          <div class="breadcrumb">
               <a class="breadcrumb-item" data-toggle="modal" data-target="#myModaldescription"><i class="icon-user mr-2"></i>Add Course</a>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="course_code">
                                    <label class="label-floating">Enter Corse Code</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="course_name">
                                    <label class="label-floating">Enter Course Name</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3" >
                                        <div class="position-relative mb-10 py-2">
                                            <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                            name="instructor" required>';
                                            foreach ($instructors as $id => $fullName) {
                                                echo '<option value="' . $id . ', ">' . $fullName . '</option>';
                                              }
                                       echo' </select>
                                            <label class="label-floating">Select Instructor</label>
                                        </div>
                                    </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="credit_hour">
                                    <label class="label-floating">Enter Credit Hour</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="prerequisites">
                                    <label class="label-floating">Enter Prerequisites</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="credit_point">
                                    <label class="label-floating">Enter Credit Point</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="academic_year">
                                    <label class="label-floating">Enter Academic Year</label>
                                  </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                  <div class="position-relative mb-10">
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="semester">
                                    <label class="label-floating">Enter Semester</label>
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
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Instructor</th>
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
              <td>' . $row['name'] . '</td>
              <td>' . $row['duration'] . '</td>
              <td>' . $row['credits'] . '</td>
               <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <form method="POST" action="">
                            <input type="hidden" name="course_id" value="' .$row['id'].' ">
                            <button type="submit" name = "delete" class="dropdown-item" onclick="return confirm("Are you sure you want to delete this admin?")">
                                <i class="fas fa-trash-alt"></i> Delete Course
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