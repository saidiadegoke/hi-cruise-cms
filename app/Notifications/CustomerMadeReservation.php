<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerMadeReservation extends Notification
{
    use Queueable;

    public $customer;
    public $reservation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($customer, $reservation)
    {
        $this->customer = $customer;
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/print_receipt/'. $this->reservation->id);
        //$url = route('print_receipt',['reservation' => $this->reservation->id]);

        return (new MailMessage)
                    ->greeting('Hello ' . $this->customer->firstname . ',')
                    ->line('Thank you for booking a reservation with us. Your reservation details is as follows:')
                    ->line($this->reservation->package? $this->reservation->package->description: 'Contact admin for details')
                    ->action('View Ticket', $url)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'package' => $this->reservation->toArray()
        ];
    }
}
