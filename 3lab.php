<html>
<body>
<?php

require "db.php";

$sql="SHOW TABLES FROM winestore";
$result = mysql_query($sql);

  // Connect to the server
  if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
    showerror();
  }

  if (!mysql_select_db(DB_NAME, $connection)) {
    showerror();
  }

  //Run SQL query on connected database
  if (!($result = @ mysql_query ($sql, $connection)))
    showerror();

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<select>
<?php
        while ($row = mysql_fetch_row($result)) {
           $tableName = $row[0];
           echo '<option value="$tableName">';
           echo $tableName;
	   echo '</option>';
 	}		

?>
</select>
<input type="submit" name="submit" value="Run Query">
</form>
</body>
</html>

