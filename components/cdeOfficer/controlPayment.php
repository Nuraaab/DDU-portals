<?php
include '../../auth/connection.php';
$message = "";
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $query = "UPDATE users SET  amount_due = '$amount', payment_status= '$status' WHERE id = '$id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $message  = "Payment Updated successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

$student_query = "SELECT * FROM users WHERE role = 'Student' ";
$student_result = mysqli_query($conn, $student_query);
$status= 0;
echo'  <div class="page-header page-header-light">
<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline mt-3">
  <div class="d-flex">
      <div class="breadcrumb">
          <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
          <span class="breadcrumb-item active">CDE Officer</span>
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
   if($message !== ''){
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
                  <th>Amount Due</th>
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
              <td>' . $row['username'] . '</td>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['amount_due'] . '</td>
              <td>' . $status . '</td>
              <td class="text-center">
                <div class="list-icons">
                    <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                            <i class="icon-menu9"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModaldescription_'.$row['id'].' ">
                            <i class="fas fa-edit"></i> Edit Payment Info
                        </a>';
                    echo'</div>
                    </div>
                     
                </div>
            </td>
        </tr>

        <div class="modal fade" id="myModaldescription_'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
              <h2> Edit Payment Info </h2>
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
                                    <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="amount" value = "'.$row['amount_due'].' ">
                                    <label class="label-floating">Edit Amount</label>
                                </div>
                                </div>
                                <div class="col-sm-12 form-group-floating mb-3">
                                <div class="position-relative mb-10">
                                 <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="status" value = "'.$row['payment_status'].' ">
                                <label class="label-floating">Payment Status</label>
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

