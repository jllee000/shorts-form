<?php
// 평소 json
$Json = file_get_contents("./data.json");
$jsonData = json_decode($Json, true);
?>


<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/modal/modal.php'; ?>
<div class="main">
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/quiz/pop.php'; ?>
  <video autoplay muted id="myVideo" style="width: 100%;  position: absolute;">
    <source id="videoSource" src="" />
  </video>

  <div class="loading-wrapper">
    <div class="loading-wrapper-time">
    </div>
    <div class="loading-wrapper-alert">
      ⏱ 시간이 얼마 남지 않았어요!
    </div>
  </div>

  <!-- 문제 q와 정답지 a 영역 -->
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/es/reward/quiz/selectWrap.php'; ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  // 페이지 로딩 시 실행되는 함수
  document.addEventListener("DOMContentLoaded", function(event) {
    eggUpdate();
    loadContent(0);

    startTimer();
  });

  //---------------------------------------//


  // 비디오정보 끌어오기
  const videoSource = document.getElementById('videoSource');
  let videoIndex = 1;
  let jsonData = <?php echo json_encode($jsonData); ?>;
  const video = document.getElementById('myVideo');

  // 변수 추가
  let timeLimit = 11; // 각 문제의 제한 시간 (초 단위)
  let currentTime = 0; // 현재 문제에서 경과한 시간 (초 단위)
  let timerInterval; // setInterval을 저장할 변수

  // 문제 로딩 시간 측정 시작
  let startTime = performance.now();

  function startTimer() {
    timerInterval = setInterval(function() {
      currentTime++;
      const countdown = timeLimit - currentTime;

      if (currentTime >= timeLimit) {
        console.log("finished!");
        clearInterval(timerInterval);
        updateVideoAndQuestionAnswer(); // Update video and question-answer areas
        goNext();
      } else {
        if (countdown <= 5) {
          updateCountdown(countdown);
          console.log(countdown + " seconds left!");

          if (countdown === 0) {
            clearCountdown();
          }
        } else {

          clearCountdown();
        }
      }

    }, 1000);
  }

  // 새로운 함수 추가 - countdown 업데이트
  function updateCountdown(countdown) {
    $('.loading-wrapper-alert').show();
    const loadingTimeWrapper = document.querySelector('.loading-wrapper-time');

    loadingTimeWrapper.innerText = countdown;
  }

  function clearCountdown() {
    $('.loading-wrapper-alert').hide();
    const loadingTimeWrapper = document.querySelector('.loading-wrapper-time');
    loadingTimeWrapper.innerText = '';
  }


  function updateVideoAndQuestionAnswer() {

    if (videoIndex > 3) {
      // If all questions are completed, navigate to the form page
      let endTime = performance.now();
      let totalTime = (endTime - startTime) / 1000;
      gopage("form");
      console.log("Total Time:", totalTime, "seconds");
      return;
    }

    // Load the next set of data and start the timer

    startTimer();
    a_init();
  }


  function goNext() {
    videoIndex++;
    resetTimer();

    if (videoIndex > 3) {
      // 문제가 3개를 넘어가면 총 시간 측정 및 출력
      let endTime = performance.now();
      let totalTime = (endTime - startTime) / 1000; // 총 시간 (초 단위)

      // 페이지 이동
      gopage("form");
      console.log("Total Time:", totalTime, "seconds");
      return;
    }

    if (videoIndex <= 3) {
      loadContent(videoIndex - 1); // Adjust the index to match array index
      startTimer(); // 새로운 문제의 타이머 시작
    }

    a_init();
  }

  function resetTimer() {
    clearInterval(timerInterval); // setInterval 중지
    currentTime = 0; // 현재 시간 초기화
  }
  // 답안지 초기화
  function a_init() {
    const aElements = document.querySelectorAll('.a');
    for (let i = 0; i < aElements.length; i++) {
      aElements[i].style.backgroundColor = '';
      aElements[i].style.color = 'white';
    }
  }

  function startVideo(idx) {
    a_init();
    // 사용자 상호 작용을 받은 후 영상 시작
    video.play();

  }

  function loadContent(index) {
    if (jsonData.length > 0 && jsonData[index]) {
      const videoData = jsonData[index];
      videoSource.src = videoData.video;
      document.querySelector('.select-area-question .question').innerText = videoData.q;

      const answerElements = document.querySelectorAll('.a');
      for (let i = 0; i < answerElements.length; i++) {
        answerElements[i].innerText = videoData.a[i];
      }

      video.pause();
      video.load();

      video.addEventListener('loadeddata', function() {
        video.play();
      });
    }
  }

  function gopage(link) {
    if (link == 'form') {
      window.location.href = "/es/reward/sign";
    }
  }
</script>