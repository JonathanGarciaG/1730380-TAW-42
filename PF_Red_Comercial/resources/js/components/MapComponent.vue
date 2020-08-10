<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-map-marker-alt">
                            </i>
                        </div>
                        <div>Mapa
                            <div class="page-title-subheading">Buscar una empresa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row">
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="search-wrapper">
                                <div class="input-holder">
                                    <input type="text" class="search-input" placeholder="Buscar empresa/producto. (Ejemplo: Papeleria)" @input="reloadData" v-model="buscar">
                                    <button class="search-icon"><span></span></button>
                                </div>
                                <button class="close"></button>
                            </div>

                            <!-- Tabla de resultados de los productos encontrados -->
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover" v-if="cantidad_productos > 0"> 
                                <thead>
                                    <th>Productos</th>
                                </thead>                    
                                <tbody>
                                <tr v-for="prod in prods" :key="prod.id">
                                    <td class="text-center text-muted">{{ prod.id }}</td>
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
                                        <div>${{ prod.precio }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>({{ prod.stock }})</div>
                                    </td>
                                    </td>
                                        <a class="btn btn-primary center" v-bind:href="'micrositiov?id='+prod.id_empresa" width="100%" height="100%">Visitar sitio</a>
                                    </td>
                                    </td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Empresa<br>{{ prod.nombre_empresa }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                        <a class="btn btn-primary center" @click="toggleInfoWindow(prod)" style="color: white;" width="100%" height="100%">Centrar marcador</a>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>

                            <!-- Tabla de resultados de las empresas encontradas -->
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover" v-if="cantidad_empresas > 0"> 
                                <thead>
                                    <th>Empresas</th>
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
                                    </td>
                                        <a class="btn btn-primary center" v-bind:href="'micrositiov?id='+emp.id" width="100%" height="100%">Visitar sitio</a>
                                    </td>
                                    </td>
                                        <a class="btn btn-primary center" @click="toggleInfoWindow2(emp)" style="color: white;" height="100%">Centrar marcador</a>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="card-title">Google Maps</div>
                            <GmapMap ref="mapRef" :center="{lat: 24.40, lng: -101.767536}" :zoom="6" style="width: 100%; height: 500px">
                            <GmapMarker
                                :key="m.id"
                                v-for="m in prods"
                                :position="{lat: m.latitud , lng: m.longitud}"
                                :clickable="true"
                                :draggable="false"
                                @click="toggleInfoWindow(m)"
                              />

                            <GmapMarker
                                :key="m.id"
                                v-for="m in emps"
                                :position="{lat: m.latitud , lng: m.longitud}"
                                :clickable="true"
                                :draggable="false"
                                @click="toggleInfoWindow(m)"
                              />
                            <gmap-info-window
                            :options="infoOptions"
                            :position="infoWindowPos"
                            :opened="infoWinOpen"
                            @closeclick="infoWinOpen=false">
                            <div v-html="infoContent"></div>
                          </gmap-info-window>
                            </GmapMap>
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
                    buscar: "",
                    prods:[],
                    emps:[],
                    markers:[],
                    cantidad_productos: 0,
                    cantidad_empresas: 0,
                    infoContent: '',
                    infoWindowPos: {
                      lat: 0,
                      lng: 0
                    },
                    infoWinOpen: false,
                    currentMidx: null,
                    fullscreenControl:false,
                    infoOptions: {
                      pixelOffset: {
                        width: 0,
                        height: -35
                      }
                    }
              }
        },
        mounted () {
          // At this point, the child GmapMap has been mounted, but
          // its map has not been initialized.
          // Therefore we need to write mapRef.$mapPromise.then(() => ...)
        
          this.$refs.mapRef.$mapPromise.then((map) => {
            map.panTo({lat: 24.40, lng: -101.767536})
          })
        },
        methods: {
            //actualizar registros
            reloadData(){
                console.log('input');
                let me = this;

                me.prods = [];
                
                if(me.buscar == ""){
                    me.prods = [];
                    me.cantidad_productos = 0;
                    me.cantidad_empresas = 0;
                    console.log("busqueda vacia");
                }else{
                    let url = './buscarproductos/'+me.buscar //url que retorna los registros de la tabla productos con los caracteres de busqueda, aqui se busca tanto los productos de categoria, nombre y empresa
                    axios.get(url).then(function (response) {
                        me.prods = response.data;
                        me.cantidad_productos = me.prods.length;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                    url = './buscarempresa/'+me.buscar //url que retorna los registros de la tabla empresa con los caracteres de busqueda
                    axios.get(url).then(function (response) {
                        me.emps = response.data;
                        me.cantidad_empresas = me.emps.length;
                        console.log(me.cantidad_empresas);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            },
            //funcion para definir la posicion de la ventana de informacion del marcador y centrar el mapa hacia el marcador
            toggleInfoWindow: function (marker) {
                this.$refs.mapRef.$mapPromise.then((map) => {
                  map.panTo({lat: marker.latitud, lng: marker.longitud})
                })
                this.infoWindowPos = {lat: marker.latitud, lng: marker.longitud};
                //se llama a este metodo para definir el contenido de la ventana de info
                this.infoContent = this.getInfoWindowContent(marker);

                //verifica si es el mismo marcador seleccionado
                if (this.currentMidx == marker.id) {
                  this.infoWinOpen = !this.infoWinOpen;
                }
                //si es diferente resetea el info window y el id del marcador actual
                else {
                  this.infoWinOpen = true;
                  this.currentMidx = marker.id;
                }
            },
            //funcion para obtener el contenido de la info window, aqui se plasman las etiquetas html y los valores usados para mostrar
            getInfoWindowContent: function (marker) {
              return (
              `<div class="">
                <div>
                  <div>
                    <div class="m-2"><span style="font-weight: bold;">Empresa: </span>
                      ${marker.nombre_empresa}
                    </div>
                  </div>
                  <div class="m-2"><span style="font-weight: bold;">Producto:  </span>
                    ${marker.nombre}
                    <br>
                  </div>
                  <div class="m-2"><span style="font-weight: bold;">  </span>
                    <a class="btn btn-primary center" href="micrositiov?id=${marker.id_empresa}" width="100%" height="100%">Visitar sitio</a>
                    <br>
                  </div>
                </div>
              </div>`);
            },
            //funcion para definir la posicion de la ventana de informacion del marcador y centrar el mapa hacia el marcador(empresas)
            toggleInfoWindow2: function (marker) {
                this.$refs.mapRef.$mapPromise.then((map) => {
                  map.panTo({lat: marker.latitud, lng: marker.longitud})
                })
                this.infoWindowPos = {lat: marker.latitud, lng: marker.longitud};
                //se llama a este metodo para definir el contenido de la ventana de info
                this.infoContent = this.getInfoWindowContent2(marker);

                //verifica si es el mismo marcador seleccionado
                if (this.currentMidx == marker.id) {
                  this.infoWinOpen = !this.infoWinOpen;
                }
                //si es diferente resetea el info window y el id del marcador actual
                else {
                  this.infoWinOpen = true;
                  this.currentMidx = marker.id;
                }
            },
            //funcion para obtener el contenido de la info window, aqui se plasman las etiquetas html y los valores usados para mostrar(empresas)
            getInfoWindowContent2: function (marker) {
              return (
              `<div class="">
                <div>
                  <div>
                    <div class="m-2"><span style="font-weight: bold;">Empresa: </span>
                      ${marker.nombre}
                    </div>
                  </div>
                  <div class="m-2"><span style="font-weight: bold;">  </span>
                    <a class="btn btn-primary center" href="micrositiov?id=${marker.id}" width="100%" height="100%">Visitar sitio</a>
                    <br>
                  </div>
                </div>
              </div>`);
            }
        }
    }
</script>
