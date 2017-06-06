<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateAdministrator extends Command
{
    /**
     * @var string
     */
        protected $signature = 'create_admin';

    /**
     * @var string
     */

        protected $description = 'Creating user with administrative role';

        public function handle()
        {
            $this->comment('creating admin user');

        }
}