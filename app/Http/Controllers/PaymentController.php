<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; // Asegúrate de tener este modelo
use App\Mail\PaymentConfirmationMail;
use Illuminate\Support\Facades\Mail;
// use Twilio\Rest\Client;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Verificar si el correo ya está registrado
            $existingUser = Registration::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json([
                    'error' => 'El correo ya está en uso. Por favor, usa otro.'
                ], 400);
            }

            // Guardar el registro en la base de datos
            $registration = Registration::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone ?? null, // Si no se envía, será NULL
                'stage' => $request->stage,
                'transaction_id' => $request->transaction_id,
                'amount' => $request->amount
            ]);


            $paymentDetails = [
                'first_name' => $registration->first_name,
                'last_name' => $registration->last_name,
                'email' => $registration->email,
                'amount' => $registration->amount,
                'transaction_id' => $registration->transaction_id
            ];

            // // ✅ Enviar WhatsApp solo si el usuario ingresó su número
            // if ($registration->phone) {
            //     $this->sendWhatsAppNotification($registration);
            // }

            // Enviar email
            Mail::to($registration->email)->send(new PaymentConfirmationMail($paymentDetails));

            return response()->json([
                'message' => 'Pago registrado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al guardar el pago: ' . $e->getMessage()
            ], 500);
        }
    }

    // private function sendWhatsAppNotification($registration)
    // {
    //     $sid    = env('TWILIO_ACCOUNT_SID');
    //     $token  = env('TWILIO_AUTH_TOKEN');
    //     $twilio = new Client($sid, $token);

    //     $message = "🎉 ¡Hola " . $registration->first_name . "! 🎉\n\n"
    //         . "Tu registro en el *Webinar de Emprendimiento* ha sido confirmado. 🎯\n"
    //         . "📅 Fecha: 28 de marzo de 2025\n"
    //         . "🕒 Hora: 7:00 PM - 10:00 PM\n"
    //         . "📍 Modalidad: Online (Zoom)\n\n"
    //         . "Te esperamos. ¡No faltes! 🚀";

    //     try {
    //         $twilio->messages->create(
    //             "whatsapp:" . $registration->phone, // 📲 Número del usuario
    //             [
    //                 "from" => "whatsapp:" . env('TWILIO_PHONE_NUMBER'), // 📩 Número de Twilio Sandbox
    //                 "body" => $message
    //             ]
    //         );
    //         \Log::info("Mensaje enviado a " . $registration->phone);
    //     } catch (\Exception $e) {
    //         \Log::error('Error enviando WhatsApp: ' . $e->getMessage());
    //     }
    // }

    public function validateEmail(Request $request)
    {
        $exists = Registration::where('email', $request->email)->exists();

        return response()->json(['exists' => $exists]);
    }
}
