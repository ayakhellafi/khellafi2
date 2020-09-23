<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>الصفحة الرئيسية لموقع آية-بوكس</title>
    <link rel="stylesheet" href="css/index.css"/>
</head>
<body>
    <header>
        <nav>
            <a class="actual" href="index.php">الرئيسية</a>
            <a href="promotions.html">التخفيضات</a>
            <a href="contact_us.php">اتصلوا بنا</a>


            <div class="float">
                <div id="currency"> $ </div>
                <div id="language">
                    <div>العربية</div>
                    <div>Français</div>
                </div>
            </div>
        </nav>

        <div class="banner">
            <div class="logo"></div>
            <form action="search.php">
                <input type="text" name="search_for" placeholder ="ابحث عن كتاب..."/>
            </form>
            <div class="cart"></div>
        </div>
    </header>

    <main>

        <div class="categories">
            <h3>التصنيفات</h3>
            <ul>
                <a href="#"><li>الصنف</li></a>
                <a href="#"><li>الصنف</li></a>
                <a href="#"><li>الصنف</li></a>
                <a href="#"><li>الصنف</li></a>
                <a href="#"><li>الصنف</li></a>
                <a href="#"><li>الصنف</li></a>
            </ul>

            <h3 style="margin-top: 20px">تسجيل الدخول (لمدير الموقع فقط)</h3>
            <form action="admin/login.php" method="post">
                <label for="usrName">اسم المستخدم</label>
                <input type="text" id="usrName" name="usrName" required="true"/>
                <label for="pswd">كلمة المرور</label>
                <input type="password" id="pswd" name="pswd" required/>
                <input type="submit" value="تسجيل الدخول"/>
            </form>
        </div>
        <div class="principal">
            <div class="week_book">
                <img src="img/book.jpg" alt=""/>
                <div class="book_infos">
                    <h1>كليلة ودمنة</h1>
                    <h4>ابن المقفع</h4>

                    <h6>الوصف:</h6>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore, consequatur.</p>
                    <div class="price">
                        300دج
                    </div>
                    <div class="shop_button">
                        أطلبه الآن!
                        <img src="img/cart.svg" alt=""/>
                    </div>
                </div>
            </div>

            <nav>
                <div class="active">الأكثر شعبية</div>
                <div>إصدارات جديدة</div>
                <div>الأكثر مبيعا</div>
            </nav>

            <div class="row">

                <?php

                    $actual_page = 1;     
                    if(isset($_GET['page_no']))
                        $actual_page = $_GET['page_no'];

                    $books_in_page = 6;

                    include('admin/database_connect.php');

                    $items_num_query = mysqli_query($conn, "SELECT COUNT(*) AS nombre FROM livres");

                    $items_num = mysqli_fetch_assoc($items_num_query);
                    $items_num = $items_num['nombre'];

                    $start_from = ($actual_page-1) * $books_in_page;
                    $pages = ceil($items_num/$books_in_page);

                    $res=mysqli_query($conn,'select * from livres limit '.$start_from.', '.$books_in_page);
                    while($row=mysqli_fetch_assoc($res)){
                ?>

                    <a href='book_details.php?book_id=<?php echo $row['id_livre'];?>'><div class="book_card">
                        <div class="upPart">
                            <div class="new">جديد</div>
                            <img src=" <?php  echo $row['couvert']; ?>" alt=""/>
                            <button data-id="<?php echo $row['id_livre'];?>" class="add_to_cart"></button>
                        </div>
                        <div class="downPart">
                            <h5><?php echo $row['titre'] ; ?></h5>
                            <p><?php echo $row['description'] ; ?></p>
                            <div class="price"><?php echo $row['prix']." .دج" ; ?></div>
                        </div>
                    </div></a>

                    <?php } 
                    
                    
                    ?>

                
            </div>

            <div class="pagination">
                        
                        <?php 
                            if(($actual_page*$books_in_page) < $items_num){
                        ?>
                        <a href="index.php?page_no=<?php echo $actual_page+1;?>"><div class="right"></div></a>
                            <?php } ?>
                        <div class="number"><?php echo $actual_page;?></div>
                        <?php
                            if($actual_page != 1){
                        ?>
                        <a href="index.php?page_no=<?php echo $actual_page-1;?>"><div class="left"></div></a>
                            <?php } ?>
                        
            </div>
        </div>

    </main>

    <div class="social">
        <span>تابعونا على:</span>
        <a href="https://www.facebook.com/ayabooks"><img src="img/fb_icon.png" alt=""></a>
        <a href="https://www.instagram.com/ayabooks"><img src="img/insta_icon.png" alt=""></a>
        <a href="https://www.twitter.com/ayabooks"><img src="img/tweet_icon.png" alt=""></a>
    </div>

    <footer>
        <h2>معلومات عن متجرنا</h2>
        <p>حي تيغزة - تكوت - باتنة</p>
        <p dir="ltr">66 66 66 666 213+</p>
        <p>admin@ayabook.com</p>
    </footer>
<?php
    mysqli_close($conn);
?>
</body>
</html>