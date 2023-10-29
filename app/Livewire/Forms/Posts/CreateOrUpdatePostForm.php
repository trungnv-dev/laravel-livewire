<?php

namespace App\Livewire\Forms\Posts;

use Livewire\Form;

class CreateOrUpdatePostForm extends Form
{
    public $title = '';
    public $body  = '';

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'string', 'max:5000'],
        ];
    }

    public function messages() 
    {
        return [
            // 
        ];
    }

    public function validationAttributes()
    {
        return [
            'title' => 'Title',
            'body'  => 'Body',
        ];
    }
}
