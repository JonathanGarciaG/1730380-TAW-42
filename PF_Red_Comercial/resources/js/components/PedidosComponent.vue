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
                        <div>Lista de Pedidos
                        </div>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Pedidos de productos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Precio por unidad</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Monto total</th>
                                    <th class="text-center">Empresa / Tienda</th>
                                    <th class="text-center">Eliminar</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="prod in prods" :key="prod.id">
                                    <td><img width="100px" height="100px" v-bind:src="'.'+prod.imagen" alt=""></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ prod.nombre }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.tipo }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.codigo }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>${{ prod.precio }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.cantidad }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>${{ prod.monto }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.nombre_empresa }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(prod)">Eliminar</button>
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

                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Pedidos de productos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Precio por unidad</th>
                                    <th class="text-center">Cantidad</th>
                                    <th class="text-center">Monto total</th>
                                    <th class="text-center">Empresa / Tienda</th>
                                    <th class="text-center">Eliminar</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="prod in prods" :key="prod.id">
                                    <td><img width="100px" height="100px" v-bind:src="'.'+prod.imagen" alt=""></td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ prod.nombre }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.tipo }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.codigo }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>${{ prod.precio }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.cantidad }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>${{ prod.monto }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ prod.nombre_empresa }}</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="Popover" class="btn btn-danger btn-sm" v-on:click="mostrarModalDelete(prod)">Eliminar</button>
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

        </div>
    </div>
</template>

<script>
    export default {
        //datos de los campos
        data(){
            return{
                nombre:"", 
                tipo:"",  
                codigo:"",
                precio:"",
                stock:"", 
                longitud:"",
                anchura:"",
                altura:"",
                id_empresa:"",
                id_categoria:"",
                altura:"",
                update: 0,
                prods:[],
                emps:[],
                cats:[],
                imagen:"",
                id_producto: 0,
                id_borrar: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './pedidos' //url que retorna los registros de la tabla empresas
            axios.get(url).then(function (response) {
                me.prods = response.data;
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
            //Metodo para agregar un nuevo usuario
            newProducto() {
                //se toman los parametros de los campos
                let categoria = this.id_categoria.split("|");
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
                    id_empresa: this.emps[0].id,
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

                //se hace un request post con el url /empresas para que con su respuesta se realice la insercion
                axios.post('./productos', params)
                    .then((response) => {
                        const prod = response.data;
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
                        let url = './productos' //url que retorna los registros de la tabla empresas
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
                let url = './productos' //url que retorna los registros de la tabla empresas
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
