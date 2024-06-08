<?php
include '../../auth/connection.php';
$message = $errors = "";
$errors = array();
if (isset($_POST['submit'])) {
    $student_id = $_POST['id'];
    $acadamic_year = $_POST['year'];
    $semister = $_POST['semister'];
    $student_result = $_POST['result']; 
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $credit_point = $_POST['credit_point'];
    $credit_hour = $_POST['credit_hour'];
    $check_student_sql = "SELECT * FROM users WHERE username = '$student_id'";
    $student_result_check = $conn->query($check_student_sql); 
    if ($student_result_check->num_rows > 0) {
        $sql = "INSERT INTO student_result (student_id, course_name, course_code, credit_hour, credit_point, academic_year, semester, result) VALUES ('$student_id', '$course_name', '$course_code', '$credit_hour', '$credit_point', '$acadamic_year', '$semister', '$student_result')";
        if ($conn->query($sql) === TRUE) {
            $message = "Result Added Successfully";
        } else {
            $message = "Registration failed: " . $conn->error;
        }
    } else {
        $message = "Student not known";
    }
}
  $instructor_id = $_SESSION["id"];
  $courses_query = "SELECT * FROM courses WHERE instructor_id = '$instructor_id'";
  $courses_result = mysqli_query($conn, $courses_query);
if (mysqli_num_rows($courses_result) > 0) {
    echo '<div class="content">';
    echo '<div class="card">';
    echo '<div class="card-header">
    <h5>Hello Instructor ' . $_SESSION['first_name'] . '</h5>
    <h6>You Can Add Student Result For Your Courses.</h6>
    <h6>' .$message. '</h6>
     </div>
    <table class="table datatable-button-html5-columns">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Pre-Request</th>
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
                <td>' . $row['prerequisites'] . '</td>
                <td>' . $row['credits'] . '</td>
                <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_' . $row['id'] . '"><i class="fas fa-plus"></i> Add Student Result</a>
                        </div>
                     </div>
                </div>
            </td>
          </tr>
          <div class="modal fade" id="myModaldescription_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header bg-info">
                  <h2> Add result for ' . $row['course_name'] . '</h2>
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
                            <h6>' .$message. '</h6>
                        </div>
                            <div class="card-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-sm-12 form-group-floating mb-3">
                                    <div class="position-relative mb-10">
                                      <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="id">
                                      <label class="label-floating">Enter Student ID</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-12 form-group-floating mb-3">
                                    <div class="position-relative mb-10">
                                      <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="year">
                                      <label class="label-floating">Enter Acadamic Year</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-12 form-group-floating mb-3">
                                    <div class="position-relative mb-10">
                                      <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="semister">
                                      <label class="label-floating">Enter Semister</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-12 form-group-floating mb-3">
                                    <div class="position-relative mb-10">
                                      <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="result">
                                      <label class="label-floating">Enter Result(Out of 100%)</label>
                                    </div>
                                  </div>
                                 <input type="hidden" name="course_code" value=" ' .$row['course_code']. ' "/>
                                 <input type="hidden" name="course_name" value=" ' .$row['course_name']. ' "/>
                                 <input type="hidden" name="credit_point" value=" ' .$row['credits']. ' "/>
                                 <input type="hidden" name="credit_hour" value=" ' .$row['duration']. ' "/>
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
          <div class="card-body">
          <p>No results found</p>
          </div>
      </div>
      </div>';
}
mysqli_close($conn);
echo '';
?>