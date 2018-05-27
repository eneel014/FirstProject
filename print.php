
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/><?php 
include('includes/mysql_connect.php');
$query = mysqli_query($con, "SELECT * FROM tbl_sample");
$output ="";
?>
<style>
  table {
    border: 1px solid #333333;
  }
  td, th {
    border: 1px solid #333333;
    background-color: #f2f2f2;
  }
</style>
<table>
  <thead>
    <tr>
      <th>Column 1</th>
      <th width="500">Column 2</th>
      <th>Column 3</th>
    </tr>   
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($query)){ ?>
  <tr>
    <td><?php echo $row['col1']; ?></td>
    <td><?php echo $row['col2']; ?></td>
    <td><?php echo $row['col3'] ?></td>
  </tr>

  <?php } 
  mysqli_close($con); ?>
  </tbody>
</table>
<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=download.xls');
?>