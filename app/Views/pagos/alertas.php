<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="alert-container">
    <h2>⚠️ Usuarios Pendientes de Pago (Mes: <?= date('F') ?>)</h2>
    
    <table class="table table-warning">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Plan</th>
                <th>Monto Pendiente</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($morosos as $m): ?>
            <tr>
                <td><?= $m['nombres'] ?></td>
                <td><?= $m['telefono1'] ?></td>
                <td><?= $m['plan_nombre'] ?></td>
                <td><strong>$<?= $m['precio'] ?></strong></td>
                <td>
                    <a href="https://wa.me/<?= $m['telefono1'] ?>?text=Hola, tienes un saldo pendiente" 
                       class="btn btn-success btn-sm" target="_blank">Enviar WhatsApp</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>