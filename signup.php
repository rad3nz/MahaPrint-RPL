<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $email = $_POST["email"];
  $nama = $_POST["nama"];
  $password = $_POST["password"];

  // Validasi data
  // ...

  // Koneksi ke database
  $host = "localhost";
  $dbname = "mahaPrint";
  $username = "username";
  $password_db = "password";

  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password_db);

  // Insert data ke tabel users
  $stmt = $conn->prepare("INSERT INTO users (namaLengkap, email, password) VALUES (:nama, :email, :password)");
  $stmt->bindParam(':nama', $nama);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  // Redirect ke halaman sukses atau halaman lainnya
  header("Location: success.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Head section omitted for brevity -->
  </head>
  <body>
    <div class="card bg-dark text-white" style="border-width: 0cm; border-radius: cm">
      <img src="Asset/hero-image 1.png" class="card-img" alt="login bg" />

      <div class="container card-img-overlay ms-5 mt-5 rounded-4" id="form" style="height: 450px; width: 370px; background-color: #ebf7e5">
        <ul class="nav nav-tabs" style="font-size: large">
          <li class="nav-item">
            <a class="nav-link" style="color: #9fa597; background-color: transparent" aria-current="page" href="login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #78c7ff" href="signup.html">Signup</a>
          </li>
        </ul>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="mt-4 mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>

          <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="exampleInputName1" name="nama" required />
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required />
          </div>
          <button type="submit" class="btn mt-3" style="background-color: #78c7ff; color: white">Signup</button>
        </form>
      </div>
    </div>

    <!-- Footer section omitted for brevity -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
