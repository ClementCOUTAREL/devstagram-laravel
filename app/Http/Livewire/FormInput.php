<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormInput extends Component
{

    public $field;
    public $fieldName;
    public $type;

    public function render()
    {
        return view('livewire.form-input');
    }
}