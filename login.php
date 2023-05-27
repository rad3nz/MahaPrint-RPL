<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data dari form
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Validasi data
  // ...

  // Koneksi ke database
  $host = "localhost";
  $dbname = "mahaPrint";  
  $username = "postgres";
  $password_db = "r@fifbn2502";

  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password_db);

  // Query untuk mencari user berdasarkan email dan password
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  // Cek apakah user ditemukan
  if ($stmt->rowCount() > 0) {
    // User ditemukan, lakukan sesuatu seperti menyimpan data ke sesi atau mengarahkan ke halaman dashboard
    session_start();
    $_SESSION['email'] = $email; // Simpan email ke sesi

    // Redirect ke halaman dashboard atau halaman lainnya
    header("Location: dashboard.php");
    exit;
  } else {
    // User tidak ditemukan, tampilkan pesan error atau redirect kembali ke halaman login
    echo "Email or password is incorrect.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Head section omitted for brevity -->
  </head>
  <body>
    <div class="card bg-dark text-white rounded-0" style="border-width: 0cm">
      <img src="Asset/hero-image 1.png" class="card-img" alt="login bg" />

      <div
        class="container card-img-overlay ms-5 mt-5 rounded-4"
        id="form"
        style="height: 370px; width: 370px; background-color: #ebf7e5"
      >
        <ul class="nav nav-tabs" style="font-size: large">
          <li class="nav-item">
            <a
              class="nav-link"
              style="color: #78c7ff; background-color: transparent"
              aria-current="page"
              href="login.html"
              >Login</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #9fa597" href="signup.html"
              >Signup</a
            >
          </li>
        </ul>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="mt-4 mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              name="email"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              name="password"
            />
          </div>
          <button
            type="submit"
            class="btn mt-3"
            style="background-color: #78c7ff; color: white"
          >
            Login
          </button>
        </form>
      </div>
    </div>

    <!-- Footer start -->
    <!-- <div class="container bg-primary"> -->
    <div class="row" style="background-color: #78c7ff; width: screen-width">
      <p class="text-center py-auto mt-3">
        <img src="Asset/© 2023 - MahaPrint.png" alt="copyright" width="130" />
      </p>
    </div>
    <!-- </div> -->
    <!-- Footer end -->

    <!-- Scripts omitted for brevity -->
  </body>
</html>
