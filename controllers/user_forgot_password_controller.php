<?php

  RequestResponseHelper::addToResponse(
    'messages',
    $bo->getUserForgotPassword([
      $_GET['user_email']
    ])
  );

?>
