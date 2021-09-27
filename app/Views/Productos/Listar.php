<?=$header ?>
<br>
<a class="btn btn-success" href="<?= base_url('/crear')?>" role="button">Añadir producto</a>
<br>
<br>
<table class="table table-hover table-inverse table-responsive">
    <thead class="thead-default">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?=$producto['id']?></td>
                <td><?=$producto['nombre']?></td>
                <td><?=$producto['descripcion']?></td>
                <td><?=$producto['precio']?></td>
                <td>
                    <img src="<?=$producto['imagen'] ?>" width="150">
                </td>
                <td>
                <a class="btn btn-primary" href="<?= base_url('editar/'.$producto['id']) ?>">Editar</a><br>
                <a class="btn btn-danger mt-2" href="<?= base_url('eliminar/'.$producto['id']) ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
</table>
<?=$footer ?>