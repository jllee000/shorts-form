<link rel="stylesheet" href="../style.css" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<div class="app-wrapper flex-col">
  <header class="app-header">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/header/listHeader.php'; ?>

  </header>
  <main class="app-main">
    <div class="quiz-list">
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/list/notice.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/list/open.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/list/coming.php'; ?>
      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/list/end.php'; ?>
    </div>
  </main>
</div>