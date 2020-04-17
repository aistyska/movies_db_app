<?php

    switch ($_GET['p'] ?? null) {
        case 'home':
            include "templates/main/pages/home.php";
            break;
        case 'all_movies':
            include "templates/main/pages/all_movies.php";
            break;
        case 'by_category':
            include "templates/main/pages/movies_by_category.php";
            break;
        case 'search':
            include "templates/main/pages/search_movie.php";
            break;
        case 'add_movie':
            include "templates/main/pages/add_movie.php";
            break;
        case 'movies_control':
            include "templates/main/pages/movies_control.php";
            break;
        case 'edit_movie':
            include "templates/main/pages/edit_movie.php";
            break;
        case 'delete_movie':
            include "templates/main/pages/delete_movie.php";
            break;
        case 'login':
            include "templates/main/pages/login.php";
            break;
        case 'categories_control':
            include "templates/main/pages/categories_control.php";
            break;
        case 'add_category':
            include "templates/main/pages/add_category.php";
            break;
        case 'delete_category':
            include "templates/main/pages/delete_category.php";
            break;
        default:
            include "templates/main/pages/home.php";
    }
