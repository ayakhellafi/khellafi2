<?php

    include('database_connect.php');

    $user = $_POST['usrName'];
    $pwd = $_POST['pswd'];

    $query = "SELECT * FROM admins WHERE email = '".$user."'";

    if($res = mysqli_query($conn, $query)){
        $row = mysqli_fetch_assoc($res);
        if($row['password'] == $pwd)
            echo "<script>document.location = 'index.php';</script>";
        else    
            echo "<div style='background-color: red; color: white'>Incorrect Password.</div>";
    }else{
        echo "<div style='background-color: red; color: white'>No Such User.</div>";
    }

    mysqli_close($conn);

?>