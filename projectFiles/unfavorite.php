<?php
/*This page is initiaded when a user deletes a favorite, first we check if the SESSION is set. If not something went wrong ERROR,
    otherwise unserialize the SESSION into a favorite. If this was the delete all option call the clearALL on the approperate array.*/
session_start();
include("dataLayer/FavoriteList.class.php");

if(!isset($_SESSION['favorite'])) {
    header("Location: error.php");
}

$favorites = unserialize($_SESSION['favorite']);

if($_GET['type'] == 'post') {
    if(isset($_GET['id'])){
        $favorites->deleteFavPost($_GET['id']);
    } else {
        $favorites->clearAll('post');
    }
} else {
    if(isset($_GET['id'])){
        $favorites->deleteFavImage($_GET['id']);
    } else {
        $favorites->clearAll('img');
    }
}

$_SESSION['favorite'] = serialize($favorites);

header("Location: favorites.php");
?>