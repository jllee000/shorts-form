<link rel="stylesheet" href="./style.css?after" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<div class="app-wrapper">

  <header class="app-header">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/header/darkHeader.php'; ?>
  </header>
  <main class="app-main quiz-page bg-black">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/modal/modal.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/main.php'; ?>
  </main>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {

  });

  function gopage(link) {
    if (link == 'quiz') {
      window.location.href = "/sr/";
    } else if (link == 'form') {
      window.location.href = "/sr/sign";
    } else if (link == 'mypage') {
      window.location.href = "/sr/mypage";
    } else if (link == 'list') {
      window.location.href = "/sr/list";
    } else if (link == 'result') {
      window.location.href = "/sr/result";
    } else if (link == 'home') {
      window.location.href = "https://www.banggooso.com/";
    };
  }

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