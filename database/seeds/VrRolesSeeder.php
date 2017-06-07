<?php

use App\Models\VrRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VrRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * standart roles seeds
     * @return void
     */
    public function run()
    {
        $users = [
            ["name" => "Super Admin", "id" => "super-admin"], // Manage everything
            ["name" => "Project Admin", "id" => "project-admin"], // Manage most aspects of the site
            ["name" => "Editor", "id" => "editor"], // Scheduling and managing content
            ["name" => "Author", "id" => "author"], // Write important content
            ["name" => "Contributor", "id" => "contributor"], // Authors with limited rights
            ["name" => "Moderator", "id" => "moderator"], // Moderate user content
            ["name" => "Member", "id" => "member"], // Special user access
            ["name" => "Subscriber", "id" => "subscriber"], // Paying Average Joe
            ["name" => "User", "id" => "user"], // Average Joe
        ];
        DB::beginTransaction();
        try {
            foreach ($users as $user) {
                $record = VrRoles::find($user['id']);
                if (!$record) {
                    VrRoles::create($user);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure '. $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
