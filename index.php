<!DOCTYPE HTML>  
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JS Form Validation</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>  

<?php
// define variables and set to empty values
$namaErr = $tempatErr = $jeniskelaminErr = $alamatErr = $usiaErr = "";
$nama = $tempat = $jeniskelamin = $alamat = $usia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $namaErr = "nama is required";
  } else {
    $nama = test_input($_POST["nama"]);
    // check if nama only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $namaErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["tempat"])) {
    $tempatErr = "tempat is required";
  } else {
    $tempat = test_input($_POST["tempat"]);
  }

  if (empty($_POST["alamat"])) {
    $alamat = "";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }

  if (empty($_POST["usia"])) {
    $usiaErr = "Usia is required";
  } else {
    $usia = test_input($_POST["usia"]);
  }

  if (empty($_POST["jeniskelamin"])) {
    $jeniskelaminErr = "jenis kelamin is required";
  } else {
    $jeniskelamin = test_input($_POST["jeniskelamin"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="jumbotron text-center bg-info text-light" id="home">
    <img src="img/logojs-blue.png" class="rounded-circle img-fluid img-thumbnail" alt="Joko Santosa" width="200" height="auto">
    <h2>JS Form Validation for KOMINFO Project</h2>
</div>

<div class="mt-3 mb-3 container">
    <div class="col-md-6 mx-auto">
<p><span class="text-danger">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-group-sm">
    <label for="nama">Nama:</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>">
    <span class="text-danger">* <?php echo $namaErr;?></span>
  </div>
  <div class="input-group-sm">
    <label for="alamat">Alamat:</label>
    <textarea class="form-control" name="alamat" value="<?php echo $alamat;?>"></textarea>
  </div>
  <div class="input-group-sm">
    <label for="tempat">Tanggal Lahir:</label>
    <input type="date" class="form-control" name="tempat" value="<?php echo $tempat;?>">
    <span class="text-danger">* <?php echo $tempatErr;?></span>
  </div>
  <div class="input-group-sm">
    <label for="jeniskelamin">Jenis Kelamin:</label></br>
    <input type="radio" name="jeniskelamin" class="" <?php if (isset($jeniskelamin) && $jeniskelamin=="female") echo "checked";?> value="female">Female
    <input type="radio" name="jeniskelamin" class="" <?php if (isset($jeniskelamin) && $jeniskelamin=="male") echo "checked";?> value="male">Male
    <input type="radio" name="jeniskelamin" class="" <?php if (isset($jeniskelamin) && $jeniskelamin=="other") echo "checked";?> value="other">Other  
    <span class="text-danger">* <?php echo $jeniskelaminErr;?></span>
  </div>
  <div class="input-group-sm">
    <label for="usia">Usia:</label>
    <input type="text" class="form-control" name="usia" value="<?php echo $usia;?>">
    <span class="text-danger">* <?php echo $usiaErr;?></span>
  </div>
  <button type="submit" type="submit" class="btn btn-info">Submit</button>
</form>
</div>
</div>
<div class="jumbotron text-center bg-info text-light" id="home">
<?php
echo "<h2>Hasil dari inputan Anda:</h2>";
echo "Nama : $nama";
echo "<br>";
echo "Alamat : $alamat";
echo "<br>";
echo "TTG : $tempat";
echo "<br>";
echo "Jenis Kelamin : $jeniskelamin";
echo "<br>";
echo "Usia : $usia";
?>
</div>
</body>
</html>