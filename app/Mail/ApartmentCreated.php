<?php

namespace App\Mail;

use App\Models\Apartments;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApartmentCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $apartment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Apartments $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.apartments.created')->with([
            'apartment_address' => $this->apartment->street . ", " . $this->apartment->postal_code . "," . $this->apartment->town . "," . $this->apartment->country,
            'apartment_property_id' => $this->apartment->property_id,
            'move_in_date' => $this->apartment->move_in_date,
            'editUrl' => $this->apartment->access_token,
            'deleteUrl' => $this->apartment->access_token,
        ]);
    }
}
