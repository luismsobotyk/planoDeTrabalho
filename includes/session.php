<?php
/*
  **************************************************
                Controle de Sessão
  **************************************************

  $_SESSION["user_email"] --> Variável para controle de usuário
*/
  ob_start();
  //ini_set('session.gc_maxlifetime', (24 * 60 * 60)); // tempo máximo da sessão em segundos
  ini_set('session.use_strict_mode', true); // aceitar apenas sessões criadas pelo módulo session
  ini_set('session.use_cookies', true); // usar junto com use_only_cookies
  ini_set('session.use_only_cookies', true); // cookies gerados apenas pelo proprio usuário
  ini_set('session.cookie_httponly', true); // cookies só acessíveis por HTTP (não JS)
  //ini_set('session.cookie_secure', true); // cookies só acessíveis por HTTPS
  ini_set('session.hash_function', 'sha512'); // criptografa session: dificulta Session Hijacking
  ini_set('session.use_trans_sid', false); // suporte a SID transparente desabilitado
  //ini_set('session.referer_check', 'http://web.farroupilha.ifrs.edu.br'); // checa o referer
  ini_set('session.cache_limiter', 'nocache'); // não fazer cache

  //echo $_SERVER["REQUEST_URI"];

  if(isset($_SESSION)){
    session_regenerate_id();
  }else{
    session_start();
    if (!isset($_SESSION["user_email"]) && ($_SERVER["REQUEST_URI"] != "/login/index.php")) {
      header("Location: /login/index.php");
    }
  }


?>
