<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web - <?php echo $this->renderSection('titulo') ?></title>
    <!-- Incluir CSS, por ejemplo con un helper de assets si se configura -->
    <link rel="stylesheet" href="<?= base_url('css/main.css'); ?>">
</head>
<body>
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

    <aside>
        <?= $this->include('template/sidebar') ?>
    </aside>

    <main>
        <!-- Esta es la sección donde se inyectará el contenido específico -->
        <?php echo $this->renderSection('contenido') ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Mi Sitio Web</p>
    </footer>

    <!-- Incluir JS, etc. -->
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
