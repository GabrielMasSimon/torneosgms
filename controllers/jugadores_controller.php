<?php
//Llamada al modelo
require_once("models/jugadores_model.php");


class jugadores_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/jugadores_add.phtml");
}


/**
 * Mostra llistat
 * @return No
 */
function view() {
  $jugador=new jugadores_model();

  //Uso metodo del modelo de jugadores
  $datos=$jugador->get_jugadores();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/jugadores_view.phtml");
}


/**
 * Inserta a la taula
 * @return No
 */
function insert() {
    $jugador=new jugadores_model();

    if (isset($_POST['insert'])) {

        $jugador->setNombre( $_POST['nombre'] );
        $jugador->setApellidos( $_POST['apellidos'] );
        $jugador->setEmail( $_POST['email'] );
        $jugador->setSexo( $_POST['sexo'] );
      

        $error = $jugador->insertar();

        if (!$error) {
            header( "index.php?controller=jugadores&action=view");
        }
        else {
            echo $error;
        }
    }
}


/**
 * Elimina una fila de la taula
 * @return No
 */
function delete() {
  if (isset($_GET['id'])) {
    $jugador=new jugadores_model();

    $id = $_GET['id'];

    $error = $jugador->delete($id);

    if (!$error) {
        header( "index.php?controller=jugadores&action=view");
    }
    else {
        echo $error;
    }
  }
}

}
?>
