<?php
$conn = pg_connect("postgres://mrpplugnyshzrt:c72d992374ae2477ade571e801de311cfc6fba28683b3a9923738756a8886eff@ec2-3-223-169-166.compute-1.amazonaws.com:5432/d9n333qhs229n7");
	echo 'Connected Successfully!!!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>