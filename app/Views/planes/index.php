<!DOCTYPE html>
<html>
<head>
    <title>Lista de Planes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net">
</head>
<body class="container mt-5">
<!-- Mensaje de Éxito -->
<?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Mensaje de Error (por si algo falla) -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


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
<script>
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 3000);
</script>

</body>
</html>
