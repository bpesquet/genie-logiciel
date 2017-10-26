<!doctype html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="style.css" rel="stylesheet" />
  <title>MicroCMS -
    <?= $article['art_title'] ?>
  </title>
</head>

<body>
  <header>
    <h1><a href="index.php">MicroCMS</a></h1>
  </header>
  <p>
    <h2><?= $article['art_title'] ?></h2>
    <p>
      <?= $article['art_content'] ?>
    </p>
    <?php foreach ($comments as $comment) { ?>
      <strong><?= $comment['usr_name'] ?></strong> said :
      <?= $comment['com_content'] ?>
        <br>
        <?php } ?>
  </p>
  <footer class="footer">Simple MVC app example written in PHP</footer>
</body>

</html>