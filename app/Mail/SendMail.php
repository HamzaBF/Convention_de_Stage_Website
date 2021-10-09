<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
        

    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(Auth()->id());
        
        if($user->role == 'stagiaire')
        {
            return $this->from('eval2020@mascir.ma')->subject("Convention de stage à compléter")->view('email.emailView')->with('data', $this->data);
        }

        if($user->role == 'encadrant')
        {
            return $this->from('eval2020@mascir.ma')->subject("Convention de stage encadrant -> RH")->view('email.enctorh')->with('data', $this->data);
        }


        
        
    }
}
