<div class="end-element">
  <div class="end-overlay">
    <div>숏퀴즈 with 브랜드명</div>
    <div class="end-winner" onclick="gopage('winner')">
      당첨자 보기 >
    </div>
  </div>
  <video class=" end-video">
    <source src="https://cdn.banggooso.com/assets/images/game191/video/10.mp4" />
  </video>
</div>

<script>
  function gopage(link) {
    if (link == 'quiz') {
      window.location.href = "/sr/";
      console.log("퀴즈로");
    } else if (link == 'form') {
      window.location.href = "/sr/sign";
    } else if (link == 'mypage') {
      window.location.href = "/sr/mypage";
    } else if (link == 'winner') {
      window.location.href = "/sr/list/winner";
    };

  }
</script>