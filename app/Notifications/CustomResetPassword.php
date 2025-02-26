<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class CustomResetPassword extends ResetPassword
{
    /**
     * Obtiene la representación del correo de la notificación.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('🔒 Restablecimiento de Contraseña - Grupo Empresarial Crecer') // Asunto más llamativo
            ->greeting('¡Hola!') // Saludo amigable
            ->line('Recibimos una solicitud para restablecer la contraseña de tu cuenta. Para continuar, haz clic en el botón de abajo.') // Mensaje más claro
            ->action('Restablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('⚠️ Este enlace es válido por solo 60 minutos. Si no realizaste esta solicitud, puedes ignorar este mensaje con seguridad.') // Advertencia más clara
            ->salutation('Atentamente, Equipo de Grupo Empresarial Crecer'); // Cierre más profesional
    }
}
