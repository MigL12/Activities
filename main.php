<?php
// URL of the JSON data
$url = "https://6525799a67cfb1e59ce755ee.mockapi.io/api/v1/post/";
// Create a stream context that disables SSL verification
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
]);
// Fetch the JSON data from the URL using the context
$jsonData = file_get_contents($url, false, $context);

// Check if the data was fetched successfully
if ($jsonData === false) {
    die("Failed to fetch JSON data from the URL.");
}
// Convert the JSON data to an associative array
$arrayData = json_decode($jsonData, true);

// Check if the JSON decoding was successful
if ($arrayData === null) {
    die("Failed to decode JSON data.");
}
//$datas = array containing the API. All the code above is used to convert the API into a PHP Array
$datas = $arrayData; 

//uncomment code below to view the $data content

// var_dump($datas);    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>API Data Table</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">CreatedAt</th>
      <th scope="col">avatar</th>
    </tr>
  </thead>
  <tbody>
     <?php
        foreach($datas as $data){
            echo "<tr>";
            echo "<td>$data[id]</td>";
            echo "<td>$data[name]</td>";
            echo "<td>$data[createdAt]</td>";
            echo "<td><img src = '$data[avatar]'></td>";
            echo "</tr>";
        }

   


    ?>

    
   
  </tbody>
</table>

        <?php


        ?>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>