<?php

$URL = $_SERVER['REQUEST_URI'];
$URLdecode = urldecode($URL); 
$Pattern='~cat[a-z]+=[0-9]+/[a-zA-ZА-Яа-яёі]{3}~';



                        <a id="<?php echo  $selectAttrVal ['attr_value_name'];?>" class="dropdown-item" href="/<?php echo $selectAttrType['attr_type_name'];?>=<?php echo  $selectAttrVal ['attr_value_name'];?>">
                        <?php echo  $selectAttrVal ['attr_value_name'];?>
                    </a>
// filter** ########################################################################
<!-- Showing all filters -->
    <?php if (isset($_GET['category'])){$catId = $_GET['category'];}?>
    <?php $sqlAttrType = "SELECT id, attr_type_name FROM attribute_type WHERE cat_id = $catId ORDER BY id LIMIT 8";
        if ($stmtAttrType = $pdo->query($sqlAttrType)):?>
            <div class="dropdown">
        <?php while ($selectAttrType= $stmtAttrType->fetch()): ?>
        <button id="<?php echo $idAttrType = $selectAttrType['id']; ?>" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $selectAttrType['attr_type_name'];?>
        </button>                                    
        <?php $sqlAttrVal = "SELECT DISTINCT attr_value_name FROM relationship WHERE attr_type_id = $idAttrType";
                if ($stmtAttrVal = $pdo->query($sqlAttrVal)):?>   
                    <?php  while ($selectAttrVal = $stmtAttrVal->fetch()): ?>
                        <a id="<?php echo  $selectAttrVal ['attr_value_name'];?>" class="dropdown-item" href="/<?php echo $selectAttrType['attr_type_name'];?>=<?php echo  $selectAttrVal ['attr_value_name'];?>">
                            <?php echo  $selectAttrVal ['attr_value_name'];?>
                        </a>
                    <?php endwhile;?>
                    <br><hr/>
                <?php endif;?>
        <?php endwhile;?>
    </div>
    <?php endif;?>
<!-- End all filters -->
// END filter** ########################################################################

   // 111** ########################################################################
            // $selAttrType = false;
            // $selAttrValue = false;
            // $arrayDiffAttrType = false;
            // $arrayDiffAttrValue = false;
            // $sql = "SELECT attr_type_name FROM attribute_type";
            //     $stmt = $pdo->query($sql);
            //     while ($row = $stmt->fetch()){
            //         $selAttrType[] = $row['attr_type_name'];
            //     }
            // $sql = "SELECT attr_value_name FROM relationship";
            //     $stmt = $pdo->query($sql);
            //     while ($row = $stmt->fetch()){
            //         $selAttrValue[] = $row['attr_value_name'];
            //     }
    // #############################################################################
   // 222** ########################################################################
        // if($selAttrType == false){
    //     echo '<pre/>'; var_dump($arrTypeElament);   echo '<hr/>';

    //     foreach($arrTypeElament as $arrTypeElament){
    //         // Put type of attribute into dbtable attribute_type & return id
    //                 $sql = 'INSERT INTO attribute_type (attr_type_name, cat_id)
    //                         VALUES (:attr_type_name, :cat_id)';
    //                             $stmt = $pdo->prepare($sql)->execute([
    //                                 'attr_type_name'=> strip_tags($arrTypeElament),
    //                                 'cat_id' => $cat_id]);
    //                             $attr_type_id = $pdo->lastInsertId();
    //             }break;
    // }
    // elseif ($selAttrType){
    //     $arrayDiffAttrType = array_diff($arrTypeElament, $selAttrType);
    //     $arrTypeElament =false;
    //     // echo '<pre/>';  var_dump($arrayDiffAttrType); echo '<br/><br/>';
    //     // echo '<pre/>'; var_dump($arrTypeElament);   echo '<hr/>';

    //         foreach($arrayDiffAttrType as $arrTypeElament){
    //     // Put type of attribute into dbtable attribute_type & return id
    //             $sql = 'INSERT INTO attribute_type (attr_type_name, cat_id)
    //                     VALUES (:attr_type_name, :cat_id)';
    //                         $stmt = $pdo->prepare($sql)->execute([
    //                             'attr_type_name'=> strip_tags($arrTypeElament),
    //                             'cat_id' => $cat_id]);
    //                         $attr_type_id = $pdo->lastInsertId();
    //         }

    // }
        // #############################################################################
        // 333** #######################################################################
        //              FOR LIBRARY
