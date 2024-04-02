<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Your Favorite Books</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="booksite.css">

</head>

<body>

    <div id="container">

        <header>

            <h1>Your Favorite Books</h1>

        </header>

        <nav id="main-navi">

            <ul>

                <li><a href="booksite.php">Home</a></li>

                <li><a href="booksite.php?genre=Adventure">Adventure</a></li>

                <li><a href="booksite.php?genre=Classic+Literature">Classic Literature</a></li>

                <li><a href="booksite.php?genre=Coming-of-age">Coming-of-age</a></li>

                <li><a href="booksite.php?genre=Fantasy">Fantasy</a></li>

                <li><a href="booksite.php?genre=Historical+Fiction">Historical Fiction</a></li>

                <li><a href="booksite.php?genre=Horror">Horror</a></li>

                <li><a href="booksite.php?genre=Mystery">Mystery</a></li>

                <li><a href="booksite.php?genre=Romance">Romance</a></li>

                <li><a href="booksite.php?genre=Science+Fiction">Science Fiction</a></li>

            </ul>

        </nav>

        <main>

            <?php

                $json = file_get_contents("books.json"); 

                $books = json_decode($json, true); 

                $favorites = explode(",", $_COOKIE["favorites"]); 



            foreach ($books as $book) { 



                $favorites = isset($_COOKIE['favorites']) ? explode(",", $_COOKIE['favorites']) : []; 

                $isFavorited = in_array($book['id'], $favorites); 

                if ((!isset($_GET['genre']) || $_GET['genre'] === $book['genre'])) {

                    echo '<section class="book">';

                    echo '<a class="bookmark fa ' . ($isFavorited ? 'fa-star' : 'fa-star-o') . '" href="setfavorite.php?id=' . $book['id'] . '"></a>'; 

                    echo '<h3>' . $book['title'] . '</h3>';

                    echo '<p class="publishing-info">';

                    echo '<span class="author">' . $book['author'] . '</span>,';

                    echo '<span class="year">' . $book['publishing_year'] . '</span>';

                    echo '</p>';

                    echo '<p class="description">';

                    echo $book['description'];

                    echo '</p>';

                    echo '</section>';

                }

            }



            ?>

           

        </main>

    </div>    

</body>

</html>