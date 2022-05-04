<?php
include("dbaccess.inc.php");

if(isset($_POST['input'])){
	
	$input = $_POST['input'];
	
	$query = "SELECT Item_Category, Item_Name, Item_Desc, Item_Type, Item_Type2, Item_SubType FROM ror2items WHERE 
	Item_Category LIKE '%{$input}%' OR 
	Item_Name LIKE '%{$input}%' OR 
	Item_Desc LIKE '%{$input}%' OR 
	Item_Type LIKE '%{$input}%' OR 
	Item_Type2 LIKE '%{$input}%' OR 
	Item_SubType LIKE '%{$input}%'
	";
	
	$result = mysqli_query($mysqli,$query);
	
	if(mysqli_num_rows($result) > 0){?>
		<table class="table itemsSearchLive">
			<thead>
			<tr>
			   <th class='itCa' >Category</th>
			   <th class='itNa' >Name</th>
			   <th class='itDe' >Description</th>
			   <th class='itTy' >Type</th>
			   <th class='itTy' >Additional Type</th>
			   <th class='itTy' >SubType</th>	
			<tr>
			</thead>
			<tbody>
		<?php
			//While loop to display info in roles
			while ($row = mysqli_fetch_assoc($result)){
				echo 
				"<tr><td>".$row['Item_Category'].
				"</td><td>".$row['Item_Name'].
				"</td><td class='itemDesc' >".$row['Item_Desc'].
				"</td><td>".$row['Item_Type'].
				"</td><td>".$row['Item_Type2'].
				"</td><td>".$row['Item_SubType'].
				"</tr>";}
		?>
			</tbody>
		</table>
		<?php	
	}else{
		echo "<h6 class='text-danger text-center mt-3'> No Data Found</h6>";
}}
?>