<html>
<head>

    <title>إدراج كتاب</title>

</head>

<body>
<?php

    #print_r($_POST);

    /*$titre = $_POST['title'];

    echo $titre;-

    print_r($_POST);*/

    $target = "../img/books/";
    $target_file = $target.basename($_FILES['book_cover']['name']);

    move_uploaded_file($_FILES['book_cover']['tmp_name'], $target_file);

    include('database_connect.php');

    $query = "INSERT INTO livres VALUES(".$_POST['id'].", '".$_POST['title']."', ".$_POST['price'].", '".$_POST['resume']."', 'img/books/".$_FILES['book_cover']['name']."', ".$_POST['Qty'].", '".$_POST['description']."', 1)";

    #echo $query;

    if(mysqli_query($conn, $query)){
        echo "<div style='background-color: green; color: white'>INSERTION SUCCEED... Moving soon to admin home page again.</div>";
        echo "<script>window.setTimeout(function(){document.location = 'index.php';}, 2000)</script>";
    }
    else{
        echo "<div style='background-color: red; color: white'>FAILED... return again to admin home page.</div>";
        echo "<script>window.setTimeout(function(){document.location = 'index.php';}, 4000)</script>";
    }
        

        mysqli_close($conn);

?>
</body>
</html>