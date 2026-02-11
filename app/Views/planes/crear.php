<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Nuevo Plan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
</head>
<body class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nuevo Plan de Internet</h4>
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

                    <form action="<?= base_url('planes/guardar') ?>" method="POST">
                        <?= csrf_field() ?> <!-- Protección contra CSRF -->

                        <div class="mb-3">
                            <label>Nombre del Plan</label>
                            <input type="text" name="nombre_plan" class="form-control" value="<?= old('nombre_plan') ?>" placeholder="Ej: Plan Hogar Fibra">
                        </div>

                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea name="descripcion_plan" class="form-control" rows="2"><?= old('descripcion_plan') ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Vel. Subida</label>
                                <input type="text" name="velocidad_subida" class="form-control" value="<?= old('velocidad_subida') ?>" placeholder="50M">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Vel. Bajada</label>
                                <input type="text" name="velocidad_bajada" class="form-control" value="<?= old('velocidad_bajada') ?>" placeholder="100M">
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
                            <button type="submit" class="btn btn-success">Guardar Plan</button>
                            <a href="<?= base_url('planes') ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?= $this->endSection() ?>