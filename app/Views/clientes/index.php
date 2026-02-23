<?= $this->extend('template/main') ?>

<?= $this->section('titulo') ?>
    Página de Inicio
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

    <h2>Listado de Clientes</h2>
    <a href="<?= base_url('clientes/crear') ?>" class="btn btn-primary mb-3">Nuevo Cliente</a>
    <input class="form-control mb-3" id="miInput" type="text" placeholder="Buscar..">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro.</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Correo</th>
                <th>Telefono1</th>
                <th>Plan</th>                             
                <th>Dia de Pago</th>
                <th>Estatus</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="miTabla">
            <?php $CONT=1; foreach($clientes as $cliente): ?>
            <tr>
                <td><?= $CONT++ ?></td>
                <td><?= esc($cliente['nombres']) ?></td>
                <td><?= esc($cliente['apellidos']) ?></td>
                <td><?= esc($cliente['cedula']) ?></td>
                <td><?= esc($cliente['correo']) ?></td>
                <td><?= esc($cliente['telefono1']) ?></td>
                <td><?= esc($cliente['plan_id']) ?></td>
                <td><?= esc($cliente['dia_pago']) ?></td>
                <td><?= esc($cliente['estado']) ?></td>
                <td>
                    <a href="<?= base_url('clientes/generar/'.$cliente['id']) ?>" class="btn btn-sm btn-primary">Contrato</a>
                    <a href="<?= base_url('clientes/editar/'.$cliente['id']) ?>" class="btn btn-sm btn-info">Editar</a>
                    <a href="<?= base_url('clientes/eliminar/'.$cliente['id']) ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este clientes?')">Eliminar</a>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
<?= $this->endSection() ?>
