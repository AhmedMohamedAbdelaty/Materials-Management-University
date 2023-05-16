<?php
require './config.php';

if (isset($_POST["submit"])) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $level = $_POST["level"];
  $userduplicate = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
  $adminduplicate = mysqli_query($con, "SELECT * FROM admin WHERE email='$email'");
  if (mysqli_num_rows($userduplicate) > 0 or mysqli_num_rows($adminduplicate))
    echo "<script> alert('Email Already Taken');  </script>";
  else {
    $query = "INSERT INTO user (fname,lname,email,s_level,password) VALUES ('$fname','$lname','$email','$level','$password')";
    mysqli_query($con, $query);
    echo "<script>
          alert('Registration Completed You Can Login Now');
          window.location.href='index.php';
          </script>";
  }
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registration</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/signup.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-----------------------------------------------Registration body ------------------------------------------------ -->

<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">

<!-----------------------------------------------Registration Form ------------------------------------------------ -->

      <form method="post" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <label for="fname">Frist Name</label>
            <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required pattern=".{8,}" title="Eight or more characters">
          </div>
        </div>
<!-----------------------------------------------Select Level------------------------------------------------ -->

        <div class="level-details">
          <input type="radio" name="level" id="dot-1" value="1" required>
          <input type="radio" name="level" id="dot-2" value="2">
          <input type="radio" name="level" id="dot-3" value="3">
          <input type="radio" name="level" id="dot-4" value="4">

          <span class="level-title">Year</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="level">First Year</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="level">Second Year</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="level">Third Year</span>
            </label>
            <label for="dot-4">
              <span class="dot four"></span>
              <span class="level">Fourth Year</span>
            </label>
          </div>
        </div>
<!-----------------------------------------------Submit Form ------------------------------------------------ -->

        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
<!-----------------------------------------------End Form ------------------------------------------------ -->

      <P class="register">Already have an account ? <a href="index.php">Sign In</a></P>
    </div>
  </div>

</body>

</html>