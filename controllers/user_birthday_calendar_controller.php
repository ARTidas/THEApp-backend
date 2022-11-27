<?php

  $birthday_calendar = [];
  foreach ($bo->getUsers() as $user) {
    $birthday_calendar[
      date('m', mktime(0, 0, 0, substr($user['birthday_at'], 5, 2), substr($user['birthday_at'], 8, 2), substr($user['birthday_at'], 0, 4)))
    ][] = $user['name'];
  }
  RequestResponseHelper::addToResponse(
    'birthdays',
    $birthday_calendar
  );

?>
