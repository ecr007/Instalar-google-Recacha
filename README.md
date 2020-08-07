# Instalar google Recaptcha V3


Buscar las claves publicas y privadas

## Validar en Backend

```php
/// quick recaptcha
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify?secret=PRIVATE_KEY&response='.$_POST["recaptcha_response"],
));
$resp = curl_exec($curl);
curl_close($curl);	
$resp_decode= json_decode($resp);

if($resp_decode->success!='true'){ $stat['error'] = "Please confirm verification code"; }
```

## Agregar JS

```javascript
<script src='https://www.google.com/recaptcha/api.js?hl=es&render=PUBLIC_KEY'></script>

<script type="text/javascript">
grecaptcha.ready(function () {
    grecaptcha.execute('PUBLIC_KEY', { action: 'contact' }).then(function (token) {
        $('.recaptchaResponse').val(token);
    });
});
</script>

Con TimeOut
<script type="text/javascript">

function runtoken(){
    grecaptcha.ready(function () {
        grecaptcha.execute('6LeClbUZAAAAADTYeQQ1I4o1wBEyy1UP_nAj_qU1', { action: 'contact' }).then(function (token) {
            $('.recaptchaResponse').val(token);
        });
    });
    
    setTimeout(function(){
        runtoken();
        console.log("exec");
    },20000);
}

runtoken();
</script>
```

## Agregar HTML

```html
<input type="hidden" name="recaptcha_response" class="recaptchaResponse">
```
