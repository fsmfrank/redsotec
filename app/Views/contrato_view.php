<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Servicio de Internet</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.5; margin: 40px; color: #333; }
        h1, h2 { text-align: center; text-transform: uppercase; }
        .section { margin-bottom: 20px; }
        .bold { font-weight: bold; }
        .footer-sign { margin-top: 50px; display: flex; justify-content: space-between; }
        .signature-box { border-top: 1px solid #000; width: 40%; text-align: center; padding-top: 10px; }
        @media print { .page-break { page-break-before: always; } }
    </style>
</head>
<body>

    <h2>Contrato de Prestaci&oacute;n de Servicios de Internet</h2>

    <div class="section">
        <p>Conste por el presente documento el <strong>Contrato de Prestaci&oacute;n de Servicios de Internet</strong> que celebran de una parte <strong>[REDSOTEC Red de Soluciones Tecnologicas]</strong>, con RIF N&uacute;mero [17.742.254-8], en adelante <strong>EL PROVEEDOR</strong>; y de la otra parte <strong><?= esc($u['nombres']." ".$u['apellidos']) ?></strong>, identificado con [CI/Pasaporte] N° <?= esc($u['cedula']) ?>, en adelante <strong>EL CLIENTE</strong>.</p>
    </div>

    <div class="section">
        <h3>1. Objeto del Contrato</h3>
        <p>EL PROVEEDOR se obliga a suministrar el servicio de acceso a Internet de banda ancha en el domicilio ubicado en <?= esc($u['direccion']) ?>, bajo las caracter&iacute;sticas t&eacute;cnicas del plan seleccionado.</p>
    </div>

    <div class="section">
        <h3>2. Descripción del Plan</h3>
        <ul>
            <li><strong>Nombre del Plan:</strong> <?= esc($u['nombre_plan']) ?></li>
            <li><strong>Velocidad de Bajada:</strong> <?= esc($u['velocidad_bajada']) ?></li>
            <li><strong>Velocidad de Subida:</strong> <?= esc($u['velocidad_subida']) ?></li>
            <li><strong>Tecnolog&iacute;a:</strong> [Fibra &Oacute;ptica / HFC / Satelital]</li>
            <li><strong>L&iacute;mite de Datos:</strong> [Ilimitado / GB espec&iacute;ficos]</li>
        </ul>
    </div>

    <div class="section">
        <h3>3. Tar&iacute;fas y Forma de Pago</h3>
        <p>EL CLIENTE se compromete a pagar mensualmente la suma de <strong><?= esc($u['precio']) ?></strong>. El pago deber&aacute; realizarse dentro de los primeros <?= esc($u['dia_pago']) ?> d&iacute;as de cada mes. El incumplimiento facultar&aacute; al PROVEEDOR a suspender el servicio tras [10] d&iacute;as de mora.</p>
    </div>

    <div class="section">
        <h3>4. Equipamiento</h3>
        <p>EL PROVEEDOR entrega en calidad de [Comodato/Alquiler] un Router/M&oacute;dem marca <strong><?= esc($u['marca_producto']) ?></strong> con n&uacute;mero de serie <strong> <?= esc($u['mac_producto']) ?>.</strong> EL CLIENTE es responsable por el cuidado y devoluci&oacute;n del mismo al finalizar el contrato.</p>
    </div>


    <div class="section">
        <h3>5. Obligaciones del Proveedor</h3>
        <p>EL PROVEEDOR garantiza una disponibilidad del servicio del [99.9]%, salvo casos de fuerza mayor o mantenimiento programado, los cuales seran notificados con 24 horas de antelacion.</p>
    </div>

    <div class="section">
        <h3>6. Uso del Servicio</h3>
        <p>EL CLIENTE se compromete a no utilizar el servicio para actividades il&iacute;citas, reventa del ancho de banda o acciones que vulneren la seguridad de terceros en la red.</p>
    </div>

    <div class="section">
        <h3>7. Duraci&oacute;n y Rescisi&oacute;n</h3>
        <p>El presente contrato tiene una vigencia de [12 meses]. Cualquiera de las partes podra darlo por terminado notificando con [30] d&iacute;as de anticipaci&oacute;n. En caso de resoluci&oacute;n anticipada por parte del CLIENTE, se aplicara una penalidad de 5$.</p>
    </div>

    <div class="section">
        <h3>8. Jurisdicci&oacute;n</h3>
        <p>Para cualquier controversia, las partes se someten a la jurisdicci&oacute;n de los tribunales de Los Teques Estado Bolivariano de Miranda.</p>
    </div>

    <p>Le&iacute;do el presente contrato y conformes con su contenido, las partes lo firman por duplicado en la ciudad de Los Teques, a los [Día] dias del mes de [Mes] de 2026.</p>

    <div class="footer-sign">
        <div class="signature-box col-6">
            <p><strong>POR EL PROVEEDOR</strong></p>
            <p>Firma y Sello</p>
        </div><br><br>
        <div class="signature-box col-6">
            <p><strong>POR EL CLIENTE</strong></p>
            <p>Firma y Huella</p>
        </div>

    </div>

</body>
</html>
