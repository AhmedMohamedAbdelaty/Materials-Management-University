<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$quary = "SELECT * FROM admin WHERE id = '$id'";
$result = mysqli_query($con, $quary);
$row = mysqli_fetch_assoc($result);
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>LMS Home</title>
  <link rel="stylesheet" href="css/adminhome.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<!-----------------------------------------------Slidebar ------------------------------------------------ -->

<body>
  <div class="wrapper">
    <div class="sidebar">
      <h1>
        LMS
      </h1>
      <ul>
        <li><a href="adminhome.php?id=<?= $id ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="addbook.php?id=<?= $id ?>"><i class="fas fa-upload"></i> Add Books</a></li>
        <li><a href="searchbook.php?id=<?=$id?>"><i class="fas fa-edit"></i> Edit Books</a></li>
        <li><a href="adminshowstudents.php?id=<?= $id ?>"><i class="fas fa-user-graduate"></i> Show Students</a></li>
        <li><a href="adminshowbook.php?id=<?= $id ?>"><i class="fas fa-book-open"></i> Show Books</a></li>
        <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </div>

<!-----------------------------------------------Home Page ------------------------------------------------ -->

    <div class="main_content">
      <div class="header">
        <h1> Welcome! Have a nice day.</h1>
      </div>
      <div class="code">
        <div class="info-card">
          <div class="info-card__content" id="mainContent">

            <div class="info-card__avatar">
              <img class="info-card__avatar__img" src="https://www.shankarainfra.com/img/avatar.png"></img>
            </div>
<!----------------------------------------------- Admin Details------------------------------------------------ -->

            <div class="info-card__name" id="togglePerson">
              <?= $row['fname'] . ' ' . $row['lname'] ?>
            </div>
            <div class="info-card__info info-card__info--link">
              <div class="info-card__info__label">Account type : Admin</div>
            </div>
            <div class="info-card__info info-card__info--link">
              <div class="info-card__info__label">Email : <?= $row['email'] ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>
<!-----------------------------------------------End Home Page ------------------------------------------------ -->

</html>