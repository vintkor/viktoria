<?php
/**
* Single if\else Code legnum.info template for displaying single content.
*
*/
if(in_category(7)) {
	include 'single-products.php';
}
elseif (in_category(2)) {
	include 'single-news.php';
}
else {
	include 'single-all.php';
}
?>