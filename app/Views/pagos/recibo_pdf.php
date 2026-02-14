<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { text-align: center; border-bottom: 2px solid #333; margin-bottom: 20px; }
        .total { font-size: 15px; font-weight: bold; color: #2c3e50; }
        .footer { margin-top: 50px; text-align: center; font-size: 10px; color: #777; }
    </style>
</head>
<body>
    <div class="header">
        <h3>Recibo de Pago</h3>
        <p>Servicio de Internet Residencial</p>
    </div>

    <p><strong>Número de Recibo:</strong> #<?= $pago['id'] ?></p>
    <p><strong>Fecha:</strong> <?= $pago['fecha_pago'] ?></p>
    <hr>
    
    <p><strong>Cliente:</strong> <?= $pago['nombres']." ".$pago['apellidos'] ?></p>
    <p><strong>Plan Contratado:</strong> <?= $pago['plan_nombre'] ?></p>
    <p><strong>Mes Pagado:</strong> <?= $pago['mes_pagado'] ?> / <?= $pago['anio_pagado'] ?></p>
    
    <div style="background: #f4f4f4; padding: 15px; margin-top: 20px;">
        <span class="total">Monto Pagado: $<?= number_format($pago['monto'], 2) ?></span>
    </div>

    <div class="footer">
        <p>Gracias por su preferencia. Este documento es un comprobante digital de pago.</p>
    </div>
</body>
</html>