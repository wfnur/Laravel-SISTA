<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalTaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_ta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim')->unique();
            $table->string('revisike');
            $table->string('pembimbing_1',20);
            $table->string('pembimbing_2',20);
            $table->text('judul_ta');
            $table->string('bidang');
            $table->text('abstrak_ind');
            $table->text('keyword_ind');
            $table->text('abstrak_eng');
            $table->text('keyword_eng');
            $table->text('tinjauan_pustaka_1');
            $table->text('tinjauan_pustaka_2');
            $table->text('metode_pelaksanaan');
            $table->text('jadwal_kegiatan');
            $table->text('biaya');
            $table->text('pustaka_1');
            $table->text('pustaka_2');
            $table->text('pustaka_3');
            $table->text('pustaka_4');
            $table->text('pustaka_5');
            $table->text('pustaka_6');
            $table->text('pustaka_7');
            $table->text('pustaka_8');
            $table->text('pustaka_9');
            $table->text('pustaka_10');
            $table->text('pengesahan');
            $table->text('biodata');
            $table->text('biodata_pembimbing');
            $table->text('justifikasi_anggaran');
            $table->text('gambar_ilustrasi');
            $table->text('penjelasan_ilustrasi');
            $table->text('spek_teknis');
            $table->text('gambar_blok_diagram');
            $table->text('penjelasan_blok_diagram');
            $table->text('gambar_blok_diagram2');
            $table->text('penjelasan_blok_diagram2');
            $table->text('gambar_flowchart');
            $table->text('penjelasan_flowchart');
            $table->text('komponen');
            $table->text('status_dataProposal');
            $table->text('status_pendahuluan');
            $table->text('status_tinpus');
            $table->text('status_metode');
            $table->text('status_biayaJadwal');
            $table->text('status_dapus');
            $table->text('status_justifikasi');
            $table->text('status_uploadFile');
            $table->text('status_gambaranTeknologi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_ta');
    }
}
