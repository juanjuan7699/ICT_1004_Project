<nav class="navbar navbar-expand-sm navbar-light text-right" id="navbar" >
    <a class="navbar-brand" href="../pages/index.php"><img src="../images/phonix_logo_black.png" alt="phonix" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ">
            <li class="nav-item active ">
                <a class="nav-link" href="../pages/home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=aboutus">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Shop
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?page=products">All</a>
                    <a class="dropdown-item" href="index.php?page=huawei">Huawei</a>
                    <a class="dropdown-item" href="index.php?page=apple">Apple</a>
                    <a class="dropdown-item" href="index.php?page=oppo">Oppo</a>
                    <a class="dropdown-item" href="index.php?page=samsung">Samsung</a>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" title="Shopping Cart" href="index.php?page=cartpage">
                    Cart
                    <?php
                    if (!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                    ?>
                    <span><?php echo $cart_count; ?></span></a>
                <?php
                }
                ?>
                </a>
            </li>

            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { //Means user is logged in display logout
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons" style="font-size:2em">account_circle</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=account">Account</a>
                        <a class="dropdown-item" href="index.php?page=changepwd">Change Password</a>
                        <a class="dropdown-item" href="">Order History</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Log out" href="index.php?page=logout">
                        <i class="material-icons" style="font-size:2em">exit_to_app</i>
                    </a>
                </li>
                <?php
            } else //User is not logged in diplay login/register
            {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Members
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?page=login">Log in</a>
                        <a class="dropdown-item" href="index.php?page=register">Register</a>
                    </div>
                </li>
                <?php
            }
            ?>


        </ul>
    </div>
</nav>