<template>
<!-- Componente para el manejo de empresas -->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-briefcase">
                            </i>
                        </div>
                        <div>Lista de Empresas
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Empresas Activas
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre de la Empresa</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Usuario asociado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="emp in emps" :key="emp.id">
                                    <td class="text-center text-muted">{{ emp.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ emp.nombre }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ emp.telefono }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ emp.descripcion }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ emp.nombre_categoria_empresa }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ emp.name }}  {{ emp.lastname }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm" v-on:click="camposUpdate(emp)">Editar</button>
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(emp)">Eliminar</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class="btn-wide btn btn-success" v-on:click="mostrarModalCreate()">Nuevo</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Inicio del modal agregar-->
            <div class="modal fade" id="modalNewEmpresa"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newEmpresa() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="newEmpresa()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nueva Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUser -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Empresa:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Telefono:</label>
                                <div class="col-md-9">
                                    <input type="number" id="telefono" name="telefono" v-model="telefono" class="form-control" placeholder="Telefono" required>
                                    <span class="help-block">(*) Ingrese el Telefono de la empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Descripción:</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="descripcion" name="descripcion" v-model="descripcion" class="form-control" placeholder="Descripción" required></textarea>
                                    <span class="help-block">(*) Ingrese una descripción de la Empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Usuario asociado:</label>
                                <div class="col-md-9">
                                    <select id="id_usuario" name="id_usuario" v-model="id_usuario" class="form-control" placeholder="Usuario" required>
                                        <option v-for="user in users" :key="user.id">{{ user.id }}|{{ user.name }} {{ user.lastname }}</option>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Ubicación de la empresa:</label>
                                <div class="col-md-9">
                                    <select id="id_ubicacion" name="id_ubicacion" v-model="id_ubicacion" class="form-control" placeholder="Ubicacion" required>
                                        <option v-for="ubic in ubics" :key="ubic.id">{{ ubic.id }}|{{ ubic.estado }} {{ ubic.municipio }}</option>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Categoría de la empresa:</label>
                                <div class="col-md-9">
                                    <select id="id_categoria" name="id_categoria" v-model="id_categoria" class="form-control" placeholder="Categoría" required>
                                        <option v-for="cat in cats" :key="cat.id">{{ cat.id }}|{{ cat.nombre }}</option>
                                    </select>                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Empresa</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->


            <!--Inicio del modal editar-->
            <div class="modal fade" id="modalUpdateEmpresa"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 100px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newEmpresa() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="updateEmpresa()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Actualizar Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUser -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Empresa:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Telefono:</label>
                                <div class="col-md-9">
                                    <input type="number" id="telefono" name="telefono" v-model="telefono" class="form-control" placeholder="Telefono" required>
                                    <span class="help-block">(*) Ingrese el Telefono de la empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Descripción:</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="descripcion" name="descripcion" v-model="descripcion" class="form-control" placeholder="Descripción" required></textarea>
                                    <span class="help-block">(*) Ingrese una descripción de la Empresa</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Usuario asociado:</label>
                                <div class="col-md-9">
                                    <select id="id_usuario" name="id_usuario" v-model="id_usuario" class="form-control" placeholder="Usuario" required>
                                        <option v-for="user in users" :key="user.id">{{ user.id }}|{{ user.name }} {{ user.lastname }}</option>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Ubicación de la empresa:</label>
                                <div class="col-md-9">
                                    <select id="id_ubicacion" name="id_ubicacion" v-model="id_ubicacion" class="form-control" placeholder="Ubicacion" required>
                                        <option v-for="ubic in ubics" :key="ubic.id">{{ ubic.id }}|{{ ubic.estado }} {{ ubic.municipio }}</option>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Categoría de la empresa:</label>
                                <div class="col-md-9">
                                    <select id="id_categoria" name="id_categoria" v-model="id_categoria" class="form-control" placeholder="Categoría" required>
                                        <option v-for="cat in cats" :key="cat.id">{{ cat.id }}|{{ cat.nombre }}</option>
                                    </select>                                    
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
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
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Empresa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar la empresa?</h5>

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
                nombre:"", 
                telefono:"",  
                descripcion:"",
                id_usuario:"",
                id_ubicacion:"", 
                id_categoria:"",
                emps:[],
                usuario:"",
                update: 0,
                users:[],
                ubics:[],
                cats:[],
                id_empresa: 0,
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './empresas' //url que retorna los registros de la tabla empresas
            axios.get(url).then(function (response) {
                me.emps = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './usuariosadmin' //url que retorna los registros de la tabla usuarios
            axios.get(url).then(function (response) {
                me.users = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './ubicacion' //url que retorna los registros de la tabla ubicaciones
            axios.get(url).then(function (response) {
                me.ubics = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './categoriase' //url que retorna los registros de la tabla categorias de empresas
            axios.get(url).then(function (response) {
                me.cats = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            //mostrar modal
            mostrarModalCreate() {
                //Se limpian los campos del modal
                this.nombre = '';
                this.telefono = '';
                this.descripcion = '';
                this.id_usuario = '';
                this.id_ubicacion = '';
                this.id_categoria = '';
                $('#modalNewEmpresa').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteProducto').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            newEmpresa() {
                //se toman los parametros de los campos
                let usuarioa = this.id_usuario.split("|");
                let ubicacion = this.id_ubicacion.split("|");
                let categoria = this.id_categoria.split("|");
                const params = {
                    nombre: this.nombre,
                    telefono: this.telefono,
                    descripcion: this.descripcion,
                    id_usuario: usuarioa[0],
                    id_ubicacion: ubicacion[0],
                    id_categoria: categoria[0]
                };
                //Se limpian los campos del modal
                this.nombre = '';
                this.telefono = '';
                this.descripcion = '';
                this.id_usuario = '';
                this.id_ubicacion = '';
                this.id_categoria = '';

                //se hace un request post con el url /empresas para que con su respuesta se realice la insercion
                axios.post('./empresas', params)
                    .then((response) => {
                        let emp = response.data;
                        this.id_empresa = emp.id;
                        const params = {//parametros para el nuevo micrositio
                            nombre: emp.nombre,
                            id_empresa: this.id_empresa
                        };
                        //se hace un request post con el url /micrositios para que con su respuesta se realice la insercion a la tabla micrositios y asi se cree un nuevo micrositio a la empresa registrada
                        axios.post('./micrositios', params)
                            .then((response) => {
                                const emp = response.data;
                        });
                        //una vez hecha se realiza nuevamente una actualizacion del array emps para actualizar el componente que los muestra
                        this.reloadData();
                    });
                //Ocultar el modal
                $('#modalNewEmpresa').modal('hide');
            },
            //Metodo para actualizar los datos de un usuario.
            updateEmpresa(){
                let me = this;
                let usuarioa = this.id_usuario.split("|");
                let ubicacion = this.id_ubicacion.split("|");
                let categoria = this.id_categoria.split("|");
                axios.put('./empresas',{
                    'id' : this.update,
                    'nombre' : this.nombre,
                    'telefono' : this.telefono,
                    'descripcion' : this.descripcion,
                    'id_usuario' : usuarioa[0],
                    'id_ubicacion' : ubicacion[0],
                    'id_categoria' : categoria[0],
                }).then(function (response){
                    //Cerrando el modal después de actualizar el usuario.
                    $('#modalUpdateEmpresa').modal('hide');
                }).catch(function (error){
                    console.log(error);
                });
                this.reloadData();
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdateEmpresa').modal('show');
                this.update = data.id;
                let me = this;
                let url = './empresas/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.telefono = response.data.telefono;
                    me.descripcion = response.data.descripcion;
                    me.id_usuario = "";
                    me.id_ubicacion = "";
                    me.id_categoria = "";
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./empresas/'+this.id_borrar).then(() => {
                    this.reloadData();
                });
                $('#modalDeleteProducto').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './empresas' //url que retorna los registros de la tabla users
                axios.get(url).then(function (response) {
                    me.emps = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                url = './usuariosadmin' //url que retorna los registros de la tabla usuarios
                axios.get(url).then(function (response) {
                    me.users = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            
        }
    }
</script>