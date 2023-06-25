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
        
        $cv = '';
        if($_FILES['image']['size'] != 0 ){

          echo("<script>console.log('Empty: " . $_FILES['image']['name']. "');</script>");
            $cv = imageConvert($_FILES['image'],'login/images/');
            unlink('login/images/'.$image);
            
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
          echo("<script>console.log('cv: " . $_FILES['image'] . "');</script>");
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