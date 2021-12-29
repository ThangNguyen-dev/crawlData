<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Login extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getEmail($user)
    {
        return $this->email = $user['email'];
    }

    public function getPassword($user)
    {
        return $this->password = $user['password'];
    }

    public function getAge($user)
    {
        return $this->age = $user['age'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.login');
    }
}
