<?php

  RequestResponseHelper::addToResponse(
    'created_message_id',
    $bo->createMessage([
      $_GET['user_id'],
      $_GET['message']
    ])
  );

?>
