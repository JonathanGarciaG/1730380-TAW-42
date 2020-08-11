<!-- Componente para mostrar los productos en el micrositio de la empresa -->
<template>
    <div class="row">
        <div class="col-md-4" v-for="prod in prods" :key="prod.id">
            <div class="main-card mb-3 card"><img width="300" height="300" v-bind:src="'.'+prod.imagen" alt="Card image cap" class="card-img-top">
                <div class="card-body"><h5 class="card-title">{{ prod.nombre }}</h5><h6 class="card-subtitle">${{ prod.precio }} ({{ prod.stock }})</h6> {{ prod.descripcion }}   
                </div>
                <div class="card-footer"><button class="btn btn-secondary" v-on:click="verProducto(prod)"  data-toggle="modal">Ver</button></div>
            </div>
        </div>

        <!-- Modal: modalProductView -->
    <div class="modal fade" id="modalProductView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false" aria-hidden="true" style="top: 60px;">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-5">
                <!--Carousel Wrapper-->
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                  data-ride="carousel">
                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                      <img class="d-block w-100"
                        v-bind:src="'.'+this.imagen"
                        alt="First slide">
                    </div>
                  </div>
                  <!--/.Slides-->
                  <!--Controls-->
                  <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                  
                </div>
                <!--/.Carousel Wrapper-->
              </div>
              <div class="col-lg-7">
                <h2 class="h2-responsive product-name" v-model="nombre_producto">
                  <strong>{{ this.nombre_producto }}</strong>
                </h2>
                <h4 class="h4-responsive">
                  <span class="green-text">
                    <strong>${{ this.precio }}</strong>
                  </span>
                  <span class="grey-text">
                    <small>
                      ({{ this.stock }} disponibles)
                    </small>
                  </span>
                </h4>

                <h4 class="h4-responsive">
                  <span class="green-text">
                    <strong>Categoria:</strong>
                  </span>
                  <span class="grey-text">
                    <small>
                      {{ this.categoria }}
                    </small>
                  </span>
                </h4>
    
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
    
                  <!-- Accordion card -->
                  <div class="card">
    
                    <!-- Card header -->
                    <div class="card-header" role="tab" id="headingOne1">
                      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1">
                        <h5 class="mb-0" v-model="descripcion">
                          Descripción <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                      </a>
                    </div>
    
                    <!-- Card body -->
                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                      data-parent="#accordionEx">
                      <div class="card-body">
                        {{ this.descripcion }}
                      </div>
                    </div>
    
                  </div>
                  <!-- Accordion card -->
    
                </div>
                <!-- Accordion wrapper -->
    
    
                <!-- Add to Cart -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
    
                      <input type="number" id="quantity" name="quantity" min="1" :max="this.stock" value="1" v-model="cantidad">
                      <label>Selecciona cantidad</label>
    
                    </div>
                    <div class="col-md-6">
    
                      
    
                    </div>
                  </div>
                  <div class="text-center">
    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="" v-on:submit.prevent="newPedido()" enctype="multipart/form-data" class="form-horizontal">
                    <button class="btn btn-primary" type="submit" v-if="sesion == 'si'">Añadir a Pedidos
                      <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-primary" type="submit" v-if="sesion == 'no'" disabled>Añadir a Pedidos
                      <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                    </button>
                    <label v-if="sesion == 'no'">Debe estar registrado para realizar un pedido</label>
                    </form>
                  </div>
                </div>
                <!-- /.Add to Cart -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
</template>

<script>
    export default {
        props: {
            id_empresa: Number,
        },
        //datos de los campos
        data(){
            return{
                producto:[],
                nombre:"",
                nombre_producto:"",
                tipo:"",
                precio:0,
                descripcion:"",
                stock:"",
                imagen:"",
                categoria:"",
                cantidad:0,
                id_producto:0,
                images:[],
                prods:[],
                sesion:""
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array productos con los registros de la base de datos
            let me = this;
            let url = './productos' //el url de productos que devuelve los registros de la base de datos
            if(me.id_empresa == 0){
                axios.get(url).then(function (response) {
                    //se almacenan al array los datos de la respuesta obtenida del url
                    me.prods = response.data;
                    me.nombre = me.prods[0].nombre_empresa;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }else{
                url = './getproductos/'+me.id_empresa;
                axios.get(url).then(function (response) {
                    //se almacenan al array los datos de la respuesta obtenida del url
                    me.prods = response.data;
                    me.nombre = me.prods[0].nombre_empresa;
                })
                .catch(function (error) {
                    console.log(error);
                });
            } 

            url = './sesion' //url para comprobar si hay una sesion
            axios.get(url).then(function (response) {
                    //se almacenan la respuesta obtenida del url
                    me.sesion = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

            console.log('ID de la empresa prodcomp: '+me.id_empresa);
        },
        //metodos utilizados
        methods: {
            verProducto(data){
                this.update = data.id;
                let me = this;
                let url = './productos/'+me.update;
                axios.get(url).then(function (response){
                    me.nombre_producto = response.data[0].nombre;
                    me.tipo = response.data[0].tipo;
                    me.precio = response.data[0].precio;
                    me.descripcion = response.data[0].descripcion;
                    me.stock = response.data[0].stock;
                    me.categoria = response.data[0].nombre_categoria;
                    me.imagen = response.data[0].imagen;
                    me.id_producto = response.data[0].id;
                    //se abre el modal para visualizar producto
                    $('#modalProductView').modal('show');
                }).catch(function (error){
                    console.log(error);
                });
            },
            newPedido() {
                //se toman los parametros de los campos
                const params = {
                    cantidad: this.cantidad,
                    precio: this.precio,
                    id_producto: this.id_producto
                };
                //se valida que no sea una cantidad nula
                if(this.cantidad != 0){
                  let me = this;
                  //se hace un request post con el url /pedidos para que con su respuesta se realice la insercion
                  axios.post('./pedidos', params)
                      .then((response) => {
                          const prod = response.data;
                          console.log('Se ha añadido un nuevo pedido');
                          me.reloadData();
                          //Ocultar el modal
                          $('#modalProductView').modal('hide');
                          swal("Producto añadido", "Se ha añadido el producto a su Pedido", "info");
                      }); 
                }
            },
            reloadData() {
                let me = this;
                let url = './productos' //el url de productos que devuelve los registros de la base de datos
                if(me.id_empresa == 0){
                    axios.get(url).then(function (response) {
                        //se almacenan al array los datos de la respuesta obtenida del url
                        me.prods = response.data;
                        me.nombre = me.prods[0].nombre_empresa;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }else{
                    url = './getproductos/'+me.id_empresa;
                    axios.get(url).then(function (response) {
                        //se almacenan al array los datos de la respuesta obtenida del url
                        me.prods = response.data;
                        me.nombre = me.prods[0].nombre_empresa;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                } 
            }
        }
    }
</script>