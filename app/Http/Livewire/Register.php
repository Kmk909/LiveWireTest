<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $test = "This is from register.php";
    public function render()
    {
        return view('livewire.register');
    }
}
