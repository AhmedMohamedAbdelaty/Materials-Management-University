<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$quary = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con, $quary);
$row = mysqli_fetch_assoc($result);
$level = array('non','First', 'Second', 'Third', 'Forth');
?>



<!----------------------------------------------- Student Home Page ------------------------------------------------ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LMS Home</title>
  <link rel="stylesheet" href="css/Shome.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>


<!----------------------------------------------- Slidebar ------------------------------------------------ -->
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h1>
        LMS
      </h1>
      <ul>
        <li> <a href="Shome.php?id=<?= $id ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="Sshowbook.php?id=<?= $id ?>&level=<?= $row['s_level'] ?>"><i class="fas fa-book-open"></i> Show Books</a></li>
        <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </div>

<!----------------------------------------------- Home Page Content------------------------------------------------ -->

    <div class="main_content">
      <div class="header">
        <h1> Welcome! Have a nice day. </h1>
      </div>
      <div class="code">
        <div class="info-card">
          <div class="info-card__content" id="css/mainContent">

            <div class="info-card__avatar">
              <img class="info-card__avatar__img" src="https://www.shankarainfra.com/img/avatar.png" alt="">
            </div>
            <div class="info-card__name" id="togglePerson">
              <?= $row['fname'] . ' ' . $row['lname'] ?>
            </div>
<!----------------------------------------------- Student Details------------------------------------------------ -->

            <div class="info-card__info info-card__info--link">
              <div class="info-card__info__label">Account type : Student</div>
            </div>
            <div class="info-card__info info-card__info--link">
              <div class="info-card__info__label">Email : <?= $row['email'] ?></div>
            </div>
            <div class="info-card__info info-card__info--link">
              <div class="info-card__info__label">Level : <?= $level[$row['s_level']] ?></div>
            </div>
          </div>
        </div>
      </div>

<!----------------------------------------------- End Home Page ------------------------------------------------ -->

    </div>

</body>

</html>