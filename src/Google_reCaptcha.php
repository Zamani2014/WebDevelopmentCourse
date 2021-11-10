<script src="https://www.google.com/recaptcha/api.js?render=6LdhQxsdAAAAAKGNpVvny3wjlfHqn_oUP3PKBJzR"></script>


   
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LdhQxsdAAAAAKGNpVvny3wjlfHqn_oUP3PKBJzR', {action: 'submit'}).then(function(token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
              recaptchaResponse.value = token;
          });
        });
      }
  </script>


<?php

$google_recaptcha_url = 'https://www.google.com/recaptcha/api/siteverity';
$recaptcha_secret_key = '6LdhQxsdAAAAAASTFIiB8fBrm7H1aiLS7eW0ve_5';
$set_recaptcha_response = $_POST['recaptcha_response'];
$get_recaptcha_response = file_get_contents($google_recaptcha_url . '?secret=' . $recaptcha_secret_key . '&response=' . $set_recaptcha_response);
$get_recaptcha_reponse = json_decode($get_recaptcha_response);
if ($get_recaptcha_response->success == true && $get_recaptcha_response->score >= 0.5 && $get_recaptcha_response->action == 'submit') {
   $success_msg = "شما میتوانید ادامه دهید.";
}
else {
  $err_msg = "متاسفانه خطایی رخ داده است، لطفا بعداز چند دقیقه مجددا تلاش کنید.";
}

?>
