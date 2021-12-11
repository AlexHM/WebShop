<?php

require("NFTS/cookies/checkSession.php");
require("NFTS/cookies/checkCookie.php");
require("NFTS/connection/imageProduct.php");
require("NFTS/connection/querySearch.php");
require("NFTS/connection/querySearchFilter.php");
require("NFTS/connection/id.php");

$randomGuest = -1;
if ($flagCookie==false && $flagSession==false) {
    if (isset($_COOKIE["cok_guest"])) {
        $randomGuest = $_COOKIE["cok_guest"];
        }else{
            $randomGuest =rand(0,5000);
            setcookie("cok_guest", $randomGuest, time() + 86400, "/");
        }

}

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
    $refS = array();
    $countS = 0;
    $idS = array();

    while ($row = $resultQueryFilter->fetch(PDO::FETCH_ASSOC)) {

        $nameS[$countS] = $row['name'];
        $imageS[$countS] = $row['image'];
        $descriptionS[$countS] = $row['description'];
        $priceS[$countS] = $row['price'];
        $idS[$countS] = $row['id'];
        $refS[$countS] = $row['ref'];
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
    $refF = array();
    $countF = 0;

    while ($row = $resultQueryFilter2->fetch(PDO::FETCH_ASSOC)) {

        $nameF[$countF] = $row['name'];
        $imageF[$countF] = $row['image'];
        $descriptionF[$countF] = $row['description'];
        $priceF[$countF] = $row['price'];
        $idF[$countF] = $row['id'];
        $refF[$countF] = $row['ref'];
        $countF = $countF + 1;
    }
} catch (\Throwable $th) {
    echo "Error: " . $th;
}
?>

<?php
//////////// AÑADIR AL CARRITO

$productQuantity= 0;
$idHidden="";
if (isset($_POST["quantity"])) {
    $productQuantity = $_POST["quantity"];
}
if (isset($_POST["idHidden"])) {
   $idHidden =$_POST["idHidden"];
}


