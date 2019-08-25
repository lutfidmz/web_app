<?php

// insert data pendaftaran
$servername = "localhost";
$username = "root";
$password = "";
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
die();

// belum bisa karena harus penyesuaian fgbot nya
// insert message
$servername = "si.smafuturegate.com:2011";
$username = "root";
$password = "#B!smillah";
$dbname = "fgsis_msg";

$nama = $_POST['txtNama'];
$wa = $_POST['txtWa'];
$sekolah = $_POST['txtAs'];
$ket = $_POST['txtKet'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SET FOREIGN_KEY_CHECKS = 0;
insert into fgsis_msg.outbox (contact_id
,recipient
,recipient_name
,message
,`status`
,jenis
,aktif
,info
,info2
,info3
,tsid
,InsertIntoDB
)
VALUES(vcontact_id
            ,vrecipient
            ,vrecipient_name
            ,vmessage
            ,vstatus
            ,vjenis
            ,1
            ,vtsid
            ,vinfo2
            ,vinfo3				
            ,vtsid
            ,now()
            );
SET FOREIGN_KEY_CHECKS = 1;";

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