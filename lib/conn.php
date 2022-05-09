<?php

const DBHOST = 'localhost';
const DBDRIVE = 'mysql';
const DBNAME = 'AgroTips';
const DBPASS = '';
const DBUSER = 'root';

$conn = new PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);