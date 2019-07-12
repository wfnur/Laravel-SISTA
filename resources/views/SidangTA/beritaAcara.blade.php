<!DOCTYPE html>
<html>
<head>
    <title>MPDF Printout</title>
    <style>
    html{
        font-size: 10pt;
    }
    .ttd td{
        padding: 10px;
    }
    </style>
</head>
<body>
<div id="wrapper">   
    <table  style="width: 100%">
        <tr>
            <td style="border: 1px solid black;">&nbsp;&nbsp;
                <img src="{{asset('Images/logo_polban.png')}}" height ="70px;" style="margin-top:10px;margin-left:18px"></td>
            <td style="border-top: 1px solid black;border-right: 1px solid black;border-bottom: 1px solid black;">
               <table  style="margin:0 auto;">
                    <tr>
                        <td style="font-style: bold; text-align:center">
                            <center><b>BERITA ACARA EVALUASI PELAKSANAN SIDANG TUGAS AKHIR</b></center>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 10pt;">
                            <center>PROGRAM STUDI TEKNIK TELEKOMUNIKASI JURUSAN TEKNIK ELEKTRO</center>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 10pt; text-align:center">
                            <center>POLITEKNIK NEGERI BANDUNG</center>
                        </td>
                    </tr>
                </table> 
            </td>
        </tr>
    </table>
    <br>Berdasarkan pelaksanaan evaluasi sidang Tugas Akhir yang dilaksanakan pada:</br>
    <table  style="width: 100%;" >
        <tr>
            <td style="width: 20%">
                Hari
            </td>
            <td>
                : {{$hari}}
            </td>
        </tr>
        <tr>
            <td>
                Tanggal
            </td>
            <td>
                : {{$tanggal}}
            </td>

        </tr>
        <tr>
            <td>
                Tahun Ajaran
            </td>
            <td>
                : 2018/2019
            </td>
            
        </tr>
    </table>

    <br>Majelis sidang menyampaikan hasil evaluasi mata kuliah Tugas Akhir atas nama:</br>
    <table  style="width: 100%;" border="">
        <tr>
            <td style="width: 20%"> Nama Mahasiswa </td>
            <td> : {{$laporanTA->mahasiswa->nama}} </td>
        </tr>
        <tr>
            <td> NIM </td>
            <td> : {{$laporanTA->mahasiswa->NIM}} </td>

        </tr>
            <tr>
                <td>Kelas </td>
                <td> : {{$kelas}} </td>
                
            </tr>
            <tr>
                <td>Program Studi</td>
                <td> : {{$prodi}}</td>
                
            </tr>
            <tr>
                <td> Judul Tugas Akhir </td>
                <td> : {{$laporanTA->judul_ta}} </td>
                
            </tr>
    </table>

    <table  style="width: 80%; margin:0 auto;" border="1">
        <tr style="text-align:center">
            <th>No</th><th>Aspek yang dievaluasi</th><th>Maks Poin</th><th>Nilai</th>
        </tr>
            
        <tr>
            <td style="text-align: center">A</td>
            <td>Nilai Pembimbing</td>
            <td style="text-align: center">45</td>
            <td style="text-align: center">{{$nilai_pembimbing_all}}</td>
        </tr>
        <tr>
            <td style="text-align: center">B</td>
            <td>Nilai Penguji</td>
            <td style="text-align: center">40</td>
            <td style="text-align: center">{{$nilai_penguji}}</td>
        </tr>
        <tr>
            <td style="text-align: center">C</td>
            <td>Nilai Laporan</td>
            <td style="text-align: center">15</td>
            <td style="text-align: center">{{$nilai_laporanFIX}}</td>
        </tr>
        
        <tr>
            <td colspan="3"><center>Total</center></td>
            <td style="text-align: center" >{{$total_nilai}}</td>
        </tr>

        <tr>
            <?php 
            if ($total_nilai <=100 and $total_nilai >=80) {
                $index = "A";
            }elseif ($total_nilai < 80 and $total_nilai >=75) {
                    $index = "AB";
            }elseif ($total_nilai < 75 and $total_nilai >=70) {
                    $index = "B";
            }elseif ($total_nilai < 70 and $total_nilai >=65) {
                    $index = "BC";
            }elseif ($total_nilai < 65 and $total_nilai >=60) {
                    $index = "C";
            }elseif ($total_nilai < 60 and $total_nilai >=55) {
                    $index = "CD";
            }elseif ($total_nilai < 55 and $total_nilai >=40) {
                    $index = "D";
            }elseif ($total_nilai < 40 and $total_nilai >=0) {
                    $index = "E";
            }
            ?>
            <td colspan="3"><center>Indek</center></td>
            <td style="text-align: center"><?php echo"$index"; ?></td>
        </tr>
    </table>

    @php
    if ($total_nilai <=100 and $total_nilai >=80) {
        $lulus ="<b>LULUS</b>
        <span style='text-decoration:line-through'>/LULUS BERSYARAT/TUNDA</span>
        ";
    }elseif($total_nilai < 80 and $total_nilai >=60){
        $lulus ="<span style='text-decoration:line-through'>LULUS</span>
        /<b>LULUS BERSYARAT</b>/<span style='text-decoration:line-through'>TUNDA</span>
        ";
    }else{
		$lulus ="<span style='text-decoration:line-through'>LULUS</span>
        /<span style='text-decoration:line-through'>LULUS BERSYARAT</span>/<b> TUNDA</b>
        ";
	}
    @endphp
    <p style="text-align:justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kepada mahasiswa tersebut dinyatakan <?php echo"$lulus"; ?> evaluasi sidang Tugas Akhir.  Selanjutnya hasil evaluasi sidang Tugas Akhir ini dipergunakan untuk yudisium kelulusan Diploma III/IV, Program Studi D3/D4 Teknik Telekomunikasi Politeknik Negeri Bandung atas nama mahasiswa yang bersangkutan.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian berita acara evaluasi sidang Tugas Akhir ini telah dilaksanakan dengan menjunjung tinggi sistem penilaian yang obyektif.
    </p>

    <div style="text-align: right">
        Bandung Barat, {{$hari}}, {{$tanggal}} <br>
        Majelis Sidang Tugas Akhir,
    </div>

    <table  style="width: 109%;margin-left:-30px;">
        <tr>
            <td>
                <div style="text-align: center;">
                    Ketua Sidang,<br>
                    Pendamping
                </div>
                <br><br><br><br><br><br><br><br>

                <div style="text-align: left;">
                    <span style='font-size:14px;'>{{$jadwalSidang->ketua_pengujiRelasi->nama}}</span><br>
                    NIP:{{$jadwalSidang->ketua_pengujiRelasi->nip}}
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                   <center> Penguji I</center>
                </div>
                <br><br><br><br><br><br><br><br><br>

                <div style="text-align: left;">
                    <span style='font-size:14px;'>{{$jadwalSidang->penguji1Relasi->nama}}</span><br>
                    NIP:{{$jadwalSidang->penguji1Relasi->nip}}
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                    <center>Penguji II</center>
                </div>
                <br><br><br><br><br><br><br><br><br>

                <div style="text-align: left;">
                    <span style='font-size:14px;'>{{$jadwalSidang->penguji2Relasi->nama}}</span><br>
                    NIP:{{$jadwalSidang->penguji2Relasi->nip}}
                </div>
            </td>
            <td>
                <div style="text-align: center;">
                   <center> Pembimbing </center>
                </div>
                <br><br><br><br><br><br><br><br><br>

                <div style="text-align: left;">
                    <span style='font-size:14px;'>{{$jadwalSidang->pembimbingRelasi->nama}}</span><br>
                    NIP:{{$jadwalSidang->pembimbingRelasi->nip}}
                </div>
            </td>
        </tr>
        
    </table>

    @php
        $a= "80.00<=A<=100.00, 75.00<=AB<=79.99, 70.00<=B<=74.99, 65.00<=BC<=69.99, 60.00<=C<=64.99, 55.00<=CD<=59.99, 40.00<=D<=54.99, 0.00<=E<=39.99, -1.00<=T<=-1.00.";
    @endphp
    <div style="font-size: 10px;" >
        Catatan :<br>
        <ul>
            <li>Mahasiswa dinyatakan LULUS sidang Tugas Akhir bila nilai minimal C dan seluruh penguji tidak memberikan revisi laporan Tugas Akhir.</li>
            <li>Mahasiswa dinyatakan LULUS BERSYARAT sidang Tugas Akhir bila nilai minimal C dan salah satu penguji memberikan revisi laporan Tugas Akhir.</li>
            <li>Mahasiswa dinyatakan TIDAK LULUS sidang Tugas Akhir bila nilai dibawah C.</li>
            <li>Indeks nilai akhir mengikuti aturan sebagai berikut. <br>
                {{$a}}
            </li>

        </ul>
    </div>
    </div>
</body>
</html>