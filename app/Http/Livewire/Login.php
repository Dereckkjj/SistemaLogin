<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LoginController;
use Livewire\Component;

class Login extends Component
{
    /**
     * Auth about login
     *
     * @var object User
     */
    private $user;

    /**
     * Email user
     *
     * @var string
     */
    public $email;

    /**
     * Password user
     *
     * @var string
     */
    public $password;

    /**
     * Message error
     *
     * @var string
     */
    public $error;

    /**
     * Message success
     *
     * @var string
     */
    public $messagess;

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:8',
    ];

    public function validateForm()
    {
        $this->validate();

        $this->user = new LoginController();

        $this->user->authenticate(['email' => $this->email, 'password' => $this->password]);

    }

    public function forgetPassword()
    {
        return redirect()->route('forgetPassword');
    }

    public function cadUser(){

        return redirect()->route('cadUser');

    }

    public function render()
    {

        return view('livewire.login',[
            'error' => $this->error,
            'messages' => $this->messagess
        ]);
    }
}
