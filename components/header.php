<?php
session_start(); 
?>
<div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"></i>DIRE DAWA UNIVERSITY</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.php" class="dropdown-item">Blogs</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <?php
                    if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
                        switch ($_SESSION['role']) {
                            case "Registrar_Officer":
                                echo '<a href="registrarOfficer.php" class="btn btn-primary py-2 px-4 ms-3">My Dashboard</a>';
                                break;
                            case "CDE_Officer":
                                echo '<a href="users/cdeOfficer.php" class="btn btn-primary py-2 px-4 ms-3">My Dashboard</a>';
                                break;
                            case "Instructor":
                                echo '<a href="users/instructor.php" class="btn btn-primary py-2 px-4 ms-3">My Dashboard</a>';
                                break;
                            case "Academic_Dean":
                                echo '<a href="acadamicDean.php" class="btn btn-primary py-2 px-4 ms-3">My Dashboard</a>';
                                break;
                            case "Student":
                                echo '<a href="users/student.php" class="btn btn-primary py-2 px-4 ms-3">My Dashboard</a>';
                                break;
                            default:
                            echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';

                        }
                    } else {
                        echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';
                    }
                    ?>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="../img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Dire Dawa University</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Oasis Of knowledge</h1>
                            <?php
                    if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
                        switch ($_SESSION['role']) {
                            case "Registrar_Officer":
                                echo '<a href="registrarOfficer.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "CDE_Officer":
                                echo '<a href="users/cdeOfficer.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Instructor":
                                echo '<a href="users/instructor.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Academic_Dean":
                                echo '<a href="acadamicDean.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Student":
                                echo '<a href="student.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            default:
                            echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';

                        }
                    } else {
                        echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';
                    }
                    ?>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Dire Dawa University</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Oasis Of knowledge</h1>
                            <?php
                    if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
                        switch ($_SESSION['role']) {
                            case "Registrar_Officer":
                                echo '<a href="registrarOfficer.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "CDE_Officer":
                                echo '<a href="users/cdeOfficer.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Instructor":
                                echo '<a href="instructor.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Academic_Dean":
                                echo '<a href="acadamicDean.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            case "Student":
                                echo '<a href="student.php" class="btn btn-primary py-2 px-4 ms-3">Go To Dashboard</a>';
                                break;
                            default:
                            echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';

                        }
                    } else {
                        echo '<a href="login.php" class="btn btn-primary py-2 px-4 ms-3">Get Started</a>';
                    }
                    ?>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>