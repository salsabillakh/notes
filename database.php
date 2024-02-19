<?php 
$host="localhost";
$user="root";
$pass="";
$dbname="pplg_2_notes";
$koneksi=mysqli_connect($host, $user, $pass, $dbname) or die;
function tampildata($tablename)
{
    global $koneksi;
    $hasil=mysqli_query($koneksi, "select * from $tablename");
    $rows=[];
    while($row = mysqli_fetch_assoc($hasil))
    {
        $rows[] = $row;
    }
    return $rows;
}

function editdata($tablename, $id) {

    global $koneksi;
    $hasil = mysqli_query($koneksi, "select * from $tablename where id = $id");
    return $hasil;
}

function updatedata($table, $data, $id) {
    global $koneksi;
    $sql= "UPDATE $table SET note ='$data' WHERE id ='$id'";
    $hasil=mysqli_query($koneksi, $sql);
    return $hasil;
}

function delete($tablename, $id) {
    global $koneksi;
    $hasil= mysqli_query($koneksi, "delete from $tablename where id='$id'");
    return $hasil;
}

function cek_login($username,$password){
    global $koneksi;
    $uname = $username;
    $upass = $password;

    $hasil = mysqli_query($koneksi,"select * from user where username='$uname' and password=md5('$upass')");
    $cek = mysqli_num_rows($hasil);
    if($cek > 0){
        return true;
    }
    else{
        return false;
    }
}
?>