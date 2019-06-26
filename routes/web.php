<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/Logout', 'AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/Dashboard-Admin', 'DashboardController@admin');
    Route::get('/Mahasiswa', 'MahasiswaController@index');
    Route::post('/Mahasiswa/create', 'MahasiswaController@create');
    Route::get('/Mahasiswa/{NIM}/edit', 'MahasiswaController@edit');
    Route::post('/Mahasiswa/{NIM}/update', 'MahasiswaController@update');
    Route::get('/Mahasiswa/{NIM}/delete', 'MahasiswaController@delete');
    Route::get('/Mahasiswa/CreateUser', 'MahasiswaController@createUserMahasiswa');

    Route::get('/Dosen/Create', 'DosenController@create');
    Route::get('/Dosen/edit/{kode_dosen}', 'DosenController@edit');
    Route::post('/Dosen/{kode_dosen}/updateAdmin', 'DosenController@updateAdmin');
    Route::get('/Dosen/delete/{kode_dosen}', 'DosenController@delete');
    Route::post('/Dosen/Store', 'DosenController@store');
    Route::get('/Dosen/CreateUser', 'DosenController@createUserDosen');

    Route::resource('BAB', 'BabController');
    Route::resource('SubBab', 'SubBabController');
    Route::resource('Minggu-Bimbingan', 'MinggubimbinganController');
    Route::resource('Deadline', 'DeadlineController');
    Route::resource('Poin-Penilaian', 'PoinPenilaianController');
    Route::resource('Poin-Penilaian-Laporan', 'PoinPenilaianLaporanController');
    Route::resource('Jadwal-Sidang', 'JadwalSidangController');
});

Route::group(['middleware' => ['auth','checkRole:mhs']], function () {
    Route::get('/Mahasiswa/Beranda', 'DashboardController@mahasiswa');
    Route::get('/Mahasiswa/Profile', 'MahasiswaController@profile');
    Route::post('/Mahasiswa/{NIM}/update', 'MahasiswaController@update'); 
    Route::post('/Mahasiswa/changePassword', 'MahasiswaController@changePassword');

    Route::post('/Proposal/Store/Finalisasi', 'proposal_taController@storefinalisasi');

    Route::get('/Proposal/TA/R0', 'proposal_taController@createR0');
    Route::get('/Proposal/TA/R1', 'proposal_taController@createR1');
    Route::post('/Proposal/Store/DataProposal', 'proposal_taController@storeDataProposal');
    Route::post('/Proposal/Store/Abstrak', 'proposal_taController@storeAbstrak');
    Route::post('/Proposal/Store/Pendahuluan', 'proposal_taController@storePendahuluan');
    Route::post('/Proposal/Store/TinjauanPustaka', 'proposal_taController@storeTinjauanPustaka');
    Route::post('/Proposal/Store/MetodePelaksanaan', 'proposal_taController@storeMetodePelaksanaan');
    Route::post('/Proposal/Store/BiayaJadwal', 'proposal_taController@storeBiayaJadwal');
    Route::post('/Proposal/Store/DaftarPustaka', 'proposal_taController@storeDaftarPustaka');
    Route::post('/Proposal/Store/JustifikasiAnggaran', 'proposal_taController@storeJustifikasiAnggaran');
    Route::post('/Proposal/Store/UploadFile', 'proposal_taController@storeUploadFile');
    Route::post('/Proposal/Store/GambaranTeknologi', 'proposal_taController@storeGambaranTeknologi');

    Route::get('/Laporan/TA', 'laporanTAController@create');
    Route::post('/LaporanTA/Store', 'laporanTAController@store');

    Route::get('Bimbingan', 'BimbinganController@index');
    Route::get('Bimbingan/create', 'BimbinganController@create');
    Route::post('Bimbingan/store', 'BimbinganController@store');
    
});

Route::group(['middleware' => ['auth','checkRole:dsn']], function () {
    Route::get('/Dosen/Beranda', 'DosenController@index');
    Route::get('/Dosen/Profile', 'DosenController@profile');
    Route::post('/Dosen/{kode_dosen}/update', 'DosenController@update');
    Route::post('/Dosen/changePassword', 'DosenController@changePassword');
    Route::get('/Bimbingan/Verifikasi', 'BimbinganController@verifikasi');
    Route::get('/Bimbingan/Rekap', 'BimbinganController@rekap');
    Route::get('/Bimbingan/ListVerifikasi', 'BimbinganController@ListVerifikasi');
    Route::post('/Bimbingan/saveBimbingan', 'BimbinganController@saveBimbingan');
    Route::get('/Laporan/Penilaian/List-Mahasiswa', 'laporanTAController@listMahasiswa');
    Route::get('/Laporan/Penilaian/{nim}', 'laporanTAController@penilaianLaporan');
    Route::post('/Laporan/Penilaian/simpan', 'laporanTAController@saveNilaiLaporan');
    Route::post('/Laporan/Revisi/simpan', 'laporanTAController@saveRevisiLaporan');
    Route::post('/Laporan/Revisi/finalisasi', 'laporanTAController@finalisasiRevisiLaporan');
    Route::get('/Laporan/Nilai/List-Mahasiswa', 'laporanTAController@listMahasiswapanitia');
    Route::get('/Laporan/Download/{nama}', 'laporanTAController@downloadfile');
    Route::post('/Unlock/Laporan', 'laporanTAController@unlocknilailaporan');
    Route::get('/Laporan/Nilai/{nim}', 'laporanTAController@detailNilaiLaporan');
});
