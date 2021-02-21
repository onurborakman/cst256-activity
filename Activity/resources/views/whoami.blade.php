<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity 2</title>
</head>
<body>
    <form action = "whoami" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
		<h2> What's Your Name?</h2>
		<table>
			<tr>
				<td>First Name: </td>
				<td><input type = "text" name = "firstname" /></td>
			</tr>

			<tr>
				<td>Last Name:</td>
				<td><input type = "text" name = "lastname" /></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Ask Now" />
				</td>
		</table>
	</form>

</body>
</html>
