<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Jobs</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>

   <body>
    <!-- Preloader Start -->
    <?php 
    include('db/connection.php');
    include('includes/navbar.php');
    ?>
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Get your job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="rgb(27, 207, 107)"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Category</h4>
                                </div>
                                <form method="post">
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select name="selectC" id="selectC" onchange="change(this.value)">
                                        <option selected></option>
                                    <?php 
                    $cat = $conn->query("select * from category");
                    while($catResult = $cat->fetch_assoc()){
                ?>
                <option value="<?php echo $catResult['cat_id']; ?>"><?php echo $catResult['cat_name']; ?></option>
                   <?php  } ?>
                                    </select>
                                    </form>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                </div>
                                <!-- select-Categories End -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <?php 
                                    include('functions.php');
                                    $getJob = getjobs();
                                    if(!empty($getJob)){
                                    foreach( $getJob as $jobsResult ){
                                    ?>
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#"><img style="width:85px;height:85px;" src="login/images/<?php echo $jobsResult['cImage']?>" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">  
                                            <?php if(isset($_SESSION['susername'])){ ?>

                                            <a href="job_details.php?id=<?php echo $jobsResult['job_id'] ?>">
                                                <h4><?php echo $jobsResult['job_name'] ?></h4>
                                            </a>
                                            <?php }else{ ?>
                                                <a href="login/login.php">
                                                <h4><?php echo $jobsResult['job_name'] ?></h4>
                                            </a>                                     
                                        <?php } ?>
                                            <ul>
                                                <li><i class="fas fa-building"></i><?php echo $jobsResult['cName']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['susername'])){ ?>
                                    <div class="items-link items-link2 f-right">
                                        <a href="job_details.php?id=<?php echo $jobsResult['job_id'] ?>">Apply</a>
                                    </div>
                                    <?php }else{ ?>

                                    <div class="items-link items-link2 f-right">
                                        <a href="login/login.php">Apply</a>
                                    </div>                                        
                                        <?php } ?>
                                </div>
                                <?php } ?>
                                <?php }else{
                                    ?>
                                   
                                   <p class="h1 text-danger">No Job Yet!</p>
                                    
                                    <?php
                                } ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href=""><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        
    </main>
    <?php 
    include('includes/footer.php');
    ?>

	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Range -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/price_rangs.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        <script>
            let selectMenu =document.getElementById('selectC');
            let container = document.querySelector(".featured-job-area");
            
            console.log("slect:"+selectMenu.value);
            // selectMenu.addEventListener('change', function(){
            const change = (id) => {
            let categoryid = id;
            console.log("select:"+categoryid);

            let http = new XMLHttpRequest();

            	http.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let response = JSON.parse(this.responseText);
                        let out = "";
                        for(let data of response){
                            out += `
                            <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="#">
                                            <img style="width:85px;height:85px;"  
                                            src="login/images/${data.cImage}" alt=""></a>
                                        </div>
                                        <div class="job-tittle job-tittle2">
                                            <a href="job_details.php?id=${data.job_id}">
                                                <h4>${data.job_name}</h4>
                                            </a>
                                            <ul>
                                                <li><i class="fas fa-building"></i>${data.cName}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php if(isset($_SESSION['susername'])){ ?>
                                    <div class="items-link items-link2 f-right">
                                        <a href="job_details.php?id=${data.job_id}">Apply</a>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="items-link items-link2 f-right">
                                        <a href="login/login.php">Apply</a>
                                    </div>                                        
                                        <?php } ?>
                            </div>

                           
                            `;
                        }
                        container.innerHTML = out;
                    };
                 }
 

            http.open('POST', "script.php", true);
            http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            http.send("category="+categoryid);
         }
        </script>
    </body>
</html>