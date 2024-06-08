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
.content-inner {
    overflow-y: auto;
    max-height: 700px; 
}
	</style>
	
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php'); 
    exit();
}
?>
	<div class="navbar navbar-expand-lg navbar-dark bg-navbar navbar-static">

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
							
								<h6 class="mb-0 text-white text-shadow-dark mt-3"><?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?></h6>
								<span class="font-size-sm text-white text-shadow-dark"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></span>
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
								<form method="POST" action="" id='form'>
							
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
							<a href="?section=admin" class="nav-link {{request()->routeIs('editUser')|| request()->routeIs('register')||request()->routeIs('user') ? 'active' : '' }}">
                             <i class="icon-user"></i>
								<span>Admins</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="?section=student" class="nav-link {{request()->routeIs('agent.create')|| request()->routeIs('agent.edit')||request()->routeIs('agent.index') ? 'active' : '' }}">
                             <i class="icon-user"></i>
								<span>Students</span>

							</a>
						
						</li>

						<li class="nav-item">
							<a href="?section=instructor" class="nav-link {{request()->routeIs('customer.create')|| request()->routeIs('customer.edit')||request()->routeIs('customer.index') ? 'active' : '' }}">
                            <i class="icon-user"></i>
								<span>Instructors</span>

							</a>
						</li>
						<li class="nav-item">
							<a href="?section=cde" class="nav-link {{request()->routeIs('customer.create')|| request()->routeIs('customer.edit')||request()->routeIs('customer.index') ? 'active' : '' }}">
                            <i class="icon-user"></i>
								<span>CDE Officers</span>

							</a>
						</li>
                        <li class="nav-item">
							<a href="?section=registrar" class="nav-link {{request()->routeIs('customer.create')|| request()->routeIs('customer.edit')||request()->routeIs('customer.index') ? 'active' : '' }}">
                            <i class="icon-user"></i>
								<span>Registrar Officers</span>

							</a>
						</li>

                        <li class="nav-item">
							<a href="?section=dean" class="nav-link {{request()->routeIs('customer.create')|| request()->routeIs('customer.edit')||request()->routeIs('customer.index') ? 'active' : '' }}">
                            <i class="icon-user"></i>
								<span>Academic Dean</span>

							</a>
						</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
		</div>


        <div class="content-wrapper">
    <div class="content-inner">
	<?php
        $section = isset($_GET['section']) ? $_GET['section'] : 'home';
            $sections = array(
                'home' => '../../components/admin/home.php',
                'admin' => '../../components/admin/admin.php',
                'student' => '../../components/admin/student.php',
                'instructor' => '../../components/admin/instructor.php',
				'cde' => '../../components/admin/cdeOfficer.php',
                'registrar' => '../../components/admin/registrarOfficer.php',
				'dean' => '../../components/admin/academicDean.php',
				'change_password' => '../../components/admin/changePassword.php',
            );
            if (array_key_exists($section, $sections)) {
                include $sections[$section];
            } else {
                echo "Section not found!";
            }
 ?>
        </div>
    </div>

</div>
	</div>
</body>
</html>