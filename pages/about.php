<!DOCTYPE html>
<html lang="en">

<head>

    <?php 
   include '../components/styles.php';
   ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
    <?php
    include '../components/topbar.php';
    ?>
    <!-- Topbar Start -->
 
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include '../components/header.php';
    ?>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <?php
    include '../components/fullscreen.php';
    ?>
    <!-- Full Screen Search End -->


    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About DDU</h5>
                        <h1 class="mb-0">Dire Dawa University Background</h1>
                    </div>
                    <p class="mb-4">Dire Dawa University is found in the industrial and commercial city of Dire Dawa, which is located at 515 km east of Addis Ababa. It is a young higher education institution, established and started its teaching and learning activities in 2007 academic year. The university is established with Ethiopian government’s willingness and determination to expand higher education coverage and ensure its equitable distribution across the country in order to produce competent human resources and research outputs to meet the national development target through poverty reduction strategy.

 

The actual operation of the university began by enrolling 754 regular students in three faculties (Faculty of Natural Science and Mathematics, Faculty of Social Science and language and Faculty of Business and Economics) in 13 different undergraduate academic programs with 90 academic staff and 103 administrative support staff operating with limited facilities. In 2008, the satellite campus of Haramaya University was merged with Dire Dawa University, which gave an opportunity to gain more buildings and workshops.

 

Currently (i.e.,2019 G.C.) the university has one Institute (Institute of Technology) and Five Colleges (College of Natural & Computational Science, College of Business & Economics, College of Social Sciences & Humanities, College of Law and College of Medicine and Health Science) with 47 undergraduate and 46 graduate programs. The current enrollment has reached to more than 21,159 students in undergraduate and graduate programs via regular and non-regular admission modalities.

Institute of Technology is one of the ten institutes started in Ethiopia to support the realization of the transition towards the industry-led economy. The University was contributing to the then national policy of 70:30 (Engineering &Natural Science to Social Sciences) program mix through prioritization of science and technology.</p>
                    <!-- <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div> -->
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+251-251-127971</h4>
                        </div>
                    </div>
                    <!-- <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a> -->
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="../img/about_ddu.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Footer Start -->
    <?php  
    include '../components/footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <?php  
    include '../components/scripts.php';
    ?>
</body>

</html>