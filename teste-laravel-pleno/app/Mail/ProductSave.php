<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductSave extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $product_name;
    public $product_value;
    public $action;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($storeName, $product, $action)
    {
        $this->name = $storeName;
        $this->product_name = $product->name;
        $this->product_value = $product->value;
        $this->action = $action;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Obrigado por escolher nossa plataforma!')
        ->markdown('emails.productSave');
    }
}
