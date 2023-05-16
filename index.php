<?php
require 'config.php';
if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];
  $user = mysqli_query($con, "SELECT * FROM user WHERE email='$email' and password='$password'");
  $admin = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' and password='$password'");


  if (mysqli_num_rows($user) > 0) {
    $row = mysqli_fetch_assoc($user);
    header("location: Shome.php?id=" . $row['id']);
  } else if (mysqli_num_rows($admin) > 0) {
    $row = mysqli_fetch_assoc($admin);
    header("location: adminhome.php?id=" . $row['id']);
  } else {
    echo "<script>
           alert('Wrong password or User not registered');
           window.location.href='index.php';
           </script>";
  }
}

?>

<!----------------------------------------------- Signin Page ------------------------------------------------ -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/signin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!----------------------------------------------- Signin Form ------------------------------------------------ -->

<body>
  <div class="container">
    <div class="title">Login</div>
    <div class="content">
      <form method="post" autocomplete="off">
        <div class="user-details">
          <div class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>

          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>

        <div class="button">
          <input type="submit" name="submit" value="Log In">
        </div>
      </form>
<!----------------------------------------------- End Page ------------------------------------------------ -->
      <P class="register">Don't have an account ? <a href="signup.php">Register Now</a></P>
    </div>
  </div>

</body>

</html>