<?php

namespace App\Console\Commands;

use App\Models\VrUsers;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vr:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates admin user';

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
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Creating admin user');
        $name = $this->ask('insert name');
        $email = $this->ask('insert email');
        $password = $this->secret('insert password');
        $phone = $this->ask('insert phone');

        $record = VrUsers::create([
            'id' => Uuid::uuid4(),
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone' => $phone,

        ]);

        $record->role()->sync('super-admin');
    }
}