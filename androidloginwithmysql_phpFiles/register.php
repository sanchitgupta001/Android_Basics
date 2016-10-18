<?php require_once("include/db_functions.php"); ?>

<?php

    // Json respone array
    $response = array("error"=>FALSE);

    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){

      // Receive the post parameter values
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Check if user already exists with the same email
      if(emailExists($email)){
        // email already emailExists
        $response["error"] = TRUE;
        $response["error_msg"] = "Email already exists with ".$email;
        echo json_encode($response);
      }
      else{
        // create a new user
        $user =  storeUser($username, $email, $password);
        if($user){
          //User stored successfully
          $response["error"] = FALSE;
          $response["user"]["id"] = $user["id"];
          $response["user"]["email"] = $user["email"];
          $response["user"]["username"] = $user["username"];
          echo json_encode($response);
        }
        else{
          // User failed to store
          $response["error"] = TRUE;
          $response["error_msg"] = "Unknown error occurred";
          echo json_encode($response);
        }
      }
    }

    else{
      $response["error"] = TRUE;
      $respone["error_msg"] = "Required fields are empty !!!";
      echo json_encode($response);
    }

 ?>
