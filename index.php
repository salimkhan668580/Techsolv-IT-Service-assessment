<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ...........................stylesheet link.................................................... -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- ........................icon link......................................... -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP assessment</title>
</head>
<body>
  <?php
    
    $serverName="localhost";
    $userName="root";
    $password="";
  $db="php_assessment";
    
  // ........................connnection to the database..........................................
    $con=mysqli_connect($serverName,$userName,$password,$db);
    
    // if($con){
    //   echo " connection successfully";
    // }else{
    //   echo "not connected";
    // }
  
  
  ?>



<div id="container">
  <?php
    
    
                  
                if(isset($_POST['submit'])){

                  $fullname=$_POST['fullName'];
                  $phoneNumber=$_POST['phoneNumber'];
                  $email=$_POST['email'];
                $subject=$_POST['subject'];
                $message=$_POST['message'];


                $ownerEmail="salimkhan668580s@gmail.com";
                $header="Form : $ownerEmail";

                //  ..............................................................................................form validation................................................................................


               

                     $query=" INSERT INTO `contact_form` ( `fullName`, `PhoneNumber`, `Email`, `Subject`, `Message`, `Date`) VALUES ('$fullname' ,'$phoneNumber', '$email', '$subject',  '$message', current_timestamp())";
                      $run=mysqli_query($con,$query);



                      if($run){

                        echo "<p> submitted successfully</p>";

                      }else{

                        echo "Try Again";
                        
                      }

                      // ...........................................................................................email send by owner to the user......................................
                      $succMsg="your message submit successfully|| techsalim web design";
                      $usermsg="Dear".$fullname."\n\n"."Thank you  for conecting us ! our Team will connect you shortly";
                      
                      //  ............................................................................email recieved  owner...............................
                      $ownerMsg="Client Name :".$fullname."\n\n"."Subject: ".$subject."Wrote the following message" . "\n\n".$message."from".$email;
                      $header="From : $ownerEmail";
                      $header="From : ".$ownerEmail;

                      //  ...............................................................................send email   to owner...................................................................


                      $result=mail($email,$subject,$ownerMsg,$header);

                        if($result){
                          echo  '<script type="text/javascript">alert("Message was sent successfully")</script>';
                        }else{
                          echo  '<script type="text/javascript">alert("Please try again")</script>';
                        }
                    }

                    

                  
                 
    ?>

  <!-- ...........................................................................................HTML code .......................................................... -->

          <form  method="post">
            

            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i> </span>
                <input type="text" class="form-control" placeholder="Full Name" name="fullName"  required>
              </div>

              <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i> </span>
                <input type="text" class="form-control" placeholder="Phone Number"  name="phoneNumber"  required>
              </div>

              <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i> </span>
                <input type="text" class="form-control" placeholder="Email"  name="email"  required>
              </div>

              <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-earmark-text"></i></span>
                <input type="text" class="form-control" placeholder="Subject"  name="subject"  required>
              </div>

              <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-left-text"></i> </span>
                <textarea  rows="3" cols="10" class="form-control" placeholder="Message" name="message"  required></textarea>
              </div>

              <div class="d-grid gap-2 d-md-block">
                <button class="btn btn-primary form-control" type="submit" name="submit">Submit</button>
              </div>
            
          </form>
   
</div>

</body>
</html>