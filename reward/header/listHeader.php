<div class="header list-header">
  <div onclick="gopage('form')">
    <img src="\es\reward\header\뒤로가기.png" />
  </div>
  <div class="list-header-txt">퀴즈 리스트</div>
</div>

<script>
  function gopage(link) {
    if (link == 'quiz') {
      window.location.href = "/es/reward/";
      console.log("퀴즈로");
    } else if (link == 'form') {
      window.location.href = "/es/reward/sign";
    } else if (link == 'mypage') {
      window.location.href = "/es/reward/mypage";
    };
  }
</script>