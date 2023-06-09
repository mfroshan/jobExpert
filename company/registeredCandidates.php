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
      <h1>Jobs Posted</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!----- ------>
              <i class="fa fa-plus" aria-hidden="true" />
              <?php include('addJob.php'); ?>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Registration</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $cid = $result['Cid'];
                $i=1;
                    $job = $conn->query(
                    "select * from jobs j 
                    inner join category c on j.cat_id = c.cat_id                    
                    where Cid='$cid'");
                    while($jobResult = $job->fetch_assoc()){
                ?>
                  <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $jobResult['job_name'] ?></td>
                    <td><?php echo $jobResult['cat_name'] ?></td>
                    <?php if($jobResult['jstatus'] == 0 ){ ?>
                    <td><span class="badge badge-success">Open</span></td>
                    <?php }else{ ?>
                    <td><span class="badge badge-danger">Closed</span</td>
                      <?php } ?>
                      <?php if($jobResult['jstatus'] == 1 ){ ?>
                                            <td><button 
                                            name="a"
                                            onclick="changeStatus(1,<?php echo $jobResult['job_id'] ;?>)"
                                            class="btn btn-success">Open Registration</button></td>
                                            <?php }else{ ?>
                                                <td><button type="submit" name="d" 
                                                onclick="changeStatus(0,<?php echo $jobResult['job_id']; ?>)"
                                                class="btn btn-danger">Close Registration</button></td>
                                                <?php } ?>
                  </tr>
                  <?php  } ?>
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
    const inp = document.getElementById("catname");
    const sl = document.getElementById("selectCategory");
    const addc = document.getElementById("addc");
    const select = document.getElementById("selectc");

    inp.style.visibility='hidden';
    select.style.visibility='hidden';

    const  activate = () => {
      sl.style.visibility='hidden';
      sl.value="";
      inp.style.visibility='visible';
      addc.style.visibility='hidden';
      selectc.style.visibility='visible';   
    }

    const re = () => {
      sl.style.visibility='visible';
      inp.style.visibility='hidden';
      inp.value="";
      addc.style.visibility='visible';
      selectc.style.visibility='hidden';

    } 
  </script>
  <script>
  const changeStatus = (sts,id) => {
        $.ajax({
                type: "POST",
                url: "./RegistrationUpdate.php",
                data:{
                    'sts':sts,
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
<?php  
      if(isset($_POST['add'])){
        if(!empty($_POST['jobname']) && !empty($_POST['des'])){
          
          $jobname = $_POST['jobname'];
          $des = $_POST['des'];
          $cat_name = $_POST['catname'];
          $cat_value = $_POST['selectCategory'];

          $insertCategory = "insert into category (cat_name) values('$cat_name')";
          $insertJob = "insert into jobs(job_name,cat_id,Cid,jdes) values('$jobname',$cat_value,$cid,'$des')";

              if(empty($_POST['selectCategory'])){
                  $conn->query($insertCategory);
                  $s = $conn->query("select cat_id from category where cat_name='$cat_name'");
                  $ret = $s->fetch_assoc();
                  $cat_id = $ret['cat_id'];
                  $conn->query("insert into jobs(job_name,cat_id,Cid,jdes) values('$jobname',$cat_id,$cid,'$des')");
              }else{
                      $conn->query($insertJob);
              }
        }
        header('Location: company-posted-jobs.php');
      }
?>