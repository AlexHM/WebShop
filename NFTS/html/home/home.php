<?php
require("../../cookies/checkSession.php");
require("../../cookies/checkCookie.php");
require("../../connection/imageProduct.php");
require("../../connection/querySearch.php");



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
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <?php
                        if ($flagSession) {
                            echo "<a class='nav-link' href='#'>" . $_SESSION["ses_user"] . "</a>";
                        } else {
                            if ($flagCookie) {
                                echo "<a class='nav-link' href='#'>" . $_COOKIE["cok_user"] . "</a>";
                            } else {
                                echo "<a class='nav-link' href='../login/login.html'>Login</a>";
                            }
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../signup/signUp.html">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop Card</a>
                    </li>
                    <?php
                    if ($flagSession || $flagCookie) {
                        echo " <li class='nav-item'>
                            <a class='nav-link' href='../../cookies/destroySession.php'>Sign out</a>
                        </li>";
                    }
                    ?>
                </ul>
                <form class="d-flex" action="../../connection//querySearchFilter.php" method="GET">
                    <input class="form-control me-2" name="searchInp" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!--spacing-->
    <div style="height:35px;"></div>

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast position-fixed bottom-0 end-0" data-bs-autohide="false" style="z-index: 9999">
        <div class="toast-header bg-warning">
            <strong class="me-auto">ENFFY said: </strong>
            <small>just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">Bienvenido a nuestro catalogo! Puedes seleccionar los productos y meterlos en tu carrito pulsando en el boton<strong>"Add to card"</strong>. Si necesitas ayuda, no dudes en consultar con nosotros.</div>
    </div>


    <!--Div filters in searchs products-->

    <div class="container">
        <div class="col-12">
            <div class="display-4 border-bottom ">Filters</div>
            <div style="height:15px;"></div>
            <fieldset class="row border-top-1">
                <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-around">
                    <form class="input-group d-flex align-items-center">
                        <label class="input-group-text bg-warning border-warning" for="inputGroupSelect01">Options</label>
                        <select class="form-select border-warning" id="inputGroupSelect01">
                            <option selected>Select category</option>
                            <option value="1">Memes</option>
                            <option value="3">Art</option>
                            <option value="4">Gaming</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-4  col-sm-12 display-flex align-items-center">
                    <form class="input-group d-flex align-items-center">
                        <label class="input-group-text bg-warning border-warning" for="inputGroupSelect01">Max Price</label>
                        <select class="form-select border-warning" id="inputGroupSelect01">
                            <option selected>Choose one...</option>
                            <option value="1">&lt; 100€</option>
                            <option value="3">&lt; 200€</option>
                            <option value="4">&lt; 500€</option>
                            <option value="5">&lt; 1.000€</option>
                            <option value="6">&lt; 5.000€</option>
                            <option value="7">&lt; 10.000€</option>
                            <option value="7">&gt; 10.000€</option>
                        </select>
                    </form>
                </div>

                <div class="col-md-4  col-sm-12 display-flex align-items-center">
                    <div class="input-group d-flex align-items-center">
                    <button type="button" class="btn btn-warning">Apply filters</button>
                    </div>
                </div>
            </fieldset>
            <div class="display-8 border-bottom text-white">.</div>
        </div>
    </div>
    <div style="height:50px;"></div>
    <div>
        <main class="col-12 ">


            <div id="products" class="container">
                <div class="display-4 border-bottom ">Products</div>
                <div style="height:30px;"></div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                    <?php
                    if (!isset($_GET["searchInp"])) {
                        for ($i = 0; $i < count($nameP); $i++) {
                    ?>
                            <div class="col">
                                <div class="card h-100"<?php $x= $i+1; echo "id='$x'"?>>
                                    <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[$i]); ?>" class="card-img-top" alt="Imagen Producto"><?php
                                    ?><div class="card-body"><?php
                                    echo "<h5 class='card-title'>$nameP[$i]</h5>";
                                    echo "<p class='card-text'>$description[$i]</p>";
                                    echo "<h3 class='card-text text-end'><i>$price[$i] €</i></h3>"; ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="#" class="btn btn-warning">See details</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        //aquí irá el filtro de busqueda general
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--SCRIPT TO SHOW TOAST TO INFORMATE CLIENT HOW TO ADD PRODUTS-->
    <script>
        window.onload = (event) => {
            let myAlert = document.querySelector('.toast');
            let bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
        }
    </script>
</body>
<footer>
    <div class="container">
        <footer class="py-3 my-2">
            <ul class="nav justify-content-center border-top">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2021 Enffy, Inc</p>
        </footer>
    </div>
</footer>


</html>