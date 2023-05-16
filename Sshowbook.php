<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM book WHERE b_level = '$level'";
$result = mysqli_query($con, $query);
?>






<!----------------------------------------------- Student Books Page ------------------------------------------------ -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>LMS Home</title>
  <link rel="stylesheet" href="css/Sshowbook.css">
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
        <li><a href="Sshowbook.php?id=<?= $id ?>&level=<?= $level ?>"><i class="fas fa-book-open"></i> Show Books</a></li>
        <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      </ul>
    </div>

<!-----------------------------------------------  Book Page Content------------------------------------------------ -->

    <div class="main_content">
      <div class="header">
        <h1>Your Books</h1>
      </div>
<!----------------------------------------------- Table Books------------------------------------------------ -->

      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100">
            <table>
              <thead>
                <tr class="table100-head">
                  <th class="column1">Book Id</th>
                  <th class="column2">Book Name</th>
                  <th class="column3">Book Author</th>
                  <th class="column4">Book Level</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td class="column1"><?= $row['b_id'] ?></td>
                    <td class="column2"><?= $row['b_name'] ?></td>
                    <td class="column3"><?= $row['b_author'] ?></td>
                    <td class="column4"><?= $row['b_level'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
<!----------------------------------------------- End Table ------------------------------------------------ -->

    </div>
  </div>

</body>

</html>