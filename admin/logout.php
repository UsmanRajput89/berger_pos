<?php 
include "../includes/contants.php";
session_start();

session_unset();

session_destroy();

header('Location: '.URL.'/login.php');