<?= $header ?>
<?php if(session('mensaje')){?>
    <div class="aletr alert-danger">
        <?php 
        echo session('mensaje');
        ?>
    </div>
<?php }?>
<div class="card mt-4">
    <div class="card-body">
        <h4 class="card-title">Agregar un producto</h4>
        <p class="card-text">
        <form action="<?=site_url('/guardar') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mt-3">
                <label for="nombre">* Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto" value="<?=old('nombre') ?>">
            </div>
            <div class="form-group mt-3">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción del producto" value="<?=old('descripcion') ?>">
            </div>
            <div class="form-group mt-3">
                <label for="precio">* Precio</label>
                <input type="number" step=0.01 name="precio" id="precio" class="form-control" placeholder="Precio del producto" value="<?=old('precio') ?>">
            </div>
            <div class="form-group mt-3">
                <label for="imagen">* Imagen</label>
                <br>
                <input type="file" class="form-control-file" name="imagen" id="imagen">
            </div>
            <button class="btn btn-success mt-3" type="submit">Guardar</button>
            <a href="<?=base_url('/') ?>" class="btn btn-danger mt-3"> Cancelar</a>
        </form>
        </p>
    </div>
</div>
<?= $footer ?>