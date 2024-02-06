<?php
// 평소 json
$Json = file_get_contents("./data.json");
$jsonData = json_decode($Json, true);
?>

<div class="main">
  <video muted id="myVideo" style="width: 100%;  position: absolute;">
    <source id="videoSource" src="" />
  </video>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/quiz/timeout.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/quiz/finish.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/quiz/loading.php'; ?>
  <!-- 문제 q와 정답지 a 영역 -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/sr/quiz/selectWrap.php'; ?>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  // 페이지 로딩 시 실행되는 함수
  document.addEventListener("DOMContentLoaded", function(event) {
    eggUpdate(); // 알개수 업데이트
    loadVideo(0); // 영상 업데이트
    loadContent(0); // 질문지, 선택지 업데이트
  });

  // 비디오정보 끌어오기
  const videoSource = document.getElementById('videoSource'); // 비디오 소스부분
  let videoIndex = 1; // 비디오번호
  let jsonData = <?php echo json_encode($jsonData); ?>;
  const video = document.getElementById('myVideo');

  // 변수 추가
  let timeLimit = 10; // 문제 하나당 제한시간
  let currentTime = 0; // 현재 문제에서 경과한 시간 (초 단위)
  let timerInterval; // setInterval을 저장할 변수


  // 문제 로딩 시간 측정 시작
  function startTimer() {
    timerInterval = setInterval(function() {
      currentTime++; // 경과시간 1초마다 체크
      const countdown = timeLimit - currentTime; // 남은 시간

      if (currentTime >= timeLimit) { // 경과시간 넘었을때
        console.log("finished!");

        video.pause(); // 영상 멈추고
        if (videoIndex >= 3) { // 세번째 영상이였다면
          clearCountdown(); // 타임어택 꺼
          $(".select-wrap").hide();
          $(".insert-finish").show();

          resetTimer();
          currentTime = -1;

          clearInterval(timerInterval); // 1초마다 체크되는 작동 중지
        } else {
          clearCountdown();
          $(".select-wrap").hide();
          $(".insert-timeout").show();
        }
      } else { // 아직 경과시간 넘기전에
        if (countdown <= 5) { // 5초 남으면
          updateCountdown(countdown); // 타임어택 고
          console.log(countdown + " seconds left!");
          if (countdown === 0) {
            clearCountdown(); // 타임어택 꺼
          }
        } else {
          clearCountdown(); // 타임어택 꺼
        }
      }
    }, 1000);
  }

  // 새로운 함수 추가 - countdown 업데이트
  function updateCountdown(countdown) { // 타임어택 키기
    $('.loading-wrapper-alert').show();
    const loadingTimeWrapper = document.querySelector('.loading-wrapper-time');

    loadingTimeWrapper.innerText = countdown;
  }

  function clearCountdown() { // 타임어택 끄기
    $('.loading-wrapper-alert').hide();
    const loadingTimeWrapper = document.querySelector('.loading-wrapper-time');
    loadingTimeWrapper.innerText = '';
  }




  function goNext() { // 다음 버튼
    a_init(); // 선택지 내용 초기화

    if (videoIndex < 3) {
      $(".select-wrap").show();
      $(".insert-timeout").hide();
      videoIndex++;

      clearInterval(timerInterval); // 이 부분을 추가하여 이전에 실행 중이던 interval을 중지

      loadVideo(videoIndex - 1);
      loadContent(videoIndex - 1);
      resetTimer();
      startTimer();
    } else if (videoIndex === 3) {
      video.pause();
      $(".select-wrap").hide();
      $(".insert-finish").show();
      currentTime = 0;
      clearCountdown();
      resetTimer();
      clearInterval(timerInterval); // 이 부분을 추가하여 interval을 중지
      return;
    }
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
  // 비디오 로드
  function loadVideo(index) {
    if (jsonData.length > 0 && jsonData[index]) {
      const videoData = jsonData[index];
      videoSource.src = videoData.video;

      video.pause();
      video.load();

      video.addEventListener('loadeddata', function() {
        if (videoplay == 1) {
          console.log(videoplay);
          video.play();
        }
      });
    }
  }
  // 문제와 질문지 로드
  function loadContent(index) {
    if (jsonData.length > 0 && jsonData[index]) {
      const videoData = jsonData[index];
      document.querySelector('.select-area-question .question').innerText = videoData.q;

      const answerElements = document.querySelectorAll('.a');
      for (let i = 0; i < answerElements.length; i++) {
        answerElements[i].innerText = videoData.a[i];
      }


    }
  }

  function gopage(link) {
    if (link == 'form') {
      $(".app-sign-page").hide();
      $(".app-sign-page").show();
    }
  }
</script>