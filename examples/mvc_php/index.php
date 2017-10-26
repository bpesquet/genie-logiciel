<?php

require 'modele.php';
if (!isset($_REQUEST['action']))
    $action = "accueil";
else
    $action = $_REQUEST['action'];
switch($action)
{
    case "accueil":
        $articles = getArticles();
        require("vueAccueil.php");
        break;
    case "article":
        $idArticle = $_REQUEST['id'];
        $article = getArticle($idArticle);
        $comments = getComments($idArticle);
        require("vueArticle.php");
        break;
    default:
        require("vueErreur.php");
}