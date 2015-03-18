<?php
$db = new PDO('mysql:host=localhost;dbname=CE2;charset=utf8', 'root', 'admin123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>