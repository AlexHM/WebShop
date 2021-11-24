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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>

    <!--Navbar top-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                ENFFY
                <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="#" alt="login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="#" alt="signup">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="#" alt="shoppingCardImg">Shop Card</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!--Div with Horizontal nav and productos Div-->

    <div class="container-fluid row sidebar" id="sidebar">
        <div class="col-3">
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
    </div>

        <main class="col-9" >
            <?php
            require("../../connection/nameProduct.php");
            require("../../connection/imageProduct.php");
            require("../../connection/descriptionProduct.php");

            ?>
            <div id="products" class="container-fluid">
                <div class="row row-cols-4">
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[0]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[0]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[0]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[1]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[1]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[1]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[2]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[2]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[2]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[3]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[3]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[3]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[4]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[4]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[4]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[5]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[5]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[5]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[6]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[6]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[6]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[7]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[7]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[7]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[8]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[8]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[8]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[9]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[9]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[9]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[10]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[10]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[10]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[11]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[11]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[11]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[12]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[12]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[12]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[13]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[13]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[13]</p>"; ?>
                        </div>
                    </div>
                    <div class="card" style="width: 22vh">
                        <img class="card-img-top" src="<?php echo 'data:image/png; base64,' . base64_encode($images[14]); ?>" alt="imageTest" id="imgBlob">
                        <div class="card-body">
                            <?php echo "<h5 class='card-title'>$names[14]</h5>"; ?>
                            <?php echo "<p class='card-text'>$descriptions[14]</p>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </d>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- "<img src='data:image/png; base64," . base64_encode($images[1]) . "' id='imgBlob' alt='image1'>"-->
</body>

</html>