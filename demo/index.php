<!DOCTYPE html>

<html>
<?php
require_once('connect_to_sql.php');

$querry = @"SELECT * FROM AUTHOR;";
$response = mysqli_query($dbc, $querry);

if($response){
	echo '<table align="left" cellspacing="4" cellpadding="6">
				<tr>
					<td align="left">ID_AUTHOR</td>
					<td align="left">NAME</td>
					<td align="left">SURNAME</td>
					<td align="left">DATE_OF_BIRTH</td>
					<td align="left">DATE_OF_FIRSTP_UBLISH</td>
					<td align="left">ALIAS</td>
				</tr>
			';
	while($row = mysqli_fetch_array($response)){
		echo '<tr>'.
					'<td align="left">'. $row['ID_AUTHOR'].'</td>'.
					'<td align="left">'. $row['NAME'].'</td>'.
					'<td align="left">'. $row['SURNAME'].'</td>'.
					'<td align="left">'. $row['DATE_OF_BIRTH'].'</td>'.
					'<td align="left">'. $row['DATE_OF_FIRSTP_UBLISH'].'</td>'.
					'<td align="left">'. $row['ALIAS'].'</td>'.
				'</tr>';
	}
	echo '</table>';
}
else{
	echo'Couldnt get information from database :(<br>';
	echo mysqli_error($dbc);
}
mysqli_close($dbc);

?>


<head>
</head>
<body>
</body>




</html>
