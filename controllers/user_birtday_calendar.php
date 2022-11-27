<?php

  birthday_calendar = [];
  foreach ($user_bo->getUsers() as $user) {
    birthday_calendar[date_format($date, "m")][] = $user['name'];
  }
  RequestResponseHelper::addToResponse(
    'birthdays',
    birthday_calendar
  );

?>
