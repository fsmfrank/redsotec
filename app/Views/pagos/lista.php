<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h2>Control de Pagos Internet</h2>
<a href="<?= base_url('pagos/crear') ?>" class="btn btn-primary">Registrar Pago</a>

<div class="container mt-4">
  <input class="form-control mb-3" id="tablaInput" type="text" placeholder="Buscar en la tabla...">

    <table border="1" style="width:100%; margin-top: 20px;" class="table table-bordered table-striped" id="miTabla">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Mes Pagado</th>
                <th>Monto</th>
                <th>Fecha de Transacción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaCuerpo">
            <?php foreach($pagos as $pago): ?>
            <tr>
                <td><?= $pago['nombre_cliente'] ." ". $pago['apellido_cliente'] ?></td>
                <td><?= $pago['mes_pagado'] ?> / <?= $pago['anio_pagado'] ?></td>
                <td>$<?= number_format($pago['monto'], 2) ?></td>
                <td><?= $pago['fecha_pago'] ?></td>
                <td><a href="<?= base_url('pagos/pdf/'.$pago['id']) ?>" target="_blank" class="btn btn-danger">Descargar PDF
                </a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const buscador = document.getElementById("tablaInput");
  const filas = document.querySelectorAll("#tablaCuerpo tr");

  buscador.addEventListener("keyup", (e) => {
    const texto = e.target.value.toLowerCase();

    filas.forEach(fila => {
      // Compara el texto del input con el contenido de toda la fila
      fila.textContent.toLowerCase().includes(texto)
        ? fila.style.display = ""
        : fila.style.display = "none";
    });
  });
});

</script>
