<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Editar
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
    <!-- ... (Mismo encabezado que crear.php) ... -->
    <form action="<?= base_url('clientes/actualizar/'.$cliente['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Nombres</label>
            <input type="text" name="nombres" class="form-control" value="<?= old('nombres', $cliente['nombres']) ?>">
        </div>
        <div class="mb-3">
            <label>Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="<?= old('apellidos', $cliente['apellidos']) ?>">
        </div>
        <div class="mb-3">
            <label>Tipo Cédula</label>
            <input type="text" name="tipo_cedula" class="form-control" value="<?= old('tipo_cedula', $cliente['tipo_cedula']) ?>">
        </div>        
        <div class="mb-3">
            <label>Cédula</label>
            <input type="text" name="cedula" class="form-control" value="<?= old('cedula', $cliente['cedula']) ?>">
        </div>
        <div class="mb-3">
            <label>Correo del Cliente</label>
            <input type="text" name="correo" class="form-control" value="<?= old('correo', $cliente['correo']) ?>">
        </div>
        <div class="mb-3">
            <label>Telefono Principal</label>
            <input type="text" name="telefono1" class="form-control" value="<?= old('telefono1', $cliente['telefono1']) ?>">
        </div>
        <div class="mb-3">
            <label>Telefono Secundario</label>
            <input type="text" name="telefono2" class="form-control" value="<?= old('telefono2', $cliente['telefono2']) ?>">
        </div>
        <div class="mb-3">
            <label>Fecha Nacimiento</label>
            <input type="date" id="fecha_nac" name="fecha_nac" value="<?= old('fecha_nacimiento', $cliente['fecha_nac']) ?>" min="1930-01-01" max="<?php echo date('d-m-Y'); ?>">
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <textarea name="direccion" class="form-control" rows="2"><?= old('direccion', $cliente['direccion']) ?></textarea>
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
            <input type="date" id="fecha_ins" name="fecha_ins" value="<?= old('fecha_ins', $cliente['fecha_ins']) ?>" min="2024-01-01" max="<?php echo date('d-m-Y'); ?>">
        </div>
        <div class="mb-3">
            <label>Día de Pago</label>
            <input type="number" name="dia_pago" class="form-control" value="<?= old('dia_pago', $cliente['dia_pago']) ?>">
        </div>
        <div class="mb-3">
            <label>Estatus del Cliente</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="activo">ACTIVO</option>
                    <option value="suspendido">SUSPENDIDO</option>
                </select>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
    </form>
<?= $this->endSection() ?>