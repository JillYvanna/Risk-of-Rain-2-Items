<?php
include_once("dbaccess.inc.php");

$query = "SELECT Item_Category, Item_Name, Item_Desc, Item_Type, Item_Type2, Item_SubType FROM `ror2items` ";

if(isset($_POST['filter_category'], $_POST['filter_type']) && $_POST['filter_category'] != '' && $_POST['filter_type'] != ''){
	$query .= 'WHERE Item_Category = "'.$_POST['filter_category'].'" AND (Item_Type = "'.$_POST['filter_type'].'" OR Item_Type2 = "'.$_POST['filter_type'].'");'; 
}

$result = mysqli_query($mysqli, $query);
if (!$result){
		echo "Failed to retrieve data from database: ".mysqli_error($mysqli);
		exit;
}
$resultData = mysqli_fetch_all($result, MYSQLI_ASSOC);
$number_filter_row = mysqli_num_rows($result);
$data = array();

foreach($resultData as $row)
{
 $sub_array = array();
 $sub_array[] = $row['Item_Category'];
 $sub_array[] = $row['Item_Name'];
 $sub_array[] = $row['Item_Desc'];
 $sub_array[] = $row['Item_Type'];
 $sub_array[] = $row['Item_Type2'];
 $sub_array[] = $row['Item_SubType'];
 $data[] = $sub_array;
}

function count_all_data($mysqli)
{
 $query = "SELECT * FROM ror2items";
 $result= mysqli_query($mysqli, $query);
 $total = mysqli_num_rows($result);
 return  $total;
}

$output = array(
"draw" => intval($_POST['draw']),
"recordsTotal" => count_all_data($mysqli),
"recordsFiltered" => $number_filter_row,
"data" => $data 
);

echo json_encode($output);
?>