<template>
    <!-- Componente que muestra el panel de pedidos para confirmar o rechazar un pedido -->
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
                <div class="col-md-7">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Tus Pedidos de productos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <!-- Aqui se inserta una tabla de contenido con los productos añadidos al pedido -->
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
                        
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="main-card mb-3 card">
                        <div class="card-header"> Totales
                        </div>
                        <div class="table-responsive" style="margin-left: 15px; margin-top: 10px; margin-bottom: 10px;">
                            <h3>Cantidad de productos: {{ this.cantidad_productos }}</h3>
                            <hr>
                            <h3>Total a pagar: ${{ this.total }}</h3>
                            <hr>
                            <input type="checkbox" id="mail" name="mail" value="mail">
                            <label for="vehicle1">   Enviar a correo electrónico</label><br>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button v-if="cantidad_productos == 0" class="btn-wide btn btn-success" v-on:click="mostrarModalVerificar()" disabled>Realizar Pedido</button>
                            <button v-if="cantidad_productos > 0" class="btn-wide btn btn-success" v-on:click="mostrarModalVerificar()">Realizar Pedido</button>
                        </div>
                    </div>
                </div>    
            </div>

            <!--Inicio del modal eliminar-->
            <div class="modal fade" id="modalDeletePedido"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo onClickDelete() para eliminar el pedido seleccionado -->
                    <form action="" v-on:submit.prevent="onClickDelete()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Eliminar Pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea eliminar el pedido?</h5>

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

            <!--Inicio del modal Confirmar pedido-->
            <div class="modal fade" id="modalConfirmar"tabindex="2" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="false" style="top: 60px;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <!-- al completar el form utiliza el metodo newPedido() para registrar el pedido del cliente -->
                    <form action="" v-on:submit.prevent="newPedido()" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-header">
                            <h5 class="modal-title"  id="exampleModalLongTitle">Confirmar pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h5>¿Está seguro que desea realizar el pedido?</h5>

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
                cantidad_productos:0,
                total:0,
                id_producto: 0,
                id_borrar: 0,
                cantidad_producto_eliminar:0
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './pedidos' //url que retorna los registros de la tabla pedidos, aqui se obtienen los pedidos del usuario actual
            axios.get(url).then(function (response) {
                me.prods = response.data;
                //se sacan los totales
                for(let i = 0; i < me.prods.length; i++){
                    me.cantidad_productos = me.cantidad_productos + me.prods[i].cantidad;
                    me.total = me.total + (me.prods[i].precio * me.prods[i].cantidad);
                    console.log(me.cantidad_productos+" "+me.total);
                }
              })
            .catch(function (error) {
                console.log(error);
            });

        },
        //metodos utilizados
        methods: {
            //mostrar modal
            mostrarModalVerificar() {
                $('#modalConfirmar').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id_pedido;
                this.cantidad_producto_eliminar = data.cantidad;
                $('#modalDeletePedido').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            newPedido() {
                //se toman los parametros de los campos
                const params = {
                    nombre: this.nombre,
                    monto: this.total,
                    metodo_pago: "Tarjeta",
                    motivo_pago: "Pedido",
                };

                let me = this;
                //se hace un request post con el url /empresas para que con su respuesta se realice la insercion
                axios.post('./historial', params)
                    .then((response) => {
                        const prod = response.data;
                        me.reloadData();
                        swal("Exito!", "Se ha realizado el pedido exitosamente", "success");
                    });
                //Ocultar el modal
                $('#modalConfirmar').modal('hide');
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./pedidos/'+this.id_borrar).then(() => {
                    this.reloadData();
                    swal("Producto eliminado", "Se ha eliminado el producto de su pedido", "info");
                });
                $('#modalDeletePedido').modal('hide');
            },
            //metodo para actualizar los datos de pedidos
            reloadData(){
                let me = this;
                me.cantidad_productos = 0;
                me.total = 0;
                let url = './pedidos' //url que retorna los registros de la tabla pedidos, aqui se obtienen los pedidos del usuario actual
                axios.get(url).then(function (response) {
                    me.prods = response.data;
                    //se sacan los totales
                    for(let i = 0; i < me.prods.length; i++){
                        me.cantidad_productos = me.cantidad_productos + me.prods[i].cantidad;
                        me.total = me.total + (me.prods[i].precio * me.prods[i].cantidad);
                        console.log(me.cantidad_productos+" "+me.total);
                    }
                  })
            .catch(function (error) {
                console.log(error);
            });
            }
            
        }
    }
</script>
