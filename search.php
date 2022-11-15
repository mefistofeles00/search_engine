
<?php
include ("db.php");


if (isset($_POST['submit'])){

    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
    $search_query = mysqli_query($connection,$query);

}
if  (!$search_query){

die("QUERY FAILED" . header("Location:index.php"));

}
    $count = mysqli_num_rows($search_query);

if ($count == 0){
    echo "<h1>No result </h1>";
}else {
    while($row = mysqli_fetch_assoc($search_query)){
        echo "
        <table class='table'>
  <thead>
<h1>". $row['post_title'] ."</h1>
</thead>
  <tbody>
    <tr class='table-active'>
</tr>
<tr>
    <th scope='row'>". $row['id'] ."</th>
      <td colspan='2' class='table-active'>". $row['post_content'] ."</td>
      <td>". $row['post_tag'] ."</td>
    </tr>

  </tbody>
</table>
 ";
        
    } 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search engine</title>
</head>
<body>

</body>
</html>
