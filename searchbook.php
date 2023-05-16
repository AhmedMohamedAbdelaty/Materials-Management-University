<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $b_id = $_POST['book_id'];
  $query = "SELECT *FROM book WHERE b_id = '$b_id'";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)){
    header("location: editbook.php?id=".$id."&b_id=".$b_id);    
  }
  else{
    echo "<script>
            alert('No such book please try again.');
            </script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Books</title>
  <link rel="stylesheet" href="css/searchbook.css">

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

<!-----------------------------------------------Edit Book------------------------------------------------ -->

    <div class="main_content">
      <div class="header">
        <h1> Edit Book Page</h1>
      </div>

      <div class="code">
        <div class="info-card">
          <div class="container">
            <div class="title">Edit Book</div>
            <div class="content">
<!-----------------------------------------------Book Search Form------------------------------------------------ -->

              <form method="post" autocomplete="off">
                <div class="user-details">
                  <div class="input-box">
                    <label for="book_id">&nbsp;Book ID</label>
                    <input type="text"  name="book_id" placeholder="Enter Book ID" required
                    value="<?php if(isset($_GET['b_id']))  echo $_GET['b_id']?>">
                  </div>
                <div class="button">
                  <input type="submit" name="submit" value="Edit Book">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<!-----------------------------------------------End Form------------------------------------------------ -->

    </div>
</body>

</html>