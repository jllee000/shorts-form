<div class="mypage">
  <div class="mypage-top">
    <div><span class="mypage-username">홍길동</span>님은<br /> <span class="mypage-userlv">Lv1. 아기 꾸꾸</span>입니다</div>
    <div class="mypage-eggcnt">보유 알개수 3</div>
  </div>
  <div class="mypage-wrap">
    <div class="mypage-imgdiv">
      <img class="mypage-img" src="./goo.png" alt="꾸꾸레벨" />
    </div>

    <!-- 하단 도표부분들 -->
    <div class="mypage-bottom">
      <!-- 레벨 부분들 -->
      <div class="mypage-lv">
        <div class="tag">Lv.</div>
        <div class="mypage-chart">
          <!-- 그래프 outer+inner -->
          <div class="outer">
            <div class="inner lv-in"></div>
          </div>
          <!-- 그래프 하단 수치마크 -->
          <div class="chart-mark">
            <div>0</div>
            <div>50</div>
            <div>100</div>
          </div>
        </div>
      </div>


      <!-- 알 부분 -->
      <div class="mypage-egg">
        <div class="tag">
          <div>
            <div>
              알 충전
            </div>
            <div>
              숏퀴즈 5회를 참여하면, 3알을 지급해요.
            </div>
          </div>
          <div class="egg3-div"><img src="./egg3.png" /></div>
        </div>
        <div class="mypage-chart">
          <!-- 그래프 outer+inner -->
          <div class="outer">
            <div class="inner egg-in"></div>
          </div>

          <!-- 그래프 하단 수치마크 -->
          <div class="chart-mark">
            <div>0회</div>
            <div>5회</div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div>
    <img class="aboutegg-img" src="./aboutegg.png" />
    <button class="mypage-goquiz img-width">숏퀴즈 참여하기</button>
  </div>

</div>
<!-- ... your HTML code ... -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    eggUpdate();
  });

  function eggUpdate() {
    let currentEggCount = localStorage.getItem('eggCount');
    if (currentEggCount === null) {
      currentEggCount = 0;
    } else {
      // 문자열로 저장되어 있으므로 숫자로 변환
      currentEggCount = parseInt(currentEggCount, 10);
    }

    // 최대 개수 설정
    const maxEggCount = 5;

    // 증가된 숫자를 화면에 반영
    console.log(currentEggCount);

    // 그래프 업데이트
    updateGraph('egg', currentEggCount, maxEggCount);

    // 증가된 숫자를 localStorage에 저장
    localStorage.setItem('eggCount', currentEggCount);
  }

  function updateGraph(type, currentCount, maxCount) {
    const innerElement = document.querySelector(`.mypage-chart .egg-in`);
    const percentage = (currentCount / maxCount) * 100;

    innerElement.style.width = `${percentage}%`;
  }
</script>