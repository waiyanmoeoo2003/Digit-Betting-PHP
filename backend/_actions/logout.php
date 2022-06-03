<?php

session_start();
unset($_SESSION['user']);
header('location:../public/user_login.php');