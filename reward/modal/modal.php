<style>
  .modal-dim {
    margin: 0 auto;
    background-color: rgb(0, 0, 0, 0.3);
    width: 100%;
    height: 100vh;
    z-index: 999;
    position: relative;
  }

  .modal-close {
    border: 0.1rem solid rgb(0, 0, 0, 0.2);
    border-radius: 100px;
    line-height: 1.2rem;
    padding: 0.3rem;
    width: 7%;
    cursor: pointer;
    font-size: 1.2rem;
    font-weight: 900;
  }

  .modal {
    position: absolute;
    top: 30%;
    left: 9%;
    margin: auto;
    width: 80%;
    height: 30%;
    background-color: white;
    border-radius: 20px;
    text-align: center;
    z-index: 1001;
    padding: 1rem;
  }




  .modal-title {
    font-size: 1.2rem;
    font-weight: 900;

  }

  .modal-txt {
    font-size: 0.8rem;
    font-weight: 300;
  }

  .modal-btn {
    border-radius: 50px;
    width: 80%;
    margin: 2rem auto 0.5rem auto;
    padding: 0.8rem;
    cursor: pointer;
    background-color: yellow;
    font-size: 1rem;
    border: 0.2rem solid rgb(0, 0, 0, 0.3);
  }

  .modal-a {
    text-decoration: underline;
  }

  .modal-close:hover,
  .modal-btn:hover {
    background-color: black;
    color: white;
  }
</style>



<div class="modal-dim" onClick="closeModal();">
  <div class="modal">
    <div class="modal-close" onClick="closeModal();">x</div>
    <div class="modal-title">한번 더 참여하고<br />당첨률을 높여보세요!</div>
    <div class="modal-txt">* 첫 참여는 알이 차감되지 않습니다.</div>
    <div><button class="modal-btn" onclick="useEgg()">지금 참여하기</button></div>
    <div class="modal-a"><a>다른 퀴즈 보기 > </a></div>
  </div>
</div>

<script>
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


  console.log("모달창");

  function openModal() {
    $('.modal-dim').show();
  }

  function closeModal() {
    $('.modal-dim').hide();
    console.log("closed");
  }
</script>