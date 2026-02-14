<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container mt-5">
    <h2>Registrar Nuevo Pago de Internet</h2>
    <hr>
    
    <form action="<?= base_url('pagos/guardar') ?>" method="POST">
        <?= csrf_field() ?> <div class="row">
            <div class="col-md-6 mb-3">
                <label>Seleccionar Cliente:</label>
                <select name="usuario_id" id="usuario_id" class="form-control" required onchange="actualizarMonto()">
                    <option value="">-- Seleccione un usuario --</option>
                    <?php foreach($usuarios as $u): ?>
                        <option value="<?= $u['id'] ?>" data-precio="<?= $u['precio_plan'] ?>">
                            <?= $u['nombres'] ?> (Plan: <?= $u['plan_nombre'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Monto a Pagar ($):</label>
                <input type="number" name="monto" id="monto" step="0.01" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Mes Correspondiente:</label>
                <select name="mes" class="form-control">
                    <?php 
                    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    foreach($meses as $num => $nombre): 
                        $val = $num + 1;
                        $selected = ($val == date('m')) ? 'selected' : '';
                    ?>
                        <option value="<?= $val ?>" <?= $selected ?>><?= $nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Método de Pago:</label>
                <select name="metodo" class="form-control">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="Tarjeta">Tarjeta / PayPal</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-success btn-block" style="margin-top: 30px;">
                    ✅ Registrar Pago
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function actualizarMonto() {
    // Truco simple para poner el precio del plan automáticamente
    var select = document.getElementById("usuario_id");
    var precio = select.options[select.selectedIndex].getAttribute('data-precio');
    document.getElementById("monto").value = precio;
}
</script>

<?= $this->endSection() ?>