<link rel="stylesheet" href="../style.css" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<div class="app-wrapper flex-col">
  <header class="app-header">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/header/listHeader.php'; ?>

  </header>
  <main class="app-main">
    <div>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/notice.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/open.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/coming.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/end.php'; ?>
    </div>
  </main>
</div>