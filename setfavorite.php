<?php



if (isset($_GET['id'])) {

    $id = $_GET['id'];



    $favorites = isset($_COOKIE['favorites']) ? explode(',', $_COOKIE['favorites']) : [];



    $isFavorited = in_array($id, $favorites);



    if ($isFavorited) {

        $favorites = array_diff($favorites, [$id]);

    } else {

        $favorites[] = $id;

    }



    $favoritesString = implode(",", $favorites); 

    setcookie('favorites', $favoritesString, time() + 86400 * 30, '/');



    header("Location: booksite.php");  



} else {

    echo "Error: Book ID not specified."; 
}