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

<<<<<<< Updated upstream
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
=======
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                ENFFY
                <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast position-fixed bottom-0 end-0" data-bs-autohide="false" style="z-index: 9999">
        <div class="toast-header bg-warning">
            <strong class="me-auto">ENFFY said: </strong>
            <small>just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Bienvenido a nuestro catalogo! Puedes seleccionar los productos y meterlos en tu carrito pulsando en el boton<strong>"Add to card"</strong>. Si necesitas ayuda, no dudes en consultar con nosotros.
        </div>
    </div>
    <!--Div with Horizontal nav and productos Div-->

    <div class="container-fluid row sidebar " id="sidebar">
        <div class="col-3">
>>>>>>> Stashed changes
        <div id="horizontalNav">
            <div id="shortBy">
                <div>
                    <h3>Short By</h3>
                </div>
                <div id="mostLikes">
                    <form action="">
                        <input type="submit" value="">
                        <label>Most Likes</label>
                    </form>
                </div>
                <div id="mostViews">
                    <form action="">
                        <input type="submit" value="">
                        <label>Most Views</label>
                    </form>
                </div>
                <div id="newest">
                    <form action="">
                        <input type="submit" value="">
                        <label>Newest</label>
                    </form>
                </div>
                <div id="recentListed">
                    <form action="">
                        <input type="submit" value="">
                        <label>Recent listed</label>
                    </form>
                </div>
                <div id="highestPrice">
                    <form action="">
                        <input type="submit" value="">
                        <label>Highest Price</label>
                    </form>
                </div>
                <div id="lowestPrice">
                    <form action="">
                        <input type="submit" value="">
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
                        <input type="submit" value="">
                        <label>GIF</label>
                    </form>
                </div>
                <div id="divPng">
                    <form action="">
                        <input type="submit" value="">
                        <label>PNG</label>
                    </form>
                </div>
                <div id="divJpg">
                    <form action="">
                        <input type="submit" value="">
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
                                <input type="submit" value="">
                                <label>GIF</label>
                            </form>
                        </div>
                        <div id="divPng2">
                            <form action="">
                                <input type="submit" value="">
                                <label>PNG</label>
                            </form>
                        </div>
                        <div id="divJpg2">
                            <form action="">
                                <input type="submit" value="">
                                <label>JPG</label>
                            </form>
                        </div>
                    </div>
                    <div id="cryptoRight">
                        <div id="divGif2">
                            <form action="">
                                <input type="submit" value="">
                                <label>GIF</label>
                            </form>
                        </div>
                        <div id="divPng2">
                            <form action="">
                                <input type="submit" value="">
                                <label>PNG</label>
                            </form>
                        </div>
                        <div id="divJpg2">
                            <form action="">
                                <input type="submit" value="">
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
        <div id="products">
            <div id="divProducts">
                <div class="pr">1</div>
                <div class="pr">2</div>
                <div class="pr">3</div>
                <div class="pr">4</div>
                <div class="pr">5</div>
                <div class="pr">6</div>
                <div class="pr">7</div>
                <div class="pr">8</div>
                <div class="pr">9</div>
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
=======
       


        <main class="col-9" >
            <?php
            require("../../connection/nameProduct.php");
            require("../../connection/imageProduct.php");
            require("../../connection/descriptionProduct.php");
            require("../../connection/priceProduct.php");


            ?>
            <div id="products" class="container-fluid">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[0]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[0]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[0]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[0] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[1]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[1]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[1]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[1] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[2]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[2]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[2]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[2] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[3]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[3]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[3]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[3] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[4]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[4]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[4]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[4] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[5]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[5]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[5]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[5] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[6]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[6]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[6]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[6] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[7]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[7]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[7]</p>"; ?>
                                <?php echo "<h3 class='card-text text-end'><i>$prices[8] €</i></h3>";?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[8]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[8]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[8]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[9]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[9]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[9]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[10]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[10]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[10]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[11]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[11]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[11]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[12]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[12]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[12]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[13]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[13]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[13]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[14]); ?>" class="card-img-top" alt="Imagen Producto">
                            <div class="card-body">
                                <?php echo "<h5 class='card-title'>$names[14]</h5>"; ?>
                                <?php echo "<p class='card-text'>$descriptions[14]</p>"; ?>
                            </div>
                            <div class="card-footer text-center">
                            <a href="#" class="btn btn-warning">Add to card</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<<<<<<< Updated upstream
>>>>>>> Stashed changes

=======
    
    <script>
        window.onload = (event) =>{
            let myAlert = document.querySelector('.toast');
            let bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
            
        }
    </script>
    <!-- "<img src='data:image/png; base64," . base64_encode($images[1]) . "' id='imgBlob' alt='image1'>"-->
>>>>>>> Stashed changes
</body>

</html>