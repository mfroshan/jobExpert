<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jobs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
  include('comp/navbar.php');
  ?>
  <!-- ======= Sidebar ======= -->
  
  <?php 
  include('comp/sidebar.php');
  
  ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Applicants Details</h1>
      
    </div><!-- End Page Title -->
    
    <section class="section">

      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!----- ------>
              <i class="fa fa-plus" aria-hidden="true" />
              <?php include('viewstudents.php'); ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">SI.NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Mail Address</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Application Status</th>
                    <th scope="col"></th>
                    

                  </tr>
                </thead>
                <tbody>
                <?php 
                $cid = $result['Cid'];

                $job_id = $_GET['id'];
                
                $i=1;

                    $job = $conn->query(
                    "select *
                    from job_apply_m jm 
                    inner join job_apply_c jc  on jm.jobm_id = jc.jobm_id
                    inner join jobseeker js on jm.jsID = js.jsID  
                    inner join jobs jb on jc.job_id = jb.job_id
                    where jb.Cid=$cid AND jc.job_id=$job_id");
            
                    while($Applicant = $job->fetch_assoc()){
                        
                ?>
                  <tr>
                    <td scope="row"><?php echo $i ?></td>
                    <td><?php echo $Applicant['fname']." ".$Applicant['lname']; ?></td>
                    <td><?php echo $Applicant['phonenumber'] ?></td>
                    <td><?php echo $Applicant['jusername']; ?></td>
                    <td>
                    <button  
                    data-bs-toggle="modal" data-bs-target="#basicModal"
                     onclick="details('<?php echo $Applicant['cv']?>')"
                     class="btn btn-primary">view</button></td>
                     <?php if($Applicant['selectStatus']==0){ ?>
                        <td>Pending</td>
                     <td><button class="btn btn-primary" onclick="operation(1,<?php echo $Applicant['job_apply_cid'] ?>)">Select Applicant</button></td>
                     <td><button class="btn btn-danger" onclick="operation(2,<?php echo $Applicant['job_apply_cid'] ?>)">Reject Applicant</button></td>
                     <?php }else if($Applicant['selectStatus']==1){
                        ?>
                        <td>Applicant Selected</td>
                        <td><button class="btn btn-danger" onclick="operation(2,<?php echo $Applicant['job_apply_cid'] ?>)">Reject Applicant</button></td>
                    <?php }else if($Applicant['selectStatus']==2){
                        ?>
                        <td>Rejected</td>
                        <td><button class="btn btn-primary" onclick="operation(1,<?php echo $Applicant['job_apply_cid'] ?>)">Select Applicant</button></td>
                        <?php 
                        
                    } ?>
                  </tr>
                  <?php  
                $i=$i+1;  
                } 
                  ?>
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="./assets//js//jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    const details = (data) => {
       let cv = document.getElementById("cv");
       cv.src=`../login/images/${data}`;
    }

  </script>
 
  <script>
  const operation = (sts,id) => {
        $.ajax({
                type: "POST",
                url: "operation.php",
                data:{
                    'text':sts,
                    'id': id,
                },
                success: function(res){
                    window.location.reload();
                }
            })
        }
   </script>
</body>
</html>