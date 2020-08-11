<template>
<!-- Componente para el manejo de usuarios -->
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
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm" v-on:click="camposUpdate(user)">Editar</button>
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(user)">Eliminar</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class="btn-wide btn btn-success" data-toggle="modal" v-on:click="mostrarModal()" data-target="" >Nuevo</button>
                        </div>
                    </div>
                </div>
            </div> 

            
            <!--Inicio del modal agregar-->
            <div class="modal fade" id="modalNewUser"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newUser() para agregar los datos de usuario -->
                    <form action="" v-on:submit.prevent="newUser()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nuevo Usuario</h5>
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
                                        <option value="Cliente">Cliente</option>
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

            <!--Inicio del modal editar-->
            <div class="modal fade" id="modalUpdateUser"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newUser() para agregar los datos de usuario -->
                    <form action="" v-on:submit.prevent="updateUser()" enctype="multipart/form-data" class="form-horizontal">

                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Actualizar Usuario</h5>
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
                                        <option value="Cliente">Cliente</option>
                                        <option value="Administrador">Administrador</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>                           
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal eliminar-->
            <div class="modal fade" id="modalDeleteProducto"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateProducto() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar el usuario?</h5>

                            <!-- Se utiliza un input oculto para tomar el id del producto que se va a borrar -->
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <input type="hidden" id="id_borrar" name="id_borrar" v-model="id_borrar" class="form-control" placeholder="idborrar" required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Si</button>
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
        //datos de los campos
        data(){
            return{
                name:"", 
                lastname:"",  
                email:"",
                password:"",
                tipo:"", 
                update: 0,
                users:[],
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array productos con los registros de la base de datos
            let me = this;
            let url = './usuarios' //el url de productos que devuelve los registros de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.users = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            //mostrar modal
            mostrarModal() {
                //Se limpian los campos del modal
                this.name = '';
                this.lastname = '';
                this.email = '';
                this.password = '';
                this.tipo = '';
                $('#modalNewUser').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteProducto').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            newUser() {
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
                axios.post('./usuarios', params)
                    .then((response) => {
                        const user = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array users para actualizar el componente que los muestra
                        let me = this;
                        let url = './usuarios' //url que retorna los registros de la tabla users
                        axios.get(url).then(function (response) {
                            me.users = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });
                //Ocultar el modal
                $('#modalNewUser').modal('hide');
            },
            //Metodo para actualizar los datos de un usuario.
            updateUser(){
                let me = this;
                axios.put('./usuarios',{
                    'id' : this.update,
                    'name' : this.name,
                    'lastname' : this.lastname,
                    'email' : this.email,
                    'password' : this.password,
                    'tipo' : this.tipo,
                }).then(function (response){
                    //Cerrando el modal después de actualizar el usuario.
                    $('#modalUpdateUser').modal('hide');
                }).catch(function (error){
                    console.log(error);
                });
                me = this;
                let url = './usuarios' //url que retorna los registros de la tabla users
                axios.get(url).then(function (response) {
                    me.users = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdateUser').modal('show');
                this.update = data.id;
                let me = this;
                let url = './usuarios/'+this.update;
                axios.get(url).then(function (response){
                    me.name = response.data.name;
                    me.lastname = response.data.lastname;
                    me.email = response.data.email;
                    me.password = response.data.password;
                    me.tipo = response.data.tipo;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./usuarios/'+this.id_borrar).then(() => {                    
                    let me = this;
                    let url = './usuarios' //url que retorna los registros de la tabla users
                    axios.get(url).then(function (response) {
                        me.users = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                });
                $('#modalDeleteProducto').modal('hide');
            }
            
        }
    }
</script>