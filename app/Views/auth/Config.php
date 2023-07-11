<?php

$conn = mysqli_connect('127.0.0.1:3306', 'root', '', 'cs_project_i');

if (!$conn) {
    echo "Connection Failed";
}