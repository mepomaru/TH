<?php
session_start();

// セッションをリセット（毎回新規登録画面からスタート）
session_unset();
session_destroy();

// `register.php` にリダイレクト
header("Location: ../public_html/home/php/register.php");
exit;
