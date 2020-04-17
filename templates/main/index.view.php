<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="templates/main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templates/main/css/simple-sidebar.css" rel="stylesheet">

    <!--Custom styles-->
    <link href="templates/main/css/style.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/994bdecb51.js" crossorigin="anonymous"></script>

</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <?php require 'templates/main/_partials/side_nav.php';?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <?php require 'templates/main/_partials/header.php';?>
        <div class="container-fluid">
            <?php
                require $_SERVER["DOCUMENT_ROOT"]."/router.php";
            ?>
        </div>

    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="templates/main/js/jquery.min.js"></script>
<script src="templates/main/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>

<?php
