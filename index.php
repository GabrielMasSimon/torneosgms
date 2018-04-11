<?php
require_once("db/db.php");

require_once("controllers/torneos_controller.php");
require_once("controllers/deportes_controller.php");
require_once("controllers/comentarios_controller.php");
require_once("controllers/jugadores_controller.php");
require_once("controllers/equipos_controller.php");

if (isset($_GET['controller']) && isset($_GET['action']) ) {

    if ($_GET['controller'] == "torneos") {

         if ($_GET['action'] == "view") {
           $controller = new torneos_controller();
           $controller->view();
         }

         if ($_GET['action'] == "add") {
           $controller = new torneos_controller();
           $controller->add();
         }

         if ($_GET['action'] == "insert") {
           $controller = new torneos_controller();
           $controller->insert();
         }

         if ($_GET['action'] == "delete") {
           $controller = new torneos_controller();
           $controller->delete();
         }

    }

    if ($_GET['controller'] == "deportes") {

      if ($_GET['action'] == "view") {
        $controller = new deportes_controller();
        $controller->view();
      }

      if ($_GET['action'] == "add") {
        $controller = new deportes_controller();
        $controller->add();
      }

      if ($_GET['action'] == "insert") {
        $controller = new deportes_controller();
        $controller->insert();
      }

      if ($_GET['action'] == "delete") {
        $controller = new deportes_controller();
        $controller->delete();
      }

   

    }

    if ($_GET['controller'] == "comentarios") {

      if ($_GET['action'] == "view") {
        $controller = new comentarios_controller();
        $controller->view();
      }

      if ($_GET['action'] == "add") {
        $controller = new comentarios_controller();
        $controller->add();
      }

      if ($_GET['action'] == "insert") {
        $controller = new comentarios_controller();
        $controller->insert();
      }

      if ($_GET['action'] == "delete") {
        $controller = new comentarios_controller();
        $controller->delete();
      }
    }

    if ($_GET['controller'] == "jugadores") {

      if ($_GET['action'] == "view") {
        $controller = new jugadores_controller();
        $controller->view();
      }

      if ($_GET['action'] == "add") {
        $controller = new jugadores_controller();
        $controller->add();
      }

      if ($_GET['action'] == "insert") {
        $controller = new jugadores_controller();
        $controller->insert();
      }

      if ($_GET['action'] == "delete") {
        $controller = new jugadores_controller();
        $controller->delete();
      }
    }

    if ($_GET['controller'] == "equipos") {

      if ($_GET['action'] == "view") {
        $controller = new equipos_controller();
        $controller->view();
      }

      if ($_GET['action'] == "add") {
        $controller = new equipos_controller();
        $controller->add();
      }

      if ($_GET['action'] == "insert") {
        $controller = new equipos_controller();
        $controller->insert();
      }

      if ($_GET['action'] == "delete") {
        $controller = new equipos_controller();
        $controller->delete();
      }

      if ($_GET['action'] == "ordPuntosDesc") {
        $controller = new equipos_controller();
        $controller->ordPuntosDesc();
      }

      if ($_GET['action'] == "ordPuntosAsc") {
        $controller = new equipos_controller();
        $controller->ordPuntosAsc();
      }

      if ($_GET['action'] == "ordNombreAsc") {
        $controller = new equipos_controller();
        $controller->ordNombreAsc();
      }

      if ($_GET['action'] == "ordNombreDesc") {
        $controller = new equipos_controller();
        $controller->ordNombreDesc();
      }

    }

} else {
   $controller = new torneos_controller();
   $controller->view();
}
?>
