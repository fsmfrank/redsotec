<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

    <h2>Planes de Internet</h2>
    <a href="<?= base_url('planes/crear') ?>" class="btn btn-primary mb-3">Nuevo Plan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Velocidad (S/B)</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($planes as $plan): ?>
            <tr>
                <td><?= esc($plan['nombre_plan']) ?></td>
                <td><?= esc($plan['velocidad_subida']) ?> / <?= esc($plan['velocidad_bajada']) ?></td>
                <td>$<?= number_format($plan['precio'], 2) ?></td>
                <td>
                    <a href="<?= base_url('planes/editar/'.$plan['id']) ?>" class="btn btn-sm btn-info">Editar</a>
                    <a href="<?= base_url('planes/eliminar/'.$plan['id']) ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este plan?')">Eliminar</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?= $this->endSection() ?>
