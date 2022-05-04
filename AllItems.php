<?php
	include_once("header.php");
?>


<h3 class="pageTitle">All Items in Risk of Rain 2 </h3>
<div class="page-content">
<form method="get" class="allButtons" >
<input type="submit" name="common-items" value="Common" class="common-btn btn btn-secondary">
<input type="submit" name="uncommon-items" value="Uncommon" class="uncommon-btn btn btn-success">
<input type="submit" name="legendary-items" value="Legendary" class="legendary-btn btn btn-danger">
<input type="submit" name="boss-items" value="Boss" class="boss-btn btn btn-warning">
<input type="submit" name="lunar-items" value="Lunar" class="lunar-btn btn btn-info">
<input type="submit" name="lunarequip-items" value="Lunar Equipment" class="lunarEquip-btn btn btn-info">
<input type="submit" name="equip-items" value="Equipment" class="equip-btn btn btn-primary">
<input type="submit" name="search-live" value="Live Search" class="search-live btn btn-dark">
<br>
</form>

<br>
<?php
require_once("dbaccess.inc.php");

//Table for those logged in
if(isset($_SESSION['usersID'])){ 
	if(isset($_GET['common-items'])){
		echo "<p class='categoryDesc'>Common items are probably the first items a player will 
		obtain in game. They can be extremely powerful in large quantities, and thus 
		should not be underestimated. There are 25 Common items.</p>";
		echo displaySignTable('Common');}
	else if(isset($_GET['uncommon-items'])){
		echo "<p class='categoryDesc'>Uncommon items, as the name suggests, are rarer and 
		possibly more powerful. There are 26 Uncommon Items.</p>";
		echo displaySignTable('Uncommon');}
	else if(isset($_GET['legendary-items'])){
		echo "<p class='categoryDesc'>Legendary items are extra-rare in game, with approximately 1% 
		chance to drop from a Small Chest. There are more efficient ways to obtain Legendary items, 
		however. There are 22 Legendary Items.</p>";
		echo displaySignTable('Legendary');}
	else if(isset($_GET['boss-items'])){
		echo "<p class='categoryDesc'>Boss items (also known as planet items or field-found items) are 
		uncommon items that may drop as rewards for defeating Teleporter Bosses, each representing a 
		signature attack or characteristic of the corresponding boss. These cannot be obtained from chests. 
		Each boss item may only drop if its respective boss monster spawned as the Teleporter Boss (e.g. Titanic 
		Knurls may only drop if the Teleporter Boss was a Stone Titan). There are 15 Boss items.</p>";
		echo displaySignTable('Boss');}
	else if(isset($_GET['lunar-items'])){
		echo "<p class='categoryDesc'>Lunar items are a new tier of items introduced in 
		Risk of Rain 2. They are characterized by their powerful abilities, at the 
		cost of having considerable drawbacks. Chests and other common loot 
		interactibles will not drop lunar items; the only ways to obtain them are from Lunar 
		Pods found rarely throughout environments or from the Bazaar Between Time. 
		Both methods require spending Lunar Coins, as opposed to gold. There are 14 lunar items.</p>";
		echo displaySignTable('Lunar');}
	else if(isset($_GET['lunarequip-items'])){
		echo "<p class='categoryDesc'>Similar to passive lunar 
		items, lunar equipment can only be obtained from Lunar 
		Pods or the Bazaar Between Time in exchange for Lunar Coins,
		all with great strength and considerable drawbacks. There are 4 lunar equipment.</p>";
		echo displaySignTable('Lunar Equipment');}
	else if(isset($_GET['equip-items'])){
		echo "<p class='categoryDesc'></p>";
		echo displaySignTable('Equipment');}
		
	else if(isset($_GET['search-live'])){ echo liveSearch();
	}
	}//For isset session
	
	
##################################################
 //Table for those not logged in
else if(isset($_GET['common-items'])){
	echo "<p class='categoryDesc'> Common items are probably the first items a player will obtain in game. 
	They can be extremely powerful in large quantities, and thus should not be underestimated. 
	There are 25 Common items.</p> ";
	echo displayTable('Common');}
else if(isset($_GET['uncommon-items'])){
	echo "<p class='categoryDesc'>Uncommon items, as the name suggests, are rarer and 
	possibly more powerful. There are 26 Uncommon Items.</p>";
	echo displayTable('Uncommon');}
else if(isset($_GET['legendary-items'])){
	echo "<p class='categoryDesc'>Legendary items are extra-rare in game, 
	with approximately 1% chance to drop from a Small Chest. There are more 
	efficient ways to obtain Legendary items, however. There are 22 Legendary Items.</p>";
	echo displayTable('Legendary');}
