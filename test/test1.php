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

<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Paragraph changed.";
}

$( document ).ready(function() {
    console.log( "ready!" );
});

</script>
  $.ajax({
    accepts: {
      mycustomtype: 'application/x-some-custom-type'
    },

    // Instructions for how to deserialize a `mycustomtype`
    converters: {
      'text mycustomtype': function(result) {
        // Do Stuff
        return newresult;
      }
    },

    // Expect a `mycustomtype` back from server
    dataType: 'mycustomtype'
  });

</div>
</body>
</html>
