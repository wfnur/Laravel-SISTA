<?php
include "koneksi.php";

/////////////////////////////////////////////////////////////////////
//----------------------kelas--------------------------------------
/////////////////////////////////////////////////////////////////////
function getkelas($angkatan,$kelas){
    $angkatan = date("Y") - $angkatan ;
    $fixkls = $angkatan.$kelas;

    return $fixkls;
}

/////////////////////////////////////////////////////////////////////
//----------------------dosen--------------------------------------
/////////////////////////////////////////////////////////////////////
function nama_dosen($conn,$status_dsn){
    $sql_dosen = "SELECT * FROM dosen where status='$status_dsn' ORDER BY nama ASC ";
    $q_dosen = mysqli_query($conn, $sql_dosen) or die(mysqli_errno($conn));
    while ($t_dosen=mysqli_fetch_array($q_dosen, MYSQLI_ASSOC)) {
        echo "
        <option value='$t_dosen[kode_dosen]'>$t_dosen[nama]</option>
        ";
    }
}

function nama_dosen_semua($conn){
    $sql_dosen = "SELECT * FROM dosen ";
    $q_dosen = mysqli_query($conn, $sql_dosen) or die(mysqli_errno($conn));
    while ($t_dosen=mysqli_fetch_array($q_dosen, MYSQLI_ASSOC)) {
        echo "
        <option value='$t_dosen[kode_dosen]'>$t_dosen[nama]</option>
        ";
    }
}
function getDosen($conn,$kode_dosen){
    $s_dosen = "SELECT * FROM dosen where kode_dosen='$kode_dosen' ";
    $q_dosen = mysqli_query($conn, $s_dosen) or die(mysqli_error($conn));

    return $q_dosen;
}

function getNamaDosen($conn,$kode_dosen){
    $s_dosen = "SELECT * FROM dosen where kode_dosen='$kode_dosen' ";
    $q_dosen = mysqli_query($conn, $s_dosen) or die(mysqli_error($conn));
    $f_dosen = mysqli_fetch_array($q_dosen,MYSQLI_ASSOC);

    return $f_dosen;
}

/////////////////////////////////////////////////////////////////////
//----------------------BERKAS--------------------------------------
/////////////////////////////////////////////////////////////////////
function getberkas($conn,$NIM,$jenis_berkas){
    $status_berkas = "";
    $s_getBerkas = "SELECT * FROM berkas where NIM='$NIM' and jenis_berkas='$jenis_berkas' ";
    $q_getBerkas = mysqli_query($conn, $s_getBerkas) or die(mysqli_error($conn));
    if($q_getBerkas && mysqli_num_rows($q_getBerkas) > 0){
        $status_berkas = "OK";
    }else{
        $status_berkas = "NO";
    }
    return $status_berkas;
}

function getNama_berkas($conn,$NIM,$jenis_berkas){
    $status_berkas = "";
    $s_getNama_berkas = "SELECT * FROM berkas where NIM='$NIM' and jenis_berkas='$jenis_berkas' ";
    $q_getNama_berkas = mysqli_query($conn, $s_getNama_berkas) or die(mysqli_error($conn));
    $t_getNama_berkas = mysqli_fetch_array($q_getNama_berkas,MYSQLI_ASSOC);
    
    return $t_getNama_berkas;
}

function cekBerkas($conn,$jenis,$NIM){
    $sqlcek="SELECT * from berkas where NIM='$NIM' and jenis_berkas='$jenis' ";
    $querycek=mysqli_query($conn, $sqlcek) or die(mysqli_error($conn));
    return $querycek;
}

function getNama_berkasPKM($conn,$kode_pkm){
    $status_berkas = "";
    $s_getNama_berkas = "SELECT * FROM pkm where kode_pkm='$kode_pkm' ";
    $q_getNama_berkas = mysqli_query($conn, $s_getNama_berkas) or die(mysqli_error($conn));
    $t_getNama_berkas = mysqli_fetch_array($q_getNama_berkas,MYSQLI_ASSOC);
    
    return $t_getNama_berkas;
}

