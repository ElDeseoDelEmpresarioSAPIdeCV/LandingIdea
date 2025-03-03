@component('mail::message')

<div style="text-align: center; padding: 20px; background-color: #f8f9fa; border-radius: 10px;">
    <h1 style="color: #333;">🎉 ¡Gracias por tu compra, {{ $paymentDetails['first_name'] }}! 🎉</h1>
    <p style="color: #555; font-size: 16px;">Tu pago ha sido procesado exitosamente. Aquí están los detalles de tu compra:</p>
</div>

<table style="width: 100%; background-color: #ffffff; padding: 15px; border-radius: 8px; border: 1px solid #ddd; text-align: left; font-size: 16px;">
    <tr>
        <td><strong>📅 Evento:</strong></td>
        <td>Webinar de Emprendimiento</td>
    </tr>
    <tr>
        <td><strong>🙍‍♂️ Nombre:</strong></td>
        <td>{{ $paymentDetails['first_name'] }} {{ $paymentDetails['last_name'] }}</td>
    </tr>
    <tr>
        <td><strong>📧 Correo:</strong></td>
        <td>{{ $paymentDetails['email'] }}</td>
    </tr>
    <tr>
        <td><strong>💰 Monto Pagado:</strong></td>
        <td><strong style="color: #28a745;">${{ $paymentDetails['amount'] }} MXN</strong></td>
    </tr>
    <tr>
        <td><strong>🔑 ID de Transacción:</strong></td>
        <td>{{ $paymentDetails['transaction_id'] }}</td>
    </tr>
</table>

<div style="text-align: center; margin-top: 20px;">
    <p style="font-size: 16px; color: #555;">
        📆 Recuerda que el webinar se llevará a cabo el <strong>28 de marzo de 2025</strong>.
    </p>
    <p style="font-size: 16px; color: #555;">
        📩 Te enviaremos más detalles antes del evento.
    </p>
    <p style="font-size: 16px; color: #555;">
        Si tienes alguna duda, responde a este correo.
    </p>
</div>

<div style="text-align: center; margin-top: 30px;">
    <h2 style="color: #051726;">¡Nos vemos en el webinar! 🚀</h2>
</div>

Gracias,<br>
**El equipo de Webinar**

@endcomponent
