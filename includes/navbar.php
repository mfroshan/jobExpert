<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                            <!-- <h1 class="display-4">JOBEXPERT</h1> -->
                        <h3>
                        <span class="badge badge-secondary"><a href="index.html">JOBEXPERT</a>
                        </span> 
                        </h3>        
                    </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="../jobExpert/index.php">Home</a></li>
                                            <li><a href="../jobExpert/job_listing.php">Find a Job </a></li>
                                            <li><a href="../jobExpert/companies.php">Company </a></li>
                                            <!-- <li><a href="../jobExpert/about.php">About</a></li> -->
                                            <!-- <li><a href="../jobExpert/contact.php">Contact</a></li> -->
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <?php 
                                    include('db/connection.php');
                                    session_start();
                                    $result = array();
                                    if(isset($_SESSION['susername'])){
                                    $email =  $_SESSION['susername'];
                                    $sql = $conn->query("select * from jobseeker where jusername='$email'");
                                    $result = $sql->fetch_assoc(); 
                                  ?>
                                  <div class="dropdown show">
                                  <a class="nav-link nav-profile d-flex align-items-center pe-0" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src='./login/images/<?php echo $result['image']; ?>' alt="Profile" class="rounded-circle"
                                            style="width:52px;height:50px;margin-right:4px"
                                            >
                                            <span style="color:black;" class="d-none d-md-block dropdown-toggle ps-2"><?php echo $result['fname']." ".$result['lname'] ?></span>
                                        </a>
                                        <!-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Dropdown link
                                        </a> -->
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="connection.php">Connection</a></li>
                                            <a class="dropdown-item" href="applied.php">Applied Jobs</a>
                                            <li>
                                            <a class="dropdown-item d-flex align-items-center" href="./login/logout.php">
                                                <i class="bi bi-box-arrow-right"></i>
                                                <span>Sign Out</span>
                                            </a>
                                            </li>
                                        </div>
                                        </div>
                                <?php }else{ ?>
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="../../jobExpert/login/signup.php" class="btn head-btn1">Register</a>
                                    <a href="../../jobExpert/login/login.php" class="btn head-btn2">Login</a>
                                </div>
                                    <?php 
                                    }
                                    ?>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>