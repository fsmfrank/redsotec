<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
    <!-- ... (Mismo encabezado que crear.php) ... -->
    <form action="<?= base_url('planes/actualizar/'.$plan['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Nombre del Plan</label>
            <input type="text" name="nombre_plan" class="form-control" value="<?= old('nombre_plan', $plan['nombre_plan']) ?>">
        </div>
        <!-- Repite lo mismo para los demás campos usando old('campo', $plan['campo']) -->
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="<?= old('precio', $plan['precio']) ?>">
        </div>
        <button type="submit" class="btn btn-warning">Actualizar Cambios</button>
    </form>
<?= $this->endSection() ?>