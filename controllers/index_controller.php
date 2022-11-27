<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>THEApp Admin</title>

	<meta http-equiv="Cache-Control" content="no-store" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/index.css" type="text/css" />

	<script language="JavaScript" type="text/javascript" src="/js/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="/js/index.js"></script>
</head>

<body id="main">
<div id="container">
	<h1>
		<a href="/">THEApp Admin</a>
		&gt;
		<a href="/<?php echo (RequestResponseHelper::$actor_name == 'index') ? null : RequestResponseHelper::$actor_name; ?>">
			<?php echo(StringHelper::getHumanReadable(RequestResponseHelper::$actor_name)); ?>
		</a>
	</h1>
	<hr/>

	<ul>
		<li><a href="/">Index</a></li>
		<?php
      /*
			foreach(($actor_bo->getDao()->get()) as $record) {
				echo '<li><a href="/' . StringHelper::getLink($record["name_plural"]) . '">';
				echo ucfirst($record["name_plural"]) . '</a></li>';
			}
      */
		?>
		<li><a href="/user">User</a></li>

		<li><a href="/message">Chat</a></li>



	</ul>
	<hr/>


	<div style="background-color:#fcc;">
		<h2>Notes</h2>
		<ul>
			<li>Item 1...</li>
			<li>Item 2...</li>
		</ul>
	</div>
	<hr/>

	<div style="background-color:#ffc;">
		<h2>Links</h2>
		<ul>
			<li><a href="https://unithe.hu/">THE hivatalos honlapja...</a></li>
			<li><a href="https://neptun.unithe.hu/hallgato/login.aspx">THE Neptun</a></li>
		</ul>
	</div>
	<hr/>


	<h2>Project dictionary</h2>

	<h3>Actors</h3>
	<ul>
		<?php
			/*
			foreach(($actor_bo->getDao()->get()) as $record) {
				echo '<li>';
				echo '<strong>' . ucfirst($record["name"]) . '</strong> - ';
				echo '(' . ucfirst($record["name_plural"]) . ') - ';
				echo $record["description"] . ' - ';
				echo '#' . $record["id"];
				echo '</li>';
			}
			*/
		?>
	</ul>

	<h3>Abbrevations</h3>
	<ul>
		<li>THE - Tokaj-Hegyalja Egyetem (University of Tokaj)</li>
	</ul>


	<br style="clear:both;" />
	<hr/>

	<?php
		LogHelper::add(date('Y-m-d H:i:s', time()));
		LogHelper::add('--------------------------------------------------------------------------------');
	?>
	<div class="log">
		<?php
			foreach(LogHelper::get() as $log_message) {
				echo($log_message);
				echo('<br/>');
			}
		?>
	</div>
</body>
</html>
