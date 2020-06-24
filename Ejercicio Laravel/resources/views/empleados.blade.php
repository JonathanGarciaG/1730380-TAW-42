<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
    <div class="row">
        
        
        <div class="col-md-12">
        <h4>Empleados</h4>
        <div class="table-responsive">
        <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="empleados/agregar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span>Agregar</button></a></p>

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   <th>ID</th>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Email</th>
                    <th>Lugar de Nacimiento</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Telefono</th>
                    <th>Edit</th>  
                    <th>Delete</th>
                   </thead>
    <tbody>
<?php foreach ($empleados as $row => $item) {  ?>
 <tr>
    <td><?php echo $item['id']; ?></td>
    <td><?php echo $item['nombres']." ".$item["apellidos"]; ?></td>
    <td><?php echo $item['cedula']; ?></td>
    <td><?php echo $item['email']; ?></td>
    <td><?php echo $item['lugar_nacimiento']; ?></td>
    <td><?php echo $item['sexo']; ?></td>
    <td><?php echo $item['estado_civil']; ?></td>
    <td><?php echo $item['telefono']; ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span>Edit</button></p></td>
    <form method="POST" action="{{ url('api/empleados/'.$item['id']) }}">
    {{csrf_field()}}
    {{ method_field('DELETE') }}
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button type="submit" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span>Delete</button></p></td>
    </form>
    </tr> 
<?php }  ?>
    </tbody>
        
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>