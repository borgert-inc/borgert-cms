<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class RocketUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rocket:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('Create your password?');

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = \Hash::make($password);
        $user->status = 1;

        $user->save();

        $this->info('The user create with success!');
    }
}
