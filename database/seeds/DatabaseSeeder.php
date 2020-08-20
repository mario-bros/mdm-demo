<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminMenuTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminRoleMenuTableSeeder::class);
        $this->call(AdminRolePermissionsTableSeeder::class);
        $this->call(AdminRoleUsersTableSeeder::class);
        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminUserPermissionsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(MdmLookupsTableSeeder::class);
        $this->call(MdmMstCompanyTableSeeder::class);
        $this->call(MdmMstCountryTableSeeder::class);
        $this->call(MdmMstKecamatanTableSeeder::class);
        $this->call(MdmMstKelurahanTableSeeder::class);
        $this->call(MdmMstKotaTableSeeder::class);
        $this->call(MdmMstProvinsiTableSeeder::class);
        $this->call(MdmCustomerProfileWebTableSeeder::class);

        $this->call(DemoBusinessUnitCustomerDataSeeder::class);
    }
}
