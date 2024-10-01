<?php include 'conexion.php';?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>

</head>

<body>

<section class="vh-300 gradient-custom">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div>

              <h2 class="fw-bold mb-2 text-uppercase">Inicia sesión</h2>
              <p class="text-white-50 mb-5">Por favor ingresa tu usuario y contraseña!</p>
              <form method="POST" action="login.php">

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control form-control-lg" id="username" name="username" required>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4 pb-5">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" required>
              </div>

              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-3" type="submit">Iniciar sesión</button>

              <p class="mb-0 pt-5">¿No tienes una cuenta? <a href="register.php" class="text-white-50 fw-bold">Regístrate</a></p>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $conn->query($sql);
        //Verifico que me este trayendo un usuario
        if ($result->num_rows > 0) {
            
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                //Estoy asignando un usuario a la sesion
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
            } else {
                echo "<div class='alert alert-danger mt-3'>Contraseña incorrecta</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>Usuario no encontrado</div>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>