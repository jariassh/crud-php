<h1 class="text-center mt-3 mb-3">Editar Productos</h1>

<?php if (session('mensaje')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session('mensaje'); ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar datos del producto</h5>
        <p class="card-text">

        <form method="post" action="<?= site_url('/update'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" class="form-control" type="text" name="name" value="<?= $producto['name'] ?>">
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input id="color" class="form-control" type="text" name="color" value="<?= $producto['color'] ?>">
            </div>
            <div class="form-group">
                <label for="peso">Peso</label>
                <input id="peso" class="form-control" type="text" name="peso" value="<?= $producto['peso'] ?>">
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <div>
                    <img class="img-thumbnail" src="<?= base_url(); ?>/public/uploads/<?= $producto['image'] ?>" width="100" alt="">
                </div>
                <input id="image" class="form-control-file" type="file" name="image">
            </div>
            <input type="hidden" id="id" name="id" value="<?= $producto['id'] ?>">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?= base_url(); ?>" class="btn btn-info">Cancelar</a>
        </form>

        </p>
    </div>
</div>