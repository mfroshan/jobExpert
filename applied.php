<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
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
                            <h2>Applied Jobs</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>

        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                        <?php  
                $jsID = $result['jsID'];

                echo("<script>console.log('PHP: " .$result['jsID']. "');</script>");
                $jobdet = $conn->query("
                select * from job_apply_m jm
                inner join job_apply_c jc on jm.jobm_id = jc.jobm_id
                inner join jobseeker js on jm.jsID = js.jsID
                inner join jobs jb on jc.job_id = jb.job_id
                inner join company cmp on cmp.Cid = jb.Cid 
                where jm.jsID = $jsID
                ");

                $i=1;
                $cnt = $jobdet->num_rows;
                if($cnt>0){
              while($jobDetails = $jobdet->fetch_assoc()){
                
                
        ?>
                            <div class="job-items">
                            
                                <div class="job-tittle">
                                     <h4> <?php echo $i ?>. Job Name: <?php  echo " ".$jobDetails['job_name'] ?></h4>
                                    <ul>
                                        <li>Application Status:
                                    <?php 
                                            if($jobDetails['selectStatus']==0){ 
                                    ?>
                                            <p class="text-warning">Pending</p>
                                            <?php }else if($jobDetails['selectStatus']==1){?>
                                                <p class="text-success">selected</p>
                                                <?php if(!empty($jobDetails['appointmentLetter'])){ ?>
                                                        <a href='login/images/<?php echo $jobDetails['appointmentLetter'];?>' download><p class="text-primary">Get Your Offer Letter</p></a>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <p class="text-danger">Sorry Rejected</p>
                                        <?php } ?>
                                              <a href="mailto:<?php echo $jobDetails['Cusername']; ?>?subject=Enquiry about Job">
                                              <p class="text-primary">
                                              <i class="fa fa-envelope" aria-hidden="true">
                                                Mail us
                                                </i>
                                            </p>
                                           
                                            </a>
                                            </li>
                                    </ul>
                                </div>
                                
                            </div>
                            <?php 
                          $i = $i+1;
                        } 
                    }else{
                        ?>
                       <div style="display: flex;
            justify-content: space-around;"
                    class="p-3 mb-2">
                       <p class="h1 text-danger">No Applied Job!</p>
                        
                        </div>
                        <button class="btn"><a href="job_listing.php">Apply</a></button>
                     <?php } ?>
                        </div>
                        
                    </div>
                    <!-- Right Content -->
                </div>
            </div>
        </div>
        <?php 
    include('includes/footer.php');

    ?>
     <form method="post"  enctype="multipart/form-data">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Check Your Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
               
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="<?php echo $result['fname']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="staticEmail" value="<?php echo $result['lname']?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" placeholder="<?php echo $result['jusername']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="resumeR" class="col-sm-2 col-form-label">Upload Resume</label>
                        <div class="col-sm-10">
                        <input type="file" id="resume" name="pdf_file" accept=".pdf" required>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="apply" name="apply">Apply</button>
                </div>
                </div>
            </div>
            </div>
            </form>

    </main>
    

	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
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
    </body>
</html>