<?php
session_start();

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');

require_once "php/db_connect.php";

$catFilter = false;
$catId = false;


// Show filter of category on Index.php    //echo  json_encode($AjaxFirstShowProduct);
    $sqlfilterCategory = "SELECT id, cat_name FROM category";

        $stmtfilterCategory = $pdo->query($sqlfilterCategory);
            while ($selectfilterCategory = $stmtfilterCategory->fetch(PDO::FETCH_ASSOC)){
                $showfilterCatId [] = $selectfilterCategory['id'];
                $showfilterCatName [] = $selectfilterCategory['cat_name'];
            }
            $showfilterCat = array_combine($showfilterCatId, $showfilterCatName);
// END ------------------------------------------------------------------

//                              AJAX
// Show all products choosen category by default   //echo  json_encode($AjaxFirstShowProduct);
if (isset($_POST['category'])){
        $idCat = +$_POST['category'];
    $sqlFirstShowProduct = "SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name
        FROM product as prod, `image` as img WHERE cat_id = $idCat AND img.prod_id = prod.id ORDER BY id";       

    $stmtFirstShowProduct = $pdo->query($sqlFirstShowProduct);
        while ($selectFirstShowProduct = $stmtFirstShowProduct->fetch(PDO::FETCH_ASSOC)){
            $AjaxFirstShowProduct[] = $selectFirstShowProduct;
        }
        $totalProducts = count($AjaxFirstShowProduct);
            echo  json_encode($AjaxFirstShowProduct);
                //var_dump($AjaxParams);
}else{}

// total products for pafinatio   //echo  json_encode($AjaxFirstShowProduct);
if (isset($_POST['totalPagin'])){
    $idCat = +$_POST['totalPagin'];
$sqlAjaxParams = "SELECT COUNT(id) FROM product WHERE cat_id = 2 UNION ALL SELECT MIN(prod_price) FROM product WHERE cat_id = 2  UNION ALL SELECT MAX(prod_price) FROM product WHERE cat_id = 2";       

$stmtAjaxParams = $pdo->query($sqlAjaxParams);
    while ($selectAjaxParams = $stmtAjaxParams->fetch(PDO::FETCH_ASSOC)){
        $AjaxParams[] = $selectAjaxParams;
    }
    $totalProducts = count($AjaxParams);
        echo  json_encode($AjaxParams);
            //var_dump($AjaxParams);
}else{}

// FILTER PRICE RANGE               echo  json_encode($AjaxPriceRange);  
if (isset($_POST['minRange']) && isset($_POST['maxRange']) && isset($_POST['categoryId'])){
    $minRange = +$_POST['minRange'];
    $maxRange = +$_POST['maxRange'];
    $catId = +$_POST['categoryId'];
    $sqlPriceRange = "  SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name 
                        FROM product as prod, image as img WHERE cat_id = $catId AND img.prod_id = prod.id 
                        AND $minRange <= prod.prod_price AND $maxRange >= prod.prod_price ORDER BY prod.prod_price ASC
                        -- ORDER BY id LIMIT 5";
    
    $stmtPriceRange = $pdo->query($sqlPriceRange);
    while ($selectPriceRange = $stmtPriceRange->fetch(PDO::FETCH_ASSOC)){
        $AjaxPriceRange[] = $selectPriceRange;
    }
    echo  json_encode($AjaxPriceRange);
}else{}
// end filter

// // FILTER BY CHARACTERISTIC       echo  json_encode($filter);        
if (isset($_POST['character']) && isset($_POST['categoryId'])){
    $typeCharacter  = $_POST['character'];
    $catId = +$_POST['categoryId'];

    $sqlTypeFilter1 = "SELECT prod_id FROM `relationship`WHERE '$typeCharacter' = attr_value_name";

    $stmtTypeFilter1 = $pdo->query($sqlTypeFilter1);
    while ($selectTypeFilter1 = $stmtTypeFilter1->fetch(PDO::FETCH_ASSOC)){
        $prod_id = $selectTypeFilter1['prod_id'];
        $prod_id = intval ($prod_id);

        $sqlTypeFilter2 = "SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name
        FROM product as prod, `image` as img WHERE cat_id = $catId AND img.prod_id = prod.id AND prod.id = $prod_id ORDER BY id";

        $stmtTypeFilter2 = $pdo->query($sqlTypeFilter2);
        while ($selectTypeFilter2 = $stmtTypeFilter2->fetch(PDO::FETCH_ASSOC)){
            $AjaxTypeFilter[] = $selectTypeFilter2;
        }
    }
    echo  json_encode($AjaxTypeFilter);
}else{}
// end filter



//                            END  AJAX