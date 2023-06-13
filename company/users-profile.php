<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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

  <?php
      include('comp/navbar.php');
      include('comp/sidebar.php');
         

    ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src='../../../jobExpert/login/images/<?php echo $result['cImage']; ?>' alt="Profile" class="rounded-circle">
              <h2><?php echo $result['cName'];?></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">
                    <?php echo $result['Cdes']; ?>
                  </p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Company Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $result['cName'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $result['Cnum'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $result['Cusername'];?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src='../../../jobExpert/login/images/<?php echo $result['cImage']; ?>' alt="Profile">
                        <div class="pt-2">
                          <input type="file" name="image"><a href="" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $result['cName'] ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">
                        <?php echo $result['Cdes']; ?>  
                      </textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $result['Cnum']; ?>"
                        required
                        >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" 
                        onchange="check('<?php echo $result['Cusername'] ?>',this.value)"
                        value="<?php echo $result['Cusername']; ?>"
                        required
                        >
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
<form method="post">
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" onkeypress="return AvoidSpace(event)" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword"  onkeypress="return AvoidSpace(event)" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword"  onkeypress="return AvoidSpace(event)" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="button" onclick="changePassword()" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </section>

  </main><!-- End #main --><!-- End Footer -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script>
  const check = (oldusername,inputusername) => {
            $.ajax({
                type: "POST",
                url: "CheckEmail.php",
                data:{
                                'oldusername':oldusername,
                                'email': inputusername,
                            },
                            success: function(res){
                                console.log(res);
                                if(res==-1){
                                    alert("Email Exist");
                                    document.getElementById("email").value="";
                                    }
                        }
            })

        }
        function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32) return false;
        }

        const changePassword = () => {
            
         var cpsswd = document.getElementById("currentPassword").value;
         var npsswd = document.getElementById("newPassword").value;
         var rpsswd = document.getElementById("renewPassword").value;

          console.log('<?php echo $result['Cusername'] ?>');

          if(npsswd === rpsswd && cpsswd!=''){
          $.ajax({
                type: "POST",
                url: "changepassword.php",
                data:{
                                'c':cpsswd,
                                'n':npsswd,
                                'email':'<?php echo $result['Cusername'] ?>',

                            },
                            success: function(res){
                              console.log(res);
                                if(res==0){
                                  window.location.reload;
                                }else{
                                  alert("Check Previous password!");
                                }
                        }
                 })
             }else{
             alert("Check Password!");
          }
      }
  </script>
</body>
</html>
<?php 
    if(isset($_POST['update'])){
        if(!empty($_POST['fullName']) && !empty($_POST['email'])){
        $id = $result['Cid']; 
        $oldemail = $result['Cusername'];
        $name = $_POST['fullName'];
        $email = $_POST['email'];
        $num = $_POST['phone'];
        $about = $_POST['about'];
        $sql = "update company 
        set 
        cName = '$name',
        Cnum = '$num',
        Cdes = '$about'
        where Cid = '$id'";
        $sqlup = "update login set username = '$email' where username = '$oldemail'";
        if($email == $oldemail){
           $conn->query($sql);
          }else{
            $conn->query($sqlup);
            $conn->query($sql);
            $_SESSION['username'] = $email;
        }
        header('Location: users-profile.php');
      }
    }
?>