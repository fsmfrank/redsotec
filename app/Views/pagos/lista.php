<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h2>Control de Pagos Internet</h2>
<a href="<?= base_url('pagos/crear') ?>" class="btn btn-primary">Registrar Pago</a>

<table border="1" style="width:100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Mes Pagado</th>
            <th>Monto</th>
            <th>Fecha de Transacción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pagos as $pago): ?>
        <tr>
            <td><?= $pago['cliente'] ?></td>
            <td><?= $pago['mes_pagado'] ?> / <?= $pago['anio_pagado'] ?></td>
            <td>$<?= number_format($pago['monto'], 2) ?></td>
            <td><?= $pago['fecha_pago'] ?></td>
            <td><a href="<?= base_url('pagos/pdf/'.$pago['id']) ?>" target="_blank" class="btn btn-danger">Descargar PDF
            </a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>