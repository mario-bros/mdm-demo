<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditGlobalReportsProcInsFunction extends Migration
{
    // public function getConnection()
    // {
    //     // dd( config('database.default') );
    //     // return config('admin.database.connection') ?: config('database.default');
    //     return 'report';
    // }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('
            CREATE OR REPLACE FUNCTION mdm_global_reports_dev.proc_ins()
            RETURNS trigger
            LANGUAGE plpgsql
            AS $function$BEGIN
                -- Table Contact
                INSERT INTO mdm_dev.mdm_customer_contact
                (u_id,contact_value,type_contact_id,status_keaktifan_id,status_verifikasi_id,status_data,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_contact.u_id,
                    mdm_global_reports_dev.mdm_customer_contact.contact_value,
                    mdm_global_reports_dev.mdm_customer_contact.type_contact_id,
                    mdm_global_reports_dev.mdm_customer_contact.status_keaktifan_id,
                    mdm_global_reports_dev.mdm_customer_contact.status_verifikasi_id,
                    mdm_global_reports_dev.mdm_customer_contact.status_data,
                    mdm_global_reports_dev.mdm_customer_contact.created_by
                FROM mdm_global_reports_dev.mdm_customer_contact 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_contact.u_id )
                LEFT JOIN mdm_dev.mdm_customer_contact
                    ON ( mdm_dev.mdm_customer_contact.u_id = mdm_global_reports_dev.mdm_customer_contact.u_id  
                        AND mdm_dev.mdm_customer_contact.id = mdm_global_reports_dev.mdm_customer_contact.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_contact.id is null;
                
                -- Table Identity
                INSERT INTO mdm_dev.mdm_customer_identity
                (u_id,category_identity_id,nomor_identity,masa_berlaku,status_data,description,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_identity.u_id,
                    mdm_global_reports_dev.mdm_customer_identity.category_identity_id,
                    mdm_global_reports_dev.mdm_customer_identity.nomor_identity,
                    mdm_global_reports_dev.mdm_customer_identity.masa_berlaku,
                    mdm_global_reports_dev.mdm_customer_identity.status_data,
                    mdm_global_reports_dev.mdm_customer_identity.description,
                    mdm_global_reports_dev.mdm_customer_identity.created_by
                FROM mdm_global_reports_dev.mdm_customer_identity 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_identity.u_id )
                LEFT JOIN mdm_dev.mdm_customer_identity
                    ON ( mdm_dev.mdm_customer_identity.u_id = mdm_global_reports_dev.mdm_customer_identity.u_id  
                        AND mdm_dev.mdm_customer_identity.id = mdm_global_reports_dev.mdm_customer_identity.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_identity.id is null;
                
                -- Table address
                INSERT INTO mdm_dev.mdm_customer_address
                (u_id,address,nomor,blok,rt,rw,kelurahan_id,kecamatan_id,kota_id,propinsi_id,kodepos,longitude,latitude,status_tempat_tinggal_id,type_tempat_tinggal_id,category_tempat_tinggal_id,status_keaktifan_id,status_data,status_alamat,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_address.u_id,
                    mdm_global_reports_dev.mdm_customer_address.address,
                    mdm_global_reports_dev.mdm_customer_address.nomor,
                    mdm_global_reports_dev.mdm_customer_address.blok,
                    mdm_global_reports_dev.mdm_customer_address.rt,
                    mdm_global_reports_dev.mdm_customer_address.rw,
                    mdm_global_reports_dev.mdm_customer_address.kelurahan_id,
                    mdm_global_reports_dev.mdm_customer_address.kecamatan_id,
                    mdm_global_reports_dev.mdm_customer_address.kota_id,
                    mdm_global_reports_dev.mdm_customer_address.propinsi_id,
                    mdm_global_reports_dev.mdm_customer_address.kodepos,
                    mdm_global_reports_dev.mdm_customer_address.longitude,
                    mdm_global_reports_dev.mdm_customer_address.latitude,
                    mdm_global_reports_dev.mdm_customer_address.status_tempat_tinggal_id,
                    mdm_global_reports_dev.mdm_customer_address.type_tempat_tinggal_id,
                    mdm_global_reports_dev.mdm_customer_address.category_tempat_tinggal_id,
                    mdm_global_reports_dev.mdm_customer_address.status_keaktifan_id,
                    mdm_global_reports_dev.mdm_customer_address.status_data,
                    mdm_global_reports_dev.mdm_customer_address.status_alamat,
                    mdm_global_reports_dev.mdm_customer_address.created_by
                FROM mdm_global_reports_dev.mdm_customer_address 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_address.u_id  )
                LEFT JOIN mdm_dev.mdm_customer_address
                    ON ( mdm_dev.mdm_customer_address.u_id = mdm_global_reports_dev.mdm_customer_address.u_id  
                        AND mdm_dev.mdm_customer_address.id = mdm_global_reports_dev.mdm_customer_address.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_address.id is null;
            
                -- Table Attachment
                INSERT INTO mdm_dev.mdm_customer_attachment
                (u_id,customer_identity_id,filename,type_file_id,description,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_attachment.u_id,
                    mdm_global_reports_dev.mdm_customer_attachment.customer_identity_id,
                    mdm_global_reports_dev.mdm_customer_attachment.filename,
                    mdm_global_reports_dev.mdm_customer_attachment.type_file_id,
                    mdm_global_reports_dev.mdm_customer_attachment.description,
                    mdm_global_reports_dev.mdm_customer_attachment.created_by
                FROM mdm_global_reports_dev.mdm_customer_attachment 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON (mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_attachment.u_id )
                LEFT JOIN mdm_dev.mdm_customer_attachment
                    ON ( mdm_dev.mdm_customer_attachment.u_id = mdm_global_reports_dev.mdm_customer_attachment.u_id  
                        AND mdm_dev.mdm_customer_attachment.id = mdm_global_reports_dev.mdm_customer_attachment.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_attachment.id is null;
            
                -- Table Bank Account
                INSERT INTO mdm_dev.mdm_customer_bank_account
                (u_id,nama_bank,cabang,nomor_rekening,atas_nama,status_keaktifan_id,status_data,created_by)
                SELECT
                    mdm_global_reports_dev.mdm_customer_bank_account.u_id,
                    mdm_global_reports_dev.mdm_customer_bank_account.nama_bank,
                    mdm_global_reports_dev.mdm_customer_bank_account.cabang,
                    mdm_global_reports_dev.mdm_customer_bank_account.nomor_rekening,
                    mdm_global_reports_dev.mdm_customer_bank_account.atas_nama,
                    mdm_global_reports_dev.mdm_customer_bank_account.status_keaktifan_id,
                    mdm_global_reports_dev.mdm_customer_bank_account.status_data,
                    mdm_global_reports_dev.mdm_customer_bank_account.created_by
                FROM mdm_global_reports_dev.mdm_customer_bank_account 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_bank_account.u_id  )
                LEFT JOIN mdm_dev.mdm_customer_bank_account
                    ON ( mdm_dev.mdm_customer_bank_account.u_id = mdm_global_reports_dev.mdm_customer_bank_account.u_id  
                        AND mdm_dev.mdm_customer_bank_account.id = mdm_global_reports_dev.mdm_customer_bank_account.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_bank_account.id is null;
            
                -- Table Relationship
                INSERT INTO mdm_dev.mdm_customer_relationship
                (u_id,first_name,last_name,dob,pob_id,address,mobile_phone,telephone,email,gender,religion_id,profesi_id,status_kawin_id,relationship_id,category_identity_id,nomor_identity,masa_berlaku,status_data,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_relationship.u_id,
                    mdm_global_reports_dev.mdm_customer_relationship.first_name,
                    mdm_global_reports_dev.mdm_customer_relationship.last_name,
                    cast (mdm_global_reports_dev.mdm_customer_relationship.dob as DATE) as dob,
                    mdm_global_reports_dev.mdm_customer_relationship.dob,
                    mdm_global_reports_dev.mdm_customer_relationship.pob_id,
                    mdm_global_reports_dev.mdm_customer_relationship.address,
                    mdm_global_reports_dev.mdm_customer_relationship.mobile_phone,
                    mdm_global_reports_dev.mdm_customer_relationship.telephone,
                    mdm_global_reports_dev.mdm_customer_relationship.email,
                    mdm_global_reports_dev.mdm_customer_relationship.gender,
                    mdm_global_reports_dev.mdm_customer_relationship.religion_id,
                    mdm_global_reports_dev.mdm_customer_relationship.profesi_id,
                    mdm_global_reports_dev.mdm_customer_relationship.status_kawin_id,
                    mdm_global_reports_dev.mdm_customer_relationship.relationship_id,
                    mdm_global_reports_dev.mdm_customer_relationship.category_identity_id,
                    mdm_global_reports_dev.mdm_customer_relationship.nomor_identity,
                    mdm_global_reports_dev.mdm_customer_relationship.masa_berlaku,
                    mdm_global_reports_dev.mdm_customer_relationship.status_data,
                    mdm_global_reports_dev.mdm_customer_relationship.created_by
                FROM mdm_global_reports_dev.mdm_customer_relationship 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_relationship.u_id  )
                LEFT JOIN mdm_dev.mdm_customer_relationship
                    ON ( mdm_dev.mdm_customer_relationship.u_id = mdm_global_reports_dev.mdm_customer_relationship.u_id  )
                        AND mdm_dev.mdm_customer_relationship.id = mdm_global_reports_dev.mdm_customer_relationship.id  
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_relationship.id is null;
            
                -- Table Unit
                INSERT INTO mdm_dev.mdm_customer_unit
                (u_id,status_keaktifan_id,url_profile,customer_id,created_by)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_unit.u_id,
                    mdm_global_reports_dev.mdm_customer_unit.status_keaktifan_id,
                    mdm_global_reports_dev.mdm_customer_unit.url_profile,
                    mdm_global_reports_dev.mdm_customer_unit.customer_id,
                    mdm_global_reports_dev.mdm_customer_unit.created_by
                FROM mdm_global_reports_dev.mdm_customer_unit 
                LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_unit.u_id  )
                LEFT JOIN mdm_dev.mdm_customer_unit
                    ON ( mdm_dev.mdm_customer_unit.u_id = mdm_global_reports_dev.mdm_customer_unit.u_id  
                        AND mdm_dev.mdm_customer_unit.id = mdm_global_reports_dev.mdm_customer_unit.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_unit.id is null;
            
                -- Table PROFILE
                INSERT INTO mdm_dev.mdm_customer_profile
                    (u_id,full_name,first_name,middle_name,last_name,surname,nickname,gender,dob,pob_id,suku_id,kewarganegaraan_id,negara_id,religion_id,pendidikan_id,profesi_id,golongan_darah_id,status_kawin_id,mortalitas_id,status_keaktifan_id,status_pengkinian_data_id,category_user_id,foto,email,created_by,customer_id,flag_process)
                SELECT 
                    mdm_global_reports_dev.mdm_customer_profile.u_id,
                    mdm_global_reports_dev.mdm_customer_profile.full_name,
                    mdm_global_reports_dev.mdm_customer_profile.first_name,
                    mdm_global_reports_dev.mdm_customer_profile.middle_name,
                    mdm_global_reports_dev.mdm_customer_profile.last_name,
                    mdm_global_reports_dev.mdm_customer_profile.surname,
                    mdm_global_reports_dev.mdm_customer_profile.nickname,
                    mdm_global_reports_dev.mdm_customer_profile.gender,
                    cast (mdm_global_reports_dev.mdm_customer_profile.dob as DATE) as dob,
                    mdm_global_reports_dev.mdm_customer_profile.pob_id,
                    mdm_global_reports_dev.mdm_customer_profile.suku_id,
                    mdm_global_reports_dev.mdm_customer_profile.kewarganegaraan_id,
                    mdm_global_reports_dev.mdm_customer_profile.negara_id,
                    mdm_global_reports_dev.mdm_customer_profile.religion_id,
                    mdm_global_reports_dev.mdm_customer_profile.pendidikan_id,
                    mdm_global_reports_dev.mdm_customer_profile.profesi_id,
                    mdm_global_reports_dev.mdm_customer_profile.golongan_darah_id,
                    mdm_global_reports_dev.mdm_customer_profile.status_kawin_id,
                    mdm_global_reports_dev.mdm_customer_profile.mortalitas_id,
                    mdm_global_reports_dev.mdm_customer_profile.status_keaktifan_id,
                    mdm_global_reports_dev.mdm_customer_profile.status_pengkinian_data_id,
                    mdm_global_reports_dev.mdm_customer_profile.category_user_id,
                    mdm_global_reports_dev.mdm_customer_profile.foto,
                    mdm_global_reports_dev.mdm_customer_profile.email,
                    mdm_global_reports_dev.mdm_customer_profile.created_by,
                    mdm_global_reports_dev.mdm_customer_profile.customer_id,
                    mdm_global_reports_dev.mdm_customer_profile.flag_process
                FROM mdm_global_reports_dev.mdm_customer_profile 
                LEFT JOIN mdm_dev.mdm_customer_profile
                    ON ( mdm_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_profile.u_id 
                        AND mdm_dev.mdm_customer_profile.id = mdm_global_reports_dev.mdm_customer_profile.id  )
                WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id
                AND mdm_dev.mdm_customer_profile.id is null;
            
                RETURN NEW;
            END;$function$
            ;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::unprepared('
            drop function mdm_global_reports_dev.proc_ins;
        ');
    }
}
