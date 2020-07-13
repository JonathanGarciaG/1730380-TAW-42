<template>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-briefcase">
                            </i>
                        </div>
                        <div>Lista de Empresas
                        </div>
                    </div>
                </div>
            </div>             
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Empresas Activas
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nombre de la Empresa</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Usuario asociado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center text-muted">#341</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left"> 
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Empresa 1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div>8341231202</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </td>
                                    <td class="text-center">
                                        <div>Categoría 1</div>
                                    </td>
                                    <td class="text-center">
                                        <div>John Doe</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-warning btn-sm">Editar</button>
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm">Eliminar</button>
                                    </td>
                                </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class="btn-wide btn btn-success">Nuevo</button>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>