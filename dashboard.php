<?php
require_once __DIR__ . '/Helpers/DB.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['user_id'])) {

  $username = $_SESSION['user_name'];

  $connection = DB::connect();

  $sql = "SELECT * FROM `posts`";

  $results = $connection->query($sql);

  if ($results->num_rows > 0) {
    $posts = $results->fetch_all(MYSQLI_ASSOC);
    
  } elseif ($results) {
    echo "0 results";
  } else {
    echo "query error";
  }

  DB::close_connection($connection);
} else {
  $_SESSION['error_message'] = 'You are not logged in to view the dashbord';
  header('Location: /login.php');
}

include __DIR__ . '/layouts/head.php';

?>

<?php if (isset($_SESSION['user_id'])) : ?>
  <div class="banner bg-dark text-white py-4 mb-5">
    <div class="container">
      Dashboard
      <h2>Welcome <?= $username ?></h2>
    </div>
  </div>
<?php endif; ?>   

</body>

</html>