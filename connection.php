<?php

	function ConnectToDatabase()
	{

		$connectionString = 'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=D:\\xampp\\htdocs\\conestoga\\web2\\w13a\\form\\orders.accdb';

		$connection = new PDO($connectionString);
		$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $connection;

	}

?>



