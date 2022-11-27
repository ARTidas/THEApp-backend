<?php
  header("Content-Type: application/json; charset=UTF-8");

  require(RequestResponseHelper::$root . '/models/daos/message_dao.php');
  require(RequestResponseHelper::$root . '/models/bos/message_bo.php');

  $bo = new MessageBo();

  /* ********************************************************
	 * *** Lets control exectution by actor action... *********
	 * ********************************************************/
  switch (RequestResponseHelper::$actor_action) {
    case '':
      RequestResponseHelper::addToResponse('available_actor_actions', [
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/create',
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/get'
      ]);
      break;
    default:
      require(RequestResponseHelper::$root . '/controllers/' . RequestResponseHelper::$actor_name . '_' . RequestResponseHelper::$actor_action . '_controller.php');
  }

  foreach(LogHelper::get() as $log_message) {
    RequestResponseHelper::addToResponse('log', $log_message);
  }
	echo(json_encode(RequestResponseHelper::$response));
?>
