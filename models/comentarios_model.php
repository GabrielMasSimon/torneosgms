<?php
class comentarios_model{

private $db;

private $comentarios;

private $id;
private $mensaje;
private $idPartido;
private $equipoLocal;
private $equipoVisitante;
private $golLocal;
private $golVisitante;


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


public function getGolLocal() {
    return $this->golLocal;
  }
  
public function setGolLocal($golLocal) {
    $this->golLocal = $golLocal;
  }

public function getGolVisitante() {
    return $this->golVisitante;
  }
  
public function setGolVisitante($golVisitante) {
    $this->golVisitante = $golVisitante;
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
 * Extrae todos los comentarios de la tabla
* @return array Bidimensional de todos los comentarios
*/
public function get_verEquiposXPartido(){
    $consulta=$this->db->query("SELECT * FROM `partidos` WHERE id_partido =( SELECT MAX(id_partido) FROM `partidos`);");

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
public function insertarGoles() {

    // $sql = "SET @maxID = (SELECT MAX(id_partido) FROM `partidos` );
    // UPDATE `partidos` SET goles_local = 2 WHERE id_partido = @maxId;";
   // $sql = "INSERT INTO partidos (goles_local, goles_visitante) VALUES ('{$this->golLocal}', '{$this->golVisitante}')";
    
    // $sql ="SELECT MAX(id_partido) FROM partidos;"
    
    // $result = $this->db->query($sql);

    // $maxId = $result;

    // $sql ="UPDATE partidos SET goles_local = '{$this->golLocal}' WHERE id_partido =  '{$this->$maxId}';
    // UPDATE partidos SET goles_visitante = '{$this->golVisitante}' WHERE id_partido = '{$this->$maxId}';";

    // $result = $this->db->query($sql);

    
    // if ($this->db->error)
    //     return "$sql<br>{$this->db->error}";
    // else {
    //     return false;
    // }
    $this->db->query("BEGIN");
    $result = $this->db->query("SELECT MAX(id_partido) FROM partidos;");
    while($row = $result->fetch_assoc()) {  
       $this->$maxId = $row['MAX(id_partido)'];
    }
    
    if(
    $this->db->query("UPDATE partidos SET goles_local = '{$this->golLocal}' WHERE id_partido =  '{$this->$maxId}';") &&
    $this->db->query(" UPDATE partidos SET goles_visitante = '{$this->golVisitante}' WHERE id_partido = '{$this->$maxId}';")){
        $this->db->query("COMMIT");
    }else {        
        $this->db->query("ROLLBACK");
    } 
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
