<?php

use Illuminate\Database\Seeder;
use App\Model\BusinessUnits\INSU\Profile as InsuranceProfile;
use App\Model\BusinessUnits\FINA\Profile as FinanceProfile;

class DemoBusinessUnitCustomerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insuranceCustomer1 = new InsuranceProfile();
        $insuranceCustomer1->u_id = '0000002A-0F96-4E03-903D-9FC0D37E0280';
        $insuranceCustomer1->unit = 'INSU';
        $insuranceCustomer1->customer_id = '1500038175';
        $insuranceCustomer1->full_name = 'SARYOTO .';
        $insuranceCustomer1->first_name = 'SARYOTO .';
        $insuranceCustomer1->gender = 'L';
        $insuranceCustomer1->dob = '1982-07-25';
        $insuranceCustomer1->pob = 'CIREBON';
        $insuranceCustomer1->address = 'JL. AMBAR BINANGUN NO. 469 RT. 11 (FOTOCOPY MERRY)';
        $insuranceCustomer1->email1 = 'random@gmail.com';
        $insuranceCustomer1->process_at = '2020-06-22 10:18:07.013689';
        $insuranceCustomer1->id_type = 'K';
        $insuranceCustomer1->save();

        $insuranceCustomer2 = new InsuranceProfile();
        $insuranceCustomer2->u_id = '00000348-C9F8-42AB-87E0-7AA031C35680';
        $insuranceCustomer2->unit = 'INSU';
        $insuranceCustomer2->customer_id = '730358217';
        $insuranceCustomer2->full_name = 'FTV';
        $insuranceCustomer2->first_name = 'FTV';
        $insuranceCustomer2->gender = 'L';
        $insuranceCustomer2->dob = '1982-07-25';
        $insuranceCustomer2->pob = 'CIREBON';
        $insuranceCustomer2->address = 'JL. AMBAR BINANGUN NO. 469 RT. 11 (FOTOCOPY MERRY)';
        $insuranceCustomer2->email1 = 'random@gmail.com';
        $insuranceCustomer2->process_at = '2020-06-22 10:18:07.013689';
        $insuranceCustomer2->id_type = 'K';
        $insuranceCustomer2->save();

        $financeCustomer1 = new FinanceProfile();
        $financeCustomer1->u_id = '00000373-7055-4101-A6F2-469BBB10805D';
        $financeCustomer1->unit = 'FINA';
        $financeCustomer1->customer_id = '710271381';
        $financeCustomer1->full_name = 'FTV';
        $financeCustomer1->first_name = 'FTV';
        $financeCustomer1->gender = 'L';
        $financeCustomer1->dob = '1982-07-25';
        $financeCustomer1->pob = 'CIREBON';
        $financeCustomer1->address = 'JL. AMBAR BINANGUN NO. 469 RT. 11 (FOTOCOPY MERRY)';
        $financeCustomer1->email1 = 'random@gmail.com';
        $financeCustomer1->process_at = '2020-06-22 10:18:07.013689';
        $financeCustomer1->id_type = 'K';
        $financeCustomer1->save();

        $financeCustomer2 = new FinanceProfile();
        $financeCustomer2->u_id = '00000519-9DB4-4129-B1BA-807BA999FC1D';
        $financeCustomer2->unit = 'FINA';
        $financeCustomer2->customer_id = '410082318';
        $financeCustomer2->full_name = 'VINCENT';
        $financeCustomer2->first_name = 'VINCENT';
        $financeCustomer2->gender = 'L';
        $financeCustomer2->dob = '1982-07-25';
        $financeCustomer2->pob = 'CIREBON';
        $financeCustomer2->address = 'JL. AMBAR BINANGUN NO. 469 RT. 11 (FOTOCOPY MERRY)';
        $financeCustomer2->email1 = 'random@gmail.com';
        $financeCustomer2->process_at = '2020-06-22 10:18:07.013689';
        $financeCustomer2->id_type = 'K';
        $financeCustomer2->save();

    }
}
