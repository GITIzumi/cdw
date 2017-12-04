<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();

// appel du fichier de config
include_once('includes/config.php');

// appel des classes
require_once('library/Connexion.php');
//require_once('model/Article/Article.php');

// Initialisation connexion à la bdd
$gb_cnx = new Connexion();

require_once('library/Root.php');

new Root();


