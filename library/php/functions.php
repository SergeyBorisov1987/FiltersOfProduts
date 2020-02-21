<?php
// функция парсинга URL ищит номер страницы: page=* возврат: "integer"
function getPage ($Url){
    if (!$Url)
        return false;
    else{
        $pageParseURL = null;

        $decodeURL = urldecode($Url);
        $Pattern='~page=[0-9]+~';
        if (preg_match_all($Pattern, $decodeURL, $paginParseURL)){
            $pageParseURL = $paginParseURL[0][0];
            $paginationParseURL = strval($pageParseURL );
            $paginationParseURL = strstr($paginationParseURL , '=');
            +$paginationParseURL = substr($paginationParseURL, 1);
            if ($paginationParseURL != null){
                return +$paginationParseURL;
            }
            else{
                return $paginationParseURL = 1;
            }
        }
        else{
            return $paginParseURL = 1;
        }

    }

}

// функция парсинга URL ищит категорию страницы: cftegory=* возврат: "integer"
function getCategory ($Url){
    if (!$Url)
        return false;
else{
    $categorParseURL = null;
    $categoryParseURL = null;
    $decodeURL = urldecode($Url);
    $decodeURL = strstr($decodeURL, 'category');
    $Pattern='~cat[a-z]+=[0-9]+~';
    if (preg_match_all($Pattern, $decodeURL, $categoryParseURL)){
        $catParseURL = $categoryParseURL[0][0];
        $categorParseURL = strval($catParseURL );
        $categorParseURL = strstr($categorParseURL , '=');
        +$categorParseURL = substr($categorParseURL, 1);
        if ($categorParseURL != null)
            return +$categorParseURL;
        else
            return $categorParseURL = 1;
    }
    else 
        return $categoryParseURL = 1;
    }
}

// функция парсинга URL ищит характиристики: characteristic=* возврат: "string"
function getFilterProduct ($Url){
    $arrFilterParseURL = null;
    if (!$Url)
    return false;
else{
$decodeURL = urldecode($Url);
$decodeURL = strstr($decodeURL, 'category');
$parseCategory = strstr($decodeURL, '/');
substr($parseCategory, 1);
$arrayParseURL = explode('/', $parseCategory);
array_shift($arrayParseURL);
array_pop($arrayParseURL);
if (empty($arrayParseURL)){
    $arrayParseURL = false;
    die();
}   
$arrayParseURL = array_unique ($arrayParseURL) ?: false;
if (!$arrayParseURL)
    $arrayParseURL = false;
        foreach ($arrayParseURL as $value){
            $value = strval($value );
            $value = strstr($value, '=');
            $filterParseURL = substr($value, 1);
            if (!$filterParseURL)
                $filterParseURL = false;
                $arrFilterParseURL [] = strval($filterParseURL);      
        }return $arrFilterParseURL;
    }
}

?>