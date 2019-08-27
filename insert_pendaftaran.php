<?php

// insert data pendaftaran
$servername = "si.smafuturegate.com:2011";
$username = "root";
$password = "#B!smillah";   
$dbname = "web_app";

$nama = $_POST['txtNama'];
$wa = $_POST['txtWa'];
$sekolah = $_POST['txtAs'];
$ket = $_POST['txtKet'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO pendaftaran (nama, whatsapp, sekolah, keterangan, ts_id)
        VALUES ('$nama', '$wa', '$sekolah', '$ket', 'web_app')";

if (mysqli_query($conn, $sql)) {
    // echo "<script>
    //         alert('Data $nama Berhasil Di Input');
    //         window.location.href = './';
    //       </script>";
    // // header("location: ./");
    // echo 'Data Berhasil Di Input';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    die();
}

mysqli_close($conn);
// die();

// ini nanti link bentuk pesannya dikirim ke wa info fg aja
$text = "Assalamualaikum Ibu/Bapak dari ananda *".ucfirst($nama)."*
Terimakasih telah mendaftar ke SMA Future Gate
InsyaAllah akan segera kami hubungi ketika tanggal PPDB sudah dibuka
Berikut adalah tautan untuk akses ke Tautan-Tautan penting lainnya http://si.smafuturegate.com/tautan-penting";
$num = $wa;
$message = rawurlencode($text);
$url = "https://api.whatsapp.com/send?phone=".$num."&text=".$message;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
insert into fgsis_msg.outbox (contact_id
,recipient
,recipient_name
,message
,`status`
,jenis
,aktif
,tsid
,InsertIntoDB
)
VALUES(521
            ,'6281318123418'
            ,'111201006 #SAIBANI KURNIAJATI, A.Md #3418'
            ,'$url'
            ,'Q'
            ,'i'
            ,1
            ,'web_app'
            ,now()
            );
";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Data $nama Berhasil Di Input');
            window.location.href = './';
          </script>";
    // header("location: ./");
    // echo 'Data Berhasil Di Input';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?> 