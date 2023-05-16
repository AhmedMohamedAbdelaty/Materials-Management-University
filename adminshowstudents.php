<?php
require './config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$levels = array('','One','Two','Three','Four');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Show Students</title>
    <link rel="stylesheet" href="css/adminshowstudents.css">
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

<!-----------------------------------------------End Slidebar ------------------------------------------------ -->

        <div class="main_content">
            <div class="header">
                <h1 style=" text-align: center;"> Students Page </h1>
            </div>
<!----------------------------------------------- Levels Table ------------------------------------------------ -->
            <?php
            for($i=1;$i<5;$i++){
                $query = "SELECT * FROM user WHERE s_level='$i'";
                $result = mysqli_query($con, $query);
                if(!mysqli_num_rows($result)) continue;
            ?>
            <div>
                <br>
                <h1 style=" text-align: center;">Level <?=$levels[$i]?> Students </h1>
            </div>
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">Student Id</th>
                                    <th class="column2">Student Name</th>
                                    <th class="column3">Student Email</th>
                                    <th class="column4">Student Level</th>
                                    <th class="column4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td class="column1"> <?= $row['id'] ?> </td>
                                        <td class="column2"> <?= $row['fname'] . " " . $row['lname'] ?> </td>
                                        <td class="column3"> <?= $row['email'] ?> </td>
                                        <td class="column4"> <?= $row['s_level'] ?> </td>
                                        <td class="column4"> <a class="btn" href="delete.php?s_id=<?= $row['id'] ?>&id=<?= $id ?>"> <i class="fas fa-trash-alt"></i> Remove </a> </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            
            <?php }  ?>
    <?php
    mysqli_close($con);
    ?>
</body>

</html>

<!----------------------------------------------- End Page ------------------------------------------------ -->