function getNamaberkas_bimbingan($conn,$kode_bimbingan){
    $status_berkas = "";
    $s_getNama_berkas = "SELECT * FROM bimbingan where kode_bimbingan='$kode_bimbingan' ";
    $q_getNama_berkas = mysqli_query($conn, $s_getNama_berkas) or die(mysqli_error($conn));
    $t_getNama_berkas = mysqli_fetch_array($q_getNama_berkas,MYSQLI_ASSOC);
    
    return $t_getNama_berkas;
}


/////////////////////////////////////////////////////////////////////
//----------------------mahasiswa--------------------------------------
/////////////////////////////////////////////////////////////////////
function getMhs($conn,$nim){
    $s_getMhs = "SELECT * FROM mahasiswa where NIM='$nim' ";
    $q_getMhs = mysqli_query($conn, $s_getMhs) or die(mysqli_error($conn));
    $t_getMhs = mysqli_fetch_array($q_getMhs,MYSQLI_ASSOC);

    return $t_getMhs;
}
function qMhs($conn,$nim){
    $s_countMhs = "SELECT * FROM mahasiswa where NIM='$nim' ";
    $q_countMhs = mysqli_query($conn, $s_countMhs) or die(mysqli_error($conn));

    return $q_countMhs;
}

function countMhs($conn,$nim){
    $s_countMhs = "SELECT * FROM mahasiswa where NIM='$nim' ";
    $q_countMhs = mysqli_query($conn, $s_countMhs) or die(mysqli_error($conn));
    $count_mhs = mysqli_num_rows($q_countMhs);

    return $count_mhs;
}

/////////////////////////////////////////////////////////////////////
//----------------------PKM--------------------------------------
/////////////////////////////////////////////////////////////////////
function getPKM($conn,$nim,$jenis){
    $s_getPKM = "SELECT * FROM pkm where NIM='$nim' and jenis_pkm='$jenis'  ";
    $q_getPKM = mysqli_query($conn, $s_getPKM) or die(mysqli_error($conn));
    
    return $q_getPKM;
}
function statusPKM($conn,$nim,$jenis){
    $status_pkm ="";
    $qpkm=getPKM($conn,$nim,$jenis);
    $t_pkm=mysqli_fetch_array($qpkm);
    
    if ($jenis=="PKM_POLBAN") {
        if ($t_pkm['status_pkm']=="0") {
            $status_pkm = "<option value='0'>Tidak Submit PKM POLBAN</option>";
        } elseif ($t_pkm['status_pkm']=="submit") {
            $status_pkm = "<option value='submit'> Submit PKM POLBAN</option>";
        }elseif ($t_pkm['status_pkm']=="diterima") {
            $status_pkm = "<option value='diterima'>PKM POLBAN Diterima</option>";
        }
        
    } else {
        if ($t_pkm['status_pkm']=="0") {
            $status_pkm = "<option value='0'>Tidak Submit PKM BELMAWA</option>";
        } elseif ($t_pkm['status_pkm']=="submit") {
            $status_pkm = "<option value='submit'>Submit PKM BELMAWA</option>";
        }elseif ($t_pkm['status_pkm']=="diterima") {
            $status_pkm = "<option value='diterima'>PKM BELMAWA Diterima</option>";
        }
    }
    return $status_pkm;
    
    
}

/////////////////////////////////////////////////////////////////////
//----------------------PEMBIMBING--------------------------------------
/////////////////////////////////////////////////////////////////////

function getPembimbing($conn,$NIM,$jenis_pembimbing){
    $s_getPembimbing = "SELECT * FROM pembimbing
    INNER JOIN dosen
    ON pembimbing.kode_dosen=dosen.kode_dosen
    WHERE pembimbing.NIM = '$NIM'and pembimbing.jenis_pembimbing='$jenis_pembimbing' ";
    $q_getPembimbing = mysqli_query($conn, $s_getPembimbing) or die(mysqli_error($conn));
    $t_getPembimbing = mysqli_fetch_array($q_getPembimbing,MYSQLI_ASSOC);
    $fetch = $t_getPembimbing['nama'];
    return $fetch;
}



