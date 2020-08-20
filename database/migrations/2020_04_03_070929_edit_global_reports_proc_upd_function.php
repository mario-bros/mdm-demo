<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditGlobalReportsProcUpdFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::unprepared('
            CREATE OR REPLACE FUNCTION mdm_global_reports_dev.proc_upd()
            RETURNS trigger
            LANGUAGE plpgsql
            AS $function$DECLARE 
                rec_cust RECORD;
                rec_identity RECORD;
                rec_address RECORD;
                rec_attachment RECORD;
                rec_bank_account RECORD;
                rec_relationship RECORD;
                rec_unit RECORD;
                rec_profile RECORD;
                    
                -- CURSOR TABLE CONTACT
                curs1 CURSOR FOR
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
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_contact.updated_by is not null;
                
                -- CURSOR TABLE IDENTITY
                curs2 CURSOR FOR
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
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_identity.u_id  )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_identity.updated_by is not null;

                -- CURSOR TABLE ADDRESS
                curs3 CURSOR FOR
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
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_address.u_id )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_address.updated_by is not null;
                
                -- CURSOR TABLE ATTACHMENT
                curs4 CURSOR FOR
                    SELECT
                        mdm_global_reports_dev.mdm_customer_attachment.u_id,
                        mdm_global_reports_dev.mdm_customer_attachment.customer_identity_id,
                        mdm_global_reports_dev.mdm_customer_attachment.filename,
                        mdm_global_reports_dev.mdm_customer_attachment.type_file_id,
                        mdm_global_reports_dev.mdm_customer_attachment.description,
                        mdm_global_reports_dev.mdm_customer_attachment.created_by
                    FROM mdm_global_reports_dev.mdm_customer_attachment
                    LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_attachment.u_id )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_attachment.updated_by is not null;

                -- CURSOR TABLE BANK ACCOUNT
                curs5 CURSOR FOR
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
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_bank_account.u_id )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_bank_account.updated_by is not null;
                    
                -- CURSOR TABLE RELATIONSHIP
                curs6 CURSOR FOR
                    SELECT
                        mdm_global_reports_dev.mdm_customer_relationship.u_id,
                        mdm_global_reports_dev.mdm_customer_relationship.first_name,
                        mdm_global_reports_dev.mdm_customer_relationship.last_name,
                        cast (mdm_global_reports_dev.mdm_customer_relationship.dob as DATE) as dob,
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
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_relationship.u_id )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_relationship.updated_by is not null;
                
                -- CURSOR TABLE UNIT
                curs7 CURSOR FOR
                    SELECT 
                        mdm_global_reports_dev.mdm_customer_unit.u_id,
                        mdm_global_reports_dev.mdm_customer_unit.status_keaktifan_id,
                        mdm_global_reports_dev.mdm_customer_unit.url_profile,
                        mdm_global_reports_dev.mdm_customer_unit.customer_id,
                        mdm_global_reports_dev.mdm_customer_unit.created_by,
                        mdm_global_reports_dev.mdm_customer_unit.unit_id    
                    FROM mdm_global_reports_dev.mdm_customer_unit 
                    LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                        ON ( mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_unit.u_id )
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null 
                    AND mdm_global_reports_dev.mdm_customer_unit.updated_by is not null;
                
                -- CURSOR TABLE PROFILE
                curs8 CURSOR FOR
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
                    --LEFT JOIN mdm_global_reports_dev.mdm_customer_profile
                    --ON mdm_global_reports_dev.mdm_customer_profile.u_id = mdm_global_reports_dev.mdm_customer_profile.u_id  
                    WHERE mdm_global_reports_dev.mdm_customer_profile.u_id = NEW.u_id 
                    AND mdm_global_reports_dev.mdm_customer_profile.updated_by is not null;

                BEGIN
                    OPEN curs1; -- table contact
                    OPEN curs2; -- table identity
                    OPEN curs3; -- table address
                    OPEN curs4; -- table attachment
                    OPEN curs5; -- table bank account
                    OPEN curs6; -- table relationship
                    OPEN curs7; -- table unit
                    OPEN curs8; -- table profile
                
                        LOOP
                            -- fetch row into the variable
                            FETCH curs1 INTO rec_cust;
                            FETCH curs2 INTO rec_identity;
                            FETCH curs3 INTO rec_address;
                            FETCH curs4 INTO rec_attachment;
                            FETCH curs5 INTO rec_bank_account;
                            FETCH curs6 INTO rec_relationship;
                            FETCH curs7 INTO rec_unit;
                            FETCH curs8 INTO rec_profile;
                
                            -- exit when no more row to fetch
                            EXIT WHEN NOT FOUND;
                
                            -- update table contact
                            UPDATE mdm_dev.mdm_customer_contact 
                                SET 
                                    contact_value           = rec_cust.contact_value, 
                                    type_contact_id         = rec_cust.type_contact_id,
                                    status_keaktifan_id     = rec_cust.status_keaktifan_id,
                                    status_verifikasi_id    = rec_cust.status_verifikasi_id,
                                    status_data             = rec_cust.status_data,
                                    created_by              = rec_cust.created_by
                                WHERE u_id	= rec_cust.u_id;
                            
                            -- update table identity			
                            UPDATE mdm_dev.mdm_customer_identity 
                                SET 
                                    category_identity_id	= rec_identity.category_identity_id,
                                    nomor_identity          = rec_identity.nomor_identity,
                                    masa_berlaku            = rec_identity.masa_berlaku,
                                    status_data             = rec_identity.status_data,
                                    description             = rec_identity.description,
                                    created_by              = rec_identity.created_by
                                WHERE u_id	= rec_identity.u_id;
                
                            -- update table address			
                            UPDATE mdm_dev.mdm_customer_address 
                                SET 
                                    address                     = rec_address.address,
                                    nomor                       = rec_address.nomor,
                                    blok                        = rec_address.blok,
                                    rt                          = rec_address.rt,
                                    rw                          = rec_address.rw,
                                    kelurahan_id                = rec_address.kelurahan_id,
                                    kecamatan_id                = rec_address.kecamatan_id,
                                    kota_id                     = rec_address.kota_id,
                                    propinsi_id                 = rec_address.propinsi_id,
                                    kodepos                     = rec_address.kodepos,
                                    longitude                   = rec_address.longitude,
                                    latitude                    = rec_address.latitude,
                                    status_tempat_tinggal_id    = rec_address.status_tempat_tinggal_id,
                                    type_tempat_tinggal_id      = rec_address.type_tempat_tinggal_id,
                                    category_tempat_tinggal_id  = rec_address.category_tempat_tinggal_id,
                                    status_keaktifan_id         = rec_address.status_keaktifan_id,
                                    status_data                 = rec_address.status_data,
                                    status_alamat               = rec_address.status_alamat,
                                    created_by                  = rec_address.created_by
                                WHERE u_id	= rec_address.u_id;
                
                            -- update table attachment			
                            UPDATE mdm_dev.mdm_customer_attachment
                                SET 
                                    customer_identity_id    = rec_attachment.customer_identity_id,
                                    filename                = rec_attachment.filename,
                                    type_file_id            = rec_attachment.type_file_id,
                                    description             = rec_attachment.description,
                                    created_by              = rec_attachment.created_by
                                WHERE u_id	= rec_attachment.u_id;
                
                            -- update table bank account			
                            UPDATE mdm_dev.mdm_customer_bank_account
                                SET 
                                    nama_bank           = rec_bank_account.nama_bank,
                                    cabang              = rec_bank_account.cabang,
                                    nomor_rekening      = rec_bank_account.nomor_rekening,
                                    atas_nama           = rec_bank_account.atas_nama,
                                    status_keaktifan_id = rec_bank_account.status_keaktifan_id,
                                    status_data         = rec_bank_account.status_data,
                                    created_by          = rec_bank_account.created_by
                                WHERE u_id	= rec_bank_account.u_id;
                
                            -- update table relationship			
                            UPDATE mdm_dev.mdm_customer_relationship
                                SET 
                                    first_name              = rec_relationship.first_name,
                                    last_name               = rec_relationship.last_name,
                                    dob                     = rec_relationship.dob,
                                    pob_id                  = rec_relationship.pob_id,
                                    address                 = rec_relationship.address,
                                    mobile_phone            = rec_relationship.mobile_phone,
                                    telephone               = rec_relationship.telephone,
                                    email                   = rec_relationship.email,
                                    gender                  = rec_relationship.gender,
                                    religion_id             = rec_relationship.religion_id,
                                    profesi_id              = rec_relationship.profesi_id,
                                    status_kawin_id         = rec_relationship.status_kawin_id,
                                    relationship_id         = rec_relationship.relationship_id,
                                    category_identity_id    = rec_relationship.category_identity_id,
                                    nomor_identity          = rec_relationship.nomor_identity,
                                    masa_berlaku            = rec_relationship.masa_berlaku,
                                    status_data             = rec_relationship.status_data,
                                    created_by              = rec_relationship.created_by
                                WHERE u_id	= rec_relationship.u_id;
                
                            -- update table unit			
                            UPDATE mdm_dev.mdm_customer_unit
                                SET 
                                    status_keaktifan_id = rec_unit.status_keaktifan_id,
                                    url_profile         = rec_unit.url_profile,
                                    customer_id         = rec_unit.customer_id,
                                    created_by          = rec_unit.created_by,
                                    unit_id             = rec_unit.unit_id
                                WHERE u_id	= rec_unit.u_id;
                
                            -- update table profile			
                            UPDATE mdm_dev.mdm_customer_profile
                                SET 
                                    full_name                   = rec_profile.full_name,
                                    first_name                  = rec_profile.first_name,
                                    middle_name                 = rec_profile.middle_name,
                                    last_name                   = rec_profile.last_name,
                                    surname                     = rec_profile.surname,
                                    nickname                    = rec_profile.nickname,
                                    gender                      = rec_profile.gender,
                                    dob                         = rec_profile.dob,
                                    pob_id                      = rec_profile.pob_id,
                                    suku_id                     = rec_profile.suku_id,
                                    kewarganegaraan_id          = rec_profile.kewarganegaraan_id,
                                    negara_id                   = rec_profile.negara_id,
                                    religion_id                 = rec_profile.religion_id,
                                    pendidikan_id               = rec_profile.pendidikan_id,
                                    profesi_id                  = rec_profile.profesi_id,
                                    golongan_darah_id           = rec_profile.golongan_darah_id,
                                    status_kawin_id             = rec_profile.status_kawin_id,
                                    mortalitas_id               = rec_profile.mortalitas_id,
                                    status_keaktifan_id         = rec_profile.status_keaktifan_id,
                                    status_pengkinian_data_id   = rec_profile.status_pengkinian_data_id,
                                    category_user_id            = rec_profile.category_user_id,
                                    foto                        = rec_profile.foto,
                                    email                       = rec_profile.email,
                                    created_by                  = rec_profile.created_by,
                                    customer_id                 = rec_profile.customer_id,
                                    flag_process                = rec_profile.flag_process
                                WHERE u_id	= rec_profile.u_id;
                
                        END LOOP;
                
                    -- Close the cursor
                    CLOSE curs1;
                    CLOSE curs2;
                    CLOSE curs3;
                    CLOSE curs4;
                    CLOSE curs5;
                    CLOSE curs6;
                    CLOSE curs7;
                    CLOSE curs8;
            
                RETURN NEW;
            END;$function$
        ');
    }
}
