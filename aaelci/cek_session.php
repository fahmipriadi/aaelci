<?php
session_start();
if (!isset($_SESSION['int_nip'])){
  echo "<h1>Maaf anda belum login</h1>";
  exit;
}
?>