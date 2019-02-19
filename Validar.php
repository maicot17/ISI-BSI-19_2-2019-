<?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'validaciones.php';
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$pass = isset($_POST['pass']) ? $_POST['pass'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$fechanac = isset($_POST['fechanac']) ? $_POST['fechanac'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Valida que el campo nombre no esté vacío.
   if (!validaRequerido($nombre)) {
      $errores[] = 'El campo nombre es incorrecto.';
   }
   if (!validaRequerido($pass)) {
      $errores[] = 'El campo password es incorrecto.';
   }
   //Valida que el campo email sea correcto.
   if (!validaEmail($email)) {
      $errores[] = 'El campo email es incorrecto.';
   }
   //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
   if(!$errores){
      header('Location: RegistroCompletado.html');
      exit;
   }
}
?>