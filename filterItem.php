<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="library/css/style.css">

      <title>Shop filter</title>
  </head>
  <body>
        <?php require_once "library/main.php";
            error_reporting(E_ALL);
            ini_set('display_startup_errors', 1);
            ini_set('display_errors', '1');
        ?>

  <div class="row">
        <div class="col-sm-12 header">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <h4><a class="navbar-brand" href="index.php">NaZad</a></h4>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">

                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                </nav>

        </div>
<!-- Showing main content -->
    <div class="col-sm-2">
<!-- Showing price range -->
    <div class="filter">
        <p class="price-range">
            <label for="amount"><h4 class='title'>Цены товара:</h4></label>
                <input type="text" id="amount" readonly>
        </p>
    <div id="slider-range"></div>
    <hr/>
    </div>
    <br>
<!-- End price range -->
<!-- Showing all filters -->
    <?php if (isset($_GET['category'])){$catId = $_GET['category'];}?>
    <?php $sqlAttrType = "SELECT id, attr_type_name FROM attribute_type WHERE cat_id = $catId ORDER BY id LIMIT 8";
        if ($stmtAttrType = $pdo->query($sqlAttrType)):?>
            <div class="dropdown">
        <?php while ($selectAttrType= $stmtAttrType->fetch()): ?>
        <button id="<?php echo $idAttrType = $selectAttrType['id']; ?>" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $selectAttrType['attr_type_name']; $idAttrType = intval($idAttrType);?>
        </button>                                    
        <?php $sqlAttrVal = "SELECT DISTINCT attr_value_name FROM relationship WHERE attr_type_id = $idAttrType";
                if ($stmtAttrVal = $pdo->query($sqlAttrVal)):?>   
                    <?php  while ($selectAttrVal = $stmtAttrVal->fetch()): ?>
                        <a id="<?php echo  $selectAttrVal ['attr_value_name'];?>" class="dropdown-item" href="#">
                            <?php echo  $selectAttrVal ['attr_value_name'];?>
                        </a>
                    <?php endwhile;?>
                    <br><hr/>
                <?php endif;?>
        <?php endwhile;?>
    </div>
    <?php endif;?>
<!-- End all filters -->
    </div>
    <div class="col-sm-10">
<!-- Showing header of catalog -->
        <?php if (isset($_GET['category'])){
            $catId = $_GET['category'];}
            $arrayHead = strval($showfilterCat[$catId]);
            echo "<h1 id='$catId' class='headTitle'>".$arrayHead ."</h1></br></hr>";
        ?>
<!-- End showing header of catalog -->
<!-- Showing main content all products -->          
                <div class="product-list"></div>
<!-- End showing main content all products-->
<!-- Pagination -->
                    <div class="content-pagin">
                            <nav class="pagination" aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <li id="1" class="page-item-disabled"><a class="page-link" href="#">1</a></li>
                                    <li id="2" class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li id="3" class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li id="4" class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li id="5" class="page-item"><a class="page-link" href="#">5</a></li>
                                </ul>
                            </nav>
                    </div>
<!-- END pagination -->
    </div>
<!-- ################################################ -->
        <div class="col-sm-12 footer">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div> 
        </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="library/js/ajax.js"></script>
    <script src="library/js/mainFilter.js"></script>
</body>
</html>