/////////////////////////////////////////////////////////////////////
//----------------------GENERATE--------------------------------------
/////////////////////////////////////////////////////////////////////
function generateNamaFile($conn,$NIM,$ext,$jenis_file){
    $mhs = getMhs($conn,$NIM);
    $nama = str_replace(" ","",$mhs['nama']);
    $kelas = $mhs['kelas'];
    $urut = $mhs['nourut'];
    $angkatan = date("Y") - $mhs['angkatan'] ;

    if ($jenis_file=="PKM_POLBAN") {
        $namafile = "ProposalPKMPOLBAN_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    } elseif ($jenis_file=="PKM_BELMAWA") {
        $namafile = "ProposalPKMBELMAWA_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    } elseif ($jenis_file =="TA") {
        $namafile = "ProposalTA_".$angkatan.$kelas."_".$urut."_".$nama."_R0.".$ext;
    }elseif ($jenis_file =="TA_rev") {
        $namafile = "ProposalTA_".$angkatan.$kelas."_".$urut."_".$nama."_R1.".$ext;
    }elseif ($jenis_file =="LP_pta") {
        $namafile = "LP_ProposalTA_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    }elseif ($jenis_file =="LP_PKM") {
        $namafile = "LP_PKM_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    }
    return $namafile;
}

function generateNamaFilePKM($conn,$NIM,$ext,$jenis_file,$tahun){
    $mhs = getMhs($conn,$NIM);
    $nama = str_replace(" ","",$mhs['nama']);
    $kelas = $mhs['kelas'];
    $urut = $mhs['nourut'];
    $angkatan = date("Y") - $mhs['angkatan'] ;

    if ($jenis_file =="PKM_POLBAN") {
        $namafile_pkm = "LP_PKM_POLBAN_".$tahun."_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    }elseif ($jenis_file =="PKM_BELMAWA") {
        $namafile_pkm = "LP_PKM_BELMAWA_".$tahun."_".$angkatan.$kelas."_".$urut."_".$nama.".".$ext;
    } 
    return $namafile_pkm;
}

function generateNamaFileBimbingan($conn,$NIM,$ext,$tgl){
    $mhs = getMhs($conn,$NIM);
    $nama = str_replace(" ","",$mhs['nama']);
    $kelas = $mhs['kelas'];
    $urut = $mhs['nourut'];
    $angkatan = date("Y") - $mhs['angkatan'] ;

    $namafile_form = "Form_Bimbingan_".$angkatan.$kelas."_".$urut."_".$nama."_".$tgl.".".$ext;
    
    return $namafile_form;
}


/////////////////////////////////////////////////////////////////////
//----------------------STATUS PROPOSAL TA--------------------------------------
/////////////////////////////////////////////////////////////////////
function statusAction($conn,$NIM){
    $action_status="";
    $query_status = mysqli_query ($conn, "SELECT * FROM status_pta WHERE NIM = '$NIM' ") or die(mysqli_error($conn));
    $count_status = mysqli_num_rows($query_status);
    if (empty($count_status)) {
        $action_status = "simpan_status_pta";
    } else {
        $action_status = "edit_status_pta";
    }
    return $action_status;
}

/////////////////////////////////////////////////////////////////////
//----------------------PROPOSAL TA--------------------------------------
/////////////////////////////////////////////////////////////////////
function getProposalTA($conn, $NIM){
    $s_getProposalTA = "SELECT * From proposal_ta where NIM='$NIM' ";
    $q_getProposalTA = mysqli_query($conn, $s_getProposalTA) or die(mysqli_error($conn));
    $t_getProposalTA = mysqli_fetch_array($q_getProposalTA);
    return $t_getProposalTA;
}

function checklist($conn,$NIM,$indikator){
    $query_tampil = mysqli_query ($conn, "SELECT * FROM status_pta WHERE NIM = '$NIM' ");
    $edit = mysqli_fetch_array($query_tampil);
    $checked = explode(', ', $edit['indikator']);

    if (in_array($indikator, $checked)) {
        $checklist="<i class='fa fa fa-check' style='color:green;font-size:20px'></i>";
    } else {
        $checklist="<i class='fa fa fa-close' style='color:red;font-size:20px'></i>";
    }

    return $checklist ;
    
}

function downloadDOC($conn,$NIM,$jenis){
    $nama_filedoc = getNama_berkas($conn,$NIM,$jenis);
    $ketersediaan = is_file("../Document/Proposal_TA/$nama_filedoc[nama_berkas]") ;
    if($ketersediaan){
        echo " 
        <a class='btn btn-app btn-info' href='App/Document/Proposal_TA/$nama_filedoc[nama_berkas]' target='_blank'>
            <span class='badge'>
                <i class='fa fa fa-check-circle' style='color:green;font-size:20px;'></i>
            </span>
            <i class='fa fa-cloud-download' ></i> Download DOC
        </a>";
    }else{
        echo "
        <div class='btn btn-app btn-info'>
        <i class='fa fa-cloud-download' ></i> DOC
        </div>";
    }
}

function liatPDF($conn,$NIM,$jenis){
    $nama_filepdf = getNama_berkas($conn,$NIM,$jenis);
    if(is_file("../Document/Proposal_TA/$nama_filepdf[nama_berkas]")){
        echo "
    <a class='btn btn-app btn-info' href='App/Document/Proposal_TA/$nama_filepdf[nama_berkas]' target='_blank'>
        <span class='badge'>
            <i class='fa fa fa-check-circle' style='color:green;font-size:20px;'></i>
        </span>
        <i class='fa fa fa-eye' ></i> Lihat PDF
    </a>";
    }else{
        echo "
        <div class='btn btn-app btn-info'>
        <i class='fa fa fa-eye' ></i> FILE TIDAK ADA <br>
        </div>";
    }
}

function liatLP($conn,$NIM,$jenis){
    $nama_filepdf = getNama_berkas($conn,$NIM,$jenis);
    if(is_file("../Document/Lembar_Pengesahan_ProposalTA/$nama_filepdf[nama_berkas]")){
        echo "
    <a class='btn btn-app btn-info' href='App/Document/Lembar_Pengesahan_ProposalTA/$nama_filepdf[nama_berkas]' target='_blank'>
        <span class='badge'>
            <i class='fa fa fa-check-circle' style='color:green;font-size:20px;'></i>
        </span>
        <i class='fa fa fa-eye' ></i> Lihat PDF
    </a>";
    }else{
        echo "
        <div class='btn btn-app btn-info'>
        <i class='fa fa fa-eye' ></i> FILE TIDAK ADA <br>
        </div>";
    }
}

function downloadDOCPKM($conn,$NIM,$jenis){
    $nama_filedoc = "";
    $dir ="";
    if ($jenis == "doc_PKMBELMAWA") {
        $dir ="Proposal_PKM_BELMAWA";
    } elseif ($jenis == "doc_PKMPOLBAN") {
        $dir ="Proposal_PKM_POLBAN";
    } 
    
    $nama_filedoc = getNama_berkas($conn,$NIM,$jenis);
    $ketersediaan = is_file("../Document/$dir/$nama_filedoc[nama_berkas]") ;
    if($ketersediaan){
        echo " 
        <a class='btn btn-app btn-info' href='App/Document/$dir/$nama_filedoc[nama_berkas]' target='_blank'>
            <span class='badge'>
                <i class='fa fa fa-check-circle' style='color:green;font-size:20px;'></i>
            </span>
            <i class='fa fa-cloud-download' ></i> Download DOC
        </a>";
    }else{
        echo "
        <div class='btn btn-app btn-info'>
        <i class='fa fa-cloud-download' ></i> DOC
        </div>";
    }
}

function liatPDFPKM($conn,$NIM,$jenis){
    $nama_filepdf = getNama_berkas($conn,$NIM,$jenis);

    $nama_filedoc = "";
    $dir ="";
    if ($jenis == "pdf_PKMBELMAWA") {
        $dir ="Proposal_PKM_BELMAWA";
    } elseif ($jenis == "pdf_PKMPOLBAN") {
        $dir ="Proposal_PKM_POLBAN";
    }

    if(is_file("../Document/$dir/$nama_filepdf[nama_berkas]")){
        echo "
    <a class='btn btn-app btn-info' href='App/Document/$dir/$nama_filepdf[nama_berkas]' target='_blank'>
        <span class='badge'>
            <i class='fa fa fa-check-circle' style='color:green;font-size:20px;'></i>
        </span>
        <i class='fa fa fa-eye' ></i> Lihat PDF
    </a>";
    }else{
        echo "
        <div class='btn btn-app btn-info'>
        <i class='fa fa fa-eye' ></i> FILE TIDAK ADA <br>
        </div>";
    }
}
////////////////////////////////////////////////////////
function statusPTA($conn, $NIM){
    $sql_status = "SELECT * FROM proposal_ta where NIM='$NIM' ";
    $query_status = mysqli_query($conn, $sql_status) or die(mysqli_error($conn));
    $fetch_status = mysqli_fetch_array($query_status,MYSQLI_ASSOC);

    return $fetch_status;
}

/////////////////////////////////////////////////////////////////////
//----------------------TANGGAL--------------------------------------
/////////////////////////////////////////////////////////////////////
function tgl_db($tgl){
    $bulan = substr($tgl,0,2);
    $tanggal = substr($tgl,3,2);
    $tahun = substr($tgl,6,4);
    return $tahun.'-'.$bulan.'-'.$tanggal;	 
}

function tgl_form($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2);
    $tahun = substr($tgl,0,4);
      
    return $bulan.'/'.$tanggal.'/'.$tahun;	 
}

