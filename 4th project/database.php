<?php
$pdo = new PDO('sqlite:data.db');
$statement = $pdo->query("SELECT * FROM feedback;");
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
