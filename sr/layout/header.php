<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>숏Quiz</title>
  <script>
    function checkLogin() {
      let isLogin = false;
      const data = {
        proc: 'login-check',
        csrf_token: JS_CSRF,
      };
      $.ajax({
        type: 'get',
        url: '/sr/modules.api.php',
        dataType: 'json',
        data: data,
        async: false,
        success: (_json) => {
          if (_json.code == 0) {
            isLogin = true;
          } else if (_json.code == 4) {
            isLogin = false;
          }
        },
        error: function(request, status, error) {
          console.log(error)
        }
      })
      return isLogin;
    }

    function getEgg() {
      let egg = null;

      const data = {
        proc: 'page-init',
        csrf_token: JS_CSRF,
      }
      $.ajax({
        type: 'get',
        url: '/sr/modules/api.php',
        dataType: 'json',
        data: data,
        async: false,
        success: (_json) => {
          const isLogin = checkLogin();

          if (isLogin) {
            egg = _json.response.result.egg;
            const $eggspan = $('.header-egg span');

            if (egg < 99) {
              $eggspan.innerText = egg;
            } else {
              $eggspan.innerText = '99 +';
            }

          } else {
            $eggspan.innerText = '0';
            return false;
          }
        },
        error: function(request, status, error) {
          console.log(error)
        }
      })
      return egg;
    }
  </script>

</head>

</html>