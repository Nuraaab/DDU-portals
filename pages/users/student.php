<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../../assets/admin_assets/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="../../assets/admin_assets/assets/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">

	<script src="../../assets/admin_assets/global_assets/js/main/jquery.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/main/bootstrap.bundle.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script src="../../assets/admin_assets/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script src="../../assets/admin_assets/assets/js/app.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/demo_pages/datatables_extension_buttons_html5.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="../../assets/admin_assets/global_assets/js/demo_pages/form_select2.js"></script>
	<style>



		</style>
</head>

<body>
<?php
include '../../auth/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php'); 
    exit();
}

$studentEmail = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$studentEmail'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
	$id = $row['id'];
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$department = $row['department'];
    $paymentDate = $row['payment_date'];
    $paymentStatus = $row['payment_status'];
    $sixMonthsAgo = date('Y-m-d', strtotime('-6 months'));
	$_SESSION['pf_name'] = $first_name;
    $_SESSION['pl_name'] = $last_name;
    $_SESSION['amount'] = "2500";
    $_SESSION['paywith'] = "chapa";
	$_SESSION['user_id'] = $id;
	$_SESSION['payment_date'] = date('Y-m-d');

    if ($paymentStatus == 1 && $paymentDate <= $sixMonthsAgo) {
        $updateSql = "UPDATE users SET payment_status = 0 WHERE email = '$studentEmail'";
        $updateResult = mysqli_query($conn, $updateSql);

        if ($updateResult) {
            echo "Please make a new payment. Your previous payment has expired.";
        } else {
            echo "Error updating payment status: " . mysqli_error($conn);
        }
    } 
} else {
    echo "Error retrieving payment details: " . mysqli_error($conn);
}

