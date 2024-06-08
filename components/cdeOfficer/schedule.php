<?php
include '../../auth/connection.php';
$departments = []; 
$result = mysqli_query($conn, "SELECT * FROM department");
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $department = $row['dept_name'];
    $departments[$id] = $department;
  }
} else {
  echo "Error: " . mysqli_error($connection);
}

$courses = [];
$result = mysqli_query($conn, "SELECT * FROM courses");
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $courses[] = $row;
  }
} else {
  echo "Error: " . mysqli_error($connection);
}


$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
if (isset($_POST['submit'])) {
    $selectedOption = $_POST['course'];
    $values = explode('_', $selectedOption);
    $courseId = $values[0];
    $instructorId = $values[1];
    $department = $_POST['department'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $query = "INSERT INTO schedule (instructor_id, day, start_time, end_time, course_id, department_id) VALUES ('$instructorId', '$day', '$start_time', '$end_time', '$courseId', '$department')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Schedule Added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $selectedOption = $_POST['course'];
    $values = explode('_', $selectedOption);
    $courseId = $values[0];
    $instructorId = $values[1];
    $department = $_POST['department'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $query = "UPDATE schedule SET  instructor_id = '$instructorId', day= '$day', start_time = '$start_time', end_time = '$end_time', course_id = '$courseId', department_id = '$department' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Schedule Updated successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM schedule WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
    $message = "Schedule Deleted successfully.";
    } else {
    $message = "Error: " . mysqli_error($conn);
    }
    }
$schedule_query = "SELECT s.*, u.first_name AS instructor_name, c.course_name AS course_name
                    FROM schedule s
                    INNER JOIN users u ON s.instructor_id = u.id
                    INNER JOIN courses c ON s.course_id = c.id";
                    $instructor_name ="";
$schedule_result = mysqli_query($conn, $schedule_query);
echo' <div class="page-header page-header-light">
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
   <div class="d-flex">
       <div class="breadcrumb">
           <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
           <span class="breadcrumb-item active">Schedule</span>
       </div>
       <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
   </div>
  
   <div class="d-flex">
   <div class="breadcrumb">
        <a class="breadcrumb-item" data-toggle="modal" data-target="#myModaldescription"><i class="icon-user mr-2"></i>Add Schedule</a>
   </div>
   <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header bg-info">
       <h2> Add Schedule </h2>
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
                      <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                name="department" required>';
                                foreach ($departments as $id => $department) {
                                    echo '<option value="' . $id . '">' . $department . '</option>';
                                    }
                                    echo' </select>
                                    <label class="label-floating">Select Department</label>
                                    </div>
                                    </div>
                                <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                    <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                    name="day" required>';
                                    foreach ($days as $day) {
                                        echo '<option value="' . $day . '">' . $day . '</option>';
                                    }
                                echo' </select>
                                    <label class="label-floating">Select Day</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                <select class="form-control form-control-outline select-search" data-fouc placeholder="Placeholder" name="course" required>';
                                    foreach ($courses as $course){
                                        $optionValue = $course['id'] . '_' . $course['instructor_id'];
                                        $optionText = $course['course_name'];
                                        echo '<option value="' . $optionValue . '">' . $optionText . '</option>';
                                    }
                                echo' </select>
                                <label class="label-floating">Select Course</label>
                                </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3">
                                <div class="position-relative mb-10">
                                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="start_time">
                                  <label class="label-floating">Enter Start Time</label>
                                </div>
                              </div>

                              <div class="col-sm-12 form-group-floating mb-3">
                              <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="end_time">
                                <label class="label-floating">Enter End Time</label>
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
if (mysqli_num_rows($schedule_result) > 0) {
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
                  <th>Instructor</th>
                  <th>Day</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                  <th>Course</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($schedule_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['instructor_name'] . '</td>
              <td>' . $row['day'] . '</td>
              <td>' . $row['start_time'] . '</td>
              <td>' . $row['end_time'] . '</td>
              <td>' . $row['course_name'] . '</td>
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
                                <i class="fas fa-trash-alt"></i> Delete Schedule
                            </button>
                        </form>
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_'.$row['id'].' ">
                            <i class="fas fa-edit"></i> Edit Schedule
                        </a>
                        </div>
                    </div>
                     
                </div>
            </td>
        </tr>

        <div class="modal fade" id="myModaldescription_'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
              <h2> Edit Schedule </h2>
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
                              <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                name="department" required>';
                                foreach ($departments as $id => $department) {
                                    $selected = ($id == $row['department_id']) ? 'selected' : '';
                                    echo '<option value="' . $id . '" ' . $selected . '>' . $department . '</option>';
                                    }
                                    echo' </select>
                                    <label class="label-floating">Select Department</label>
                                    </div>
                                    </div>
                                <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                    <select class="form-control form-control-outline select-search" data-fouc   placeholder="Placeholder" 
                                    name="day" required>';
                                    foreach ($days as $day) {
                                        $selected = ($day == $row['day']) ? 'selected' : '';
                                        echo '<option value="' . $day . '" ' . $selected . '>' . $day . '</option>';
                                    }
                                echo' </select>
                                    <label class="label-floating">Select Day</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3" >
                                <div class="position-relative mb-10 py-2">
                                <select class="form-control form-control-outline select-search" data-fouc placeholder="Placeholder" name="course" required>';
                                    foreach ($courses as $course){
                                        $selected = ($course['id'] == $row['course_id']) ? 'selected' : '';
                                        $optionValue = $course['id'] . '_' . $course['instructor_id'];
                                        $optionText = $course['course_name'];
                                        echo '<option value="' . $optionValue . '" ' . $selected . '>' . $optionText . '</option>';
                                    }
                                echo' </select>
                                <label class="label-floating">Select Course</label>
                                </div>
                                </div>

                                <div class="col-sm-12 form-group-floating mb-3">
                                <div class="position-relative mb-10">
                                  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="start_time" value= "'.$row['start_time'].' ">
                                  <label class="label-floating">Enter Start Time</label>
                                </div>
                              </div>

                              <div class="col-sm-12 form-group-floating mb-3">
                              <div class="position-relative mb-10">
                                <input type="text" class="form-control form-control-outline" placeholder="Placeholder" name="end_time"  value= "'.$row['end_time'].' ">
                                <label class="label-floating">Enter End Time</label>
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