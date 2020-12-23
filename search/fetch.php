<?php
//fetch.php
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "minhquy1_qtudien", "Quy0355683221", "minhquy1_qtudien");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tudien 
  WHERE tiengviet LIKE '%".$request."%' 
  OR td_ts LIKE '%".$request."%' 
  OR td_mt LIKE '%".$request."%'
 ";
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Name</th>
    <th>Gender</th>
    <th>Designation</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["tiengviet"];
   $data[] = $row["td_ts"];
   $data[] = $row["td_mt"];
   $html .= '
   <tr>
    <td>'.$row["tiengviet"].'</td>
    <td>'.$row["td_ts"].'</td>
    <td>'.$row["td_mt"].'</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>