<?php 
    require_once('modelo/estudiante_model.php');

    class estudiante_controller{

        private $model_e;
        private $model_p;

        function __construct(){
            $this->model_e=new estudiante_model();
        }

        //mostrar la vistas del index
        function index(){
            $query=$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/index.php');
            include_once('vistas/footer.php');
        }

        //mostrar las vistas del login
        function login(){
            include_once('vistas/header.php');
            include_once('vistas/login.php');
            include_once('vistas/footer.php');
        }

        //mostrar las vistas del registro
        function registro(){
            include_once('vistas/header.php');
            include_once('vistas/registro.php');
            include_once('vistas/footer.php');
        }

        //mostar la vista de salida del sistema
        function salir(){
            include_once('vistas/header.php');
            include_once('vistas/salir.php');
            include_once('vistas/footer.php');
        }

        //mostar la vista de universidades
        function universidades(){
            $query=$this->model_e->getU();

            include_once('vistas/header.php');
            include_once('vistas/universidades.php');
            include_once('vistas/footer.php');
        }

        //mostar la vista de universidades
        function registrarUniversidades(){
            $query=$this->model_e->getU();

            include_once('vistas/header.php');
            include_once('vistas/registrarUniversidad.php');
            include_once('vistas/footer.php');
        }

        //metodo para mostrar el formulario del estudiante y consultar los datos del estudiante mediante su id si se trata de una modificacion de registro
        function estudiante(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }

        //metodo para insertar y modificar datos
        function get_datosE(){

            //se obtienen los datos del formulario
            $data['id']=$_REQUEST['txt_id'];
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];

            //Se verifica si el id esta vacio de ser asi se identifica como una creacion de registro
            if ($_REQUEST['id']=="") {
                //se inserta nuevo registro con los datos del formulario con el metodo del modelo create();
                $this->model_e->create($data);
            }
            //Se verifica si el id no esta vacio de ser asi se identifica como una modificacion del registro y por lo tanto se toma el id del registro a modificar
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php");

        }

        //metodo para insertar y modificar datos
        function get_datosU(){

            //se obtienen los datos del formulario
            $data['id']=$_REQUEST['txt_id'];
            $data['nombre']=$_REQUEST['txt_nombre'];

            //Se verifica si el id esta vacio de ser asi se identifica como una creacion de registro
            if ($_REQUEST['id']=="") {
                //se inserta nuevo registro con los datos del formulario con el metodo del modelo create();
                $this->model_e->createU($data);
            }
            //Se verifica si el id no esta vacio de ser asi se identifica como una modificacion del registro y por lo tanto se toma el id del registro a modificar
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->updateU($data,$date);
            }
            
            header("Location:index.php?m=universidades");

        }

        //metodo para traer los datos del nuevo usuario y llamar al metodo del modelo para realizar la sentencia insert a la tabla usuario (crear nuevo usuario)
        function registrarUsuario(){
            $data['user']=$_REQUEST['txt_user'];
            $data['pass']=$_REQUEST['txt_pass'];
            $data['email']=$_REQUEST['txt_email'];

            $this->model_e->createUser($data);

            //poseterior al registro se manda a la pagina del login
            header("Location:index.php?m=login");
        }

        //metodo para traer los datos del usuario y comparar si hay datos existentes en la tabla de usuarios para decidir si conceder el acceso al sistema o mandar un mensaje de error de acceso
        function acceder(){
            $data['usuario']=$_REQUEST['txt_user'];
            $data['contraseña']=$_REQUEST['txt_pass']; 

            $query=$this->model_e->get_users();
            $band=0;

            foreach($query as $data2):
                //si hay datos existentes se inica una sesion y se manda al index del sistema
                if($data2["usuario"]==$data["usuario"] && $data2["contraseña"]==$data["contraseña"]){
                    $band=1;
                    session_start();
                    $_SESSION["validar"]="ok";

                    header("location: index.php");
                }
            endforeach;
            
            //si no hay existencias se manda nuevamente al login y muestra un mensaje de error de acceso
            if ($band==0) {
                header("location: index.php?m=login&action=error");
            }
        }

        //metodo del controlador para confirmar la eliminacion del registro de estudiantes y llamar al modelo para realizar una sentencia delete
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }

        //metodo del controlador para confirmar la eliminacion del registro de universidades y llamar al modelo para realizar una sentencia delete
        function confirmarDeleteU(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_idU($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');
        }


    }
?>