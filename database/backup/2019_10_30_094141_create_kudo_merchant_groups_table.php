<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoMerchantGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_merchant_groups', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->default(25);
			$table->text('merchant_code', 65535);
			$table->string('product_type', 200);
			$table->string('merchant_type', 100);
			$table->text('foto_ktp', 65535)->nullable();
			$table->text('foto_npwp', 65535)->nullable();
			$table->text('foto_akte', 65535)->nullable();
			$table->text('foto_bukti_sewa_bangunan', 65535)->nullable();
			$table->text('foto_merchant_luar', 65535);
			$table->text('foto_merchant_dalam', 65535);
			$table->text('foto_buku_tabungan', 65535)->nullable();
			$table->string('id_agen_kudo', 100)->nullable();
			$table->string('nama_merchant', 100);
			$table->string('nama_badan_usaha', 200);
			$table->string('jenis_usaha', 100);
			$table->string('alamat', 100)->nullable();
			$table->string('alamat_kota', 50)->nullable();
			$table->string('alamat_provinsi', 50)->nullable();
			$table->string('alamat_kode_pos', 50)->nullable();
			$table->string('no_telp_merchant', 100);
			$table->time('open_hour');
			$table->time('close_hour');
			$table->string('nama_owner', 200);
			$table->string('jabatan_owner', 200);
			$table->string('ktp_paspor_owner', 100)->nullable();
			$table->text('foto_ktp_owner', 65535)->nullable();
			$table->string('id_agen_kudo_owner', 100)->nullable();
			$table->string('nomor_rekening', 100)->nullable();
			$table->string('atas_nama', 200)->nullable();
			$table->text('kudo_form_documentation', 65535)->nullable();
			$table->string('kudo_representative', 200)->nullable();
			$table->string('kudo_channel', 200)->nullable();
			$table->string('service_phone_number', 20)->nullable();
			$table->float('lat', 12, 6);
			$table->float('lng', 12, 6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_merchant_groups');
	}

}
