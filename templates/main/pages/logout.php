<?php
require 'inc/session.php';
session_unset();
session_destroy();
header('Location:?p=login');
