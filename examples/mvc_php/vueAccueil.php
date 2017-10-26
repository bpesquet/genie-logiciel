<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" />
  <title>MicroCMS - Accueil</title>
</head>

<body>
  <header>
    <h1><a href="index.php">MicroCMS</a></h1>
  </header>
  <?php foreach ($articles as $article) { ?>
    <article>
      <h2><a href="index.php?action=article&id=<?= $article['art_id'] ?>"><?= $article['art_title']; ?></a></h2>
      <p>
        <?= $article['art_content'] ?>
      </p>
    </article>
    <?php } ?>
      <footer class="footer">Exemple d'application du patron MVC en PHP</footer>
</body>

</html>