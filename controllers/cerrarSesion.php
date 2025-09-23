<?php

session_start();
session_unset();
session_destroy();

echo '<script>location.href="../views/login.html"</script>';


?>