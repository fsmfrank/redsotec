<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Crear
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Nuevo Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
</head>
<body class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nuevo Cliente de Internet</h4>
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

                    <form action="<?= base_url('clientes/guardar') ?>" method="POST">
                        <?= csrf_field() ?> <!-- Protección contra CSRF -->

                        <div class="mb-3">
                            <label>Nombres</label>
                            <input type="text" name="nombres" class="form-control" value="<?= old('nombres') ?>" placeholder="Ingresar aqui...">
                        </div>

                        <div class="mb-3">
                            <label>Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="<?= old('apellidos') ?>" placeholder="Ingrese aqui ...">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="tipo_cedula">Tipo de Cédula:</label>
                            <select class="form-control" id="tipo_cedula" name="tipo_cedula">
                                <option>V</option>
                                <option>E</option>
                                <option>G</option>
                                <option>C</option>
                                <option>O</option>                               
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Cédula</label>
                                <input type="text" name="cedula" class="form-control" value="<?= old('cedula') ?>" placeholder="Ingrese aqui ...">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Correo</label>
                                <input type="text" name="correo" class="form-control" value="<?= old('correo') ?>" placeholder="Ingrese aqui ...">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Teléfono Principal</label>
                                <input type="text" class="custom-text-input" id="telefono1" name="telefono1" accept="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Teléfono Otro</label>
                                <input type="text" class="custom-text-input" id="telefono2" name="telefono2" accept="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Fecha Nacimiento</label>
                            <input type="date" id="fecha_nac" name="fecha_nac" value="<?= old('fecha_nac') ?>" min="1930-01-01" max="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Dirección</label>
                            <textarea name="direccion" class="form-control" rows="2"><?= old('direccion') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Plan del Cliente</label>
                                <select class="form-control" id="plan_id" name="plan_id">
                                    <option value="1">PLAN BASICO</option>
                                    <option value="2">PLAN MEDIO</option>
                                    <option value="3">PLAN AVANZADO</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label>Equipo del Cliente</label>
                                <select class="form-control" id="producto_id" name="producto_id">
                                    <option value="1">ROUTER 1</option>
                                    <option value="2">ROUTER 2</option>
                                    <option value="3">ROUTER 3</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label>Fecha Instalación</label>
                            <input type="date" id="fecha_ins" name="fecha_ins" value="<?= old('fecha_ins') ?>" min="2024-01-01" max="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="mb-3">
                            <label>Día de Pago</label>
                            <input type="number" name="dia_pago" class="form-control" value="<?= old('dia_pago') ?>">
                        </div>
                        <div class="mb-3">
                            <label>Estatus del Cliente</label>
                                <select class="form-control" id="estado" name="estado">
                                    <option value="activo">ACTIVO</option>
                                    <option value="suspendido">SUSPENDIDO</option>
                                </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Guardar Cliente</button>
                            <a href="<?= base_url('clientes') ?>" class="btn btn-light">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?= $this->endSection() ?>