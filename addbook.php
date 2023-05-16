<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['book_name'];
  $author = $_POST['book_author'];
  $level = $_POST['level'];
  $bookduplicate= mysqli_query($con, "SELECT * FROM book WHERE b_name='$name'");
  if(mysqli_num_rows($bookduplicate) > 0)
    echo "<script> alert('Book Already Added');  </script>";
    else{
      $query = "INSERT INTO book(b_name,b_author,b_level) VALUES ('$name','$author','$level')";
      if ($result = mysqli_query($con, $query)) {
        echo "<script> alert('Book Added Sucessfully');  </script>";
  }
}
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Books</title>
  <link rel="stylesheet" href="css/addbook.css">
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

<!-----------------------------------------------Add Book------------------------------------------------ -->

    <div class="main_content">
      <div class="header">
        <h1> Add Book Page</h1>
      </div>

      <div class="code">
        <div class="info-card">
          <div class="container">
            <div class="title">Add Book</div>
            <div class="content">
<!-----------------------------------------------Book Form------------------------------------------------ -->

              <form method="post" autocomplete="off">
                <div class="user-details">
                  <div class="input-box">
                    <label for="book_name">&nbsp;Book Name</label>
                    <input type="text" name="book_name" placeholder="Enter Book Name" required>
                  </div>

                  <div class="input-box">
                    <label for="book_author"> &nbsp;Book Author</label>
                    <input type="text"  name="book_author" placeholder="Enter Book Author" required>
                  </div>
                  <div>
                    <label for="level">&nbsp;Select Level:</label>
                    <select id="level" name="level">
                      <option value="1" class="levels" selected>First</option>
                      <option value="2" class="levels">Second</option>
                      <option value="3" class="levels">Third</option>
                      <option value="4" class="levels">Forth</option>
                    </select><br><br>
                  </div>
                </div>
                <div class="button">
                  <input type="submit" name="submit" value="Add Book">
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