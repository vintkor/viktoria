<?php
/**
*
* Single if\else Code legnum.info template for displaying single content.
*
*/
if (in_category(7) || in_category(9)) {
	include 'single-products.php';
}
// elseif (in_category(9)) {
// 	include 'single-uslugi.php';
// }
else {
	include 'single-all.php';
}
?>
