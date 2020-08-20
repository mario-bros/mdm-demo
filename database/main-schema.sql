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
-- Name: mdm_dev; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA mdm_dev;


ALTER SCHEMA mdm_dev OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

-- mdm_dev.admin_config definition

-- Drop table

-- DROP TABLE mdm_dev.admin_config;

CREATE TABLE mdm_dev.admin_config (
	id serial NOT NULL,
	"name" varchar(191) NULL,
	value varchar(191) NULL,
	description text NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT admin_config_pkey1 PRIMARY KEY (id)
);


-- mdm_dev.admin_email_template definition

-- Drop table

-- DROP TABLE mdm_dev.admin_email_template;

CREATE TABLE mdm_dev.admin_email_template (
	id serial NOT NULL,
	"name" varchar(50) NULL,
	"group" varchar(50) NULL,
	"text" text NULL,
	status int4 NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT admin_email_template_pkey PRIMARY KEY (id)
);


-- mdm_dev.admin_menu definition

-- Drop table

-- DROP TABLE mdm_dev.admin_menu;

CREATE TABLE mdm_dev.admin_menu (
	id serial NOT NULL,
	parent_id int4 NOT NULL DEFAULT 0,
	"order" int4 NOT NULL DEFAULT 0,
	title varchar(50) NOT NULL,
	icon varchar(50) NOT NULL,
	uri varchar(50) NULL,
	"permission" varchar(191) NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT admin_menu_pkey PRIMARY KEY (id)
);


-- mdm_dev.admin_operation_log definition

-- Drop table

-- DROP TABLE mdm_dev.admin_operation_log;

CREATE TABLE mdm_dev.admin_operation_log (
	id serial NOT NULL,
	user_id int4 NOT NULL,
	"path" varchar(191) NOT NULL,
	"method" varchar(10) NOT NULL,
	ip varchar(191) NOT NULL,
	"input" text NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	description varchar(191) NOT NULL DEFAULT ''::character varying,
	CONSTRAINT admin_operation_log_pkey PRIMARY KEY (id)
);
CREATE INDEX admin_operation_log_user_id_index ON mdm_dev.admin_operation_log USING btree (user_id);


-- mdm_dev.admin_permissions definition

-- Drop table

-- DROP TABLE mdm_dev.admin_permissions;

CREATE TABLE mdm_dev.admin_permissions (
	id serial NOT NULL,
	"name" varchar(50) NOT NULL,
	slug varchar(50) NOT NULL,
	http_method varchar(191) NULL,
	http_path text NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT admin_permissions_name_unique UNIQUE (name),
	CONSTRAINT admin_permissions_pkey PRIMARY KEY (id),
	CONSTRAINT admin_permissions_slug_unique UNIQUE (slug)
);


-- mdm_dev.admin_role_menu definition

-- Drop table

-- DROP TABLE mdm_dev.admin_role_menu;

CREATE TABLE mdm_dev.admin_role_menu (
	role_id int4 NOT NULL,
	menu_id int4 NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL
);
CREATE INDEX admin_role_menu_role_id_menu_id_index ON mdm_dev.admin_role_menu USING btree (role_id, menu_id);


-- mdm_dev.admin_role_permissions definition

-- Drop table

-- DROP TABLE mdm_dev.admin_role_permissions;

CREATE TABLE mdm_dev.admin_role_permissions (
	role_id int4 NOT NULL,
	permission_id int4 NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL
);
CREATE INDEX admin_role_permissions_role_id_permission_id_index ON mdm_dev.admin_role_permissions USING btree (role_id, permission_id);


-- mdm_dev.admin_role_users definition

-- Drop table

-- DROP TABLE mdm_dev.admin_role_users;

CREATE TABLE mdm_dev.admin_role_users (
	role_id int4 NOT NULL,
	user_id int4 NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL
);
CREATE INDEX admin_role_users_role_id_user_id_index ON mdm_dev.admin_role_users USING btree (role_id, user_id);


-- mdm_dev.admin_roles definition

-- Drop table

-- DROP TABLE mdm_dev.admin_roles;

CREATE TABLE mdm_dev.admin_roles (
	id serial NOT NULL,
	"name" varchar(50) NOT NULL,
	slug varchar(50) NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT admin_roles_name_unique UNIQUE (name),
	CONSTRAINT admin_roles_pkey PRIMARY KEY (id),
	CONSTRAINT admin_roles_slug_unique UNIQUE (slug)
);


-- mdm_dev.admin_user_permissions definition

-- Drop table

-- DROP TABLE mdm_dev.admin_user_permissions;

CREATE TABLE mdm_dev.admin_user_permissions (
	user_id int4 NOT NULL,
	permission_id int4 NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL
);
CREATE INDEX admin_user_permissions_user_id_permission_id_index ON mdm_dev.admin_user_permissions USING btree (user_id, permission_id);


-- mdm_dev.admin_users definition

-- Drop table

-- DROP TABLE mdm_dev.admin_users;

CREATE TABLE mdm_dev.admin_users (
	id serial NOT NULL,
	username varchar(190) NOT NULL,
	"password" varchar(60) NOT NULL,
	"name" varchar(191) NOT NULL,
	avatar varchar(191) NULL,
	remember_token varchar(100) NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	unit_id varchar(10) NULL,
	email varchar(50) NULL,
	CONSTRAINT admin_users_pkey PRIMARY KEY (id),
	CONSTRAINT admin_users_username_unique UNIQUE (username)
);


-- mdm_dev.mdm_apiclientinfo definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_apiclientinfo;

