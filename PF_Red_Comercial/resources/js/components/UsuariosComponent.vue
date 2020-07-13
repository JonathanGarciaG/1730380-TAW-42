<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-users">
                            </i>
                        </div>
                        <div>Lista de Usuarios
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Usuarios Activos
                            
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre/Usuario</th>
                                    <th class="text-center">Tipo de Usuario</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="user in users" :key="user.id">
                                    <td class="text-center text-muted">{{ user.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ user.nombre }} {{ user.apellidos }}</div>
                                                    <div class="widget-subheading opacity-7">{{ user.usuario }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">{{ user.tipo }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm">Editar</button>
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm">Eliminar</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class="btn-wide btn btn-success" data-toggle="modal" data-target="#modalNuevo">Nuevo</button>
                        </div>
                    </div>
                </div>
            </div> 

            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                    <form action="" v-on:submit.prevent="newUser()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUser -->
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre:</label>
                                    <div class="col-md-9">
                                        <input type="text" id="codigo" name="codigo" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                        <span class="help-block">(*) Ingrese el Nombre del usuario</span>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        </form> 
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array productos con los registros de la base de datos
            let me = this;
            let url = './getusers' //el url de productos que devuelve los registros de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.users = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //datos de los campos
        data(){
            return{
                nombre:"", 
                apellidos:"", 
                usuario:"", 
                contrasena:"",
                tipo:"", 
                correo:"",
                users:[]
            }
        }
    }
</script>