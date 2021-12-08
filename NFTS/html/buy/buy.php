<?php
require("../../connection/cardGuest.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ShopCard</title>
</head>

<body>
    <!--NAV BAR SECTION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                ENFFY
                <img src="" alt="" width="30" height="24">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../signup/signUp.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../signup/signUp.html">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop Card</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_COOKIE["cok_guest"])) {
        echo " SOY EL USUARIO: " . $_COOKIE["cok_guest"];
    }
    ?>


    <!-- MAIN CONTAINER, PRODUCTOS DEL PEDIDO -->

    <div class="container-fluid">
        <div class="row">
            <!-- ZONA DE PRODUCTOS ESPECIFICOS SELECCIONADOS-->
            <div class="container-fluid col-12">
                <div class="card pb-1">
                    <div class="card-header bg-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                        Shopping List
                    </div>
                    <div class="card-body">
                        <!-- AQUI IRIA 1 X 1 LOS PRODUCTOS QUE HAN SIDO SELECCIONADOS-->
                        <?php
                        for ($i = 0; $i < count($id_productG); $i++) {
                        ?>
                            <div class="row-fluid border-bottom  pt-3">
                                <div class="row ">
                                    <div class="col-6 col-md-4 container-fluid ">
                                        <img src="" alt="image">
                                    </div>
                                    <div class="col-6 col-md-3 container-fluid">
                                        <div class="row">
                                            <h4>Product Name</h4>
                                        </div>
                                        <div class="row">
                                            <p>Product Description</p>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-1 container-fluid">
                                        <p>25.00e x </p>
                                    </div>
                                    <div class="col-6 col-md-1 container-fluid">
                                        <label> Quantity: <?php echo $quantityG[$i]?></label>
                                    </div>
                                    <div class="col-2 col-md-1 container-fluid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }

                        ?>

                        <!-- FINAL ZONE ABOUT SHOP LIST -->
                        <div class="container-fluid pt-3">
                            <div class="row d-flex justify-content-end col-12">

                                <div class="col-6 col-md-2  text-start d-flex justify-content-center">
                                    New items added?
                                </div>
                                <div class="col-6 col-md-2">
                                    <button type="button" class="btn btn-outline-secondary">Update</button>
                                </div>
                                <div class="col-md-5 container-fluid offset-md-3">
                                    <div class="row">
                                        <div class="col-6 col-md-4 container-fluid">
                                            <input type="text" class="form-control text-secondary" placeholder="Promo Code...">
                                        </div>
                                        <div class="col-6 col-md-5 container-fluid">
                                            <button type="button" class="btn btn-outline-secondary">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row d-flex justify-content-end col-12">
                            <div class="col-12 col-md-2 d-flex justify-content-end offset-md-9">
                                <div class="col-5 col-md-1 d-flex offset-md-6">
                                    <h4>Total: </h4>
                                </div>
                                <div class="col-6 col-md-1 d-flex justify-content-end offset-md-9">
                                    <h5>2500.00€</h5>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 d-flex justify-content-end offset-md-9">
                                <button type="button" class="btn btn-warning">End Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<footer>
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
                <p class="text-center text-muted">&copy; 2021 Enffy.Inc</p>
            </footer>
    </footer>

</html>