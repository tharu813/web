<?php
 

 $db = mysqli_connect("localhost", "root", "", "test1");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pswd']); 
      
      $sql = "SELECT username FROM signup WHERE username = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         echo"ok";
         
         header("location: healthcare.html");
      }else {
          echo"invalid login";
         $error = "Your Login Name or Password is invalid";
      }
   }
?>