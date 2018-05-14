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

  $comentarios=new comentarios_model();
  $datosPartidos = $comentarios->get_verEquiposXPartido();
  $equipo=new equipos_model();

  //Uso metodo del modelo de equipos
  $datosequipos=$equipo->get_equipos();
  
   //Llamado a la vista: mostrar la pantalla
  require_once("views/comentarios_view.phtml");


   
    //Uso metodo del modelo de comentarios
}

//para ver los equipos
function equiposView(){

    $comentario=new comentarios_model();
    $datosequipos=$comentario->get_equiposView();

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
 * Inserta a la taula
 * @return No
 */
 function insertarGoles() {
    $comentario=new comentarios_model();

    if (isset($_POST['insert'])) {

        $comentario->setGolLocal( $_POST['golLocal'] );
        $comentario->setGolVisitante( $_POST['golVisitante'] );

        $error = $comentario->insertarGoles();

        if (!$error) {
            header( "Location: index.php?controller=comentarios&action=view");
        }
        else {
            echo $error;
        }
    }
}

/**
 * Inserta a la taula
 * @return No
 */
 function insertarPuntos() {
    $comentario=new comentarios_model();

    if (isset($_POST['insert'])) {

        $comentario->setPuntoLocal( $_POST['puntoLocal'] );
        $comentario->setPuntoVisitante( $_POST['puntoVisitante'] );

        $error = $comentario->insertarPuntos();

        if (!$error) {
            header( "Location: index.php?controller=comentarios&action=view");
        }
        else {
            echo $error;
        }
    }
}

/**
 * Inserta a la taula
 * @return No
 */
 function crearPartido() {
    $comentario=new comentarios_model();

    if (isset($_POST['insert'])) {

       
        $comentario->setEquipoLocal( $_POST['equipoLocal'] );
        $comentario->setEquipoVisitante( $_POST['equipoVisitante'] );

        $error = $comentario->crearPartido();

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

function finalizarPartido(){
    $comentario=new comentarios_model();

    $error = $comentario->get_finalizarPartido();

    if (!$error) {
        header( "Location: index.php?controller=comentarios&action=view");
    }
    else {
        echo $error;
    }

}

}
?>
