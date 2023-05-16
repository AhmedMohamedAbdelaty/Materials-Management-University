<?php
require './config.php';
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

if(isset($_GET['s_id'])){
    $s_id = $_GET['s_id'];
    $query="DELETE FROM user WHERE id = '$s_id'";
    mysqli_query($con, $query);
    echo "<script>
        alert('Student Deleted Successfully');
        window.location.href='adminshowstudents.php?id=$id';
        </script>";
}

if(isset($_GET['b_id'])){
    $b_id=$_GET['b_id'];
    $query="DELETE FROM book WHERE b_id = '$b_id'";
    mysqli_query($con, $query);
    echo "<script>
        alert('Book Deleted Successfully');
        window.location.href='adminshowbook.php?id=$id';
        </script>";
}


