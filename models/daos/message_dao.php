<?php
	/* ********************************************************
	 * ********************************************************
	 * ********************************************************/
	class MessageDao {
		protected $database_connection_bo;

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function __construct($database_connection_bo) {
			$this->database_connection_bo = $database_connection_bo;
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function getMessages() {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
      SELECT
          MESSAGES.id AS id,
          USERS.name AS user_name,
          MESSAGES.message AS message,
          MESSAGES.created_at AS created_at
      FROM
          messages MESSAGES
          INNER JOIN users USERS ON
              MESSAGES.user_id = USERS.id
      WHERE
          MESSAGES.is_active = 1 AND
          USERS.is_active = 1
      ORDER BY
          MESSAGES.created_at DESC
			";

			try {
				$handler = ($this->database_connection_bo)->getConnection();
				$statement = $handler->prepare($query_string);
				$statement->execute();

				return $statement->fetchAll();
			}
			catch(Exception $exception) {
				//trigger_error('Error: ' . $exception->getMessage());
				LogHelper::add('Error: ' . $exception->getMessage());
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function createMessage(array $parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				INSERT INTO
					messages
				SET
					user_id        = ?,
					message        = ?,
					is_active      = 1,
					created_at     = NOW(),
					updated_at     = NOW()
			";

			try {
				$database_connection = ($this->database_connection_bo)->getConnection();

				$database_connection
					->prepare($query_string)
					->execute(
						(
							array_map(
								function($value) {
									return $value === '' ? NULL : $value;
								},
								$parameters
							)
						)
					)
				;

				return(
					$database_connection->lastInsertId()
				);
			}
			catch(Exception $exception) {
				//trigger_error('Error: ' . $exception->getMessage());
				LogHelper::add('Error: ' . $exception->getMessage());
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

		/* ********************************************************
		 * ********************************************************
		 * ********************************************************/
		function deleteMessage($parameters) {
			$query_string = "/* __CLASS__ __FUNCTION__ __FILE__ __LINE__ */
				UPDATE
					messages
				SET
					is_active  = 0,
					updated_at = NOW()
				WHERE
					id = ?
			";

			try {
				return(
					($this->database_connection_bo)->getConnection()
						->prepare($query_string)
						->execute(
							(
								array_map(
									function($value) {
										return $value === '' ? NULL : $value;
									},
									$parameters
								)
							)
						)
				);
			}
			catch(Exception $exception) {
				//trigger_error('Error: ' . $exception->getMessage());
				LogHelper::add('Error: ' . $exception->getMessage());
				RequestResponseHelper::addToResponse('errors', $exception->getMessage());

				return false;
			}
		}

	}
?>
