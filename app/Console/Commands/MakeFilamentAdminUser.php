<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

#[Signature('make:filament-admin-user')]
#[Description('Create a Filament administrator account')]
class MakeFilamentAdminUser extends Command
{
    public function handle(): int
    {
        $userData = [
            'name' => $this->ask('Name'),
            'email' => $this->ask('Email address'),
            'password' => $this->secret('Password'),
            'password_confirmation' => $this->secret('Confirm password'),
        ];

        $validator = Validator::make($userData, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::create($validator->validated());
        $adminRole = Role::findOrCreate('admin', 'web');
        $user->assignRole($adminRole);

        $this->components->info("Admin account {$user->email} created successfully.");

        return self::SUCCESS;
    }
}
