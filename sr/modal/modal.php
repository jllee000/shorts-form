<div class="modal-dim">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/modal/pop.php'; ?>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/sr/modal/startModal.php'; ?>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
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

  function togglePop(now) {
    if (now == 1) {
      $(".modal-pop-show").hide();
      $(".modal-pop-hide").show();
    } else {
      $(".modal-pop-show").show();
      $(".modal-pop-hide").hide();
    }
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

  function openModal() {
    $('.modal-dim').show();

  }
  var videoplay = 0;

  function closeModal() {
    videoplay++;
    $('.modal-dim').hide();
    console.log("closed");
    useEgg();
    startTimer();
    console.log("아직함수" + videoplay);
    if (videoplay == 1) {
      console.log(videoplay);
      video.play();
    }
  }
  console.log("넘어가기전" + videoplay);
</script>