<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
    <!-- ... (Mismo encabezado que crear.php) ... -->
    <form action="<?= base_url('productos/actualizar/'.$producto['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Marca del Producto</label>
            <input type="text" name="marca_producto" class="form-control" value="<?= old('marca_producto', $producto['marca_producto']) ?>">
        </div>
        <div class="mb-3">
            <label>Modelo del Producto</label>
            <input type="text" name="modelo_producto" class="form-control" value="<?= old('modelo_producto', $producto['modelo_producto']) ?>">
        </div>
        <div class="mb-3">
            <label>IP del Producto</label>
            <input type="text" name="ip_producto" class="form-control" value="<?= old('ip_producto', $producto['ip_producto']) ?>">
        </div>
        <div class="mb-3">
            <label>MAC del Producto</label>
            <input type="text" name="mac_producto" class="form-control" value="<?= old('mac_producto', $producto['mac_producto']) ?>">
        </div>
        <div class="mb-3">
            <label>Foto del Producto</label>
            <input type="text" name="foto_producto" class="form-control" value="<?= old('foto_producto', $producto['foto_producto']) ?>">
        </div>
        <div class="mb-3">
            <label>MAC del Producto</label>
            <input type="text" name="es_inventario" class="form-control" value="<?= old('es_inventario', $producto['es_inventario']) ?>">
        </div>
        <!-- Repite lo mismo para los demás campos usando old('campo', $plan['campo']) -->
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="<?= old('precio', $producto['precio']) ?>">
        </div>
        <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
    </form>
<?= $this->endSection() ?>