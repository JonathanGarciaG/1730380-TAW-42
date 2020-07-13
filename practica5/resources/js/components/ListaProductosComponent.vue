<template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Categorías
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalNuevo">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" id="opcion" name="opcion">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                    </select>
                                    <input type="text" id="texto" name="texto" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Codigo</th>
                                    <th>Nombre de producto</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <producto-component v-for="producto in productos" :key="producto.id" :producto="producto"></producto-component>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#">Ant</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                    <form action="" v-on:submit.prevent="newProducto()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar categoría</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <!-- En el formulario en la etiquetas input se utiliza la propiedad v-model que sirve para dar nombre al campo que tiene el valor que se tomara en los metodos de newProducto -->
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Codigo</label>
                                    <div class="col-md-9">
                                        <input type="text" id="codigo" name="codigo" v-model="codigo_producto" class="form-control" placeholder="Codigo" required>
                                        <span class="help-block">(*) Ingrese el codigo del Producto</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Nombre de producto</label>
                                    <div class="col-md-9">
                                        <input type="text" id="nombre" name="nombre" v-model="nombre_producto" class="form-control" placeholder="Nombre de producto" required>
                                    <span class="help-block">(*) Ingrese el nombre del Producto</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                                    <div class="col-md-9">
                                        <input type="number" id="precio" name="precio" v-model="precio_producto" class="form-control" placeholder="Precio del producto" required>
                                    <span class="help-block">(*) Ingrese el precio del producto</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Stock</label>
                                    <div class="col-md-9">
                                        <input type="number" id="stock" name="stock" v-model="stock" class="form-control" placeholder="Stock" required>
                                    <span class="help-block">(*) Ingrese el numero de stock del Producto</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="categoria" v-model="categoria" required>
                                            <option value="Categoría 1">Categoría 1</option>
                                            <option value="Categoría 2">Categoría 2</option>
                                            <option value="Categoría 3">Categoría 3</option>
                                        </select>
                                    <span class="help-block">(*) Seleccione la categoría del Producto</span>
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
            <!-- Inicio del modal Eliminar -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Eliminar Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Estas seguro de eliminar la categoría?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- Fin del modal Eliminar -->
        </main>
        <!-- /Fin del contenido principal -->
</template>



<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array productos con los registros de la base de datos
            let me = this;
            let url = '/productos' //el url de productos que devuelve los registros de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.productos = response.data;
            })
            .catch(function (error) {
                console.log(error);
                console.log('fallo');
            });
        },
        //datos de los campos
        data(){
            return{
                codigo_producto:"", 
                nombre_producto:"", 
                precio_producto:"", 
                stock:"", 
                categoria:"", 
                productos:[]
            }
        },
        //metodos utilizados
        methods: {
            //Metodo para agregar un nuevo producto
            newProducto() {
                //se toman los parametros de los campos
                const params = {
                    codigo_producto: this.codigo_producto,
                    nombre_producto: this.nombre_producto,
                    precio_producto: this.precio_producto,
                    stock: this.stock,
                    categoria: this.categoria
                };
                //Se limpian los campos del modal
                this.codigo_producto = '';
                this.nombre_producto = '';
                this.precio_producto = '';
                this.stock = '';
                this.categoria = '';

                //se hace un request post con el url /productos para que con su respuesta se realice la insercion
                axios.post('/productos', params)
                    .then((response) => {
                        const producto = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array productos para actualizar el componente que los muestra
                        let me = this;
                        let url = '/productos' //url que retorna los registros de la tabla productos
                        axios.get(url).then(function (response) {
                            me.productos = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });
                //Ocultar el modal
                $('#modalNuevo').modal('hide');
                $('.modal-backdrop').remove();
            }
        }
    }
</script>