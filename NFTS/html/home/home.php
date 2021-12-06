<?php
require("../../cookies/checkSession.php");
require("../../cookies/checkCookie.php");
require("../../connection/imageProduct.php");
require("../../connection/querySearch.php");
require("../../connection/querySearchFilter.php");
require("../../connection/id.php");

///////// FILTRO DEL BUSCADOR SUPERIOR
$queryFilter = "";

if (isset($_POST["searchInp"])) {
    $queryFilter = $_POST["searchInp"];
}

try {

    $searchQueryFilter = "select * from products where name like '%$queryFilter%'";
    $resultQueryFilter = $db->prepare($searchQueryFilter);
    $resultQueryFilter->execute();

    $nameS = array();
    $imageS = array();
    $descriptionS = array();
    $priceS = array();
    $countS = 0;
    $idS = array();

    while ($row = $resultQueryFilter->fetch(PDO::FETCH_ASSOC)) {

        $nameS[$countS] = $row['name'];
        $imageS[$countS] = $row['image'];
        $descriptionS[$countS] = $row['description'];
        $priceS[$countS] = $row['price'];
        $idS[$countS] = $row['id'];
        $countS = $countS + 1;
    }
} catch (\Throwable $th) {
    echo "Error: " . $th;
}

?>
<?php

///////// FILTRO DEL BUSCADOR POR CATEGORIA Y PRECIO
$categoryFilter = "";
$priceFilter = "";

if (isset($_POST["selectCategory"])) {
    $categoryFilter = $_POST["selectCategory"];
}
if (isset($_POST["selectPrice"])) {
    $priceFilter = $_POST["selectPrice"];
}

try {
    
    $searchQueryFilter2 = "select * from products where category = '$categoryFilter' and price $priceFilter";
    $resultQueryFilter2 = $db->prepare($searchQueryFilter2);
    $resultQueryFilter2->execute();
    


    $nameF = array();
    $imageF = array();
    $descriptionF = array();
    $priceF = array();
    $idF = array();
    $countF = 0;

    while ($row = $resultQueryFilter2->fetch(PDO::FETCH_ASSOC)) {

        $nameF[$countF] = $row['name'];
        $imageF[$countF] = $row['image'];
        $descriptionF[$countF] = $row['description'];
        $priceF[$countF] = $row['price'];
        $idF[$countF] = $row['id'];
        $countF = $countF + 1;
    }
} catch (\Throwable $th) {
    echo "Error: " . $th;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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


                    <?php
                    if ($flagSession || $flagCookie) {
                        echo " <li class='nav-item'>
                            <a class='nav-link' href='../../cookies/destroySession.php'>Sign out</a>
                        </li>";
                    }
                    ?>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 text-end pe-3">
                    <li class="nav-item">
                        <a class="nav-link position-relative">
                            Shop List
                            <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-warning">
                                5
                            </span>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" action="home.php" method="POST">
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

    <div class="container" style="">
        <div class="col-12">
            <div class="display-4 border-bottom ">Filters</div>
            <div style="height:15px;"></div>
            <fieldset class="row border-top-1">
                <div class="col-12 d-flex align-items-center justify-content-around">
                    <form class="input-group d-flex align-items-center" action="home.php" method="POST">
                        <label class="input-group-text bg-warning border-warning" for="inputGroupSelect01">Options</label>
                        <select class="form-select border-warning me-3" id="inputGroupSelect01" name="selectCategory">
                            <option selected>Select category</option>
                            <option value="Meme">Memes</option>
                            <option value="Art">Art</option>
                            <option value="Gaming">Gaming</option>
                        </select>
                        <label class="input-group-text bg-warning border-warning" for="inputGroupSelect01">Max Price</label>
                        <select class="form-select border-warning" id="inputGroupSelect01" name="selectPrice">
                            <option selected>Choose one...</option>
                            <option value="< 100">&lt; 100€</option>
                            <option value="< 200">&lt; 200€</option>
                            <option value="< 500">&lt; 500€</option>
                            <option value="< 1000">&lt; 1.000€</option>
                            <option value="< 5000">&lt; 5.000€</option>
                            <option value="< 10000">&lt; 10.000€</option>
                            <option value="> 10000">&gt; 10.000€</option>
                        </select>
                        <div class="col-md-4  col-sm-12 display-flex align-items-center p-3">
                            <div class="input-group d-flex align-items-center">
                                <input type="submit" class="btn btn-warning" value="Apply Filters" name=btnSelect>
                            </div>
                        </div>
                    </form>
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
                    if (isset($_POST["btnSelect"])) {
                        for ($i = 0; $i < count($nameF); $i++) {
                            ?>
                                <div class="col">
                                        <div class='card h-100' data-toggle='modal' data-target='#exampleModal'>
                                        <img src="<?php echo 'data:image/png; base64,' . base64_encode($imageF[$i]); ?>" class="card-img-top" alt="Imagen Producto"><?php
                                        ?><div class="card-body"><?php
                                        echo "<h5 class='card-title'>$nameF[$i]</h5>";
                                        echo "<p class='card-text'>$descriptionF[$i]</p>";
                                        echo "<h3 class='card-text text-end'><i>$priceF[$i] €</i></h3>"; ?>
                                        </div>
                                        <div class="card-footer text-center">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">See Details</button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        
                    } else if (isset($_POST["searchInp"])) {
                        if (empty($nameS)) {
                            echo "<p>No data found, please search again</p>";
                        }
                        for ($i = 0; $i < count($nameS); $i++) {
                            ?>
                                <div class="col">
                                        <div class='card h-100'>
                                        <img src="<?php echo 'data:image/png; base64,' . base64_encode($imageS[$i]); ?>" class="card-img-top" alt="Imagen Producto"><?php
                                        ?><div class="card-body"><?php
                                        echo "<h5 class='card-title'>$nameS[$i]</h5>";
                                        echo "<p class='card-text'>$descriptionS[$i]</p>";
                                         echo "<h3 class='card-text text-end'><i>$priceS[$i] €</i></h3>"; ?>
                                        </div>
                                        <div class="card-footer text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">See Details</button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                    }else{
                        for ($i = 0; $i < count($nameP); $i++) {
                            ?>
                                <div class="col">
                                    
                                        <div class='card h-100' data-toggle='modal' data-target='#exampleModal'>
                                        <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[$i]); ?>" class="card-img-top" alt="Imagen Producto"><?php
                                        ?><div class="card-body"><?php
                                        echo "<h5 class='card-title'>$nameP[$i]</h5>";
                                        echo "<p class='card-text'>$description[$i]</p>";
                                         echo "<h3 class='card-text text-end'><i>$price[$i] €</i></h3>"; ?>
                                        </div>
                                        <div class="card-footer text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">See Details</button>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                    }
                    
                    ?>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL EXAMPLE -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="#exampleModal">Nombre Koala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="" alt="default" srcset="" >
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <h5>Un Koala que quiere ir al espacio y por eso esta super fuerte y tiene un casco</h5>
                            </div>
                            <div class="row">
                                <p class="fst-italic">Art</p>
                                <h4 class="text-end fst-italic">23.99€</h4>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <input class="form-control col-6" name="quantity" type="number" placeholder="1" aria-label="Quantity">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-warning ">Add to card</button>
                </div>
            </div>
        </div>
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