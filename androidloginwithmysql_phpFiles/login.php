<?php require_once("include/db_functions.php"); ?>

<?php

    //json response Array
    $response = array("error"=>FALSE);

    if(isset($_POST['email']) && isset($_POST['password'])){

      // receiving the post pg_parameter_status
      $email = $_POST['email'];
      $password = $_POST['password'];

      // get the user by email and password specified
      $user =  getUserByEmailandPassword($email, $password);

      if($user != false)
      {
        // User found
        $response["error"] = FALSE;
        $response["user"]["id"] = $user["id"];
        $response["user"]["email"] = $user["email"];
        $response["user"]["username"] = $user["username"];

        echo json_encode($response);
      }
      else{
        // user is not found with the specified credentials
        $response["error"] = TRUE;
        $respone["error_msg"] = "Wrong email or password! plz try again...";
        echo json_encode($response);
      }
    }

    else{
      // required post parameters are missing
         $response["error"] = TRUE;
         $response["error_msg"] = "Required fields are empty !!!";
         echo json_encode($response);

    }

 ?>
