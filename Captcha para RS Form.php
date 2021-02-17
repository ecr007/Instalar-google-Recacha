$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify?secret=6Lf6dO0ZAAAAAH1jV7D751XxRx3DQAk-Ke_zfsyL&response='.$_POST["recaptcha_response"],
));
$resp = curl_exec($curl);
curl_close($curl);	
$resp_decode= json_decode($resp);

if($resp_decode->success!='true'){ 
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Codigo de verificación invalido, intentar nuevamente por favor.');
    window.location.href='https://www.mbe.com.do/index.php/servicios/envios-nacionales-head/envios-nacionales.html';
    </script>");
unset($_POST);
}
