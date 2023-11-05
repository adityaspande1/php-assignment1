<?php

require 'function.php';
require 'index.html';
$pdo = connectToDb();
$users = selectAll($pdo, 'user', 'User');

//include 'index.view.php'; // Include the view file to display user data
