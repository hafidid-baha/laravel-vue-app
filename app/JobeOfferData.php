<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobeOfferData extends Model
{
    public $fullname;
    public $email;
    public $message;
    //
    public function __construct($fullname,$email,$message){
        $this->fullname = $fullname;
        $this->email = $email;
        $this->message = $message;
    }
}