CREATE TABLE mdm_dev.mdm_apiclientinfo (
	id serial NOT NULL,
	"name" varchar(191) NOT NULL,
	api_token varchar(100) NOT NULL,
	description varchar(191) NULL,
	"owner" varchar(191) NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT mdm_apiclientinfo_api_token_unique UNIQUE (api_token),
	CONSTRAINT mdm_apiclientinfo_name_unique UNIQUE (name),
	CONSTRAINT mdm_apiclientinfo_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_bank definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_bank;

CREATE TABLE mdm_dev.mdm_bank (
	id int4 NOT NULL,
	"name" varchar(255) NOT NULL,
	CONSTRAINT bank_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_config definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_config;

CREATE TABLE mdm_dev.mdm_config (
	id serial NOT NULL,
	"type" varchar(50) NULL,
	code varchar(50) NULL,
	"key" varchar(50) NULL,
	value varchar(200) NULL,
	sort int4 NULL,
	detail text NULL,
	CONSTRAINT admin_config_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_customer_address definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_address;

CREATE TABLE mdm_dev.mdm_customer_address (
	u_id varchar(255) NULL,
	uid_golden varchar(255) NULL,
	address varchar(255) NULL,
	nomor varchar(20) NULL,
	blok varchar(10) NULL,
	rt varchar(20) NULL,
	rw varchar(20) NULL,
	kelurahan_id varchar(20) NULL,
	kecamatan_id varchar(20) NULL,
	kota_id varchar(20) NULL,
	propinsi_id varchar(20) NULL,
	kodepos varchar(20) NULL,
	longitude varchar(255) NULL,
	latitude varchar(255) NULL,
	status_tempat_tinggal_id varchar(20) NULL,
	type_tempat_tinggal_id varchar(20) NULL,
	category_tempat_tinggal_id varchar(20) NULL,
	status_keaktifan_id int4 NULL,
	status_data int4 NULL,
	status_alamat varchar(50) NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	id bigserial NOT NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_customer_address_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_address_kota_id_idx ON mdm_dev.mdm_customer_address USING btree (kota_id);
CREATE INDEX mdm_customer_address_u_id_index ON mdm_dev.mdm_customer_address USING btree (u_id);


-- mdm_dev.mdm_customer_address_mask definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_address_mask;

CREATE TABLE mdm_dev.mdm_customer_address_mask (
	u_id varchar(50) NULL,
	uid_golden varchar(50) NULL,
	address varchar(255) NULL,
	nomor varchar(20) NULL,
	blok varchar(10) NULL,
	rt varchar(20) NULL,
	rw varchar(20) NULL,
	kelurahan_id varchar(20) NULL,
	kecamatan_id varchar(20) NULL,
	kota_id varchar(20) NULL,
	propinsi_id varchar(20) NULL,
	kodepos varchar(20) NULL,
	longitude varchar(50) NULL,
	latitude varchar(50) NULL,
	status_tempat_tinggal_id varchar(20) NULL,
	type_tempat_tinggal_id varchar(20) NULL,
	category_tempat_tinggal_id varchar(20) NULL,
	status_keaktifan_id int4 NULL,
	status_data int4 NULL,
	status_alamat varchar(50) NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	id bigserial NOT NULL,
	CONSTRAINT mdm_customer_address_mask_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_address_mask_u_id_index ON mdm_dev.mdm_customer_address_mask USING btree (u_id);


-- mdm_dev.mdm_customer_attachment definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_attachment;

CREATE TABLE mdm_dev.mdm_customer_attachment (
	id serial NOT NULL,
	u_id varchar(255) NULL,
	customer_identity_id int4 NULL,
	filename varchar(255) NULL,
	type_file_id int4 NULL,
	description text NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	CONSTRAINT mdm_customer_attachments_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_customer_bank_account definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_bank_account;

CREATE TABLE mdm_dev.mdm_customer_bank_account (
	id serial NOT NULL,
	u_id varchar(255) NULL,
	nama_bank varchar(100) NULL,
	cabang varchar(50) NULL,
	nomor_rekening varchar(50) NULL,
	atas_nama varchar(50) NULL,
	status_keaktifan_id int4 NULL,
	status_data int4 NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	CONSTRAINT mdm_customer_bank_account_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_bank_account_u_id_index ON mdm_dev.mdm_customer_bank_account USING btree (u_id);


-- mdm_dev.mdm_customer_contact definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_contact;

CREATE TABLE mdm_dev.mdm_customer_contact (
	u_id varchar(255) NULL,
	uid_golden varchar(255) NULL,
	contact_value varchar(100) NULL,
	type_contact_id int4 NULL,
	status_keaktifan_id int4 NULL,
	status_verifikasi_id int4 NULL,
	verified_at date NULL,
	status_data int4 NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	id bigserial NOT NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_customer_contact_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_contact_u_id_index ON mdm_dev.mdm_customer_contact USING btree (u_id);


-- mdm_dev.mdm_customer_contact_mask definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_contact_mask;

CREATE TABLE mdm_dev.mdm_customer_contact_mask (
	u_id varchar(50) NULL,
	uid_golden varchar(50) NULL,
	contact_value varchar(100) NULL,
	type_contact_id int4 NULL,
	status_keaktifan_id int4 NULL,
	status_verifikasi_id int4 NULL,
	verified_at date NULL,
	status_data int4 NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	id bigserial NOT NULL,
	CONSTRAINT mdm_customer_contact_mask_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_contact_mask_u_id_index ON mdm_dev.mdm_customer_contact_mask USING btree (u_id);


-- mdm_dev.mdm_customer_contacts2 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_contacts2;

CREATE TABLE mdm_dev.mdm_customer_contacts2 (
	u_id varchar(50) NULL,
	status_data varchar(30) NULL,
	type_contact_id int4 NULL,
	contact_value varchar(100) NULL
);


-- mdm_dev.mdm_customer_contacts_grp definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_contacts_grp;

CREATE TABLE mdm_dev.mdm_customer_contacts_grp (
	u_id varchar(50) NULL,
	u_id_grp text NULL,
	matching_column varchar(50) NULL,
	golden varchar(50) NULL,
	unit varchar(50) NULL
);


-- mdm_dev.mdm_customer_contacts_rel definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_contacts_rel;

CREATE TABLE mdm_dev.mdm_customer_contacts_rel (
	u_id1 varchar(50) NULL,
	u_id2 varchar(50) NULL,
	relation text NULL,
	u_id_grp text NULL,
	matching_column varchar(50) NULL,
	lev_name float8 NULL,
	lev_addr float8 NULL,
	cnt_data float8 NULL,
	unit1 varchar(50) NULL,
	unit2 varchar(50) NULL
);


-- mdm_dev.mdm_customer_identity definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_identity;

CREATE TABLE mdm_dev.mdm_customer_identity (
	u_id varchar(255) NULL,
	uid_golden varchar(255) NULL,
	category_identity_id int4 NULL,
	nomor_identity varchar(50) NULL,
	masa_berlaku varchar NULL,
	status_data varchar(30) NULL,
	description varchar NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	batch varchar(30) NULL,
	id bigserial NOT NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_customer_identity_pkey PRIMARY KEY (id)
);
CREATE UNIQUE INDEX mdm_customer_identity_u_id_idx ON mdm_dev.mdm_customer_identity USING btree (u_id);


-- mdm_dev.mdm_customer_identity_mask definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_identity_mask;

CREATE TABLE mdm_dev.mdm_customer_identity_mask (
	u_id varchar(50) NULL,
	uid_golden varchar(50) NULL,
	category_identity_id int4 NULL,
	nomor_identity varchar(50) NULL,
	masa_berlaku varchar NULL,
	status_data varchar(30) NULL,
	description varchar NULL,
	"isPrimary" int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	batch varchar(30) NULL,
	id bigserial NOT NULL,
	CONSTRAINT mdm_customer_identity_mask_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_identity_mask_u_id_index ON mdm_dev.mdm_customer_identity_mask USING btree (u_id);


-- mdm_dev.mdm_customer_map_grp definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_grp;

CREATE TABLE mdm_dev.mdm_customer_map_grp (
	u_id varchar(50) NOT NULL,
	grp_ktp varchar(50) NULL,
	grp_phone varchar(50) NULL,
	grp_email varchar(100) NULL,
	golden int4 NULL,
	unit varchar(50) NULL,
	bobot int4 NULL,
	CONSTRAINT mdm_customer_map_grp_pk PRIMARY KEY (u_id)
);


-- mdm_dev.mdm_customer_map_grp2 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_grp2;

CREATE TABLE mdm_dev.mdm_customer_map_grp2 (
	u_id varchar(50) NOT NULL,
	u_id_grp varchar(100) NOT NULL,
	golden varchar(10) NULL,
	unit varchar(50) NULL,
	CONSTRAINT mdm_customer_map_grp2_pk PRIMARY KEY (u_id_grp, u_id)
);


-- mdm_dev.mdm_customer_map_grp3 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_grp3;

CREATE TABLE mdm_dev.mdm_customer_map_grp3 (
	u_id varchar(50) NULL,
	grp_ktp varchar(50) NULL,
	golden int8 NULL,
	unit varchar(50) NULL,
	grp_phone varchar(50) NULL,
	grp_email varchar(50) NULL,
	bobot int4 NULL,
	matching_column varchar(100) NULL
);


-- mdm_dev.mdm_customer_map_rel definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_rel;

CREATE TABLE mdm_dev.mdm_customer_map_rel (
	u_id1 varchar(50) NOT NULL,
	u_id2 varchar(50) NOT NULL,
	relation varchar(50) NULL,
	grp_ktp varchar(50) NULL,
	match_ktp varchar(50) NULL,
	grp_phone varchar(50) NULL,
	match_phone varchar(50) NULL,
	grp_email varchar(100) NULL,
	match_email varchar(50) NULL,
	lev_name float8 NULL,
	lev_addr float8 NULL,
	cnt_data float8 NULL,
	unit1 varchar(50) NULL,
	unit2 varchar(50) NULL,
	CONSTRAINT mdm_customer_map_rel_pk PRIMARY KEY (u_id1, u_id2)
);


-- mdm_dev.mdm_customer_map_rel2 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_rel2;

CREATE TABLE mdm_dev.mdm_customer_map_rel2 (
	u_id1 varchar(50) NOT NULL,
	u_id2 varchar(50) NOT NULL,
	relation varchar(50) NULL,
	u_id_grp varchar(100) NOT NULL,
	matching_column varchar(100) NOT NULL,
	lev_name float8 NULL,
	lev_addr float8 NULL,
	cnt_data int4 NULL,
	unit1 varchar(50) NULL,
	unit2 varchar(50) NULL,
	CONSTRAINT mdm_customer_map_rel2_pk PRIMARY KEY (u_id1, u_id2, u_id_grp, matching_column)
);


-- mdm_dev.mdm_customer_map_rel3 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_rel3;

CREATE TABLE mdm_dev.mdm_customer_map_rel3 (
	u_id1 varchar(50) NULL,
	u_id2 varchar(50) NULL,
	relation varchar(50) NULL,
	grp_ktp varchar(50) NULL,
	match_ktp varchar(50) NULL,
	grp_phone varchar(50) NULL,
	match_phone varchar(50) NULL,
	grp_email varchar(100) NULL,
	match_email varchar(50) NULL,
	lev_name float8 NULL,
	lev_addr float8 NULL,
	cnt_data int4 NULL,
	unit1 varchar(50) NULL,
	unit2 varchar(50) NULL
);


-- mdm_dev.mdm_customer_map_rel4 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_map_rel4;

CREATE TABLE mdm_dev.mdm_customer_map_rel4 (
	u_id1 varchar(50) NOT NULL,
	u_id2 varchar(50) NOT NULL,
	unit1 varchar(50) NULL,
	unit2 varchar(50) NULL,
	grp_ktp varchar(50) NULL,
	grp_phone varchar(50) NULL,
	grp_email varchar(100) NULL,
	grp_name varchar(250) NULL,
	grp_addr varchar(250) NULL,
	lev_name float8 NULL,
	lev_addr float8 NULL,
	cnt_data int4 NULL,
	matching_column varchar(100) NULL,
	same_dob int2 NULL,
	rel_score int4 NULL,
	grp_custid varchar(50) NULL,
	rel_score2 int2 NULL,
	id bigserial NOT NULL,
	CONSTRAINT mdm_customer_map_rel4_pk PRIMARY KEY (u_id1, u_id2)
);
CREATE INDEX mdm_customer_map_rel4_grp_ktp_idx ON mdm_dev.mdm_customer_map_rel4 USING btree (grp_ktp, grp_phone, grp_email, grp_custid, grp_name, grp_addr);
CREATE INDEX mdm_customer_map_rel4_id_idx ON mdm_dev.mdm_customer_map_rel4 USING btree (id);
CREATE INDEX mdm_customer_map_rel4_rel_score2_idx ON mdm_dev.mdm_customer_map_rel4 USING btree (rel_score2, rel_score);


-- mdm_dev.mdm_customer_product definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_product;

CREATE TABLE mdm_dev.mdm_customer_product (
	id serial NOT NULL,
	u_id varchar(250) NULL,
	uid_golden varchar(250) NULL,
	customer_id varchar(30) NULL,
	product varchar(100) NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_by int4 NULL,
	updated_at timestamp NULL,
	process_at timestamp NULL DEFAULT now()
);
CREATE INDEX mdm_customer_product_u_id_index ON mdm_dev.mdm_customer_product USING btree (u_id);
CREATE INDEX mdm_customer_product_uid_golden_idx ON mdm_dev.mdm_customer_product USING btree (uid_golden);


-- mdm_dev.mdm_customer_profile definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_profile;

CREATE TABLE mdm_dev.mdm_customer_profile (
	u_id varchar(250) NULL,
	uid_golden varchar(250) NULL,
	customer_id varchar(100) NULL,
	full_name varchar(250) NULL,
	first_name varchar(250) NULL,
	middle_name varchar(250) NULL,
	last_name varchar(250) NULL,
	surname varchar(250) NULL,
	nickname varchar(250) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob_id varchar(50) NULL,
	suku_id int4 NULL,
	kewarganegaraan_id int4 NULL,
	negara_id int4 NULL,
	religion_id int4 NULL,
	pendidikan_id int4 NULL,
	profesi_id int4 NULL,
	golongan_darah_id int4 NULL,
	status_kawin_id int4 NULL,
	mortalitas_id int4 NULL,
	status_keaktifan_id int4 NULL,
	status_pengkinian_data_id int4 NULL,
	category_user_id int4 NULL,
	foto varchar(255) NULL,
	email varchar(255) NULL,
	mdm_id int4 NULL,
	golden varchar(5) NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_by int4 NULL,
	updated_at timestamp NULL,
	deleted_by int4 NULL,
	deleted_at timestamp NULL,
	flag_process int4 NULL,
	id bigserial NOT NULL,
	process_at timestamp NULL DEFAULT now(),
	flag_mask int4 NULL DEFAULT 0,
	CONSTRAINT mdm_customer_profile_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_profile_full_name_gin_trgm_idx ON mdm_dev.mdm_customer_profile USING gin (full_name gin_trgm_ops);
CREATE INDEX mdm_customer_profile_u_id_index ON mdm_dev.mdm_customer_profile USING btree (u_id);
CREATE INDEX mdm_customer_profile_uid_golden_index ON mdm_dev.mdm_customer_profile USING btree (uid_golden);


-- mdm_dev.mdm_customer_profile_mask definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_profile_mask;

CREATE TABLE mdm_dev.mdm_customer_profile_mask (
	u_id varchar(50) NULL,
	uid_golden varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(250) NULL,
	first_name varchar(250) NULL,
	middle_name varchar(100) NULL,
	last_name varchar(250) NULL,
	surname varchar(50) NULL,
	nickname varchar(50) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob_id varchar(50) NULL,
	suku_id int4 NULL,
	kewarganegaraan_id int4 NULL,
	negara_id int4 NULL,
	religion_id int4 NULL,
	pendidikan_id int4 NULL,
	profesi_id int4 NULL,
	golongan_darah_id int4 NULL,
	status_kawin_id int4 NULL,
	mortalitas_id int4 NULL,
	status_keaktifan_id int4 NULL,
	status_pengkinian_data_id int4 NULL,
	category_user_id int4 NULL,
	foto varchar(255) NULL,
	email varchar(255) NULL,
	mdm_id int4 NULL,
	golden varchar(5) NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_by int4 NULL,
	updated_at timestamp NULL,
	deleted_by int4 NULL,
	deleted_at timestamp NULL,
	flag_process int4 NULL,
	id bigserial NOT NULL,
	CONSTRAINT mdm_customer_profile_mask_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_profile_mask_u_id_index ON mdm_dev.mdm_customer_profile_mask USING btree (u_id);
CREATE INDEX mdm_customer_profile_mask_uid_golden_index ON mdm_dev.mdm_customer_profile_mask USING btree (uid_golden);


-- mdm_dev.mdm_customer_profile_web definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_profile_web;

CREATE TABLE mdm_dev.mdm_customer_profile_web (
	u_id varchar(250) NULL,
	uid_golden varchar(250) NULL,
	unit varchar(50) NULL,
	customer_id varchar(100) NULL,
	full_name varchar(250) NULL,
	first_name varchar(250) NULL,
	middle_name varchar(250) NULL,
	last_name varchar(250) NULL,
	surname varchar(250) NULL,
	nickname varchar(250) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob_id varchar(50) NULL,
	address varchar(255) NULL,
	nomor varchar(20) NULL,
	blok varchar(10) NULL,
	rt varchar(20) NULL,
	rw varchar(20) NULL,
	kelurahan_id varchar(20) NULL,
	kecamatan_id varchar(20) NULL,
	kota_id varchar(20) NULL,
	propinsi_id varchar(20) NULL,
	kodepos varchar(20) NULL,
	longitude varchar(255) NULL,
	latitude varchar(255) NULL,
	status_tempat_tinggal_id varchar(20) NULL,
	type_tempat_tinggal_id varchar(20) NULL,
	category_tempat_tinggal_id varchar(20) NULL,
	email1 varchar(100) NULL,
	email2 varchar(100) NULL,
	telepon_rumah varchar(50) NULL,
	telepon_kantor varchar(50) NULL,
	fax varchar(50) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone2 varchar(50) NULL,
	ktp varchar(50) NULL,
	category_identity_id int4 NULL,
	suku_id int4 NULL,
	kewarganegaraan_id int4 NULL,
	negara_id int4 NULL,
	religion_id int4 NULL,
	pendidikan_id int4 NULL,
	profesi_id int4 NULL,
	golongan_darah_id int4 NULL,
	status_kawin_id int4 NULL,
	mortalitas_id int4 NULL,
	status_keaktifan_id int4 NULL,
	status_pengkinian_data_id int4 NULL,
	category_user_id int4 NULL,
	foto varchar(255) NULL,
	golden varchar(5) NULL,
	flag_process int4 NULL,
	process_at timestamp NULL DEFAULT now(),
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_by int4 NULL,
	updated_at timestamp NULL,
	deleted_by int4 NULL,
	deleted_at timestamp NULL,
	id serial NOT NULL,
	flag_mask int4 NULL DEFAULT 0,
	batch varchar(100) NULL,
	status_ktp varchar(5) NULL,
	title_pre varchar(50) NULL,
	title_suf varchar(50) NULL,
	jabatan varchar(100) NULL,
	CONSTRAINT mdm_customer_profile_web_pk PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_profile_full_web_name_gin_trgm_idx ON mdm_dev.mdm_customer_profile_web USING gin (full_name gin_trgm_ops);
CREATE INDEX mdm_customer_profile_web_customer_id_idx ON mdm_dev.mdm_customer_profile_web USING btree (customer_id);
CREATE INDEX mdm_customer_profile_web_email1_idx ON mdm_dev.mdm_customer_profile_web USING btree (email1) WHERE ((golden)::text = 'Y'::text);
CREATE INDEX mdm_customer_profile_web_kota_id_idx ON mdm_dev.mdm_customer_profile_web USING btree (kota_id);
CREATE INDEX mdm_customer_profile_web_u_id_idx ON mdm_dev.mdm_customer_profile_web USING btree (u_id);
CREATE INDEX mdm_customer_profile_web_uid_golden_idx ON mdm_dev.mdm_customer_profile_web USING btree (uid_golden);


-- mdm_dev.mdm_customer_relationship definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_relationship;

CREATE TABLE mdm_dev.mdm_customer_relationship (
	u_id varchar(255) NULL,
	first_name varchar(50) NULL,
	last_name varchar(50) NULL,
	dob varchar(50) NULL,
	pob_id int4 NULL,
	address varchar(255) NULL,
	mobile_phone varchar(20) NULL,
	telephone varchar(20) NULL,
	email varchar(50) NULL,
	gender varchar(50) NULL,
	religion_id int4 NULL,
	profesi_id int4 NULL,
	status_kawin_id int4 NULL,
	relationship_id int4 NULL,
	category_identity_id int4 NULL,
	nomor_identity varchar(50) NULL,
	masa_berlaku varchar NULL,
	status_data int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	updated_by int4 NULL,
	mdm_id int4 NULL,
	id serial NOT NULL,
	CONSTRAINT mdm_customer_relationship_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_customer_status definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_status;

CREATE TABLE mdm_dev.mdm_customer_status (
	id serial NOT NULL,
	u_id varchar(255) NULL,
	message varchar(255) NULL,
	flag_process int4 NULL,
	user_id int4 NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	is_rejected int4 NULL,
	CONSTRAINT mdm_customer_status_pkey PRIMARY KEY (id)
);


-- mdm_dev.mdm_customer_unit definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_customer_unit;

CREATE TABLE mdm_dev.mdm_customer_unit (
	u_id varchar(250) NULL,
	uid_golden varchar(250) NULL,
	unit varchar(250) NULL,
	status_keaktifan_id int4 NULL,
	url_profile varchar(100) NULL,
	"Load_Date" varchar(50) NULL,
	mdm_id int4 NULL,
	customer_id int4 NULL,
	created_by int4 NULL,
	created_at timestamp NULL,
	updated_by int4 NULL,
	updated_at timestamp NULL,
	id bigserial NOT NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_customer_unit_pkey PRIMARY KEY (id)
);
CREATE INDEX mdm_customer_unit_u_id_index ON mdm_dev.mdm_customer_unit USING btree (u_id);
CREATE INDEX mdm_customer_unit_uid_golden_idx ON mdm_dev.mdm_customer_unit USING btree (uid_golden);


-- mdm_dev.mdm_lookups definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_lookups;

CREATE TABLE mdm_dev.mdm_lookups (
	id serial NOT NULL,
	lookup_name varchar(50) NULL,
	category varchar(50) NULL,
	priority int4 NULL,
	kode varchar(50) NULL,
	parent_kode bpchar(10) NULL,
	description varchar(250) NULL,
	unit varchar(10) NULL
);
CREATE INDEX idx_look_category ON mdm_dev.mdm_lookups USING btree (category);
CREATE INDEX idx_look_name ON mdm_dev.mdm_lookups USING btree (lookup_name);


-- mdm_dev.mdm_mst_company definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_company;

CREATE TABLE mdm_dev.mdm_mst_company (
	id varchar(10) NOT NULL,
	full_name varchar(50) NOT NULL,
	isholding bpchar(1) NULL,
	address varchar(250) NULL,
	website varchar(100) NULL,
	oracle_code int4 NULL,
	brand_name varchar(50) NULL,
	email varchar(50) NULL,
	holding varchar(10) NULL,
	db_schema varchar(50) NULL,
	db_user varchar(50) NULL,
	db_passwd varchar(50) NULL,
	masking_set json NULL,
	api_secret_key varchar(100) NULL,
	clean_job int2 NULL,
	tbl_profile varchar(100) NULL,
	last_clean_job timestamp NULL,
	last_update timestamp NULL,
	pic1_name varchar(50) NULL,
	pic1_email varchar(50) NULL,
	pic1_hp varchar(15) NULL,
	pic2_name varchar(50) NULL,
	pic2_email varchar(50) NULL,
	pic2_hp varchar(15) NULL,
	CONSTRAINT mdm_mst_company_api_secret_key_unique UNIQUE (api_secret_key),
	CONSTRAINT mdm_mst_company_pk PRIMARY KEY (id)
);


-- mdm_dev.mdm_mst_country definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_country;

CREATE TABLE mdm_dev.mdm_mst_country (
	country varchar(50) NULL,
	code_2 varchar(3) NULL,
	code_3 varchar(4) NULL,
	code_number varchar(5) NULL
);


-- mdm_dev.mdm_mst_kecamatan definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_kecamatan;

CREATE TABLE mdm_dev.mdm_mst_kecamatan (
	id bpchar(7) NOT NULL,
	regency_id bpchar(4) NOT NULL,
	"name" varchar(255) NOT NULL,
	CONSTRAINT tbl_kecamatan_pkey PRIMARY KEY (id)
);
CREATE INDEX districts_regency_id_index ON mdm_dev.mdm_mst_kecamatan USING btree (regency_id);
CREATE INDEX idx_kec_id ON mdm_dev.mdm_mst_kecamatan USING btree (id);
CREATE INDEX idx_kec_name ON mdm_dev.mdm_mst_kecamatan USING btree (name);
CREATE INDEX idx_kec_regid ON mdm_dev.mdm_mst_kecamatan USING btree (regency_id);


-- mdm_dev.mdm_mst_kelurahan definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_kelurahan;

CREATE TABLE mdm_dev.mdm_mst_kelurahan (
	id bpchar(10) NOT NULL,
	district_id bpchar(7) NOT NULL,
	"name" varchar(255) NOT NULL,
	CONSTRAINT tbl_kelurahan_pkey PRIMARY KEY (id)
);
CREATE UNIQUE INDEX mdm_mst_kelurahan_name_idx ON mdm_dev.mdm_mst_kelurahan USING btree (name, id);


-- mdm_dev.mdm_mst_kota definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_kota;

CREATE TABLE mdm_dev.mdm_mst_kota (
	id bpchar(4) NOT NULL,
	province_id bpchar(2) NOT NULL,
	"name" varchar(255) NOT NULL,
	kode_area int4 NOT NULL,
	CONSTRAINT tbl_kota_pkey PRIMARY KEY (id)
);
CREATE INDEX idx_kot_id ON mdm_dev.mdm_mst_kota USING btree (id);
CREATE INDEX idx_kot_name ON mdm_dev.mdm_mst_kota USING btree (name);
CREATE INDEX idx_kot_provid ON mdm_dev.mdm_mst_kota USING btree (province_id);


-- mdm_dev.mdm_mst_product definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_product;

CREATE TABLE mdm_dev.mdm_mst_product (
	product_id varchar(20) NOT NULL,
	unit varchar(10) NULL,
	full_name varchar(100) NULL,
	description text NULL,
	price float4 NULL,
	charge_period varchar(20) NULL,
	product_type varchar(20) NULL,
	product_segment varchar(20) NULL,
	id serial NOT NULL,
	CONSTRAINT mdm_mst_product_pk PRIMARY KEY (product_id)
);


-- mdm_dev.mdm_mst_provinsi definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_mst_provinsi;

CREATE TABLE mdm_dev.mdm_mst_provinsi (
	id bpchar(2) NOT NULL,
	"name" varchar(255) NOT NULL
);
CREATE INDEX idx_prov_id ON mdm_dev.mdm_mst_provinsi USING btree (id);
CREATE INDEX idx_prov_name ON mdm_dev.mdm_mst_provinsi USING btree (name);


-- mdm_dev.mdm_process_history definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_process_history;

CREATE TABLE mdm_dev.mdm_process_history (
	id serial NOT NULL,
	batch varchar(20) NOT NULL,
	unit varchar(50) NULL,
	data_name varchar(50) NOT NULL,
	data_val int4 NOT NULL,
	notes varchar(200) NULL
);


-- mdm_dev.mdm_staging_customer_product definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_product;

CREATE TABLE mdm_dev.mdm_staging_customer_product (
	customer_id varchar(100) NULL,
	product_code varchar(100) NULL,
	product_desc varchar(100) NULL,
	u_id varchar(250) NULL
);
CREATE INDEX mdm_staging_customer_product_u_id_idx ON mdm_dev.mdm_staging_customer_product USING btree (u_id);


-- mdm_dev.mdm_staging_customer_profile_cl_grp_mvn definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_cl_grp_mvn;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_cl_grp_mvn (
	u_id varchar(50) NULL,
	unit varchar(50) NULL,
	dob varchar(50) NULL,
	full_name varchar(150) NULL,
	address varchar(250) NULL,
	email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	ktp varchar(50) NULL,
	status_ktp_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_dob_grp int4 NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	bobot int4 NULL,
	cnt_ktp int4 NULL,
	cnt_ktp_name int4 NULL,
	main_ktp_uid varchar(100) NULL,
	cnt_hp int4 NULL,
	cnt_hp_name int4 NULL,
	main_hp_uid varchar(50) NULL,
	cnt_email int4 NULL,
	cnt_email_name int4 NULL,
	main_email_uid varchar(50) NULL,
	cnt_dob_ktp int4 NULL,
	cnt_name_ktp int4 NULL,
	cnt_dob_ktp_name int4 NULL,
	main_dob_ktp_uid varchar(100) NULL,
	cnt_dob_hp int4 NULL,
	cnt_dob_hp_name int4 NULL,
	main_dob_hp_uid varchar(100) NULL,
	cnt_dob_email int4 NULL,
	cnt_dob_email_name int4 NULL,
	main_dob_email_uid varchar(100) NULL,
	cnt_name_ktp_address int4 NULL,
	main_name_ktp_uid varchar(100) NULL,
	cnt_name_hp int4 NULL,
	cnt_name_hp_address int4 NULL,
	main_name_hp_uid varchar(100) NULL,
	cnt_name_email int4 NULL,
	cnt_name_email_address int4 NULL,
	main_name_email_uid varchar(100) NULL,
	cnt_addr_ktp int4 NULL,
	cnt_addr_ktp_name int4 NULL,
	main_addr_ktp_uid varchar(100) NULL,
	cnt_addr_hp int4 NULL,
	cnt_addr_hp_name int4 NULL,
	main_addr_hp_uid varchar(100) NULL,
	cnt_addr_email int4 NULL,
	cnt_addr_email_name int4 NULL,
	main_addr_email_uid varchar(50) NULL
);
CREATE INDEX idx_u_id_grp ON mdm_dev.mdm_staging_customer_profile_cl_grp_mvn USING btree (u_id);
CREATE INDEX mdm_staging_customer_profile_cl_grp_mvn_bobot_idx ON mdm_dev.mdm_staging_customer_profile_cl_grp_mvn USING btree (bobot);


-- mdm_dev.mdm_staging_customer_profile_clean definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_clean;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_clean (
	u_id varchar(50) NOT NULL,
	unit varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(250) NULL,
	first_name varchar(100) NULL,
	middle_name varchar(100) NULL,
	last_name varchar(100) NULL,
	surname varchar(50) NULL,
	nickname varchar(50) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob varchar(50) NULL,
	address varchar(250) NULL,
	address_verified int2 NULL,
	nomor bpchar(10) NULL,
	blok bpchar(10) NULL,
	rt bpchar(10) NULL,
	rw bpchar(10) NULL,
	kelurahan varchar(50) NULL,
	kecamatan varchar(50) NULL,
	kota varchar(50) NULL,
	propinsi varchar(50) NULL,
	kodepos bpchar(10) NULL,
	longitude varchar(50) NULL,
	latitude varchar(50) NULL,
	status_tempat_tinggal varchar(50) NULL,
	type_tempat_tinggal varchar(50) NULL,
	category_tempat_tinggal varchar(50) NULL,
	email1 varchar(100) NULL,
	email1_verified int2 NULL,
	email2 varchar(100) NULL,
	email2_verified int2 NULL,
	telepon_rumah varchar(50) NULL,
	telepon_kantor varchar(50) NULL,
	fax varchar(50) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone1_verified int2 NULL,
	mobile_phone2 varchar(50) NULL,
	mobile_phone2_verified int2 NULL,
	ktp varchar(50) NULL,
	id_type varchar(30) NULL,
	suku varchar(50) NULL,
	kewarganegaraan varchar(50) NULL,
	negara varchar(50) NULL,
	religion varchar(50) NULL,
	pendidikan varchar(50) NULL,
	profesi varchar(50) NULL,
	jabatan varchar(100) NULL,
	golongan_darah bpchar(10) NULL,
	status_kawin varchar(50) NULL,
	mortalitas varchar(50) NULL,
	category_user varchar(50) NULL,
	status_keaktifan varchar(50) NULL,
	status_pengkinian_data varchar(50) NULL,
	product varchar(200) NULL,
	created_at timestamp NULL,
	flag_process int2 NULL,
	process_at timestamp NULL DEFAULT now(),
	status_customer varchar(50) NULL,
	relasi varchar(50) NULL,
	bobot int4 NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL,
	status_name varchar(30) NULL,
	status_addr varchar(30) NULL,
	status_addr_lkp varchar(30) NULL,
	status_dob_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_ktp_grp int4 NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	title_pre varchar(50) NULL,
	title_name varchar(250) NULL,
	title_suf varchar(50) NULL,
	title_err varchar(50) NULL,
	custid_org varchar(50) NULL,
	unit_org varchar(50) NULL,
	status_org varchar(50) NULL,
	updated_at timestamp NULL,
	deactivate_date timestamp NULL,
	flag_mask int4 NULL DEFAULT 0,
	flag_share int4 NULL DEFAULT 0,
	id bigserial NOT NULL,
	batch varchar(50) NULL,
	part varchar(10) NULL,
	rowcsum varchar(50) NULL,
	category varchar(50) NULL,
	original_email1 varchar NULL,
	bobot_address int4 NULL
);
CREATE INDEX mdm_staging_customer_profile_clean_address4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (address, status_addr, status_addr_grp);
CREATE INDEX mdm_staging_customer_profile_clean_bobot4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (bobot);
CREATE INDEX mdm_staging_customer_profile_clean_category_tempat_tinggal_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (category_tempat_tinggal);
CREATE INDEX mdm_staging_customer_profile_clean_customer_id_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (customer_id);
CREATE INDEX mdm_staging_customer_profile_clean_dob4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (dob, status_dob, status_dob_grp);
CREATE INDEX mdm_staging_customer_profile_clean_email4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (email1, status_email1, status_email_grp);
CREATE INDEX mdm_staging_customer_profile_clean_full_name4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (full_name, status_name, status_name_grp);
CREATE INDEX mdm_staging_customer_profile_clean_gggg_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (ktp, status_ktp, status_ktp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_id_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (id);
CREATE INDEX mdm_staging_customer_profile_clean_mobile_phone4_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (mobile_phone1, status_mobile_phone1, status_hp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_part_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (part);
CREATE INDEX mdm_staging_customer_profile_clean_religion_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (religion);
CREATE INDEX mdm_staging_customer_profile_clean_u_id_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (u_id);
CREATE INDEX mdm_staging_customer_profile_clean_unit_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (unit);
CREATE INDEX mdm_staging_customer_profile_clean_unit_org_idx ON mdm_dev.mdm_staging_customer_profile_clean USING btree (unit_org, custid_org);


-- mdm_dev.mdm_staging_customer_profile_clean_mask definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_clean_mask;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_clean_mask (
	u_id varchar(50) NULL,
	customer_id varchar(50) NULL,
	custid_org varchar(50) NULL,
	full_name varchar(150) NULL,
	first_name varchar(100) NULL,
	last_name varchar(100) NULL,
	address varchar(250) NULL,
	dob timestamp NULL,
	ktp varchar(50) NULL,
	email1 varchar(100) NULL,
	email2 varchar(100) NULL,
	original_email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone2 varchar(50) NULL,
	telepon_rumah varchar(50) NULL,
	unit varchar(50) NULL,
	batch varchar(50) NULL
);


-- mdm_dev.mdm_staging_customer_profile_clean_new definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_clean_new;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_clean_new (
	u_id varchar(50) NOT NULL,
	unit varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(250) NULL,
	first_name varchar(100) NULL,
	middle_name varchar(100) NULL,
	last_name varchar(100) NULL,
	surname varchar(50) NULL,
	nickname varchar(50) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob varchar(50) NULL,
	address varchar(250) NULL,
	address_verified int2 NULL,
	nomor bpchar(10) NULL,
	blok bpchar(10) NULL,
	rt bpchar(10) NULL,
	rw bpchar(10) NULL,
	kelurahan varchar(50) NULL,
	kecamatan varchar(50) NULL,
	kota varchar(50) NULL,
	propinsi varchar(50) NULL,
	kodepos bpchar(10) NULL,
	longitude varchar(50) NULL,
	latitude varchar(50) NULL,
	status_tempat_tinggal varchar(50) NULL,
	type_tempat_tinggal varchar(50) NULL,
	category_tempat_tinggal varchar(50) NULL,
	email1 varchar(100) NULL,
	email1_verified int2 NULL,
	email2 varchar(100) NULL,
	email2_verified int2 NULL,
	telepon_rumah varchar(50) NULL,
	telepon_kantor varchar(50) NULL,
	fax varchar(50) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone1_verified int2 NULL,
	mobile_phone2 varchar(50) NULL,
	mobile_phone2_verified int2 NULL,
	ktp varchar(50) NULL,
	id_type varchar(30) NULL,
	suku varchar(50) NULL,
	kewarganegaraan varchar(50) NULL,
	negara varchar(50) NULL,
	religion varchar(50) NULL,
	pendidikan varchar(50) NULL,
	profesi varchar(50) NULL,
	jabatan varchar(100) NULL,
	golongan_darah bpchar(10) NULL,
	status_kawin varchar(50) NULL,
	mortalitas varchar(50) NULL,
	category_user varchar(50) NULL,
	status_keaktifan varchar(50) NULL,
	status_pengkinian_data varchar(50) NULL,
	product varchar(200) NULL,
	created_at timestamp NULL,
	flag_process int2 NULL,
	process_at timestamp NULL DEFAULT now(),
	status_customer varchar(50) NULL,
	relasi varchar(50) NULL,
	bobot int4 NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL,
	status_name varchar(30) NULL,
	status_addr varchar(30) NULL,
	status_addr_lkp varchar(30) NULL,
	status_dob_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_ktp_grp int4 NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	title_pre varchar(50) NULL,
	title_name varchar(250) NULL,
	title_suf varchar(50) NULL,
	title_err varchar(50) NULL,
	custid_org varchar(50) NULL,
	unit_org varchar(50) NULL,
	status_org varchar(50) NULL,
	updated_at timestamp NULL,
	deactivate_date timestamp NULL,
	flag_mask int4 NULL DEFAULT 0,
	flag_share int4 NULL DEFAULT 0,
	id bigserial NOT NULL,
	batch varchar(50) NULL,
	part varchar(10) NULL,
	rowcsum varchar(50) NULL,
	category varchar(50) NULL,
	original_email1 varchar NULL,
	bobot_address int4 NULL,
	CONSTRAINT mdm_staging_customer_profile_clean_new_pk PRIMARY KEY (u_id)
);
CREATE INDEX mdm_staging_customer_profile_clean_new_address_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (address, status_addr, status_addr_grp);
CREATE INDEX mdm_staging_customer_profile_clean_new_custid_org_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (custid_org, unit_org);
CREATE INDEX mdm_staging_customer_profile_clean_new_customer_id_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (customer_id);
CREATE INDEX mdm_staging_customer_profile_clean_new_email1_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (email1, status_email1, status_email_grp);
CREATE INDEX mdm_staging_customer_profile_clean_new_full_name_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (full_name, status_name, status_name_grp);
CREATE INDEX mdm_staging_customer_profile_clean_new_id_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (id);
CREATE INDEX mdm_staging_customer_profile_clean_new_ktp_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (ktp, status_ktp, status_ktp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_new_mobile_phone1_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (mobile_phone1, status_mobile_phone1, status_hp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_new_unit_idx ON mdm_dev.mdm_staging_customer_profile_clean_new USING btree (unit);


-- mdm_dev.mdm_staging_customer_profile_clean_old definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_clean_old;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_clean_old (
	u_id varchar(250) NOT NULL,
	unit varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(250) NULL,
	first_name varchar(250) NULL,
	middle_name varchar(250) NULL,
	last_name varchar(250) NULL,
	surname varchar(50) NULL,
	nickname varchar(50) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob varchar(50) NULL,
	address varchar(250) NULL,
	nomor bpchar(10) NULL,
	blok bpchar(10) NULL,
	rt bpchar(10) NULL,
	rw bpchar(10) NULL,
	kelurahan varchar(50) NULL,
	kecamatan varchar(50) NULL,
	kota varchar(50) NULL,
	propinsi varchar(50) NULL,
	kodepos bpchar(10) NULL,
	longitude varchar(50) NULL,
	latitude varchar(50) NULL,
	status_tempat_tinggal varchar(50) NULL,
	type_tempat_tinggal varchar(50) NULL,
	category_tempat_tinggal varchar(50) NULL,
	email1 varchar(100) NULL,
	email2 varchar(100) NULL,
	telepon_rumah varchar(50) NULL,
	telepon_kantor varchar(50) NULL,
	fax varchar(50) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone2 varchar(50) NULL,
	ktp varchar(50) NULL,
	id_type varchar(40) NULL,
	suku varchar(50) NULL,
	kewarganegaraan varchar(50) NULL,
	negara varchar(50) NULL,
	religion varchar(50) NULL,
	pendidikan varchar(50) NULL,
	profesi varchar(50) NULL,
	golongan_darah bpchar(10) NULL,
	status_kawin varchar(50) NULL,
	mortalitas varchar(50) NULL,
	category_user varchar(50) NULL,
	status_keaktifan varchar(50) NULL,
	status_pengkinian_data varchar(50) NULL,
	product varchar(100) NULL,
	created_at timestamp NULL,
	flag_process int2 NULL,
	process_at timestamp NULL DEFAULT now(),
	category varchar(50) NULL,
	bobot int4 NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL,
	status_dob_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_ktp_grp int4 NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	original_email1 varchar(100) NULL,
	batch varchar(50) NULL,
	part varchar(10) NULL,
	title_pre varchar(50) NULL,
	title_name varchar(250) NULL,
	title_suf varchar(50) NULL,
	title_err varchar(50) NULL,
	status_org varchar(50) NULL,
	unit_org varchar(50) NULL,
	custid_org varchar(50) NULL,
	id bigserial NOT NULL,
	updated_at timestamp NULL,
	flag_mask int4 NULL DEFAULT 0,
	flag_share int4 NULL,
	jabatan varchar(100) NULL,
	CONSTRAINT mdm_staging_customer_profile_clean_pkey PRIMARY KEY (id)
);
CREATE INDEX customer_profile_clean_full_name_gin_trgm_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING gin (full_name gin_trgm_ops);
CREATE INDEX idx_batch_clean ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (batch);
CREATE INDEX idx_customer_id_clean ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (customer_id);
CREATE INDEX idx_unit_clean ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (unit);
CREATE INDEX mdm_staging_customer_profile_clean_custid_org_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (custid_org);
CREATE INDEX mdm_staging_customer_profile_clean_email1_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (email1, status_email1, status_email_grp);
CREATE INDEX mdm_staging_customer_profile_clean_flag_process_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (flag_process);
CREATE INDEX mdm_staging_customer_profile_clean_ktp_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (ktp, status_ktp, status_ktp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_mobile_phone1_idx ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (mobile_phone1, status_mobile_phone1, status_hp_grp);
CREATE INDEX mdm_staging_customer_profile_clean_u_id_index ON mdm_dev.mdm_staging_customer_profile_clean_old USING btree (u_id);


-- mdm_dev.mdm_staging_customer_profile_clean_test1 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_clean_test1;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_clean_test1 (
	u_id varchar(250) NOT NULL,
	unit varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(500) NULL,
	first_name varchar(250) NULL,
	middle_name varchar(250) NULL,
	last_name varchar(250) NULL,
	surname varchar(50) NULL,
	nickname varchar(50) NULL,
	gender varchar(50) NULL,
	dob date NULL,
	pob varchar(50) NULL,
	address varchar(250) NULL,
	nomor bpchar(10) NULL,
	blok bpchar(10) NULL,
	rt bpchar(10) NULL,
	rw bpchar(10) NULL,
	kelurahan varchar(50) NULL,
	kecamatan varchar(50) NULL,
	kota varchar(50) NULL,
	propinsi varchar(50) NULL,
	kodepos bpchar(10) NULL,
	longitude varchar(50) NULL,
	latitude varchar(50) NULL,
	status_tempat_tinggal varchar(50) NULL,
	type_tempat_tinggal varchar(50) NULL,
	category_tempat_tinggal varchar(50) NULL,
	email1 varchar(100) NULL,
	email2 varchar(100) NULL,
	telepon_rumah varchar(50) NULL,
	telepon_kantor varchar(50) NULL,
	fax varchar(50) NULL,
	mobile_phone1 varchar(50) NULL,
	mobile_phone2 varchar(50) NULL,
	ktp varchar(50) NULL,
	id_type varchar(40) NULL,
	suku varchar(50) NULL,
	kewarganegaraan varchar(50) NULL,
	negara varchar(50) NULL,
	religion varchar(50) NULL,
	pendidikan varchar(50) NULL,
	profesi varchar(50) NULL,
	golongan_darah bpchar(10) NULL,
	status_kawin varchar(50) NULL,
	mortalitas varchar(50) NULL,
	category_user varchar(50) NULL,
	status_keaktifan varchar(50) NULL,
	status_pengkinian_data varchar(50) NULL,
	product varchar(100) NULL,
	created_at timestamp NULL DEFAULT now(),
	flag_process int2 NULL,
	process_at timestamp NULL,
	category varchar(50) NULL,
	bobot int4 NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL,
	status_dob_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_ktp_grp int4 NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	original_email1 varchar(100) NULL,
	batch varchar(50) NULL,
	id serial NOT NULL,
	part varchar(10) NULL,
	unit_org varchar(50) NULL,
	custid_org varchar(50) NULL,
	status_org varchar(50) NULL,
	CONSTRAINT mdm_staging_customer_profile_clean_test1_pk PRIMARY KEY (u_id)
);


-- mdm_dev.mdm_staging_customer_profile_tmp0 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_tmp0;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_tmp0 (
	u_id varchar(250) NULL,
	unit varchar(50) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(500) NULL,
	gender varchar(50) NULL,
	dob timestamp NULL,
	address varchar(250) NULL,
	email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	ktp varchar(50) NULL,
	product varchar(100) NULL,
	status_ktp_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_dob_grp int4 NULL,
	batch text NULL,
	bobot int4 NULL,
	matching_column varchar(250) NULL,
	company_group varchar(30) NULL,
	cnt_data_main float8 NULL,
	src_unit_main text NULL,
	src_id_main text NULL,
	src_name_main text NULL,
	src_address_main text NULL,
	src_ktp_main text NULL,
	src_dob_main text NULL,
	src_email1_main text NULL,
	src_mobile1_main text NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	id_type varchar(40) NULL
);
CREATE INDEX mdm_staging_customer_profile_tmp0_u_id_idx ON mdm_dev.mdm_staging_customer_profile_tmp0 USING btree (u_id);


-- mdm_dev.mdm_staging_customer_profile_tmp1 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_tmp1;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_tmp1 (
	u_id varchar(250) NULL,
	unit varchar(250) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(500) NULL,
	gender varchar(10) NULL,
	dob timestamp NULL,
	address varchar(250) NULL,
	email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	ktp varchar(50) NULL,
	product varchar(1000) NULL,
	status_ktp_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_dob_grp int4 NULL,
	batch varchar(30) NULL,
	bobot int4 NULL,
	matching_column varchar(250) NULL,
	company_group varchar(30) NULL,
	cnt_data_main int4 NULL,
	src_unit_main text NULL,
	src_id_main text NULL,
	src_name_main text NULL,
	src_address_main text NULL,
	src_ktp_main text NULL,
	src_dob_main text NULL,
	src_email1_main text NULL,
	src_mobile1_main text NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	id_type varchar(20) NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL
);
CREATE INDEX mdm_staging_customer_profile_tmp1_u_id_idx ON mdm_dev.mdm_staging_customer_profile_tmp1 USING btree (u_id);


-- mdm_dev.mdm_staging_customer_profile_tmp2 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_tmp2;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_tmp2 (
	u_id varchar(250) NULL,
	unit varchar(250) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(500) NULL,
	gender varchar(10) NULL,
	dob timestamp NULL,
	address varchar(250) NULL,
	email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	ktp varchar(50) NULL,
	product varchar(1000) NULL,
	status_ktp_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_dob_grp int4 NULL,
	batch varchar(30) NULL,
	bobot int4 NULL,
	matching_column varchar(250) NULL,
	company_group varchar(30) NULL,
	cnt_data_main int4 NULL,
	src_unit_main text NULL,
	src_id_main text NULL,
	src_name_main text NULL,
	src_address_main text NULL,
	src_ktp_main text NULL,
	src_dob_main text NULL,
	src_email1_main text NULL,
	src_mobile1_main text NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	id_type varchar(20) NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL
);
CREATE INDEX mdm_staging_customer_profile_tmp2_u_id_idx ON mdm_dev.mdm_staging_customer_profile_tmp2 USING btree (u_id);


-- mdm_dev.mdm_staging_customer_profile_tmp3 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_customer_profile_tmp3;

CREATE TABLE mdm_dev.mdm_staging_customer_profile_tmp3 (
	u_id varchar(250) NULL,
	unit varchar(250) NULL,
	customer_id varchar(50) NULL,
	full_name varchar(500) NULL,
	gender varchar(10) NULL,
	dob timestamp NULL,
	address varchar(250) NULL,
	email1 varchar(100) NULL,
	mobile_phone1 varchar(50) NULL,
	ktp varchar(50) NULL,
	product varchar(1000) NULL,
	status_ktp_grp int4 NULL,
	status_email_grp int4 NULL,
	status_hp_grp int4 NULL,
	status_dob_grp int4 NULL,
	batch varchar(30) NULL,
	bobot int4 NULL,
	matching_column varchar(250) NULL,
	company_group varchar(30) NULL,
	cnt_data_main int4 NULL,
	src_unit_main text NULL,
	src_id_main text NULL,
	src_name_main text NULL,
	src_address_main text NULL,
	src_ktp_main text NULL,
	src_dob_main text NULL,
	src_email1_main text NULL,
	src_mobile1_main text NULL,
	status_name_grp int4 NULL,
	status_addr_grp int4 NULL,
	id_type varchar(20) NULL,
	status_dob varchar(30) NULL,
	status_email1 varchar(30) NULL,
	status_mobile_phone1 varchar(30) NULL,
	status_ktp varchar(30) NULL
);
CREATE INDEX mdm_staging_customer_profile_tmp3_u_id_idx ON mdm_dev.mdm_staging_customer_profile_tmp3 USING btree (u_id);


-- mdm_dev.mdm_staging_data_audits definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_data_audits;

CREATE TABLE mdm_dev.mdm_staging_data_audits (
	id serial NOT NULL,
	user_type varchar(191) NULL,
	user_id int8 NULL,
	"event" varchar(191) NULL,
	auditable_type varchar(191) NULL,
	auditable_id int8 NULL,
	old_values text NULL,
	new_values text NULL,
	url text NULL,
	ip_address varchar(45) NULL,
	user_agent varchar(191) NULL,
	tags varchar(191) NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	u_id varchar(100) NULL DEFAULT ''::character varying,
	batch varchar(50) NULL,
	unit varchar(50) NULL,
	CONSTRAINT mdm_staging_data_audits_pkey PRIMARY KEY (id)
);
CREATE INDEX idx_audits_batch ON mdm_dev.mdm_staging_data_audits USING btree (batch);
CREATE INDEX idx_audits_u_id ON mdm_dev.mdm_staging_data_audits USING btree (u_id);
CREATE INDEX idx_audits_unit ON mdm_dev.mdm_staging_data_audits USING btree (unit) INCLUDE (unit);


-- mdm_dev.mdm_staging_data_audits_evt definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_data_audits_evt;

CREATE TABLE mdm_dev.mdm_staging_data_audits_evt (
	u_id varchar(50) NULL,
	unit varchar(50) NULL,
	"event" varchar(2000) NULL,
	batch varchar(50) NULL,
	created_at timestamp NULL DEFAULT now(),
	id serial NOT NULL
);


-- mdm_dev.mdm_staging_data_audits_new definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_data_audits_new;

CREATE TABLE mdm_dev.mdm_staging_data_audits_new (
	id serial NOT NULL,
	user_type varchar(191) NULL,
	user_id int8 NULL,
	"event" varchar(191) NULL,
	auditable_type varchar(191) NULL,
	auditable_id int8 NULL,
	old_values text NULL,
	new_values text NULL,
	url text NULL,
	ip_address varchar(45) NULL,
	user_agent varchar(191) NULL,
	tags varchar(191) NULL,
	created_at timestamp NULL DEFAULT now(),
	updated_at timestamp NULL,
	u_id varchar(100) NULL DEFAULT ''::character varying,
	batch varchar(50) NULL,
	unit varchar(50) NULL
);


-- mdm_dev.mdm_staging_dictionary definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_dictionary;

CREATE TABLE mdm_dev.mdm_staging_dictionary (
	old_name text NULL,
	new_name text NULL,
	category text NULL
);
CREATE INDEX mdm_staging_dictionary_old_name_idx ON mdm_dev.mdm_staging_dictionary USING btree (old_name, category);


-- mdm_dev.mdm_staging_log_error_stream definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_log_error_stream;

CREATE TABLE mdm_dev.mdm_staging_log_error_stream (
	log_id serial NOT NULL,
	u_id varchar(250) NULL,
	table_fr varchar(100) NULL,
	process_name varchar(100) NULL,
	batch varchar(50) NULL,
	unit varchar(100) NULL,
	created_date timestamp NULL DEFAULT now()
);


-- mdm_dev.mdm_staging_mapping_uid_golden definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_mapping_uid_golden;

CREATE TABLE mdm_dev.mdm_staging_mapping_uid_golden (
	batch varchar(30) NULL,
	unit varchar(50) NULL,
	uid_unit varchar(50) NULL,
	uid_group varchar(50) NULL,
	matching_column varchar(250) NULL,
	golden varchar(10) NULL,
	cnt_data int4 NULL,
	unit_lead varchar(50) NULL,
	holding_mvn varchar(50) NULL,
	holding_mkap varchar(50) NULL,
	holding varchar(50) NULL,
	holding_mncn varchar(50) NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_staging_mapping_uid_golden_uid_unit_unique UNIQUE (uid_unit)
);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (holding);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_mkap_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (holding_mkap);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_mvn_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (holding_mvn);
CREATE INDEX mdm_staging_mapping_uid_golden_uid_group_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (uid_group);
CREATE INDEX mdm_staging_mapping_uid_golden_uid_unit_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (uid_unit);
CREATE INDEX mdm_staging_mapping_uid_golden_unit_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (unit);
CREATE INDEX mdm_staging_mapping_uid_golden_unit_lead_idx ON mdm_dev.mdm_staging_mapping_uid_golden USING btree (unit_lead);


-- mdm_dev.mdm_staging_mapping_uid_golden4 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_mapping_uid_golden4;

CREATE TABLE mdm_dev.mdm_staging_mapping_uid_golden4 (
	batch varchar(30) NULL,
	unit varchar(50) NULL,
	uid_unit varchar(50) NULL,
	uid_group varchar(50) NULL,
	matching_column varchar(250) NULL,
	golden varchar(10) NULL,
	cnt_data int4 NULL,
	unit_lead varchar(50) NULL,
	holding_mvn varchar(50) NULL,
	holding_mkap varchar(50) NULL,
	holding varchar(50) NULL,
	holding_mncn varchar(50) NULL,
	process_at timestamp NULL DEFAULT now(),
	CONSTRAINT mdm_staging_mapping_uid_golden_uid_unit_unique_1 UNIQUE (uid_unit)
);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (holding);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_mkap_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (holding_mkap);
CREATE INDEX mdm_staging_mapping_uid_golden_holding_mvn_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (holding_mvn);
CREATE INDEX mdm_staging_mapping_uid_golden_uid_group_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (uid_group);
CREATE INDEX mdm_staging_mapping_uid_golden_uid_unit_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (uid_unit);
CREATE INDEX mdm_staging_mapping_uid_golden_unit_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (unit);
CREATE INDEX mdm_staging_mapping_uid_golden_unit_lead_idx_1 ON mdm_dev.mdm_staging_mapping_uid_golden4 USING btree (unit_lead);


-- mdm_dev.mdm_staging_mapping_uid_golden_test2 definition

-- Drop table

-- DROP TABLE mdm_dev.mdm_staging_mapping_uid_golden_test2;

CREATE TABLE mdm_dev.mdm_staging_mapping_uid_golden_test2 (
	batch varchar(30) NULL,
	unit varchar(250) NULL,
	uid_holding varchar(250) NULL,
	uid_group text NULL,
	matching_column varchar(250) NULL,
	golden varchar(10) NULL,
	holding varchar(50) NULL,
	unit_lead varchar(50) NULL
);


-- mdm_dev.migrations definition

-- Drop table

-- DROP TABLE mdm_dev.migrations;

CREATE TABLE mdm_dev.migrations (
	id serial NOT NULL,
	migration varchar(191) NOT NULL,
	batch int4 NOT NULL,
	CONSTRAINT migrations_pkey PRIMARY KEY (id)
);


-- mdm_dev.password_resets definition

-- Drop table

-- DROP TABLE mdm_dev.password_resets;

CREATE TABLE mdm_dev.password_resets (
	email varchar(191) NOT NULL,
	"token" varchar(191) NOT NULL,
	created_at timestamp NULL
);
CREATE INDEX password_resets_email_index ON mdm_dev.password_resets USING btree (email);


-- mdm_dev.users definition

-- Drop table

-- DROP TABLE mdm_dev.users;

CREATE TABLE mdm_dev.users (
	id bigserial NOT NULL,
	"name" varchar(191) NOT NULL,
	email varchar(191) NOT NULL,
	email_verified_at timestamp NULL,
	"password" varchar(191) NOT NULL,
	remember_token varchar(100) NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	CONSTRAINT users_email_unique UNIQUE (email),
	CONSTRAINT users_pkey PRIMARY KEY (id)
);