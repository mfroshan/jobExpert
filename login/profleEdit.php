<?php 
    include('functions.php');

    if(isset($_POST['save'])){
        if(!empty($_POST['fname']) && !empty($_POST['lname'])){
        $id = $result['jsID']; 
        $oldemail = $result['jusername'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $num = $_POST['phone'];
        echo $_FILES['image']['name'];
        if(isset($_FILES['image'])){
            $cv = imageConvert($_FILES['image']);
            echo $cv;
        }
        
        $sql = "update jobseeker 
        set 
        fname = '$fname',
        lname = '$lname',
        phonenumber = $num
        where jsID = $id";

        $sqlup = "update login set username='$email' where username = '$oldemail'";
        
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