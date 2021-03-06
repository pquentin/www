<?php
  $tplRoot = dirname(dirname(__FILE__)) . '/default';

  $count = 0;
  $today = Array();
  $week = Array();
  $month = Array();
  $older = Array();
  $now = time();

  foreach ($items as $item) {
    $age = ($now - $item->get_date('U')) / (60*60*24);
    if ($age < 1) {
      $today[] = $item;
    } elseif ($age < 7) {
      $week[] = $item;
    } elseif ($age < 30) {
      $month[] = $item;
    } else {
      $older[] = $item;
    }
  }

  header('Content-type: text/html; charset=UTF-8');
?><!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php echo $PlanetConfig->getName(); ?></title>
  <link rel="stylesheet" type="text/css" href="custom/style/mozfr.css" />
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico?v=3" />
</head>
<body>
  <div id="wrapper">
    <?php include($tplRoot.'/header.tpl.php'); ?>
    <?php include(dirname(__FILE__).'/archives.tpl.php'); ?>
    <?php include(dirname(__FILE__).'/sidebar.tpl.php'); ?>
  </div> <!-- #wrapper -->
  <?php include($tplRoot.'/footer.tpl.php'); ?>
  <script src="custom/js/jquery-1.7.2.min.js" type="text/javascript"></script>
  <script src="mozfrtab/tabzilla.js"></script>
  <script src="custom/js/nav-main.js" type="text/javascript"></script>
</body>
</html>
