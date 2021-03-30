<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;

class AddUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user in the system';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask('What is your email?');
        $name = $this->ask('What is your name?');
        $password = $this->secret("Password");
        $conf = $this->secret("Confirm Password");

        $isAdmin = $this->confirm("Assign Admin Role?", false);

        try {
            $user = (new CreateNewUser())->create([

                'name'                  => $name,
                'email'                 => $email,
                'password'              => $password,
                'password_confirmation' => $conf

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }

        $role = Role::where('name', $isAdmin ? 'Admin' : 'User')->first();

        $user->assignRole([$role->id]);

        $this->info('User Successfully Generated');
    }
}
