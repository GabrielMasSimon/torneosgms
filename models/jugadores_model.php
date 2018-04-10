<?php
class jugadores_model{

private $db;

private $jugadores;

private $id;
private $nombre;
private $apellidos;
private $email;
private $sexo;
private $id_equipo;


public function __construct(){
    $this->db=Conectar::conexion();
    $this->jugadores=array();
}

/* GETTERS & SETTERS */

public function getId() {
  return $this->id;
}

public function setId($id) {
  $this->id = $id;
}

public function getNombre() {
  return $this->nombre;
}

public function setNombre($nombre) {
  $this->nombre = $nombre;
}




/**
 * Extrae todos los jugadores de la tabla
* @return array Bidimensional de todos los jugadores
*/
public function get_jugadores(){
    $consulta=$this->db->query("select * from jugadores;");

    while($filas=$consulta->fetch_assoc()){
        $this->jugadores[]=$filas;
    }

    return $this->jugadores;
}


/**
* Inserta un registro en la tabla
* @return [false]  si no hay errores,
*         [string] con texto de error si no ha ido bien
*/
public function insertar() {

     $sql = "INSERT INTO jugadores (nombre) VALUES ('{$this->nombre}')";
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
    $sql = "DELETE FROM jugadores WHERE id_jugador='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}
}
?>
