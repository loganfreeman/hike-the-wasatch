<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Events\Dispatcher;
use App\User;

class CreateUser extends Command
{

    /**
     * The command name.
     *
     * @var string
     */
    protected $name = 'cms:user';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Create admin users';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

      $this->createUser();
    }


    private function createUser()
    {
      $name = $this->ask('Enter your admin name');
      $email = $this->ask('Enter your admin email');
      $password = $this->ask('Enter your admin password');

      $user = new User;
      $user->name = $name;
      $user->email = $email;
      $user->password = bcrypt($password);
      $user->role = "admin";
      $user->save();

    }
}
