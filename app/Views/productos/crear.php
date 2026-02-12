<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Nuevo Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
</head>
<body class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nuevo Producto de Internet</h4>
                </div>
                <div class="card-body">

                    <!-- Mostrar Errores de Validación -->
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('productos/guardar') ?>" method="POST">
                        <?= csrf_field() ?> <!-- Protección contra CSRF -->

                        <div class="mb-3">
                            <label>Marca del Producto</label>
                            <input type="text" name="marca_producto" class="form-control" value="<?= old('marca_producto') ?>" placeholder="Ej: CISCO">
                        </div>

                        <div class="mb-3">
                            <label>Modelo del Producto</label>
                            <input type="text" name="modelo_producto" class="form-control" value="<?= old('modelo_producto') ?>" placeholder="Ingrese aqui ...">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>IP Producto</label>
                                <input type="text" name="ip_producto" class="form-control" value="<?= old('ip_producto') ?>" placeholder="Ingrese aqui ...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>MAC Producto</label>
                                <input type="text" name="mac_producto" class="form-control" value="<?= old('mac_producto') ?>" placeholder="Ingrese aqui ...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Foto Producto</label>
                                <input type="text" name="foto_producto" class="form-control" value="<?= old('foto_producto') ?>" placeholder="Ingrese aqui ...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Es Inventario</label>
                                <input type="text" name="es_inventario" class="form-control" value="<?= old('es_inventario') ?>" placeholder="Ingrese aqui ...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Precio</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" name="precio" class="form-control" value="<?= old('precio') ?>">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Guardar Producto</button>
                            <a href="<?= base_url('productos') ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?= $this->endSection() ?>