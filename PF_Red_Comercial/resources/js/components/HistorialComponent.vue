<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-list">
                            </i>
                        </div>
                        <div>Historial de Pedidos
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Tus Pedidos
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Monto de pago</th>
                                    <th>Metodo de pago</th>
                                    <th class="text-center">Motivo de pago</th>
                                    <th class="text-center">Referencia</th>
                                    <th class="text-center">Realizado el</th> 
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="h in historial" :key="historial.id">
                                    <td class="text-center text-muted">{{ h.id }}</td>
                                    <td class="text-center">
                                        <div>${{ h.monto }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ h.metodo_pago }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ h.motivo_pago }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ h.referencia }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>{{ h.created_at }}</div>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
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
                historial:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
            //cuando el componente es montado se realizar lo siguiente para cargar los datos
            let me = this;
            let url = './historial' //url que retorna los registros de la tabla empresas
            axios.get(url).then(function (response) {
                me.historial = response.data;
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