if ($productQuantity > 0 && ($flagCookie || $flagSession)) {

   $querSearchCard= "select * from bought_products where id_product = $idHidden";
   $resultCardSelect = $db->prepare($querSearchCard);
   $resultCardSelect->execute();

   $actualQuantity= 0;
        while ($rowG = $resultCardSelect->fetch(PDO::FETCH_ASSOC)) {
            $actualQuantity = $rowG['quantity'];
        }

   if ($resultCardSelect->rowCount()>0) {
       $queryUpdateCard = "update bought_products set quantity= :quantity where id_product = :idProduct and email_user = :email_user";
       $resultUpdateCard = $db->prepare($queryUpdateCard);

        $resultUpdateCard->bindValue(":idProduct",$idHidden);
        $resultUpdateCard->bindValue(":email_user", $_SESSION["ses_user"]);
        $resultUpdateCard->bindValue(":quantity", ($productQuantity+$actualQuantity));
        $resultUpdateCard->execute();

        
   }else{
    $queryUserCard= "insert into bought_products (id_product,email_user,quantity) values (:idProduct, :email_user, :quantity)";
    $resultCardUser = $db->prepare($queryUserCard);

    
    $resultCardUser->bindValue(":idProduct",$idHidden);
    $resultCardUser->bindValue(":email_user", $_SESSION["ses_user"]);
    $resultCardUser->bindValue(":quantity", $productQuantity);
    $resultCardUser->execute();
   }
   
}else{
    if ($productQuantity > 0 && ($flagCookie == false && $flagSession== false)) {
      
      

        $queryGuest = "Select id_guest,quantity,id_product from bought_products where id_guest = :id_guest";
        $resultGuest = $db->prepare($queryGuest);
        $resultGuest->bindValue(":id_guest",$randomGuest);
        $resultGuest->execute();

        $flagIdP= true;
        $actualQuantity= 0;
        $countG =0;
        while ($rowG = $resultGuest->fetch(PDO::FETCH_ASSOC)) {
            $actualQuantity = $rowG['quantity'];
            if ($idHidden == $rowG['id_product']) {
                $flagIdP = false;
            }
            $countG++;
        }
                
                
        if ($resultGuest->rowCount()>0) {
            
            if ($flagIdP) {
        
                    $queryInsertGuest = "insert into bought_products (id_product,quantity,id_guest) values (:idProduct, :quantity, :id_guest)";
                    $resultGuest = $db->prepare($queryInsertGuest);
                    $resultGuest->bindValue(":idProduct",$idHidden);
                    $resultGuest->bindValue(":quantity",$productQuantity);
                    $resultGuest->bindValue(":id_guest",$randomGuest);
                    $resultGuest->execute();

                
            }else{
                $queryInsertGuest = "update bought_products set quantity= :quantity where id_product = :idProduct and id_guest = :id_guest";
                $resultGuest = $db->prepare($queryInsertGuest);
                $resultGuest->bindValue(":idProduct",$idHidden);
                $resultGuest->bindValue(":quantity",($productQuantity+$actualQuantity));
                $resultGuest->bindValue(":id_guest",$randomGuest);
                $resultGuest->execute();
               
            }
 
        }else{
            $queryInsertGuest = "insert into bought_products (id_product,quantity,id_guest) values (:idProduct, :quantity, :id_guest)";
            $resultGuest = $db->prepare($queryInsertGuest);

           

            $resultGuest->bindValue(":idProduct",$idHidden);
            $resultGuest->bindValue(":quantity",$productQuantity);
            $resultGuest->bindValue(":id_guest",$randomGuest);
            $resultGuest->execute();

        } 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../stylesheet/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>

<body onload="setTimeout(comprobar(), 1000)">

    <!--Navbar top-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                ENFFY
                <img src="NFTS/media/logo.png" alt="" width="32" height="32">
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
                                echo "<a class='nav-link' href='NFTS/html/login/login.html'>Login</a>";
                            }
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                            if ($flagCookie==false && $flagSession==false) {
                                echo " <a class='nav-link' href='NFTS/html/signup/signup.html'>Sign up</a>";
                            }
                        ?>
                    
                    </li>


                    <?php
                    if ($flagSession || $flagCookie) {
                        echo " <li class='nav-item'>
                            <a class='nav-link' href='NFTS/cookies/destroySession.php'>Sign out</a>
                        </li>";
                    }
                    ?>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 text-end pe-3">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="NFTS/html/buy/buy.php">
                            Shop List
                            <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-warning">
                                <script>
                                    function comprobar() {
                                            <?php
                                            require("NFTS/connection/item_Card.php");
                                            if (isset($countItem)) {
                                                echo $countItem;
                                            }else{
                                                echo "0";
                                            }
                                            ?>
                                    }
                                    
                                </script>
                        
                                
                                <?php
                                if (isset($countItem)) {
                                    echo $countItem;
                                }else{
                                    echo "0";
                                }
                                   
                                ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="POST">
                    <input class="form-control me-2" name="searchInp" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!--spacing-->
    <div style="height:35px;"></div>



    <div class="container">
        <div class="col-12">
            <div class="display-4 border-bottom ">Filters</div>
            <div style="height:15px;"></div>
            <fieldset class="row border-top-1">
                <div class="col-12 d-flex align-items-center justify-content-around">
                    <form class="input-group d-flex align-items-center" action="index.php" method="POST">
                        <label class="input-group-text bg-warning border-warning d-none d-sm-none d-md-block" for="inputGroupSelect01">Options</label>
                        <select class="col-6 form-select border-warning me-3" id="inputGroupSelect01" name="selectCategory">
                            <option selected>Select category</option>
                            <option value="Meme">Memes</option>
                            <option value="Art">Art</option>
                            <option value="Gaming">Gaming</option>
                        </select>
                        <label class="input-group-text bg-warning border-warning d-none d-sm-none d-md-block" for="inputGroupSelect01">Max Price</label>
                        <select class="col-6 form-select border-warning" id="inputGroupSelect01" name="selectPrice">
                            <option value="> 0" selected>Choose one...</option>
                            <option value="< 100">&lt; 100€</option>
                            <option value="< 200">&lt; 200€</option>
                            <option value="< 500">&lt; 500€</option>
                            <option value="< 1000">&lt; 1.000€</option>
                            <option value="< 5000">&lt; 5.000€</option>
                            <option value="< 10000">&lt; 10.000€</option>
                            <option value="> 10000">&gt; 10.000€</option>
                        </select>
                        <div class="col-12 col-md-2 display-flex align-items-center p-3">
                            <div class="input-group d-flex align-items-center">
                                <input type="submit" class="btn btn-warning" value="Apply Filters" name=btnSelect>
                            </div>
                        </div>
                        <div class="col-12 col-md-2 display-flex">
                            <div class="input-group d-flex align-items-center">
                                <input type="submit" class="btn btn-warning" value="Dismiss Filters" name=btnDF>
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
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" <?php echo "data-bs-target='#staticBackdrop$idF[$i]'" ?>>See Details</button>
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
                                        echo "<p class='card-text'>$descriptionS[$i]</p>";?>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="row pb-1">
                                                <div class="col-6">
                                                    <h6 class="text-muted">Ref: <?php echo $refS[$i]?></h6>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo "<h6 class='card-text text-end'><i>$priceS[$i]€</i></h6>";?>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" <?php echo "data-bs-target='#staticBackdrop$idS[$i]'" ?>>See Details</button>
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
                                        echo "<p class='card-text'>$description[$i]</p>";?>
                                        </div>
                                        <div class="card-footer text-center" >
                                            <div class="row pb-1">
                                                <div class="col-6">
                                                    <h6 class="text-muted">Ref: <?php echo $ref[$i]?></h6>
                                                </div>
                                                <div class="col-6">
                                                    <?php echo "<h6 class='card-text text-end'><i>$price[$i]€</i></h6>";?>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" <?php echo "data-bs-target='#staticBackdrop$idP[$i]'" ?>>See Details</button>
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

    <!-- MODAL EXAMPLE//////////////////////// FOR'S FILL THE MODALS --> 


    <?php
                    if (isset($_POST["btnSelect"])) {
                        for ($i = 0; $i < count($nameF); $i++) {
                            ?>
                                <div class="modal fade" id="staticBackdrop<?php echo $idF[$i];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class='modal-title' id='#$idS[$i]'><?php echo $nameF[$i];?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="<?php echo 'data:image/png; base64,' . base64_encode($imageF[$i]); ?>" alt="default" srcset="" class="img-fluid" >
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <h5><?php echo $descriptionF[$i]; ?></h5>
                                                            <h6 class="text-muted">Ref: <?php echo $refF[$i]?></h6>
                                                        </div>
                                                        <div class="row">
                                                            <p class="fst-italic">Art</p>
                                                            <h4 class="text-end fst-italic"><?php echo $priceF[$i];?> €</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                            <form action="index.php" method="POST" class="hstack gap-3 d-flex justify-content-center">
                                                <div class="input-group d-flex justify-content-center">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                                    </svg>
                                                    </span>
                                                    <input class="form-control" name="quantity" type="number" placeholder="1" aria-label="Quantity">
                                                    <input class="visually-hidden" name="idHidden" value="<?php echo "$idF[$i]"; ?>">
                                                </div>
                                                <div class="vr"></div>
                                                <div class="input-group d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-warning">Add to card</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        
                    } else if (isset($_POST["searchInp"])) {
                        
                        for ($i = 0; $i < count($nameS); $i++) {
                            ?>
                                <div class="modal fade" id="staticBackdrop<?php echo $idS[$i];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class='modal-title' id='#$idS[$i]'><?php echo $nameS[$i];?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="<?php echo 'data:image/png; base64,' . base64_encode($imageS[$i]); ?>" alt="default" srcset="" class="img-fluid" >
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row">
                                                            <h5><?php echo $descriptionS[$i]; ?></h5>
                                                            <h6 class="text-muted">Ref: <?php echo $refS[$i]?></h6>
                                                        </div>
                                                        <div class="row">
                                                            <p class="fst-italic">Art</p>
                                                            <h4 class="text-end fst-italic"><?php echo $priceS[$i];?> €</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                            <form action="index.php" method="POST" class="hstack gap-3 d-flex justify-content-center">
                                                <div class="input-group d-flex justify-content-center">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                                    </svg>
                                                    </span>
                                                    <input class="form-control" name="quantity" type="number" placeholder="1" aria-label="Quantity">
                                                    <input class="visually-hidden" name="idHidden" value="<?php echo "$idS[$i]"; ?>">
                                                </div>
                                                <div class="vr"></div>
                                                <div class="input-group d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-warning">Add to card</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                    }else{
                        for ($i = 0; $i < count($nameP); $i++) {
                            ?>
                            <div class="modal fade" id="staticBackdrop<?php echo $idP[$i];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class='modal-title' id='#$idS[$i]'><?php echo $nameP[$i];?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="<?php echo 'data:image/png; base64,' . base64_encode($images[$i]); ?>" alt="default" srcset="" class="img-fluid" >
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h5><?php echo $description[$i]; ?></h5>
                                                        <h6 class="text-muted">Ref: <?php echo $ref[$i]?></h6>
                                                    </div>
                                                    <div class="row">
                                                        <p class="fst-italic">Art</p>
                                                        <h4 class="text-end fst-italic"><?php echo $price[$i];?> €</h4>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <form action="index.php" method="POST" class="hstack gap-3 d-flex justify-content-center">
                                                <div class="input-group d-flex justify-content-center">
                                                    <span class="input-group-text" id="basic-addon1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                                                    </svg>
                                                    </span>
                                                    <input class="form-control" name="quantity" type="number" placeholder="1" aria-label="Quantity">
                                                    <input class="visually-hidden" name="idHidden" value="<?php echo "$idP[$i]"; ?>">
                                                </div>
                                                <div class="vr"></div>
                                                <div class="input-group d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-warning">Add to card</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php      
                        }

                    }
                    ?>            
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    

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