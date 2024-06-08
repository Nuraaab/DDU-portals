<div class="content">
    <div class="card">
    <div class="card-header">
    <div class="section-title position-relative pb-3 mb-5">
        <h1 class="mb-0">Welcome, Admin <?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>!</h1>
    </div>
    <p class="mb-4">Welcome to your personalized dashboard! As an admin, you have access to a wide range of administrative functions to manage user accounts effectively.</p>
    <p class="mb-4">With this dashboard, you can create new user accounts, activate accounts, and deactivate accounts. Stay organized and ensure smooth user management operations.</p>
    <div class="row g-0 mb-3">
        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
            <h5 class="mb-3"><i class="fa fa-plus-circle text-primary me-3"></i>Create User Accounts</h5>
            <p>Create new user accounts by providing their relevant details such as username, email, and password.</p>
        </div>
        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.8s">
            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Activate User Accounts</h5>
            <p>Activate user accounts that are currently in a deactivated state, allowing users to access the system.</p>
        </div>
        <div class="col-sm-6 wow zoomIn" data-wow-delay="1s">
            <h5 class="mb-3"><i class="fa fa-times-circle text-primary me-3"></i>Deactivate User Accounts</h5>
            <p>Deactivate user accounts to restrict access and prevent users from logging into the system.</p>
        </div>
    </div>
    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
            <i class="fa fa-info-circle text-white"></i>
        </div>
        <div class="ps-4">
            <h5 class="mb-2">Need Assistance?</h5>
            <p class="mb-0">Feel free to contact us for any queries or assistance. Our support team is available 24/7 to help you with your user management tasks.</p>
        </div>
    </div>
</div>
    </div>
</div>