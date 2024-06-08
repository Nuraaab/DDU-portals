<?php
include '../../auth/connection.php';
$student_query = "SELECT * FROM users WHERE role = 'Student' ";
$student_result = mysqli_query($conn, $student_query);
echo'  <div class="page-header page-header-light">
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
  <div class="d-flex">
      <div class="breadcrumb">
          <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <span class="breadcrumb-item active">Generate Report</span>
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
   </div>';
  echo'<table class="table datatable-button-html5-columns">
          <thead>
              <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Department</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
          <tbody>';
  while ($row = mysqli_fetch_assoc($student_result)) {
      echo '<tr>
              <th>' . $row['id'] . '</th>
              <td>' . $row['username'] . '</td>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['department'] . '</td>
              <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <form method="POST" action="../../components/registrarOfficer/generatePdf.php">
                                <input type="hidden" name="name" value="' .$row['first_name'].' ' .$row['last_name'].'">
                                <input type="hidden" name="department" value="' .$row['department'].'">
                                <button class="dropdown-item" name="submit" type="submit">
                                    <i class="fa fa-check-circle me-3"></i> Generate Report 
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

