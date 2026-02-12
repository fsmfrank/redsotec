<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

    <h2>Listado de Productos</h2>
    <a href="<?= base_url('productos/crear') ?>" class="btn btn-primary mb-3">Nuevo Producto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>IP</th>
                <th>MAC</th>
                <th>Foto</th>
                <th>Inventario</th>                             
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $producto): ?>
            <tr>
                <td><?= esc($producto['marca_producto']) ?></td>
                <td><?= esc($producto['modelo_producto']) ?></td>
                <td><?= esc($producto['ip_producto']) ?></td>
                <td><?= esc($producto['mac_producto']) ?></td>
                <td><?= esc($producto['foto_producto']) ?></td>
                <td><?= esc($producto['es_inventario']) ?></td>
                <td>$<?= number_format($producto['precio'], 2) ?></td>
                <td>
                    <a href="<?= base_url('productos/editar/'.$producto['id']) ?>" class="btn btn-sm btn-info">Editar</a>
                    <a href="<?= base_url('productos/eliminar/'.$producto['id']) ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este productos?')">Eliminar</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?= $this->endSection() ?>
