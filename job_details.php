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
                            <h2>Job Description</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        <?php  
                $id = $_GET['id'];
                $jobdet = $conn->query("
                select * from jobs j 
                inner join category c on j.cat_id = c.cat_id
                inner join company cm on j.Cid = cm.Cid
                where job_id = '$id'
                ");
                $jobDetails = $jobdet->fetch_assoc();
        ?>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img 
                                    style="width: 85px;height:85px;"
                                    src="login/images/<?php  echo $jobDetails['cImage'] ?>" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4><?php  echo $jobDetails['job_name'] ?></h4>
                                    </a>
                                    <ul>
                                        <li><?php  echo $jobDetails['cName'] ?></li>
                                        <!-- <li><i class="fas fa-map-marker-alt"></i>Athens, Greece</li>
                                        <li>$3500 - $4000</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <div class="small-section-tittle">
                                <p><?php  echo $jobDetails['jdes'] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span><?php  echo $jobDetails['posted_t_d'] ?></span></li>
                              <!-- <li>Location : <span>New York</span></li>
                              <li>Vacancy : <span>02</span></li>
                              <li>Job nature : <span>Full time</span></li>
                              <li>Salary :  <span>$7,800 yearly</span></li> -->
                              <li>Submit Application: 
                              <?php if($jobDetails['jstatus'] == 0) {?> 
                                <span class="badge badge-success">open</span></li>
                              <?php } ?>
                              <?php if($jobDetails['jstatus'] == 1) {?> 
                                <span class="badge badge-danger">closed</span></li>
                              <?php } ?>
                          </ul>
                          
                         <div class="apply-btn2">
                         <?php 
                    if($jobDetails['jstatus'] == 0) {
                        $jsid = $result['jsID'];
                        $applyCheck = $conn->query("
                        select jsID from job_apply_m jm 
                        inner join job_apply_c jc on jm.jobm_id = jc.jobm_id
                        where jm.jsID=$jsid AND jc.job_id=$id
                        ");

                        $cnt = $applyCheck->num_rows;
                        if( $cnt > 0){
                    ?>      

                    <p class="text-primary">Resume Submited</p>
                    

                    <button type="button" class="btn" data-toggle="modal" data-target="#updateResumeModal">update Resume</button>
                    <?php } else { ?>
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                    Apply Now
                    </button>
                    <?php } ?>
                         </div>
                         <?php } ?>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4><?php echo $jobDetails['cName'] ?></h4>
                           </div>
                              
                              <p><?php echo $jobDetails['Cdes'] ?></p>
                            <ul>
                                <li>Name: <span><?php echo $jobDetails['cName'] ?> </span></li>
                                <!-- <li>Web : <span> colorlib.com</span></li> -->
                                <li>Email: <span><?php echo $jobDetails['Cusername'] ?></span></li>
                            </ul>
                       </div>
                    </div>
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
<!-- -->
            <?php 
                $getResume = "select * from job_apply_c jc inner join job_apply_m jm on jm.jobm_id = jc.jobm_id where jc.job_id = {$_GET['id']} AND jm.jsID = {$result['jsID']}";
                $Resume = $conn->query($getResume);
                $ResumeResult = $Resume->fetch_assoc();
            ?>
            <form method="post"  enctype="multipart/form-data">
            <div class="modal fade" id="updateResumeModal" tabindex="-1" role="dialog" aria-labelledby="updateResumeModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateResumeModal">Check Your Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">   
                <div class="form-group row">
                        <label for="resumeR" class="col-sm-2 col-form-label">Previous Resume</label>
                        <div class="col-sm-10">
                        <button type="button" class="btn" onclick="toggle()">View</button>
                        <iframe id="view-Resume" src='login/images/<?php echo $ResumeResult['cv']; ?>'></iframe>
                        </div>
                    </div>             
                    <div class="form-group row">
                        <label for="resumeR" class="col-sm-2 col-form-label">Upload New Resume</label>
                        <div class="col-sm-10">
                        <input type="file" id="resume" name="updated_pdf_file" accept=".pdf" required>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
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
        <script>
            const IframeView = document.getElementById("view-Resume");

            IframeView.style.visibility = 'hidden';

            const toggle = () => {
                IframeView.style.visibility = 'visible';
            }
        </script>
    </body>
</html>
<?php  
        function pdfConvert($file){

          $file_name = $file['name'];
          $file_tmp = $file['tmp_name'];
 
          move_uploaded_file($file_tmp,"login/images/".$file_name);

          return $file_name;
        }

        if(isset($_POST['apply'])){

            $cv = pdfConvert($_FILES['pdf_file']);

            if(!empty($cv)){
            $jsID = $result['jsID'];
            
            $checkMaster = "select jobm_id from job_apply_m where jsID=$jsID";
            $check = $conn->query($checkMaster);
            $row_cnt = $check->num_rows;

            $insertMaster = "insert into job_apply_m (jsID) values('$jsID')";

            

            if($row_cnt == 0){
                $conn->query($insertMaster);
                $check = $conn->query($checkMaster);
                $aply_m = $check->fetch_assoc();
                $j = $aply_m['jobm_id'];
                if(isset($j)){
                    $conn->query("insert into job_apply_c (job_id,jobm_id,cv) values($id,$j,'$cv')");
                }
            }else{
                $rs = $check->fetch_assoc();
                $mid = $rs['jobm_id'];
                $conn->query("insert into job_apply_c (job_id,jobm_id,cv) values($id,$mid,'$cv')");
            }
        }else{
            echo "something went Wrong!";
        }
        header("Location: job_details.php?id=$id");
    }   
    if(isset($_POST['update'])){
        $cvNew = pdfConvert($_FILES['updated_pdf_file']);
        if(!empty($cvNew)){     
            $conn->query("
            update job_apply_c 
            set cv = '$cvNew' 
            where 
            job_id = {$_GET['id']} 
            AND 
            job_apply_cid = {$ResumeResult['job_apply_cid']}
            ");
        }
        header("Location: job_details.php?id={$_GET['id']}");
    }
?>