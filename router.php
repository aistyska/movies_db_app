<?php

    switch ($_GET['p'] ?? null) {
        case 'home':
            include "templates/".ACTIVE_TEMPLATE."/pages/home.php";
            break;
        case 'all_movies':
            include "templates/".ACTIVE_TEMPLATE."/pages/all_movies.php";
            break;
        case 'by_category':
            include "templates/".ACTIVE_TEMPLATE."/pages/movies_by_category.php";
            break;
        case 'search':
            include "templates/".ACTIVE_TEMPLATE."/pages/search_movie.php";
            break;
        case 'add_movie':
            include "templates/".ACTIVE_TEMPLATE."/pages/add_movie.php";
            break;
        case 'movies_control':
            include "templates/".ACTIVE_TEMPLATE."/pages/movies_control.php";
            break;
        case 'edit_movie':
            include "templates/".ACTIVE_TEMPLATE."/pages/edit_movie.php";
            break;
        case 'delete_movie':
            include "templates/".ACTIVE_TEMPLATE."/pages/delete_movie.php";
            break;
        case 'login':
            include "templates/".ACTIVE_TEMPLATE."/pages/login.php";
            break;
        case 'categories_control':
            include "templates/".ACTIVE_TEMPLATE."/pages/categories_control.php";
            break;
        case 'add_category':
            include "templates/".ACTIVE_TEMPLATE."/pages/add_category.php";
            break;
        case 'delete_category':
            include "templates/".ACTIVE_TEMPLATE."/pages/delete_category.php";
            break;
        default:
            include "templates/".ACTIVE_TEMPLATE."/pages/home.php";
    }
