<div class="open">
  <div class="open-title">오픈된 숏퀴즈</div>
  <div class="open-group">


    <?php include $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/elements/openElement.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/elements/openElement.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/es/reward/list/elements/openElement.php'; ?>

  </div>


</div>


<script>
  // api 연동해서 썸네일 사진 가져와서 계속 append 추가하기
  $(document).ready(function() {
    getCardList();
  })

  function goToDetail(category, cId) {
    if (category != undefined && cId != undefined) {
      getGtagEmotion('감정카드 카드보기', '카드보기');
      location.href = `/es/send/detail.php?category=${category}&cidx=${cId}`;
    } else if (category == undefined && cId == undefined) {
      getGtagEmotion('감정카드 더보기', '더보기');
      location.href = "/es/send/?category=recommend";
    }
  }

  // swiper 
  function applySwiper() {
    var swiper = new Swiper(".Swiper", {
      slidesPerView: 'auto',
      spaceBetween: 10,
    });
  }

  function getCardList() {
    const data = {
      proc: 'get-main-card-list',
      csrf_token: JS_CSRF
    };

    $.ajax({
      type: 'get',
      url: '/es/modules/api.php',
      dataType: 'json',
      data: data,
      success: (_json) => {
        const {
          result
        } = _json.response;

        const sWrapper = $('.swiper-wrapper');

        for (let item of result) {

          let new_icon = false;
          let custom_icon = false;

          sWrapper.append(`
          <a class="swiper-slide" id="${item.idx}" href="javascript:goToDetail('${item.category}', ${item.idx})">
            <img src="https://cdn.banggooso.com/es/assets/images/object_guard.png" style="position:absolute;" oncontextmenu="return false;" />
            <img src="https://cdn.banggooso.com/es/card/thumbnails/${item.thumbnail}">
          </a>
          `)

          const cWrapper = $(`.swiper-slide#${item.idx}`);

          if (item.newbadge == 1) {
            cWrapper.append(`<img id="new_badge" src="<?= ASSETS_PATH ?>images/icon/new.png">`);
          }
          if (item.type == 0 || item.type == 1 || item.type == 2) {
            cWrapper.append(`<img id="custom_badge" src="<?= ASSETS_PATH ?>images/icon/custom-icon.png">`);
          }

        }
        sWrapper.append(`<div onclick="goToDetail()" class="swiper-slide"><img src="<?= ASSETS_PATH ?>images/home/pluscard.png"></div>`);

        applySwiper();
      },
      error: function(request, status, error) {
        console.log(error)
      }
    })
  }
</script>