<?php
include "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama']; 
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    
    $result = mysqli_query($conn, "SELECT foto FROM biodata WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $foto = $row['foto'];
    
    
    if (isset($_FILES['filefoto']) && $_FILES['filefoto']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['filefoto']['nama']);
        
        if (move_uploaded_file($_FILES['filefoto']['tmp_nama'], $target_file)) {
            $foto = $_FILES['filefoto']['nama'];
        }
    }
    
    
    $query = "UPDATE biodata SET 
              nama = '".mysqli_real_escape_string($conn, $nama)."', 
              phone = '".mysqli_real_escape_string($conn, $phone)."', 
              email = '".mysqli_real_escape_string($conn, $email)."', 
              foto = '".mysqli_real_escape_string($conn, $foto)."', 
              gender = '".mysqli_real_escape_string($conn, $gender)."' 
              WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: profilbiodata.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    header("Location: updatebiodata.php?id=".$_POST['id']);
    exit();
}
?>