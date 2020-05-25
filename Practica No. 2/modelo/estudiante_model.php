<?php
    
    class estudiante_model{
        private $DB;
        private $estudiantes;
        private $usuarios;
        private $universidades;
        private $carreras;

        function __construct(){
            $this->DB=Database::connect();
        }

        //metodo para obtener las filas de los registros de la tabla estudiantes
        function get(){
            $sql= 'SELECT * FROM estudiante ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return  $this->estudiantes;
        }

        //metodo para obtener las filas de los registros de la tabla usuarios
        function get_users(){
            $sql= 'SELECT * FROM usuarios ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->usuarios=$fila;
            return  $this->usuarios;
        }

        //metodo para obtener las filas de los registros de la tabla universidades
        function getU(){
            $sql= 'SELECT * FROM universidades ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->universidades=$fila;
            return  $this->universidades;
        }

        //metodo para obtener las filas de los registros de la tabla carreras
        function getC(){
            $sql= 'SELECT * FROM carreras ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $this->carreras=$fila;
            return  $this->carreras;
        }

        //metodo para realizar una sentencia insert en la tabla de estudiantes
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(id,cedula,nombre,apellidos,promedio,edad,fecha,id_universidad_carrera)VALUES (?,?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['id'],$data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['carrera']));
            Database::disconnect();       

        }

        //metodo para realizar una sentencia insert en la tabla de universidades
        function createU($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO universidades(nombre)VALUES (?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre']));
            Database::disconnect();       
        }

        //metodo para realizar una sentencia insert en la tabla de carreras
        function createC($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carreras(nombre,id_universidad)VALUES (?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['universidad']));
            Database::disconnect();       
        }

        ///metodo para realizar una sentencia insert en la tabla de usuarios, crear nuevo usuario
        function createUser($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO usuarios(usuario,contraseña,email)VALUES (?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['user'],$data['pass'],$data['email']));
            Database::disconnect();       

        }

        //metodo para obtener los datos de un estudiante mediante su id
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //metodo para obtener los datos de una universidad mediante su id
        function get_idU($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM universidades where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //metodo para obtener los datos de una carrera mediante su id
        function get_idC($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM carreras where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //metodo para realizar una sentencia update a la tabla estudiante
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=?, id_universidad_carrera=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['carrera'], $date));
            Database::disconnect();

        }

        //metodo para realizar una sentencia update a la tabla universidades
        function updateU($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE universidades  set nombre = ? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$date));
            Database::disconnect();

        }

        //metodo para realizar una sentencia update a la tabla carreras
        function updateC($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carreras set nombre = ?,id_universidad=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['nombre'],$data['universidad'],$date));
            Database::disconnect();

        }

        //metodo para realizar una sentencia delete a un registro de estudiante, borrar estudiante
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }

        //metodo para realizar una sentencia delete a un registro de universidad, borrar universidad
        function deleteU($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM universidades where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }

        //metodo para realizar una sentencia delete a un registro de carrera, borrar carrera
        function deleteC($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carreras where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

