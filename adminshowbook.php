<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$levels = array('','One','Two','Three','Four');
?>
<!-----------------------------------------------Admin Show All Books Page------------------------------------------------ -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Show Books</title>
  <link rel="stylesheet" href="css/adminshowbook.css">
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
<!-----------------------------------------------Page Content ------------------------------------------------ -->


    <div class="main_content">
      <div class="header">
        <h1> Books Page </h1>
      </div>
<!-----------------------------------------------Levels Books ------------------------------------------------ -->
      <?php
      for($i=1;$i<5;$i++){
        $query = "SELECT *FROM book WHERE b_level= '$i' ";
        $result = mysqli_query($con, $query);
        if(!mysqli_num_rows($result)) continue ;
        ?>
        <div>
        <br>
        <h1 style=" text-align: center;">Level <?= $levels[$i]?> Books </h1>
      </div>
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
                  <th class="column5">Action</th>
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
                    <td class="column5"> <a class="btn_remove" href="delete.php?b_id=<?= $row['b_id'] ?>&id=<?= $id ?>"><i class="fas fa-trash-alt"></i> Remove </a> 
                    <a class="btn_edit" href="searchbook.php?b_id=<?= $row['b_id'] ?>&id=<?= $id ?>"><i class="fas fa-edit"></i> Edit </a> </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br>
      <?php 
      } ?>
<!-----------------------------------------------End Table Books  ------------------------------------------------ -->

    </div>
  </div>

  <?PHP
  mysqli_close($con); ?>
</body>

</html>