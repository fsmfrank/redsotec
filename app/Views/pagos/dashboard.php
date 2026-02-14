<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container mt-4">
    <h1>Panel de Control - Internet</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Recaudado este Mes</h5>
                    <p class="card-text" style="font-size: 2rem;">$<?= number_format($totalRecaudado, 2) ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Clientes Activos</h5>
                    <p class="card-text" style="font-size: 2rem;"><?= $totalClientes ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pagos Pendientes</h5>
                    <p class="card-text" style="font-size: 2rem;"><?= $totalClientes - $pagosRealizados ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="<?= base_url('pagos/crear') ?>" class="btn btn-lg btn-outline-dark">➕ Registrar Nuevo Pago</a>
        <a href="<?= base_url('alertas') ?>" class="btn btn-lg btn-outline-danger">🚨 Ver Morosos</a>
    </div>
</div>
<?= $this->endSection() ?>