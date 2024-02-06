<div class="header list-header">
  <div onclick="gopage('quiz')">
    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
      <mask id="mask0_9986_3391" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="32" height="32">
        <rect width="32" height="32" fill="#D9D9D9" />
      </mask>
      <g mask="url(#mask0_9986_3391)">
        <path d="M4.24612 16.0001L14.2897 26.0437C14.5547 26.3086 14.6837 26.6206 14.6769 26.9796C14.67 27.3385 14.5341 27.6505 14.2692 27.9154C14.0043 28.1804 13.6923 28.3129 13.3333 28.3129C12.9743 28.3129 12.6624 28.1804 12.3975 27.9154L2.16925 17.7078C1.92818 17.4667 1.74954 17.1966 1.63332 16.8975C1.5171 16.5984 1.45898 16.2992 1.45898 16.0001C1.45898 15.7009 1.5171 15.4018 1.63332 15.1026C1.74956 14.8035 1.92821 14.5334 2.16925 14.2924L12.3975 4.06422C12.6624 3.79926 12.9778 3.67019 13.3436 3.67701C13.7094 3.68386 14.0248 3.81976 14.2897 4.08472C14.5547 4.34967 14.6872 4.66163 14.6872 5.02058C14.6872 5.37956 14.5547 5.69153 14.2897 5.95648L4.24612 16.0001Z" fill="#333333" />
      </g>
    </svg>

  </div>
  <div class="list-header-txt">퀴즈 리스트</div>
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
    } else if (link == 'list') {
      window.location.href = "/sr/list";
    };
  }
</script>