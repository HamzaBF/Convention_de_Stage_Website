<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class sendemailpdf extends Mailable
{
    use Queueable, SerializesModels;
    protected $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$pdf)
    {
        //
        $this->data = $data; 
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(Auth()->id());

        if($user->role == 'RH')
        {
            return $this->from('eval2020@mascir.ma')->subject("Signature de votre convention de stage")->view('email.rhtostag')->attachData($this->pdf->output(), 'Convention_de_stage.pdf')->with('data', $this->data);
        }

    }
}
