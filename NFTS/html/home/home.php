<?php

require("../../cookies/checkSession.php");

if ($flagUser) {
    header("location:homeUser.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../stylesheet/home.css">
    <title>Home</title>
</head>

<body>

    <!--Navbar top-->

    <div id="navTop">
        <div id="titleApp">
            <h3>ENFFY</h3>
            <img src="" alt="logoApp">
        </div>
        <div id="searchForm">
            <form action="productRequest.php">
                <input type="text" name="product" id="inpProduct">
                <input type="submit" name="btnProduct" id="btnProduct">
            </form>
        </div>
        <div id="divLogin">
            <a href="#"><img src="#" alt="login" class="imgNavTop"></a>
        </div>
        <div id="divSignUp">
            <a href="#"><img src="#" alt="signup" class="imgNavTop"></a>
        </div>
        <div id="divShopping">
            <a href="#"><img src="#" alt="shoppingCardImg" class="imgNavTop"></a>
        </div>
    </div>

    <!--Div with Horizontal nav and productos Div-->

    <div id="general">
        <div id="horizontalNav">
            <div id="shortBy">
                <div>
                    <h3>Short By</h3>
                </div>
                <div id="mostLikes">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Most Likes</label>
                    </form>
                </div>
                <div id="mostViews">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Most Views</label>
                    </form>
                </div>
                <div id="newest">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Newest</label>
                    </form>
                </div>
                <div id="recentListed">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Recent listed</label>
                    </form>
                </div>
                <div id="highestPrice">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Highest Price</label>
                    </form>
                </div>
                <div id="lowestPrice">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>Lowest Price</label>
                    </form>
                </div>

            </div>
            <div id="type">
                <div>
                    <h3>Type</h3>
                </div>
                <div id="divGif">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>GIF</label>
                    </form>
                </div>
                <div id="divPng">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>PNG</label>
                    </form>
                </div>
                <div id="divJpg">
                    <form action="">
                        <input type="checkbox" value="">
                        <label>JPG</label>
                    </form>
                </div>
            </div>
            <div id="author">
                <div>
                    <h3>Author</h3>
                </div>
                <div>
                    <form action="">
                        <input type="text" placeholder="Author">
                    </form>
                </div>
            </div>
            <div id="crypto">
                <div>
                    <h3>Crypto</h3>
                </div>
                <div id="cryptoContainer">
                    <div id="cryptoLeft">
                        <div id="divGif2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>GIF</label>
                            </form>
                        </div>
                        <div id="divPng2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>PNG</label>
                            </form>
                        </div>
                        <div id="divJpg2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>JPG</label>
                            </form>
                        </div>
                    </div>
                    <div id="cryptoRight">
                        <div id="divGif2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>GIF</label>
                            </form>
                        </div>
                        <div id="divPng2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>PNG</label>
                            </form>
                        </div>
                        <div id="divJpg2">
                            <form action="">
                                <input type="checkbox" value="">
                                <label>JPG</label>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
            <div id="price">
                <div>
                    <h3>Price</h3>
                </div>
                <div>
                    <input type="text">
                    <label>Max price</label>
                </div>
                <div>
                    <input type="text">
                    <label>Min price</label>
                </div>
            </div>

        </div>
        <?php
        require("../../connection/nameProduct.php");
        require("../../connection/imageProduct.php");
        require("../../connection/descriptionProduct.php");

        ?>

        <div id="products">
            <div id="divProducts">
                <div class="pr">
                    <?php echo "<h2>$names[0]</h2>"; ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[0]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[0]</p>"; ?>
                </div>
                <div class="pr">
                    <?php echo "<h2>$names[1]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[1]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[1]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[2]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[2]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[2]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[3]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[3]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[3]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[4]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[4]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[4]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[5]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[5]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[5]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[6]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[6]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[6]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[7]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[7]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[7]</p>"; ?>
                </div>
                <div class="pr"><?php echo "<h2>$names[8]</h2>" ?>
                    <img src="<?php echo "data:image/png; base64," . base64_encode($images[8]); ?>" alt="imageTest" id="imgBlob">
                    <?php echo "<p>$descriptions[8]</p>"; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- "<img src='data:image/png; base64," . base64_encode($images[1]) . "' id='imgBlob' alt='image1'>"-->
</body>

</html>