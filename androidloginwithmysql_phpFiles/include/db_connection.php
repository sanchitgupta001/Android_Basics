<?php
/*
 * Database Configuration variables Change these accordingly
 */

 define("DB_HOST","localhost");
 define("DB_USER","root");
 define("DB_PASSWORD","");
 define("DB_DATABASE","android_lgoin");

 $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

 if(mysqli_connect_errno()){
   die("Database connection failed"."(".
   mysqli_connect_err()."-".mysqli_connect_errno().")");
 }

 ?>
