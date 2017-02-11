<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

$resp = file_get_contents('http://localhost/rest-laravel/public/api/user');

$resp = json_decode($resp);

echo "<pre>";
print_r($resp);