else if(isset($_GET['boss-items'])){
	echo "<p class='categoryDesc'>Boss items (also known as planet items or 
	field-found items) are uncommon items that may drop as rewards for 
	defeating Teleporter Bosses, each representing a signature attack or 
	characteristic of the corresponding boss. These cannot be obtained from chests. 
	Each boss item may only drop if its respective boss monster spawned as the Teleporter 
	Boss (e.g. Titanic Knurls may only drop if the Teleporter Boss was a Stone Titan). There are 15 Boss items.</p>";
	echo displayTable('Boss');}
else if(isset($_GET['lunar-items'])){
	echo "<p class='categoryDesc'>Lunar items are a new tier of items
	introduced in Risk of Rain 2. They are characterized by their 
	powerful abilities, at the cost of having considerable drawbacks. 
	Chests and other common loot interactibles will not drop lunar items; 
	the only ways to obtain them are from Lunar Pods found rarely throughout 
	environments or from the Bazaar Between Time. Both methods require spending 
	Lunar Coins, as opposed to gold. There are 14 lunar items.</p>";
	echo displayTable('Lunar');}
else if(isset($_GET['lunarequip-items'])){
	echo "<p class='categoryDesc'>Similar to passive lunar items, 
	lunar equipment can only be obtained from Lunar Pods 
	or the Bazaar Between Time in exchange for Lunar Coins, 
	all with great strength and considerable drawbacks. 
	There are 4 lunar equipment.</p>";
	echo displayTable('Lunar Equipment');}
else if(isset($_GET['equip-items'])){
	echo displayTable('Equipment');}
else if(isset($_GET['search-live']))
{ echo liveSearch();
}
	
function displaySignTable($category){//Table for those logged in 
		global $mysqli;
		$res = mysqli_query($mysqli,"SELECT Item_Name, Item_Desc, Item_Type, Item_Type2, Item_SubType FROM ror2items WHERE Item_Category = '{$category}'");
		if (!$res){
		echo "Failed to retrieve data from database: ".mysqli_error($mysqli);
		exit;
		}
		else{
			//Creating headers
			echo
			"<table class='table allItemsTable'>'>
			<thead>
			<tr>
			<th class='itNa'>Item Name</th>
			<th class='itDe'>Description</th>
			<th class='itTy'>Type</th>
			<th class='itTy'>Additional Type</th>
			<th class='itTy'>Subtype</th>
			</tr>
			</thead>";
			//While loop to display info in roles
			while ($row = mysqli_fetch_assoc($res)){
				echo 
				"<tr><td>".$row['Item_Name'].
				"</td><td class='itemDesc' >".$row['Item_Desc'].
				"</td><td>".$row['Item_Type'].
				"</td><td>".$row['Item_Type2'].
				"</td><td>".$row['Item_SubType'].
				"</tr>";
			}
			echo "</table>";//Closing table
		}}	
		
function displayTable($category){ //Table for those not logged in
		global $mysqli;
		$res = mysqli_query($mysqli,"SELECT Item_Name, Item_Desc, Item_Type, Item_Type2, Item_SubType FROM ror2items WHERE Item_Category = '{$category}'");
		if (!$res){
		echo "Failed to retrieve data from database: ".mysqli_error($mysqli);
		exit;
		}
		else{
			//Creating headers
			echo
			"<table class='table allItemsTable'>
			<thead>
			<tr>
			<th class='itNa'>Item Name</th>
			<th class='itDe'>Description</th>
			<th class='itTy'>Type</th>
			<th class='itTy'>Additional Type</th>
			<th class='itTy'>Subtype</th>
			</tr>
			</thead>";
			//While loop to display info in roles
			while ($row = mysqli_fetch_assoc($res)){
				echo 
				"<tr><td>".$row['Item_Name'].
				"</td><td class='itemDesc' >".$row['Item_Desc'].
				"</td><td>".$row['Item_Type'].
				"</td><td>".$row['Item_Type2'].
				"</td><td>".$row['Item_SubType'].
				"</tr>";
			}
			echo "</table>";//Closing table
		}}	

	mysqli_close($mysqli);

function liveSearch(){
	return '
<div class="container liveSearchBar">
	<div class="text-center mt-5 mb-4">
		<h2>Live Search</h2>
	</div>
	<input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search">
</div>
<br>
<br>
<div id="searchresult">

</div>



<script>
	$(document).ready(function(){
		$("#live_search").keyup(function(){
			var input = $(this).val();
			//alert(input);
			if(input != ""){
				$.ajax({
					url:"livesearch.php",
					method:"POST",
					data:{input:input},
				
					success:function(data){
					$("#searchresult").html(data);
					$("#searchresult").css("display","block");

					}
				});
			}else{
				$("#searchresult").css("display","none");
			}
		});
	});

</script>';
}



	
?>

<p class="para" >Notice: Elite Equipment unavailable for view however you can find out more via the Risk of Rain 2 Wiki</p>
 <a class="sources" href="https://riskofrain2.fandom.com/wiki/Items" target="_blank" title="Risk of Rain 2 Wiki" >
 <small>Source: Risk of Rain 2 Wiki</small>
 </a>
</div>
<?php
include_once("footer.php");
	
	
?>