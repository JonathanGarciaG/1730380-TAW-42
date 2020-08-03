<!-- Componente para mostrar el carusel de imagenes en el micrositio de la empresa -->
<template>
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h2 class="card-title center">{{ nombre }}</h2>
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                <!-- Aqui se van introduciendo al carousel las imagenes asignadas al sitio de la empresa -->
                    <div class="carousel-inner" v-if="numero == 0">
                        <div class="carousel-item active">
                            <img class="d-block w-100" width="1600px" height="675px" src="https://via.placeholder.com/800x400" alt="First slide">
                        </div>
                    </div>
                    <div class="carousel-inner" v-if="numero > 0">
                        <div class="carousel-item active">
                            <img class="d-block w-100" width="1600px" height="675px" :src="imgs[0].imagen" alt="First slide">
                            <div class="carousel-caption" v-if="imgs[0].descripcion != ''">
                                <h3>{{ imgs[0].descripcion }}</h3>
                            </div>
                        </div>
                        <div class="carousel-item" v-for="img in imgs">
                            <img class="d-block w-100" width="1600px" height="675px" :src="img.imagen">
                            <div class="carousel-caption" v-if="img.descripcion != ''">
                                <h3>{{ img.descripcion }}</h3>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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
                numero: 0,
                imgs:[],
                prods:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array imagenes del carousel con los registros de la base de datos
            let me = this;
            //aqui se hace una peticion para obtener el nombre de la empresa
            let url = './productos' //el url de productos que devuelve los registros de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.prods = response.data;
                me.nombre = me.prods[0].nombre_empresa;
            })
            .catch(function (error) {
                console.log(error);
            });

            url = './imagenes_sitio' //el url de productos que devuelve los registros de imagenes de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.imgs = response.data;
                me.numero = me.imgs.length;
                console.log(me.numero);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            
        }
    }
</script>