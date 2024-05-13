<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/layouts/head.php';

?>

<main>
  <div class="banner bg-primary text-white py-3">
    <div class="container">
      <h3>Home Page</h3>
    </div>
  </div>

</main>