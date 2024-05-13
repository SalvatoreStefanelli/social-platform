<?php
require_once __DIR__ . '/Helpers/DB.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['username']) && isset($_POST['password'])) {

  var_dump($_POST);
  var_dump('check the user credentials');

  $username = $_POST['username'];
  $plain_text_password = $_POST['password'];
  $hashed_password = md5($plain_text_password);

  $connection = DB::connect();

  $sql = "SELECT `ID`, `username` FROM `users` WHERE `username` = ? AND `password` = ?";
  
  $statement = $connection->prepare($sql);
  $statement->bind_param('ss', $username, $hashed_password);
  $statement->execute();

  $result = $statement->get_result();

  if ($result->num_rows > 0) {
   
    $user = $result->fetch_assoc();

    $_SESSION['user_id'] = $user['ID'];
    $_SESSION['user_name'] = $user['username'];

    header('Location: ./dashboard.php');
  }
  
  DB::close_connection($connection);
}

include __DIR__ . '/layouts/head.php';

?>
<main>
  <div class="banner bg-dark text-white py-3">
    <div class="container">
      <h3>Log in</h3>
    </div>
  </div>


  <div class="container">
    <div class="card p-5 my-5 col-6 mx-auto">
      <h5 class="text-muted text-uppercase">Log in</h5>
      <?php if ($_SESSION['error_message']) : ?>
        <div class="alert alert-primary" role="alert">
          <strong>Error</strong> <?= $_SESSION['error_message'] ?>
        </div>

      <?php endif ?>

      <form action="" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label"> <i class="fas fa-user fa-xs fa-fw"></i> Username</label>
          <input type="text" name="username" id="username" class="form-control" aria-describedby="usernameHelper">
          <small id="usernameHelper" class="text-muted">Type here your username</small>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label"> <i class="fas fa-key fa-xs fa-fw"></i> Password</label>
          <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelper">
          <small id="passwordHelper" class="text-muted">Type here your password</small>
        </div>


        <button type="submit" class="btn btn-dark">Log in <i class="fas fa-long-arrow-alt-right fa-xs fa-fw"></i></button>

      </form>
    </div>
  </div>

</main>


<?php
include_once __DIR__ . '/./main.php';
