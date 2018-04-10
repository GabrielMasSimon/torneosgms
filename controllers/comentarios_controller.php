<?php
//Llamada al modelo
require_once("models/comentarios_model.php");


class comentarios_controller {

/**
 * Muestra pantalla 'add'
 * @return No
 */
function add() {
  require_once("views/comentarios_add.phtml");
}


/**
 * Mostra llistat
 * @return No
 */
function view() {
  $comentario=new comentarios_model();

  //Uso metodo del modelo de comentarios
  $datos=$comentario->get_comentarios();

  //Llamado a la vista: mostrar la pantalla
  require_once("views/comentarios_view.phtml");
}


/**
 * Inserta a la taula
 * @return No
 */
function insert() {
    $comentario=new comentarios_model();

    if (isset($_POST['insert'])) {

        $comentario->setMensaje( $_POST['mensaje'] );
      

        $error = $comentario->insertar();

        if (!$error) {
            header( "Location: index.php?controller=comentarios&action=view");
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
    $comentario=new comentarios_model();

    $id = $_GET['id'];

    $error = $comentario->delete($id);

    if (!$error) {
        header( "Location: index.php?controller=comentarios&action=view");
    }
    else {
        echo $error;
    }
  }
}

}
?>
