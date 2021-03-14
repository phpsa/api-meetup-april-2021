<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        $existing = User::where('email', $email)->first();
        if ($existing) {
            $this->error('Sorry, that email is already registered in the system');
            exit;
        }

        $name = $this->ask('What is your name?');

        $password = $this->secret("Password");
        $conf = $this->secret("Confirm Password");
        if ($password !== $conf) {
            $this->error("passwords did not match");
            exit;
        }

        $isAdmin = $this->confirm("Assign Admin Role?", false);

        User::unguard();
        $user = User::create([
            'name'              => $name,
            'email'             => $email,
            'password'          => Hash::make($password),
            'email_verified_at' => now(),
        ]);
        User::reguard();

        $role = Role::where('name', $isAdmin ? 'Admin' : 'User')->first();

        $user->assignRole([$role->id]);

        $this->info('User Successfully Generated');
    }
}
