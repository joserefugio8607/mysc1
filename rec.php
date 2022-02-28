<?php 

if(isset($_POST['g-recaptcha-response'])){

//La respuesta del recaptcha
$respuesta=$_POST['g-recaptcha-response'];
//La ip del usuario
$ipuser=$_SERVER['REMOTE_ADDR'];
//Tu clave secretra de recaptcha
$clavesecreta='6Lc0aKMeAAAAAL77tF0M1PaXRe5J7XIxa3g5Vs-9';
//La url preparada para enviar
$urlrecaptcha="https://www.google.com/recaptcha/api/siteverify?secret=$clavesecreta&response=$respuesta&remoteip=$ipuser";

//Leemos la respuesta (suele funcionar solo en remoto)
$respuesta = file_get_contents($urlrecaptcha) ;

//Comprobamos el success
$dividir=explode('"success":',$respuesta);
$obtener=explode(',',$dividir[1]);

//Obtenemos el estado
$estado=trim($obtener[0]);


if ($estado=='true'){
  //Si es ok
  Header("Location: ./signin?locale.x=");
} else if ($estado=='false'){
  //Si es error
  Header("Location: index.html");
}

}

?>