//  file_put_contents('img/'.$imageName, file_get_contents($imagePath))
//  $prevent_id = $pdo->lastInsertId();
        // #############################################################################


        SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name
FROM product as prod, `image` as img WHERE cat_id = 2 AND prod.id = (SELECT prod_id FROM `relationship`WHERE attr_type_id = 14) LIMIT 10

SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name
FROM product as prod, `image` as img WHERE cat_id = 1 AND prod.id = (SELECT prod_id FROM `relationship`WHERE attr_value_name = 'STIGA') LIMIT 10

        <?php if ($stmtAttrType = $pdo->query($sqlAttrType)):?>
            <div class="filter">
                <?php while ($selectAttrType= $stmtAttrType->fetch()): ?>
                    <a class='voltage' href="#"><h4 class='title'><?php echo $selectAttrType['attr_type_name'];?></h4></a><br/>
                        <?php if ($stmtAttrVal = $pdo->query($sqlAttrVal)):?>    
                            <?php  while ($selectAttrVal = $stmtAttrVal->fetch()): ?>
                                <a class="voltage-item" href="#"><?php echo  $selectAttrVal ['attr_value_name'];?></a><br/>
                            <?php endwhile;?>
                        <?php endif;?>
                <?php endwhile;?>
            </div>
        <?php endif;?>

<?php
        if ($varPagination < 1)
                $pageOffset = ($varPagination - 1) * $fiveProduct;
            else
                $pageOffset = 5;

// Show elements for filters  of attribute type              //echo  json_encode($idCat);
    // $sqlAttrType = "SELECT id, attr_type_name FROM attribute_type WHERE cat_id = $idCat";
    //     $stmtAttrType = $pdo->query($sqlAttrType);
    // while ($selectAttrType= $stmtAttrType->fetch()){
    //         $idAttrType = $selectAttrType['id'];
    //             $attributeType[] = $selectAttrType['attr_type_name'];

    //     $sqlAttrVal = "SELECT DISTINCT attr_value_name FROM relationship WHERE attr_type_id = $idAttrType";
    //         $stmtAttrVal = $pdo->query($sqlAttrVal);
    //     while ($selectAttrVal = $stmtAttrVal->fetch()){
    //         $attributeValue = $selectAttrVal ['attr_value_name'];
    //     }
    // }




// Show elements in main conteiner with use pagination
    // $page = 1;
    // $fiveProduct = 5 ;
    // if ($page < 1)
    //     $pageOffset = ($page - 1) * $fiveProduct;
    // else
    //     $pageOffset = 5;
        
    // $sqlProduct = "SELECT prod.id, prod.prod_name, prod.prod_price,  prod.prod_description, img.img_name 
    //                 FROM product as prod, image as img WHERE cat_id = $idCat AND img.prod_id = prod.id ORDER BY id LIMIT 5";





// $sqlAttrType = "SELECT  attrtype.id, attrtype.attr_type_name, attrtype.cat_id, relat.id, relat.prod_id, relat.attr_type_id, relat.attr_value_name FROM attribute_type as attrtype, relationship as relat WHERE attrtype.id = relat.attr_type_id AND cat_id = 1";





<?php if (isset ($sqlProduct)):?>
<?php     $stmtProduct = $pdo->query($sqlProduct);
   while ($selectedProduct = $stmtProduct->fetch()):
?>
<div class="product-list">
        <div class="product-up">
            <div class="product-photo">
                <img src="img/<?php echo $selectedProduct['img_name'];?>" alt="Card image cap">
            </div>
            <div class="product-elements">
                <div class="alert alert-primary" role="alert">
                    <h4 class="prod-name"><?php echo $selectedProduct['prod_name'];?></h4>
                </div>
                <span class="badge badge-warning"><h4 class="prod-price"><?php echo $selectedProduct['prod_price']; ?> uah.</h4></span>  
                  </div>                                            
    </div>
    <div class="product-description">
        <p>
            <?php echo $selectedProduct['prod_description'];?>
        </p>
    </div>
</div><hr>
<?php endwhile;?>
<?php  endif;?>




?>
