<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <?php include('includes/navbar.php'); ?>
    <?php
    include_once 'functions.php';
    $cid = $_GET["cid"];
    $company = getCompanyDetails($cid);
    if (isset($_POST['connection'])) {
        $connectId = $_POST['connection'];
        connectionMake($_SESSION['jsid'], $connectId);
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
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <h2><?php echo  $company["cName"] ?></h2><br>
                <!-- <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br> -->
                <p><?php echo $company['Cdes'] ?></p>
                <h4>Selected Members</h4>
                <table class="table">
                    <tbody>
                        <?php
                        $connects = getconnectCompany($cid);
                        foreach ($connects as $row) {
                            if (isset($_SESSION['jsid'])) {
                                $j = $conn->query("select con_cid,status from connection_child cc inner join connection c on c.con_id=cc.con_id  where c.jsID={$_SESSION['jsid']}");
                                $res = $j->fetch_assoc();
                                $cnt = $j->num_rows;
                            }
                        ?>
                            <tr>
                                <td><?php echo $row['fname'] . " " . $row["lname"] ?></td>
                                <?php if (isset($_SESSION["susername"])) {
                                    if (isset($_SESSION['jsid'])) {
                                        if ($cnt > 0) {
                                            if ($res['status'] == 1) {
                                                echo "<td><button type='submit' class='btn-success btn-sm'>Friend</button></td>";
                                            } else if ($res['status'] == 0) {
                                                echo "<td>
                        <form method='post'>
                        <input type='hidden' value='" . $res['con_cid'] . "' name='cancel'>
                        <div class='btn-warning btn-sm'>Requested</div>
                        <button type='submit' class='btn-danger btn-sm'>Cancel</button>
                        </form>
                        </td>";
                                            } else {
                                                echo "<td>
                        <form method='post'>
                        <input type='hidden' value='" . $row['jsID'] . "' name='connection'>
                        <button type='submit' class='btn-primary btn-sm'>Connect</button>
                        </form>
                        </td>";
                                            }
                                        } else {
                                            echo "<td>
                        <form method='post'>
                        <input type='hidden' value='" . $row['jsID'] . "' name='connection'>
                        <button type='submit' class='btn-primary btn-sm'>Connect</button>
                        </form>
                        </td>";
                                        }
                                    }
                                } else {
                                    echo "<td><a href='login/login.php' class='btn-primary btn-sm'>Connect</button></td>";
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                        <?php
                        if (count($connects) == 0) {
                            echo "<tr><td>No Selected Students in this company</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <!-- ?\<img src="login/images/<?php //echo $company['cImage']  
                                                ?>" alt="<?php //echo $company['cImage']  
                                                                                        ?>"> -->
                <img style="margin-top:70px;width:550px;"src="assets/img/network.jpg" alt="">
                <i class="fa-solid fa-chart-simple"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                
            </div>
        </div>
    </div>


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