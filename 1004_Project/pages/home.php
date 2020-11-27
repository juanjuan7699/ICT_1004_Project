<?php
session_start(); //start session
?>
<!--    DB connection-->
<?php

include "../page_incs/db_onetimelogin.php";

//// The amounts of products to show on each page
$num_products_on_each_page = 9;

// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int) $_GET['p'] : 1;

// Select products ordered by the date added
$stmt = $con->prepare("SELECT * FROM products ORDER BY p_price ASC LIMIT ?,?");

// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$var1 = (($current_page - 1) * $num_products_on_each_page);

$stmt->bind_param('ii', $var1, $num_products_on_each_page);
$stmt->execute();

// Fetch the products from the database and return the result as an Array
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

// Get the total number of products
$total_products = $result->num_rows;
?>
<head>
    <title>Phone Case Shop</title>
    <?php
    include "../page_incs/head.inc.php";
    ?>
    <style>
        article {
            text-align: center;
        }

        #companyInfo {
            margin-top: -100px;
        }

        #logo {
            height: 200px;
        }
    </style>
</head>
<body>
    <?php
    include "../page_incs/nav.inc.php";
    ?>
    <header class="jumbotron parallax text-center">
        <div>
            <h1 class="display-4">Welcome to <img id="logo" src="../images/phonix_logo.PNG"></h1>
            <br/>
            <h4 id="companyInfo" style="color:white">The premier place to buy your mobile phones and accessories</h4>
        </div>
    </header>
    <main class="container">

        <h3>Hot items</h3>
        <hr>
        <div class="owl-carousel owl-theme">
            <?php foreach ($products as $product): ?>
                <div class="item">
                    <img src="../phone_cases_img/<?= $product['p_img'] ?>" width="10%" height="26%" class="phone_image" alt="<?= $product['p_name'] ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <hr>

        <h3>Popular items</h3>
        <hr>
        <div class="d-flex flex-row flex-wrap justify-content-between my-flex-container" id="product-container">
        <?php foreach ($products as $product): ?>
            <div class="p-2 my-flex-item" id="product-content">
                <div class="d-flex flex-column my-flex-container-column" >
                    <div class="p-2 my-flex-item">
                        <a href="index.php?page=product&id=<?= $product['product_id'] ?>" class="product">
                            <img src="../phone_cases_img/<?= $product['p_img'] ?>" width="80" height="150" class="phone_image" alt="<?= $product['p_name'] ?>">
                        </a>
                    </div >
                    <div>
                        <h5 class="text-body"><?= $product['p_name'] ?></h5>
                    </div>
                    <div>
                        <p class="text-info">&dollar;<?= $product['p_price'] ?></p>
                    </div>
                </div>
            </div>
                <?php endforeach; ?>
        </div>
        <hr>
        <div class="buttons">
            <?php if ($current_page > 1): ?>
                <a href="index.php?page=products&p=<?= $current_page - 1 ?>">Prev</a>
            <?php endif; ?>

            <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
                <a href="index.php?page=products&p=<?= $current_page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>

    </main>
    <?php
    include "../page_incs/footer.inc.php";
    ?>
</body>

<script type="text/javascript">$('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