if($paymentStatus == 0){
echo'<div class="navbar navbar-expand-lg navbar-dark bg-navbar navbar-static">

<div class="d-flex justify-content-end  flex-1 flex-lg-0 order-1 order-lg-2">
</div>
</div>
<div class="page-content" >
<div class="content">
     <div class="card">
	 <div class="card-header">
	 <div class="section-title position-relative pb-3 mb-5">
	   <h1 class="mb-0">Welcome, '.$_SESSION['first_name'].'! You need to finish your payment here</h1>
	 </div>
	 
	 <div class="row g-0">
	   <div class="col-sm-6">
		 <h5 class="mb-3"><i class="fa fa-money-check-alt text-primary me-3"></i>Pay Your Semester Fee</h5>
		 <p>To complete your registration, please make a payment of 2500 birr for the current semester using Chapa.</p>
		 <button  class="btn btn-primary" data-toggle="modal" data-target="#myModaldescription">Finish Your Payment</button>
	   </div>
	 </div>
	 <div class="modal fade" id="myModaldescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 <div class="modal-dialog modal-dialog-scrollable custom-modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header bg-info">
		<h2> Add your payment</h2>
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
					<form method="POST" action = "https://api.chapa.co/v1/hosted/pay">
					  <input type="hidden" name="public_key" value="CHAPUBK_TEST-HyooJYhz1BzgY0zoRfJZDQleOO2GJUXR" />';
					//   <input type="hidden" name="tx_ref" value="negade-tx-12345678sss9" />
					//   <input type="hidden" name="amount" value="10" />
					echo'<input type="hidden" name="currency" value="ETB" />
					  <input type="hidden" name="email" value="ahmednuru215@gmail.com" />';
					//   <input type="hidden" name="first_name" value="Israel" />
					//   <input type="hidden" name="last_name" value="Goytom" />
					 echo'<input type="hidden" name="title" value="Let us do this" />';
					echo'<input type="hidden" name="tx_ref" value=" '.uniqid().' ">';
					//   <input type="hidden" name="description" value="Paying with Confidence with cha" />
					echo'<input type="hidden" name="logo" value="https://chapa.link/asset/images/chapa_swirl.svg" />
					  <input type="hidden" name="callback_url" value="http://localhost/distance-education/components/registrarOfficer/callback.php" />
					  <input type="hidden" name="return_url" value="http://localhost/distance-education/components/registrarOfficer/callback.php" />
					  <input type="hidden" name="meta[title]" value="test" />
					  <input type="hidden" name="user_id" value=" '.$id.' " />
					  <div class="col-sm-12 form-group-floating mb-3">
						<div class="position-relative mb-10">
						  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="amount" value = "2500">
						  <label class="label-floating">Enter Amount</label>
						</div>
					  </div> 

					  <div class="col-sm-12 form-group-floating mb-3">
						<div class="position-relative mb-10">
						  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="first_name" value= "'. $first_name.' " disabled>
						  <label class="label-floating">Enter First Name</label>
						</div>
					  </div> 

					  <div class="col-sm-12 form-group-floating mb-3">
						<div class="position-relative mb-10">
						  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="last_name" value ="'. $last_name.' " disabled>
						  <label class="label-floating">Enter Last Name</label>
						</div>
					  </div> 

					  <div class="col-sm-12 form-group-floating mb-3">
						<div class="position-relative mb-10">
						  <input type="text" class="form-control form-control-outline" placeholder="Placeholder" required name="description">
						  <label class="label-floating">Enter Description</label>
						</div>
					  </div> 
					  <button class="btn btn-success pay-btn" type="submit" name ="submit">Pay With Chapa</button>
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
	 <div class="d-flex align-items-center mb-4 wow fadeIn mt-4" data-wow-delay="0.6s">
	   <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
		   <i class="fa fa-info-circle text-white"></i>
	   </div>
	   <div class="ps-4">
		   <h5 class="mb-2">Need Assistance?</h5>
		   <p class="mb-0">Feel free to contact us for any queries or assistance. Our support team is available 24/7.</p>
	   </div>
	 </div>
   </div>
</div>
</div>
</div>

';
}else{
echo'	<div class="navbar navbar-expand-lg navbar-dark bg-navbar navbar-static">

<div class="d-flex justify-content-end  flex-1 flex-lg-0 order-1 order-lg-2">
</div>
</div>
<div class="page-content" >
<div class="sidebar sidebar-light sidebar-main sidebar-expand-lg l-bg-slide ">
	<div class="sidebar-content">
		<div class="sidebar-section ">
			<div class="sidebar-user-material">
				<div class="sidebar-section-body">
					<div class="d-flex">
						<div class="flex-1">
						
						</div>
						<a href="" class="flex-1 text-center"><img src="../../assets/admin_assets/global_assets/images/demo/users/face6.jpg" class="img-fluid rounded-circle shadow-sm" width="80" height="80" alt=""></a>
						<div class="flex-1 text-right">
						
						</div>
					</div>

					<div class="text-center">
					
						<h6 class="mb-0 text-white text-shadow-dark mt-3">'.$_SESSION["first_name"].'</h6>
						<span class="font-size-sm text-white text-shadow-dark">' .$_SESSION["email"].'</span>
					</div>
				</div>
											
				<div class="sidebar-user-material-footer">
					<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
				</div>
			</div>

			<div class="collapse border-bottom" id="user-nav">
				<ul class="nav nav-sidebar">
					<li class="nav-item" >
					</li>
					<li class="nav-item">
						<form method="POST" action="" id="form">
					
							<a href="./logout.php" class="nav-link"
							><i class="icon-switch2"></i>Logout</a>
						</form>
					</li>
					<li class="nav-item">
						<a class="dropdown-item" href="?section=change_password">
							<i class="fas fa-lock"></i> Change Password
						</a>
					</li>
				</ul>
			</div>
		</div>



		<div class="sidebar-section">
			<ul class="nav nav-sidebar" data-nav-type="accordion" role="tablist">

				<!-- Main -->
				<li class="nav-item-header">
			<div class="text-uppercase font-size-xs line-height-xs mt-1">Main</div>
			 <i class="icon-menu" title="Main"></i></li>
				<li class="nav-item">
					<a href="?section=home" class="nav-link ">
						<i class="icon-home4"></i>
						<span>
						Home
						</span>
					</a>
				</li>
			
				<li class="nav-item">
					<a href="?section=view" class="nav-link ">
					 <i class="icon-eye"></i>
						<span>View Results</span>

					</a>
				</li>

				<li class="nav-item">
					<a href="?section=cource" class="nav-link ">
					 <i class="icon-eye"></i>
						<span>View Courses</span>

					</a>
				</li>

				<li class="nav-item">
					<a href="?section=schedule" class="nav-link">
					 <i class="icon-eye"></i>
						<span>View Schedule</span>

					</a>
				</li>

				<li class="nav-item">
					<a href="?section=material" class="nav-link ">
					<i class="icon-download"></i>
						<span>Download Materials</span>

					</a>
				</li>
				<li class="nav-item">
					<form method="POST" action="../../components/registrarOfficer/generatePdf.php">
					<input type="hidden" name="name" value="' .$first_name.' ' .$last_name.'">
					<input type="hidden" name="department" value="' .$department.'">
					<button style="margin-left:5px;" class="dropdown-item" name="submit" type="submit">
						<i class="fa fa-check-circle me-3"></i> Generate Report 
					</button>
				</form>
				</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
</div>


<div class="content-wrapper">
<div class="content-inner">';

$section = isset($_GET["section"]) ? $_GET["section"] : "home";
ob_start();
	$sections = array(
		"home" => "../../components/student/home.php",
		"view" => "../../components/student/studentResult.php",
		"cource" => "../../components/student/viewCource.php",
		"material" => "../../components/student/downloadMaterials.php",
		"schedule" => "../../components/student/viewSchedule.php",
		"change_password" => "../../components/student/changePassword.php",
	);
	ob_end_flush();
	if (array_key_exists($section, $sections)) {
		include $sections[$section];
	} else {
		echo "Section not found!";
	}

echo'</div>
</div>

</div>
</div>';
}

?>

</body>
</html>