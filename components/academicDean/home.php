<div class="content">
    <div class="card">
        <div class="card-header">
            <div class="section-title position-relative pb-3 mb-5">
                <h1 class="mb-0">Welcome, Academic Dean <?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>!</h1>
            </div>
            <p class="mb-4">Welcome to your personalized dashboard! As an Academic Dean, you have access to a wide range of administrative functions to manage your academic institution effectively.</p>
            <p class="mb-4">With this dashboard, you can add and manage courses, register departments, add new instructors, and assign instructors to courses. Stay organized and ensure smooth academic operations.</p>
            <div class="row g-0 mb-3">
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                    <h5 class="mb-3"><i class="fa fa-plus-circle text-primary me-3"></i>Add Courses</h5>
                    <p>Add new courses to the curriculum and manage course details such as course code, name, duration, and credits.</p>
                </div>
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.8s">
                    <h5 class="mb-3"><i class="fa fa-building text-primary me-3"></i>Register Departments</h5>
                    <p>Register departments within your academic institution and maintain department information.</p>
                </div>
                <div class="col-sm-6 wow zoomIn" data-wow-delay="1s">
                    <h5 class="mb-3"><i class="fa fa-user-plus text-primary me-3"></i>Register Instructors</h5>
                    <p>Register new instructors to the system by providing their relevant details and assigning them to departments.</p>
                </div>
                <div class="col-sm-6 wow zoomIn" data-wow-delay="1.2s">
                    <h5 class="mb-3"><i class="fa fa-user-graduate text-primary me-3"></i>Assign Instructors to Courses</h5>
                    <p>Assign instructors to specific courses, ensuring proper allocation and management of teaching resources.</p>
                </div>
            </div>
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fa fa-info-circle text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="mb-2">Need Assistance?</h5>
                    <p class="mb-0">Feel free to contact us for any queries or assistance. Our support team is available 24/7 to help you with your academic management tasks.</p>
                </div>
            </div>
        </div>
    </div>
</div>