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
                                                    <div class="widget-heading">{{ user.name }} {{ user.lastname }}</div>
                                                    <div class="widget-subheading opacity-7">{{ user.email }}</div>
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
                            <button class="btn-wide btn btn-success" data-toggle="modal" data-target=".modalNewUser">Nuevo</button>
                        </div>
                    </div>
                </div>
            </div> 

            
            <!--Inicio del modal agregar-->
            <div class="modal fade modalNewUser" id="modalNewUser"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="" v-on:submit.prevent="newUser()" enctype="multipart/form-data" class="form-horizontal">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Nuevo Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUser -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre:</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" v-model="name" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre del usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Apellido:</label>
                                <div class="col-md-9">
                                    <input type="text" id="lastname" name="lastname" v-model="lastname" class="form-control" placeholder="Apellido" required>
                                    <span class="help-block">(*) Ingrese el Apellido del usuario</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Correo Electrónico:</label>
                                <div class="col-md-9">
                                    <input type="email" id="email" name="email" v-model="email" class="form-control" placeholder="Correo Electrónico" required>
                                    <span class="help-block">(*) Ingrese el Correo electrónico</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Contraseña:</label>
                                <div class="col-md-9">
                                    <input type="password" id="password" name="password" v-model="password" class="form-control" placeholder="Contraseña" required>
                                    <span class="help-block">(*) Ingrese una contraseña</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Tipo de Usuario:</label>
                                <div class="col-md-9">
                                    <select id="tipo" name="tipo" v-model="tipo" class="form-control" placeholder="Tipo de usuario" required>
                                        <option value="Normal">Normal</option>
                                        <option value="Administrador">Administrador</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        </div>
                    </form> 
                    </div>
                </div>
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
                name:"", 
                lastname:"",  
                email:"",
                password:"",
                tipo:"", 
                users:[]
            }
        },
        //metodos utilizados
        methods: {
            //Metodo para agregar un nuevo producto
            newUser() {
                //$('#modalNewUser').modal('show');
                //se toman los parametros de los campos
                const params = {
                    name: this.name,
                    lastname: this.lastname,
                    email: this.email,
                    password: this.password,
                    tipo: this.tipo
                };
                //Se limpian los campos del modal
                this.name = '';
                this.lastname = '';
                this.email = '';
                this.password = '';
                this.tipo = '';

                //se hace un request post con el url /getusers para que con su respuesta se realice la insercion
                axios.post('./getusers', params)
                    .then((response) => {
                        const user = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array productos para actualizar el componente que los muestra
                        let me = this;
                        let url = './getusers' //url que retorna los registros de la tabla productos
                        axios.get(url).then(function (response) {
                            me.users = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });
                //Ocultar el modal
                //$('#modalNewUser').modal('hide');
                //$('#modalNewUser').modal('hide');
                }
            
        }
    }
</script>