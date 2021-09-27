<?= $header ?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Editar un producto</h4>
        <p class="card-text">
        <form action="<?=site_url('/actualizar') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
            <div class="form-group mt-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto" value="<?= $producto['nombre'] ?>">
            </div>
            <div class="form-group mt-3">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción del producto" value="<?= $producto['descripcion'] ?>">
            </div>
            <div class="form-group mt-3">
                <label for="precio">Precio</label>
                <input type="number" step=0.01 name="precio" id="precio" class="form-control" placeholder="Precio del producto" value="<?= $producto['precio'] ?>">
            </div>
            <div class="form-group mt-3">
                <label for="imagen">Imagen</label>
                <br>
                <img src="<?= $producto['imagen'] ?>" alt="" width="200">
                <br><br>
                <input type="file" class="form-control-file" name="imagen" id="imagen">
            </div>
            <button class="btn btn-success mt-3" type="submit">Guardar</button>
            <a href="<?=base_url('/') ?>" class="btn btn-danger mt-3"> Cancelar</a>
        </form>
        </p>
    </div>
</div>
<?= $footer ?>