--
-- PostgreSQL database dump
--

-- Dumped from database version 12.1
-- Dumped by pg_dump version 12.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: mdm_staging_insurance; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA mdm_staging_insurance;


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: mdm_staging_customer_profile; Type: TABLE; Schema: mdm_staging_insurance; Owner: -
--

CREATE TABLE mdm_staging_insurance.mdm_staging_customer_profile (
    u_id character varying(250) NOT NULL,
    unit character varying(50) DEFAULT 'INSU'::character varying,
    customer_id character varying(50),
    full_name character varying(250),
    first_name character varying(100),
    middle_name character varying(100),
    last_name character varying(100),
    surname character varying(50),
    nickname character varying(50),
    gender character varying(50),
    dob date,
    pob character varying(50),
    address character varying(250),
    nomor character(10),
    blok character(10),
    rt character(10),
    rw character(10),
    kelurahan character varying(50),
    kecamatan character varying(50),
    kota character varying(50),
    propinsi character varying(50),
    kodepos character(10),
    longitude character varying(50),
    latitude character varying(50),
    status_tempat_tinggal character varying(50),
    type_tempat_tinggal character varying(50),
    category_tempat_tinggal character varying(50),
    email1 character varying(100),
    email2 character varying(100),
    telepon_rumah character varying(50),
    telepon_kantor character varying(50),
    fax character varying(50),
    mobile_phone1 character varying(50),
    mobile_phone2 character varying(50),
    ktp character varying(50),
    suku character varying(50),
    kewarganegaraan character varying(50),
    negara character varying(50),
    religion character varying(50),
    pendidikan character varying(50),
    profesi character varying(50),
    golongan_darah character(10),
    status_kawin character varying(50),
    mortalitas character varying(50),
    category_user character varying(50),
    status_keaktifan character varying(50),
    status_pengkinian_data character varying(50),
    product character varying(2000),
    created_at timestamp without time zone,
    flag_process smallint,
    process_at timestamp without time zone DEFAULT now(),
    category character varying(50),
    id_type character varying(50),
    home_address_2 character varying(250),
    kode_pos character varying(10),
    home_country character varying(50),
    jabatan character varying(100),
    annual_income character varying(50),
    source_of_addl_income character varying(50),
    additional_income character varying(50),
    spouse_full_name character varying(100),
    spouse_middle_name character varying(100),
    spouse_last_name character varying(100),
    spouse_relationship character varying(50),
    spouse_date_of_birth date,
    spouse_place_of_birth character varying(50),
    spouse_gender character varying(50),
    spouse_marital_status character varying(50),
    spouse_religion character varying(50),
    spouse_nationality character varying(50),
    spouse_id_type character varying(50),
    spouse_id_no character varying(50),
    spouse_home_address_1 character varying(250),
    spouse_home_address_2 character varying(250),
    spouse_home_district character varying(50),
    spouse_home_subdistrict character varying(50),
    spouse_home_city character varying(50),
    spouse_home_province character varying(50),
    spouse_home_postal_code character varying(10),
    spouse_home_country character varying(50),
    spouse_house_status character varying(50),
    spouse_home_phone_no character varying(50),
    spouse_mobile_phone_no character varying(50),
    spouse_email_address character varying(100),
    spouse_occupation character varying(50),
    spouse_current_position character varying(100),
    rowcsum character varying(50),
    custid_org character varying(50),
    unit_org character varying(50),
    status_org character varying(50),
    updated_at timestamp without time zone,
    flag_mask integer,
    flag_share integer,
    deactivate_date timestamp without time zone,
    status_customer character varying(50),
    relasi character varying(50),
    title_pre character varying(50),
    title_suf character varying(50),
    title_name character varying(250),
    title_err character varying(50),
    address_verified smallint,
    email1_verified smallint,
    email2_verified smallint,
    mobile_phone1_verified smallint,
    mobile_phone2_verified smallint
);



--
-- Name: mdm_staging_customer_profile mdm_staging_customer_profile_pkey; Type: CONSTRAINT; Schema: mdm_staging_insurance; Owner: -
--

ALTER TABLE ONLY mdm_staging_insurance.mdm_staging_customer_profile
    ADD CONSTRAINT mdm_staging_customer_profile_pkey PRIMARY KEY (u_id);

--
-- PostgreSQL database dump complete
--

