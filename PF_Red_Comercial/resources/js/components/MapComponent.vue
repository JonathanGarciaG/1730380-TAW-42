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

                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">                     
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
                                @click="center={lat: m.latitud, lng: m.longitud}"
                                v-bind:url="'micrositiov?id='+m.id_empresa"
                              />
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
                  markers:[]
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
                
                if(me.buscar == ""){
                    me.prods = [];
                    console.log("busqueda vacia");
                }else{
                    let url = './buscarproductos/'+me.buscar //url que retorna los registros de la tabla empresas
                    axios.get(url).then(function (response) {
                        me.prods = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                }
            }
        }
    }
</script>
