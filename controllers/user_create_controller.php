<?php

  RequestResponseHelper::addToResponse(
    'created_user_id',
    $bo->createUser([
      $_GET['name'],
      $_GET['email'],
      $_GET['birthday_at']
    ])
  );

?>
