<h1 class="text-center mt-3 mb-3">Registrar Producto</h1>

<?php if (session('mensaje')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('mensaje'); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del producto</h5>
        <p class="card-text">

        <form method="post" action="<?= site_url('/guardar'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">ID del producto</label>
                <input id="id" value="<?= old('name') ?>" class="form-control" type="text" name="id">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" value="<?= old('name') ?>" class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="color">color</label>
                <input id="color" value="<?= old('color') ?>" class="form-control" type="text" name="color">
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input id="peso" value="<?= old('peso') ?>" class="form-control" type="text" name="peso">
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input id="image" class="form-control-file" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="<?= base_url(); ?>" class="btn btn-info">Cancelar</a>
        </form>

        </p>
    </div>
</div>