<?php
session_start();
// Destruir la sesión
session_unset();
session_destroy();
// Responder con éxito
http_response_code(200);
?>
