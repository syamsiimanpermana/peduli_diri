<?php
session_start();

session_destroy();
$_SESSION["nik"] = "";
$_SESSION["nama"] = "";


header("location:login.php");