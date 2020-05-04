<?php
if(!isset($_SESSION['username'])) {
    header('Location:?p=login');
    exit;
}