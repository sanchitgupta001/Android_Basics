<?php require_once("include/db_connection.php"); ?>
<?php

    function storeUser($username, $email, $password){
      global $connection;

      $query = "INSERT INTO users(";
      $query .= "username, email, password) ";
      $query .= "VALUES('{$username}','{$email}','{$password}')";

      $result = mysqli_query($connection, $query);

      if($result){
        $user = "SELECT * FROM users WHERE email = '{$email}'";
        $res = mysqli_query($connection,$user);

        while($user = mysqli_fetch_assoc($res)){ // mysqli_fetch_assoc : Returns an associative array
                                                // that corresponds to the fetched row or NULL if there are no more rows.
          return $user;
        }
      }
      else{
        return false;
      }
    }

    function getUserByEmailandPassword($email, $password){
      global $connection;
      $query = "SELECT * FROM users where email = '{$email}' and password = '{$password}'";
      $user = mysqli_query($connection, $query);

      if($user){
        while($res = mysqli_fetch_assoc($user)){
          return $res;
        }
      }
      else{
        return false;
      }
    }

    function emailExists($email){
      global $connection;
      $query = "SELECT email from users where email = '{$email}'";

      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result)>0){
        return true;
      }
      else{
        return false;
      }
    }

 ?>
