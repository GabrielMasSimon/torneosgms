<?php
class comentarios_model{

private $db;

private $comentarios;

private $id;
private $mensaje;
private $idPartido;
private $equipoLocal;
private $equipoVisitante;


public function __construct(){
    $this->db=Conectar::conexion();
    $this->comentarios=array();
}

/* GETTERS & SETTERS */

public function getId() {
  return $this->id;
}

public function setId($id) {
  $this->id = $id;
}

public function getMensaje() {
  return $this->mensaje;
}

public function setMensaje($mensaje) {
  $this->mensaje = $mensaje;
}

public function getIdPartido() {
    return $this->idPartido;
  }
  
public function setIdPartido($idPartido) {
    $this->idPartido = $idPartido;
  }

public function getEquipoLocal() {
    return $this->equipoLocal;
  }
  
public function setEquipoLocal($equipoLocal) {
    $this->equipoLocal = $equipoLocal;
  }

  public function getEquipoVisitante() {
    return $this->equipoLocal;
  }
  
public function setEquipoVisitante($equipoVisitante) {
    $this->equipoVisitante = $equipoVisitante;
  }




/**
 * Extrae todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_comentarios(){
    $consulta=$this->db->query("select * from comentarios;");

    while($filas=$consulta->fetch_assoc()){
        $this->comentarios[]=$filas;
    }

    return $this->comentarios;
}


/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertar() {

     $sql = "INSERT INTO comentarios (mensaje) VALUES ('{$this->mensaje}')";
     $result = $this->db->query($sql);

     if ($this->db->error)
         return "$sql<br>{$this->db->error}";
     else {
         return false;
     }
}

/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function crearPartido() {

    $sql = "INSERT INTO partidos (equipo_local, equipo_visitante) VALUES ('{$this->equipoLocal}','{$this->equipoVisitante}')";
    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}


/**
* Esborra un registre de la taula
* @param  int $id Identificador del registre
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function delete($id) {
    $sql = "DELETE FROM comentarios WHERE id_comentario='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}


/**
 *Elimina todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_finalizarPartido(){

 $consulta=$this->db->query("TRUNCATE TABLE comentarios;");

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}

}
?>
