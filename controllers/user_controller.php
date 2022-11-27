<?php
  header("Content-Type: application/json; charset=UTF-8");

  require(RequestResponseHelper::$root . '/models/daos/user_dao.php');
  require(RequestResponseHelper::$root . '/models/bos/user_bo.php');

  $bo = new UserBo();

  /* ********************************************************
	 * *** Lets control exectution by actor action... *********
	 * ********************************************************/
  switch (RequestResponseHelper::$actor_action) {
    case '':
      RequestResponseHelper::addToResponse('available_actor_actions', [
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/create',
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/get',
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/birthday_calendar',
        RequestResponseHelper::$url_root . '/' . RequestResponseHelper::$actor_name . '/forgot_password'
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
