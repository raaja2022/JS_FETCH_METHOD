<?php 

$con = mysqli_connect("localhost", "root", "", "js_fetch") or die("Connection Error");

$sql = "SELECT `id`, `name`, `designation`, `mobile` FROM `users` WHERE 1";

$qr = mysqli_query($con, $sql);

$cnt = mysqli_num_rows($qr);

$tx = [];

if($cnt > 0)
{
     while($data = mysqli_fetch_array($qr))
     {
          $tx[] = $data;
     }
}
else
{
     $tx['empty'] = ['empty'];
}

mysqli_close($con);

echo json_encode($tx);

?>