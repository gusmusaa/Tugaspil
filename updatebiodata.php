<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db		  = "bukutamu";	
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db);
  
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      exit;
  }

  if (!isset($_GET['id'])) {
    die("ID tidak ditemukan di URL. Pastikan URL-nya benar.");
  }

  $id=$_GET['id']; 
  
  $result=mysqli_query($conn,"SELECT * FROM biodata WHERE id=$id");
  if(mysqli_num_rows($result) > 0)
		{ 
		  $row=mysqli_fetch_assoc($result);		
		 		  
		}
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="asset/css/w3.css">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-yellow w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button">Update Biodata</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-red w3-right">Keluar</a>    
  </div>

</div>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Update Data</h3>
    
    <div class="w3-row">
      <form class="w3-container w3-col w3-card-4 w3-light-grey m3" action="ubahbiodata.php" method="post" enctype="multipart/form-data">
      <p>Lakukan Tambah Biodata pada Form ini.</p>
      <input name="id" type="hidden" value="<?php echo $row['id'];?>"> 
      <p><label>Nama</label>
      <input class="w3-input w3-border" name="nama" type="text" value="<?php echo $row['nama'];?>"></p>

      <p><label>Phone</label>
      <input class="w3-input w3-border" name="phone" type="text" value="<?php echo $row['phone'];?>"></p>

      <p><label>Email</label>
      <input class="w3-input w3-border" name="email" type="text" value="<?php echo $row['email'];?>"></p>

      <p><label>Foto </label>
      <input class="w3-input w3-border" name="filefoto" type="file"></p>

      <p><label>Gender</label>
      <select class="w3-select" name="gender">
        <option value="" disabled selected>pilih gender anda</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
        
      </select>

      <input class="w3-button w3-green w3-section" type="submit" name="submit" value="Simpan">
      </form>
      
    </div> 
    <br>
    <a href="profilbiodata.php" class="w3-button w3-border w3-gray">Back</a>
  </div>
  

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-bottom w3-center w3-black w3-padding-10">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>

<?php
 
?>