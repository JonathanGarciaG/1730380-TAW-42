<template>
<!-- Compoente para agregar, editar y eliminar las ubicaciones de las empresas -->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-boxes">
                            </i>
                        </div>
                        <div>Lista de Ubicaciones de empresa
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Ubicaciones de empresa
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Estado</th>
                                    <th>Municipio / Ciudad</th>
                                    <th>Dirección</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="ubic in ubics" :key="ubic.id">
                                    <td class="text-center text-muted">{{ ubic.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">                                  
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ ubic.estado }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ ubic.municipio }}</td>
                                    <td>{{ ubic.direccion }}</td>
                                    
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm" v-on:click="camposUpdate(ubic)">Editar</button>
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(ubic)">Eliminar</button>
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
            <div class="modal fade" id="modalNewUbicacion"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newUbicacion() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="newUbicacion()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nueva Ubicacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newUbicacion -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Estado:</label>
                                <div class="col-md-9">
                                    <input type="text" id="estado" name="estado" v-model="estado" class="form-control" placeholder="Estado" required>
                                    <span class="help-block">(*) Ingrese el Nombre del Estado</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Municipio/Ciudad:</label>
                                <div class="col-md-9">
                                    <input type="text" id="municipio" name="municipio" v-model="municipio" class="form-control" placeholder="Municipio" required>
                                    <span class="help-block">(*) Ingrese el Municipio o Ciudad</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Dirección:</label>
                                <div class="col-md-9">
                                    <input type="text" id="direccion" name="direccion" v-model="direccion" class="form-control" placeholder="Dirección" required>
                                    <span class="help-block">(*) Ingrese una Dirección de empresa</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Ubicacion</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->


            <!--Inicio del modal editar-->
            <div class="modal fade" id="modalUpdateUbicacion"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateUbicacion() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="updateUbicacion()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar Ubicacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de updateUbicacion -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Estado:</label>
                                <div class="col-md-9">
                                    <input type="text" id="estado" name="estado" v-model="estado" class="form-control" placeholder="Estado" required>
                                    <span class="help-block">(*) Ingrese el Nombre del Estado</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Municipio/Ciudad:</label>
                                <div class="col-md-9">
                                    <input type="text" id="municipio" name="municipio" v-model="municipio" class="form-control" placeholder="Municipio" required>
                                    <span class="help-block">(*) Ingrese el Municipio o Ciudad</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Dirección:</label>
                                <div class="col-md-9">
                                    <input type="text" id="direccion" name="direccion" v-model="direccion" class="form-control" placeholder="Dirección" required>
                                    <span class="help-block">(*) Ingrese una Dirección de empresa</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Ubicacion</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal eliminar-->
            <div class="modal fade" id="modalDeleteUbicacion"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo onClickDelete para eliminar la ubicacion -->
                    <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Ubicacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar la Ubicacion?</h5>

                            <!-- Se utiliza un input oculto para tomar el id de la ubicacion que se va a borrar -->
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
                estado:"",
                municipio:"",
                direccion:"",
                ubics:[],
                update: 0,
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './ubicacion' //url que retorna los registros de la tabla ubicacion de productos
            axios.get(url).then(function (response) {
                me.ubics = response.data;
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
                this.estado = '';
                this.municipio = '';
                this.direccion = '';
                this.id_borrar = '';
                $('#modalNewUbicacion').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteUbicacion').modal('show');               
            },
            //Metodo para agregar un nueva ubicacion
            newUbicacion() {
                //se toman los parametros de los campos
                const params = {
                    estado: this.estado,
                    municipio: this.municipio,
                    direccion: this.direccion
                };
                //Se limpian los campos del modal
                this.estado = '';
                this.municipio = '';
                this.direccion = '';
                this.id_borrar = '';

                //se hace un request post con el url /ubicacion para que con su respuesta se realice la insercion
                axios.post('./ubicacion', params)
                    .then((response) => {
                        const prod = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array ubics para actualizar el componente que los muestra
                        this.reloadData();
                    });
                //Ocultar el modal
                $('#modalNewUbicacion').modal('hide');
                swal("Exito!", "Se ha agregado una nueva Ubicación!", "success");
            },
            //Metodo para actualizar los datos de una ubicacion.
            updateUbicacion(){
                let me = this;
                axios.put('./ubicacion',{
                    'id' : this.update,
                    'estado' : this.estado,
                    'municipio' : this.municipio,
                    'direccion' : this.direccion,
                }).then(function (response){
                    //Cerrando el modal después de actualizar la ubicacion.
                    $('#modalUpdateUbicacion').modal('hide');
                    swal("Exito!", "Se ha modificado la Ubicación!", "info");
                }).catch(function (error){
                    console.log(error);
                });
                this.reloadData();
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar una ubicacion
            camposUpdate(data){
                //se abre el modal para actualizar categoria
                $('#modalUpdateUbicacion').modal('show');
                this.update = data.id;
                let me = this;
                let url = './ubicacion/'+this.update;
                axios.get(url).then(function (response){
                    me.estado = response.data.estado;
                    me.municipio = response.data.municipio;
                    me.direccion = response.data.direccion;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./ubicacion/'+this.id_borrar).then(() => {
                    this.reloadData();
                    swal("Ubicación eliminada", "Se ha eliminado la Ubicación exitosamente!", "info");
                });
                $('#modalDeleteUbicacion').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './ubicacion' //url que retorna los registros de la tabla ubicacion
                axios.get(url).then(function (response) {
                    me.ubics = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

        }
    }
</script>