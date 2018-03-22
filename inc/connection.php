<?php
   $host        = "host = ec2-50-19-88-36.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = d553f1en31erfe";
   $credentials = "user = adgiffatcgfpkk password=671a495586407f47aa310c07245a07313fe8f80359eec9f4e379dbfb9aed0928";

   $connection = pg_connect( "$host $port $dbname $credentials"  );
   if(!$connection) {
      echo "Error : Unable to open database\n";
   }
?>
