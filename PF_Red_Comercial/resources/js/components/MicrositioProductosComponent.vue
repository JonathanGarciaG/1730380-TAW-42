<!-- Componente para mostrar los productos en el micrositio de la empresa -->
<template>
    <div class="row">
        <div class="col-md-4" v-for="prod in prods" :key="prod.id">
            <div class="main-card mb-3 card"><img width="300" height="300" v-bind:src="'.'+prod.imagen" alt="Card image cap" class="card-img-top">
                <div class="card-body"><h5 class="card-title">{{ prod.nombre }}</h5><h6 class="card-subtitle">${{ prod.precio }} ({{ prod.stock }})</h6> {{ prod.descripcion }}   
                </div>
                <div class="card-footer"><button class="btn btn-secondary">Ver</button></div>
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
                images:[],
                prods:[]
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

            console.log('ID de la empresa prodcomp: '+me.id_empresa);
        },
        //metodos utilizados
        methods: {
            
        }
    }
</script>