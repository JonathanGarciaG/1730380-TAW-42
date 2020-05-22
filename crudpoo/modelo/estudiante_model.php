<?php
    
    class estudiante_model{
        private $DB;
        private $estudiantes;
        private $usuarios;

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

        //metodo para realizar una sentencia insert en la tabla de estudiantes
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(id,cedula,nombre,apellidos,promedio,edad,fecha)VALUES (?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['id'],$data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha']));
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

        //metodo para realizar una sentencia update a la tabla estudiante
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'], $date));
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
    }
?>

