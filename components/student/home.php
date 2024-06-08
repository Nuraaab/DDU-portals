<?php
$studentEmail = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$studentEmail'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
	$username = $row['username'];
}
if($username !== NULL){
echo'<div class="content">
     <div class="card">
           <div class="card-header">
            <div class="section-title position-relative pb-3 mb-5">
                <h1 class="mb-0">Welcome, '. $_SESSION['first_name'].'</h1>
            </div>
            <p class="mb-4">Welcome to your personalized student dashboard! This platform serves as your central hub for managing your academic journey effectively. Here, you have seamless access to a plethora of features designed to enhance your learning experience and track your progress effortlessly.</p>

                <p class="mb-4">Explore your courses with ease, view detailed course materials, and stay updated on important announcements and deadlines. Dive into your results to monitor your academic performance closely and identify areas for improvement. Download course materials for offline study sessions and access your result slips for record-keeping purposes.</p>
                <p class="mb-4">Should you need any assistance or have inquiries, our dedicated support team is available around the clock to provide guidance and address any concerns you may have. Your success is our priority, and we are here to support you every step of the way on your academic journey.</p>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-file-alt text-primary me-3"></i>View Your Results</h5>
                        <p>Access and view your academic results online.</p>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-graduation-cap text-primary me-3"></i>Explore Your Courses</h5>
                        <p>Browse through available courses and explore various subjects offered by the institution.</p>
                    </div>
                </div>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                        <h5 class="mb-3"><i class="fa fa-download text-primary me-3"></i>Download Course Materials</h5>
                        <p>Download course materials such as lecture notes, presentations, and study guides to aid in your studies.</p>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.8s">
                        <h5 class="mb-3"><i class="fa fa-file-download text-primary me-3"></i>Download Result Slips</h5>
                        <p>Download and print your result slips for reference or official purposes.</p>
                    </div>
                </div>
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
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
</div>';
}else{
    echo '<div class="content mt-5">
    <div class="card">
            <div class="card-body">
            <p>You are not approved! Please try latter.</p>
            </div>
        </div>
        </div>';
}
?>
    
 