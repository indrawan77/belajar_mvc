<?php

define('BASE_URL', 'http://localhost/belajar_mvc/public');


// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'belajar_mvc');

?>
<script>
  var BASE_URL = "<?= BASE_URL ?>";
  console.log(BASE_URL);
</script>