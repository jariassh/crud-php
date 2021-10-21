<h1 class="text-center mt-3 mb-3">Total Productos (<?= $cant ?>)</h1>
<a href="<?= base_url('crear'); ?>" class="btn btn-primary mb-2">Registrar producto</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Imagen</th>
            <th>Nombre del producto</th>
            <th>Color del producto</th>
            <th>Peso del producto (Kg)</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td>
                    <img class="img-thumbnail" src="<?= base_url(); ?>/public/uploads/<?= $producto['image'] ?>" width="100" alt="">
                </td>

                <td><?= $producto['name'] ?></td>
                <td><?= $producto['color'] ?></td>
                <td><?= $producto['peso'] ?></td>

                <td>
                    <a href="<?= base_url('edit/' . $producto['id']) ?>" class="btn btn-warning">Editar</a>
                    <a href="<?= base_url('delete/' . $producto['id']) ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>