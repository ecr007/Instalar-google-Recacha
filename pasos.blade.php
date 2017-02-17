ACTUALIZADO
https://github.com/google/recaptcha

<?php 
  /**
   * Codigo del receptor
   */
  
  //Incluimos la clase
  require 'recaptchalib.php';
  
  // tu clave secreta
  $secret = "6LepjgITAAAAALaJvs7pV3OpHTWkr-k0MOrv4qMj";

  // respuesta vacía
  $response = null;
		 
  // comprueba la clave secreta
  $reCaptcha = new ReCaptcha($secret);
  
  if ($_POST["g-recaptcha-response"]) {
		    $response = $reCaptcha->verifyResponse(
		        $_SERVER["REMOTE_ADDR"],
		        $_POST["g-recaptcha-response"]
		    );
		}
  
  //Accion a realizar en caso de no ser valido el capcha
  if ($response == null && $response->success == false) {
  	die(header("Location: ".$me_voy."=3"));
  }
?>

{{--Emisor--}}

<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

{{--Donde queremos que aperezca el captcha--}}
<div class="g-recaptcha" data-sitekey="CLAVE SECRETA"></div>
