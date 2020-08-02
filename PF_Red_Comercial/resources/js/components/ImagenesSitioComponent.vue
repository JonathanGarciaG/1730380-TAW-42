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
                        <div>Imagenes de Carousel Micrositio
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Imagenes de Carousel Micrositio
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Imagen</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="img in imgs" :key="img.id">
                                    <td class="text-center text-muted">{{ img.id }}</td>
                                    <td><img width="100px" height="100px" :src="img.imagen" alt=""></td>
                                    <td class="text-center">
                                        <div>{{ img.descripcion }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm" v-on:click="camposUpdate(img)">Editar</button>
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(img)">Eliminar</button>
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
            <div class="modal fade" id="modalNew"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo new() para agregar los datos de empresa -->
                    <form action="" v-on:submit.prevent="newImg()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Agregar Nuevo Imagen al Carousel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de new -->

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Imagen:</label>
                                <div class="col-md-9">
                                    <input type="file" id="files" ref="files" @change="handleFilesUpload" required />
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Descripción (Opcional):</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="descripcion" name="descripcion" v-model="descripcion" class="form-control" placeholder="Descripción"></textarea>                                 
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar Imagen</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->


            <!--Inicio del modal editar-->
            <div class="modal fade" id="modalUpdate"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo update() para agregar los datos de imagen -->
                    <form action="" v-on:submit.prevent="update()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Editar Imagen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de update -->
                            <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de new -->

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Imagen:</label>
                                <div class="col-md-9">
                                    <input type="file" id="files" ref="files" @change="handleFilesUpload"/>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Descripción:</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="descripcion" name="descripcion" v-model="descripcion" class="form-control" placeholder="Descripción" required></textarea>                                 
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                        </div>
                    </form> 
                    </div>
                </div>
            </div>
            <!--Fin del modal-->

            <!--Inicio del modal eliminar-->
            <div class="modal fade" id="modalDelete"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo onClickDelete() para borrar el registro -->
                    <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">


                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Imagen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar la imagen?</h5>

                            <!-- Se utiliza un input oculto para tomar el id de la imagen que se va a borrar -->
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
                descripcion:"",
                imagen:"",
                imgs:[],
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './imagenes_sitio' //url que retorna los registros de la tabla imagenes_micrositio
            axios.get(url).then(function (response) {
                me.imgs = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './categoriasp' //url que retorna los registros de la tabla usuarios
            axios.get(url).then(function (response) {
                me.cats = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './getempresas' //url que retorna los registros de la tabla empresas
            axios.get(url).then(function (response) {
                me.emps = response.data;
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
                this.tipo = '';
                this.codigo = '';
                this.precio = '';
                this.descripcion = '';
                this.stock = '';
                this.longitud = '';
                this.anchura = '';
                this.altura = '';
                this.id_categoria = '';
                $('#modalNewProducto').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteProducto').modal('show');               
            },
            //Metodo para agregar un nuevo producto
            newProducto() {
                //se toman los parametros de los campos
                let categoria = this.id_categoria.split("|");
                let empresa = this.id_empresa.split("|");
                const params = {
                    nombre: this.nombre,
                    tipo: this.tipo,
                    codigo: this.codigo,
                    precio: this.precio,
                    descripcion: this.descripcion,
                    stock: this.stock,
                    longitud: this.longitud,
                    anchura: this.anchura,
                    altura: this.altura,
                    id_empresa: empresa[0],
                    id_categoria: categoria[0]
                };
                //Se limpian los campos del modal
                this.nombre = '';
                this.tipo = '';
                this.codigo = '';
                this.precio = '';
                this.descripcion = '';
                this.stock = '';
                this.longitud = '';
                this.anchura = '';
                this.altura = '';
                this.id_categoria = '';
                this.id_empresa = '';

                //se hace un request post con el url /empresas para que con su respuesta se realice la insercion
                axios.post('./productos', params)
                    .then((response) => {
                        let prod = response.data;
                        console.log(prod.id);
                        this.id_producto = prod.id;
                        console.log('id producto: '+this.id_producto);
                        
                        let formData = new FormData();
                        formData.append('id_producto', this.id_producto);
                        formData.append('imagen', this.imagen);
                        
                        //Petición post para registrar nueva imagen.
                        axios.post('./imagenes_productos', formData,{
                             headers: {
                            'Content-Type': 'multipart/form-data'
                            }
                        }).then(function (response){
                            console.log(response);
                        })
                        .catch(function (error){
                            console.log(error);
                        });
                        //Actualizando la lista de productos.
                        let me = this;
                        let url = './productosall' //url que retorna los registros de la tabla empresas
                        axios.get(url).then(function (response) {
                            me.prods = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });
                //Ocultar el modal
                $('#modalNewProducto').modal('hide');
            },
            //Metodo para actualizar los datos de un usuario.
            updateProducto(){
                let me = this;
                let categoria = this.id_categoria.split("|");
                let empresa = this.id_empresa.split("|");
                axios.put('./productos',{
                    'id' : this.update,
                    'nombre' : this.nombre,
                    'tipo' : this.tipo,
                    'codigo' : this.codigo,
                    'precio' : this.precio,
                    'descripcion' : this.descripcion,
                    'stock' : this.stock,
                    'longitud' : this.longitud,
                    'anchura' : this.anchura,
                    'altura' : this.altura,
                    'id_empresa' : empresa[0],
                    'id_categoria' : categoria[0],
                }).then(function (response){
                    //Cerrando el modal después de actualizar el usuario.
                    $('#modalUpdateProducto').modal('hide');
                }).catch(function (error){
                    console.log(error);
                });
                this.reloadData();
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar un usuario.
            camposUpdate(data){
                //se abre el modal para actualizar producto
                $('#modalUpdateProducto').modal('show');
                this.update = data.id;
                let me = this;
                let url = './productos/'+this.update;
                axios.get(url).then(function (response){
                    me.nombre = response.data.nombre;
                    me.tipo = response.data.tipo;
                    me.codigo = response.data.codigo;
                    me.precio = response.data.precio;
                    me.descripcion = response.data.descripcion;
                    me.stock = response.data.stock;
                    me.longitud = response.data.longitud;
                    me.anchura = response.data.anchura;
                    me.altura = response.data.altura;
                    me.id_empresa = "";
                    me.id_categoria = "";
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./productos/'+this.id_borrar).then(() => {
                    this.reloadData();
                });
                $('#modalDeleteProducto').modal('hide');
            },
            //actualizar registros
            reloadData(){
                let me = this;
                let url = './productosall' //url que retorna los registros de la tabla empresas
                axios.get(url).then(function (response) {
                    me.prods = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            handleFilesUpload(e){
                let file = e.target.files[0];
                console.log(file);
                this.imagen = file;
                console.log(this.imagen);
            }
            
        }
    }
</script>
