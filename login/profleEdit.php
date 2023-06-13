<?php 
    include('functions.php');
   
    if(isset($_POST['save'])){
        if(!empty($_POST['fname']) && !empty($_POST['lname'])){
        $id = $result['jsID'];
        $image = $result['image'];
        $oldemail = $result['jusername'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $num = $_POST['phone'];
        //echo $_FILES['image']['name'];
        $cv = '';
        if(isset($_FILES['image'])){
            unlink('login/images/'.$image);   
            $cv = imageConvert($_FILES['image'],'login/images/');
            //echo "<script>alert('".$_FILES['image']['name']."')</script>";
        }
        
        $sql = "update jobseeker 
        set 
        fname = '$fname',
        lname = '$lname',
        phonenumber = $num
        where jsID = $id";

        $sqlup = "update login set username='$email' where username = '$oldemail'";
        $sqlimage = "update jobseeker set image = '$cv' where jsID = $id";
        if($cv != ''){
          $conn->query($sqlimage);
        }
        if($email == $oldemail){
           $conn->query($sql);
          }else{
            $_SESSION['susername'] = $email;
            $conn->query($sqlup);
            $conn->query($sql);    
        }
        header('Location: index.php');
      }
    }
?>