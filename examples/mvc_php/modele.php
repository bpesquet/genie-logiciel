<?php

// Renvoie une connexion à la base de données
function getBdd() {
    return new PDO('mysql:host=localhost;dbname=microcms;charset=utf8', 'microcms_user', 'secret');
}

// Renvoie la liste des articles
function getArticles() {
    $resultat = getBdd()->query('select * from t_article order by art_id desc');
    return $resultat->fetchAll();
}

// Renvoie les détails sur un article
function getArticle($idArticle) {
    $stmt = getBdd()->prepare('select * from t_article where art_id=?');
    $stmt->execute(array($idArticle));
    return $stmt->fetch();
}

// Renvoie les commentaires sur un article
function getComments($idArticle) {
    $stmt = getBdd()->prepare('select * from t_comment c join t_user u on c.usr_id=u.usr_id where art_id=?');
    $stmt->execute(array($idArticle));
    return $stmt->fetchAll();
}