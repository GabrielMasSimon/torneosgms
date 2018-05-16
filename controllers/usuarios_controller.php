<?php
//Llamada al modelo
require_once("models/usuarios_model.php");


class usuarios_controller {

/**
 * Muestra pantalla 'registro'
 * @return No
 */
function registroView() {
  require_once("views/usuarios_registro.phtml");
}



/**
 * Muestra pantalla 'login'
 * @return No
 */
 function loginView() {
  require_once("views/usuarios_login.phtml");
}



/**
 * Inserta a la taula
 * @return No
 */
function insert() {
    $usuarios=new usuarios_model();

    if (isset($_POST['insert'])) {
        $usuarios->setUsuario( $_POST['usuario'] );
        $usuarios->setPassword( $_POST['password'] );
        $usuarios->setNombre( $_POST['nombre'] );


        $error = $usuarios->insertar();

        if (!$error) {
          $usuario = $_POST['usuario'];
          $usuarios = new usuarios_model();
          $usuarios->setUsuario( $usuario );

          $error = $usuarios->buscar_usuarios();
          if ($error) {
            $_SESSION['usuario'] = $usuario;
            echo "usuario existente"; 
          }else {
            header( "Location: index.php");

          }
        }
        else {
            echo $error;
        }
    }
}


function login(){
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$usuarios = new usuarios_model();

$usuarios->setUsuario( $usuario );
$usuarios->setPassword( $password );

$_SESSION["usuario"] = $usuario;


$error = $usuarios->buscar_usuarios();

if ($error) {
  $_SESSION['usuario'] = $usuario;
  header('location: index.php');

}
else {

echo "FALLO en el controlador  al iniciar sesion";
session_start();
session_unset();
session_destroy();
  //header('location: index.php?controller=usuarios&action=add');

}
}

function logout() {

session_start();
session_unset();
session_destroy();
header('location: index.php');
}

public function buscar_usuarios(){
  $user=new usuarios_model();

    $usuarioUtilizando=$user->buscar_usuarios();
}

}
?>
