<link rel="stylesheet" href="./style.css?after" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<div class="app-wrapper">

  <header class="app-header">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/header/homeHeader.php'; ?>
  </header>
  <main class="app-main quiz-page">
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/main.php'; ?>
  </main>

</div>
<script>
  function gopage(link) {
    if (link == 'quiz') {
      window.location.href = "/es/reward/";
    } else if (link == 'form') {
      window.location.href = "/es/reward/sign";
    } else if (link == 'mypage') {
      window.location.href = "/es/reward/mypage";
    } else if (link == 'list') {
      window.location.href = "/es/reward/list";
    } else if (link == 'result') {
      window.location.href = "/es/reward/result";
    } else if (link == 'home') {
      window.location.href = "https://www.banggooso.com/";
    };
  }
</script>