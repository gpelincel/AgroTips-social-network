<?php

session_start();

session_destroy();
$url = url();
header("Location: $url");