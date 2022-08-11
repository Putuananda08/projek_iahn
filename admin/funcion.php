
<?php
include '../conn.php';
include 'db.php';
$db = new DB($db_host, $db_user, $db_pass, $db_name);
?>
<?php 

function get_nip_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT nip FROM karyawan ORDER BY nip");
    foreach($rows as $row){
        if($row->nip==$selected)
            $a.="<option value='$row->nip' selected>$row->nip</option>";
        else
            $a.="<option value='$row->nip'>$row->nip</option>";
    }
    return $a;
}

function get_nama_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT nama FROM karyawan ORDER BY nama");
    foreach($rows as $row){
        if($row->nama==$selected)
            $a.="<option value='$row->nama' selected>$row->nama</option>";
        else
            $a.="<option value='$row->nama'>$row->nama</option>";
    }
    return $a;
}

function get_jabatan_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT jabatan FROM jabatan ORDER BY jabatan");
    foreach($rows as $row){
        if($row->jabatan==$selected)
            $a.="<option value='$row->jabatan' selected>$row->jabatan</option>";
        else
            $a.="<option value='$row->jabatan'>$row->jabatan</option>";
    }
    return $a;
}
function get_jenis_cuti_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT id_cuti,nama_cuti FROM jenis_cuti");
    foreach($rows as $row){
        if($row->nama_cuti==$selected)
            $a.="<option value='$row->id_cuti.$row->nama_cuti' selected>$row->id_cuti.$row->nama_cuti</option>";
        else
            $a.="<option value='$row->id_cuti.$row->nama_cuti'>$row->id_cuti.$row->nama_cuti</option>";
    }
    return $a;
}
?>
