<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected static ?string $password;
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $admin = User::create([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'password' => bcrypt('12345678'),
            ],);
    
            $penulis = User::create([
                'email' => 'penulis@gmail.com',
                'name' => 'penulis',
                'password' => bcrypt('12345678'),
            ],);
    
            $pelanggan = User::create([
                'email' => 'pelanggan@gmail.com',
                'name' => 'pelanggan',
                'password' => bcrypt('12345678'),
            ],);
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_penulis = Role::create(['name' => 'penulis']);
            $role_pelanggan = Role::create(['name' => 'pelanggan']);
    
            $permission1 = Permission::create(['name' => 'view admin']);
            $permission2 = Permission::create(['name' => 'view penulis']);
            $permission3 = Permission::create(['name' => 'view pelanggan']);

            $role_admin->givePermissionTo('view admin');
            $role_penulis->givePermissionTo('view penulis');
            $role_pelanggan->givePermissionTo('view pelanggan');
        
            $admin->assignRole('admin');
            $penulis->assignRole('penulis');
            $pelanggan->assignRole('pelanggan');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        
    }
}
