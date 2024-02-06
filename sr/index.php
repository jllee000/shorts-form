<?php
// 평소 json
$Json = file_get_contents("./data.json");
$jsonData = json_decode($Json, true);
?>

<link rel="stylesheet" href="./style.css?after" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/layout/header.php'; ?>
<div>
  <div class="app-main-page">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/main/index.php'; ?>
  </div>
  <div class="app-sign-page">
    <?php include  $_SERVER['DOCUMENT_ROOT'] . '/sr/sign/index.php'; ?>
  </div>
  <div class="app-result-page">
    <?php include  $_SERVER['DOCUMENT_ROOT'] . '/sr/result/index.php'; ?>
  </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  function gopage(link) {
    if (link == 'quiz') {
      window.location.href = "/sr/";
    } else if (link == 'form') {
      $(".app-main-page").hide();
      $(".app-sign-page").show();
    } else if (link == 'mypage') {
      window.location.href = "/sr/mypage";
    } else if (link == 'list') {
      window.location.href = "/sr/list";
    } else if (link == 'result') {
      $(".app-sign-page").hide();
      $(".app-result-page").show();
    } else if (link == 'home') {
      window.location.href = "https://www.banggooso.com/";
    };
  }
  // 얘는 api 연결되면 뺄것들임
  function useEgg() {
    // 이전에 저장된 달걀 숫자를 가져오기
    let currentEggCount = localStorage.getItem('eggCount');

    // 만약 저장된 값이 없으면 0으로 초기화
    if (currentEggCount === null) {
      currentEggCount = 0;
    } else {
      // 문자열로 저장되어 있으므로 숫자로 변환
      currentEggCount = parseInt(currentEggCount, 10);
    }

    // egg 증가
    currentEggCount--;

    // 증가된 숫자를 화면에 반영
    document.querySelector('.header-egg span').innerText = currentEggCount;

    // 증가된 숫자를 localStorage에 저장
    localStorage.setItem('eggCount', currentEggCount);

  }
</script>