/////////////////////////////////////////////////////////////////////
//----------------------MINGGU KE---------------------------------------
/////////////////////////////////////////////////////////////////////

function hitungMinggu($conn,$NIM, $kode_minggu,$pembimbing){
    $s_getMinggu = "SELECT * FROM mingguke where kode_mingguke='".$kode_minggu."' ";
    $q_getMinggu = mysqli_query($conn, $s_getMinggu) or die(mysqli_error($connn));
    $f_getMinggu = mysqli_fetch_array($q_getMinggu,MYSQLI_ASSOC);
    
    $s_bimbingan = "SELECT * FROM bimbingan where NIM='".$NIM."' and status='1' and pembimbing='$pembimbing' and tanggal_bimbingan BETWEEN '$f_getMinggu[mulai]' AND '$f_getMinggu[akhir]' ";
    $q_bimbingan = mysqli_query($conn,$s_bimbingan) or die(mysqli_error($conn));
    $count = mysqli_num_rows($q_bimbingan);

    return $count;
}
function mingguSekarang($conn){
    $s_minggu = "SELECT * FROM mingguke";
    $q_minggu = mysqli_query($conn, $s_minggu);
    $sekarang = date("Y-m-d");
    //echo time();
    $mingguSekarang="";
    while ($t_minggu=mysqli_fetch_array($q_minggu,MYSQLI_ASSOC)) {
      //echo $t_minggu['mulai']. " to ". $t_minggu['akhir'] ."<br>";
      if (time() >= strtotime($t_minggu['mulai']) && time() <= strtotime($t_minggu['akhir'])) {
        $mingguSekarang = $t_minggu['mingguke'];
      } else {
      }
    }
    return $mingguSekarang;
  }
  
  function mingguInput($conn,$tanggal){
    $s_minggu = "SELECT * FROM mingguke";
    $q_minggu = mysqli_query($conn, $s_minggu);
    $sekarang = date("Y-m-d");
    //echo time();
    $mingguInput="";
    while ($t_minggu=mysqli_fetch_array($q_minggu,MYSQLI_ASSOC)) {
      //echo $t_minggu['mulai']. " to ". $t_minggu['akhir'] ."<br>";
      if (strtotime($tanggal) >= strtotime($t_minggu['mulai']) && strtotime($tanggal) <= strtotime($t_minggu['akhir'])) {
        $mingguInput = $t_minggu['mingguke'];
      } else {
      }
    }
    return $mingguInput;
  }


 
?>