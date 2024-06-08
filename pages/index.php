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

    <!-- Navbar & Carousel Start -->
            <?php
            include '../components/header.php';
            ?>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
             <?php
            include '../components/fullscreen.php';
            ?>
    <!-- Full Screen Search End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Academic Staff</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">1384</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fas fa-user-tie text-white"></i> 
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Admin Staff</h5>
                            <h1 class="mb-0" data-toggle="counter-up">1609</h1>
                        </div>
                    </div>
                </div>
               

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-users text-primary"></i>
                            
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Under-graduate Program</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">48</h1>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
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
    <!-- About End -->




    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
                <h1 class="mb-0">We Provide</h1>
            </div>
            <div class="row g-5">
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon">
                        <i class="fa fa-shield-alt text-white"></i>
                    </div>
                    <h4 class="mb-3">Student Support Services</h4>
                    <p class="m-0">Providing comprehensive support to ensure student success and well-being.</p>
                    <a class="btn btn-lg btn-primary rounded" href="">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon">
                        <i class="fa fa-chart-pie text-white"></i>
                    </div>
                    <h4 class="mb-3">Study Abroad Programs</h4>
                    <p class="m-0">Explore international education opportunities and experience new cultures.</p>
                    <a class="btn btn-lg btn-primary rounded" href="">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="service-icon">
                        <i class="fa fa-code text-white"></i>
                    </div>
                    <h4 class="mb-3">Continuing Education</h4>
                    <p class="m-0">Advance your career with our diverse range of continuing education programs.</p>
                    <a class="btn btn-lg btn-primary rounded" href="">
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

             
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Latest Blog</h5>
                <h1 class="mb-0">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="../img/blog1.jpg" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>ወቅታዊ መረጃ</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i> April 30, 2024</small>
                            </div>
                            <h4 class="mb-3">ብክለት ይብቃ ውበት ይንቃ" ሀገራዊ የአካባቢ እንክብካቤ እና ጽዳት ንቅናቄን አስመልክቶ በድሬደዋ ከተማ በተካሄደው የፅዳት ዘመቻ ላይ ድሬደዋ ዩኒቨርሲቲ ተሳተፈ</h4>
                            <p>ቀኑን አስመልክቶ የተዘጋጀውን የፅዳት ዘመቻ በይፋ ያስጀመሩት የድሬዳዋ አስተዳደር ም/ከንቲባ የተከበሩ አቶ ሀርቢ ቡህ ለመኖሪያ ምቹ አካባቢን ለመፍጠር ሁላችንም ትልቅ ኃላፊነት አለብን፡፡</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="../img/blog2.jpg" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>ወቅታዊ መረጃ</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i> April 30, 2024</small>
                            </div>
                            <h4 class="mb-3">SEMINAR ON CAPITAL MARKET OVERVIEW, ARCHITECTURE, OPPORTUNITIES, AND CHALLENGES.</h4>
                            <p>Professor Meruane Lakehal-Ayat, The US Ambassador’s Distinguished Scholar, delivered a one-day seminar on Capital Market to the College of Business and Economics staff.</p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="../img/blog3.jpg" alt="">
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i>ወቅታዊ መረጃ</small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>April 29, 2024</small>
                            </div>
                            <h4 class="mb-3">በድሬዳዋ አስተዳደር የ1ኛና 2ኛ ደረጃ  መምህራን ሲሰጥ የነበረው የዓቅም-ግንባታ ስልጠና ተጠናቀቀ።</h4>
                            <p>ድሬ ዳዋ ዩኒቨርሲቲ ከድሬደዋ አስተዳደር ትምህርት ቢሮ ጋር በመተባበር በአስተዳደሩ የመጀመሪያና  ሁለተኛ ደረጃ ትምህርት ቤት ለሚያስተምሩ  መምህራን ለሁለት ቀናት የቆይ በአንግሊዘኛ ቋንቋ ላይ ያተኮረ የአቅም-ግንባታ ሥልጠና ተሰጥቷል፡፡  </p>
                            <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <?php  
        include '../components/footer.php';
        ?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

<?php  
include '../components/scripts.php';
?>
</body>

</html>