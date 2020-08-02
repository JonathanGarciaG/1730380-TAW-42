<!-- Componente para mostrar el carusel de imagenes en el micrositio de la empresa -->
<template>
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title center">{{ this.nombre }}</h5>
                <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://via.placeholder.com/800x400" alt="First slide">
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
                images:[],
                prods:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realiza la siguiente accion para actualizar el array productos con los registros de la base de datos
            let me = this;
            let url = './productos' //el url de productos que devuelve los registros de la base de datos
            axios.get(url).then(function (response) {
                //se almacenan al array los datos de la respuesta obtenida del url
                me.prods = response.data;
                me.nombre = prods[0].nombre;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        //metodos utilizados
        methods: {
            //mostrar modal
            mostrarModal() {
                //Se limpian los campos del modal
                this.name = '';
                this.lastname = '';
                this.email = '';
                this.password = '';
                this.tipo = '';
                $('#modalNewUser').modal('show');
            },
            //mostrar modal eliminar
            mostrarModalDelete(data) {
                this.id_borrar = data.id;
                $('#modalDeleteProducto').modal('show');               
            },
            //Metodo para agregar un nuevo usuario
            newUser() {
                //se toman los parametros de los campos
                const params = {
                    name: this.name,
                    lastname: this.lastname,
                    email: this.email,
                    password: this.password,
                    tipo: this.tipo
                };
                //Se limpian los campos del modal
                this.name = '';
                this.lastname = '';
                this.email = '';
                this.password = '';
                this.tipo = '';

                //se hace un request post con el url /getusers para que con su respuesta se realice la insercion
                axios.post('./usuarios', params)
                    .then((response) => {
                        const user = response.data;
                        //una vez hecha se realiza nuevamente una actualizacion del array users para actualizar el componente que los muestra
                        let me = this;
                        let url = './usuarios' //url que retorna los registros de la tabla users
                        axios.get(url).then(function (response) {
                            me.users = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    });
                //Ocultar el modal
                $('#modalNewUser').modal('hide');
            },
            //Metodo para actualizar los datos de un usuario.
            updateUser(){
                let me = this;
                axios.put('./usuarios',{
                    'id' : this.update,
                    'name' : this.name,
                    'lastname' : this.lastname,
                    'email' : this.email,
                    'password' : this.password,
                    'tipo' : this.tipo,
                }).then(function (response){
                    //Cerrando el modal después de actualizar el usuario.
                    $('#modalUpdateUser').modal('hide');
                }).catch(function (error){
                    console.log(error);
                });
                me = this;
                let url = './usuarios' //url que retorna los registros de la tabla users
                axios.get(url).then(function (response) {
                    me.users = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            //Metodo para rellenar los campos del formulario al momento de seleccionar un usuario.
            camposUpdate(data){
                $('#modalUpdateUser').modal('show');
                this.update = data.id;
                let me = this;
                let url = './usuarios/'+this.update;
                axios.get(url).then(function (response){
                    me.name = response.data.name;
                    me.lastname = response.data.lastname;
                    me.email = response.data.email;
                    me.password = response.data.password;
                    me.tipo = response.data.tipo;
                }).catch(function (error){
                    console.log(error);
                });
            },
            //metodo para eliminar
            onClickDelete() {
                axios.delete('./usuarios/'+this.id_borrar).then(() => {                    
                    let me = this;
                    let url = './usuarios' //url que retorna los registros de la tabla users
                    axios.get(url).then(function (response) {
                        me.users = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                });
                $('#modalDeleteProducto').modal('hide');
            }
            
        }
    }
</script>