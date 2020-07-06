<template>
    <!-- Componente de fila de producto -->
    <tr>
        <td>
        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalNuevo">
            <i class="icon-pencil"></i>
        </button> &nbsp;
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">
            <i class="icon-trash"></i>
        </button>
        </td>
        <!-- Se imprimen los valores de los productos usando la propiedad producto para cada uno de los registros -->
        <td>{{ producto.codigo_producto }}</td>
        <td>{{ producto.nombre_producto }}</td>
        <td>{{ producto.stock }}</td>
        <td>{{ producto.precio_producto }}</td>
        <td>{{ producto.categoria }}</td>
        <td>
            <span class="badge badge-success">Activo</span>
        </td>
    </tr>
</template>

<script>
    export default {
        //Se toman los datos del array del componente padre
        props: ['producto'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>