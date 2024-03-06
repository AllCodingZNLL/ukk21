<?php

include('navbar.php');

header('location: ../index.php');

session_start();
unset($_SESSION['login']);
