<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Job Expert</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <!-- CSS here -->

  <link href="./company/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/flaticon.css">
  <link rel="stylesheet" href="assets/css/price_rangs.css">
  <link rel="stylesheet" href="assets/css/slicknav.css">
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .height {

      height: 100vh;
    }

    .form {

      position: relative;
    }

    .form .fa-search {

      position: absolute;
      top: 20px;
      left: 20px;
      color: #9ca3af;

    }

    .form span {

      position: absolute;
      right: 17px;
      top: 13px;
      padding: 2px;
      border-left: 1px solid #d1d5db;

    }

    .left-pan {
      padding-left: 7px;
    }

    .left-pan i {

      padding-left: 10px;
    }

    .form-input {

      height: 55px;
      text-indent: 33px;
      border-radius: 10px;
    }

    .form-input:focus {

      box-shadow: none;
      border: none;
    }
  </style>
</head>

<body>
  <!-- Preloader Start -->
  <?php
  include('includes/navbar.php');
  if(!isset($_SESSION['susername'])){
    header('location:../');
  }
  if (isset($_POST['cancel'])) {
    $connectId = $_POST['cancel'];
    $connectId = $_POST['cancel'];
  $conn->query("update connection_child set status=2 where con_cid = $connectId");
  $q = $conn->query("select conneted_jsID from connection_child where con_cid = $connectId");
  $res = $q->fetch_assoc();
  
  $q = $conn->query("select con_cid from connection_child cc inner join connection c on cc.con_id=c.con_id where c.jsID = {$res['conneted_jsID']} and cc.conneted_jsID={$_SESSION['jsid']}");
  $res1 = $q->fetch_assoc();
  $conn->query("update connection_child set status=2 where con_cid = {$res1['con_cid']}");
}
if (isset($_POST['accept'])) {
  $connectId = $_POST['cancel'];
  $conn->query("update connection_child set status=1 where con_cid = $connectId");
  $q = $conn->query("select conneted_jsID from connection_child where con_cid = $connectId");
  $res = $q->fetch_assoc();
  
  $q = $conn->query("select con_cid from connection_child cc inner join connection c on cc.con_id=c.con_id where c.jsID = {$res['conneted_jsID']} and cc.conneted_jsID={$_SESSION['jsid']}");
  $res1 = $q->fetch_assoc();
  $conn->query("update connection_child set status=1 where con_cid = {$res1['con_cid']}");
}
  ?>
  <main>
    <div class="container" style="min-height:100%;height:100%;">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="text-primary">Connections</h3>
          <table class="table">
            <tbody>
              <?php
              $user = $_SESSION["susername"];
              $res = $conn->query("select jsID from jobseeker where jusername='$user'");
              $data = $res->fetch_assoc();
              $jsID = $data['jsID'];
              $cat = $conn->query("select * from connection c inner join connection_child cc on cc.con_id = c.con_id inner join jobseeker js on js.jsID = cc.conneted_jsID where cc.status = 1 and c.jsID=$jsID");
              $count = $cat->num_rows;
              while ($catResult = $cat->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <h4><?php echo $catResult["fname"] . " " . $catResult["lname"] ?></h4>
                  </td>
                  <td><a href="chat/chat.php?user_id=<?php echo $catResult['jusername'] ?>" class="text-primary"><i class='fas fa-comment' style='font-size:36px'></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
          if ($count == 0) {
          ?>
            <div class="text-center">
              <h4 class="text-secondary">No Connections</h4>
            </div>
          <?php } ?>
        </div>
        <div class="col-sm-4">
          <h3 class="text-primary">Requests</h3>
          <table class="table">
            <tbody>
              <?php
              $jsID = $_SESSION["jsid"];
              $cat = $conn->query("select * from connection_child cc inner join connection c on cc.con_id = c.con_id inner join jobseeker js on js.jsID = cc.conneted_jsID where cc.status = -1 and c.jsID=$jsID");
              $count = $cat->num_rows;
              while ($catResult = $cat->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <h4><?php echo $catResult["fname"] . " " . $catResult["lname"] ?></h4>
                  </td>
                  <td><?php echo "<td>
                        <form method='post'>
                        <input type='hidden' value='" . $catResult['con_cid'] . "' name='cancel'>
                        <button type='submit' name='accept' class='btn-success btn-sm'>Accept</button>
                        <button type='submit' class='btn-danger btn-sm'>Cancel</button>
                        </form>
                        </td>"; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <?php
          if ($count == 0) {
          ?>
            <div class="text-center">
              <h4 class="text-secondary">No Request</h4>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

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