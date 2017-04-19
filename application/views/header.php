<?php
/**
 * Created by PhpStorm.
 * User: Wiets
 * Date: 15/04/2017
 * Time: 14:09
 */

/**
 * Geeft een header van een pagina.
 *
 * $title: geeft de titel van de pagina uit de controller.
 * asset_url: is een zelfgemaakte helper die wijst naar de asset-map.
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo asset_url() . "style/layout.css";?>">
    <script src="https://use.fontawesome.com/362994279d.js"></script>
</head>
<body>
