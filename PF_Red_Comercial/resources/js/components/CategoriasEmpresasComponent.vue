<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-boxes">
                            </i>
                        </div>
                        <div>Lista de Categorías de Empresas
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Categorias de Empresas
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre de Categoría</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="cat in cats" :key="cat.id">
                                    <td class="text-center text-muted">{{ cat.id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">                                  
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ cat.nombre }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm" v-on:click="camposUpdate(cat)">Editar</button>
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(cat)">Eliminar</button>
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
            <div class="modal fade" id="modalNewCategoria"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newCategoria() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="newCategoria()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nueva Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newCategoria -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Categoría:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de Categoría</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Categoría</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->


            <!--Inicio del modal editar-->
            <div class="modal fade" id="modalUpdateCategoria"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo updateCategoria() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="updateCategoria()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newCategoria -->
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre de Categoria:</label>
                                <div class="col-md-9">
                                    <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Nombre" required>
                                    <span class="help-block">(*) Ingrese el Nombre de la Categoría</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal eliminar-->
            <div class="modal fade" id="modalDeleteCategoria"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo onClickDelete para eliminar la categoria -->
                    <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar la Categoría?</h5>

                            <!-- Se utiliza un input oculto para tomar el id de categoria que se va a borrar -->
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
                cats:[],
                update: 0,
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './categoriase' //url que retorna los registros de la tabla empresas
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
                this.id_borrar = '';
                $('#modalNewCategoria').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteCategoria').modal('show');               
            },
            //Metodo para agregar un nueva categoria
            newCategoria() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre
                };
                //Se limpian los campos del modal
                this.nombre = '';
                this.id_borrar = '';

                //se hace un request post con el url /categoriase para que con su respuesta se realice la insercion
                axios.post('./categoriase', params)
                    .then((response) => {
                        const prod = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array emps para actualizar el componente que los muestra
                        this.reloadData();
                    });
                //Ocultar el modal
                $('#modalNewCategoria').modal('hide');
            },
            //Metodo para actualizar los datos de un usuario.
            updateCategoria(){
                let me = this;
                axios.put('./categoriase',{
                    'id' : this.update,
                    'nombre' : this.nombre,
                }).then(function (response){
                    //Cerrando el modal después de actualizar la categoria.
                    $('#modalUpdateCategoria').modal('hide');
                }).catch(function (error){
                    console.log(error);
                });
                this.reloadData();
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar una categoria
            camposUpdate(data){
                //se abre el modal para actualizar categoria
                $('#modalUpdateCategoria').modal('show');
                this.update = data.id;
                let me = this;
                let url = './categoriase/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./categoriase/'+this.id_borrar).then(() => {
                    this.reloadData();
                });
                $('#modalDeleteCategoria').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './categoriase' //url que retorna los registros de la tabla categorias
                axios.get(url).then(function (response) {
                    me.cats = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }

            
        }
    }
</script>
