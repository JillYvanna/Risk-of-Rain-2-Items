<?php
	include_once("header.php");
?>

<?php
			if(isset($_SESSION['usersID'])){
				echo ('<h3>Hello '.$_SESSION['username'].'!</h3>');
			}
?>
<h2> Where would you like to go?</h2>
<br>
<div class="card">
  <h5 class="card-header">About</h5>
  <div class="card-body">
    <h5 class="card-title">What is Risk of Rain 2?</h5>
    <p class="card-text">Risk of Rain 2 is a roguelite third-person shooter developed by Hopoo Games and published by Gearbox Publishing. 
A sequel to 2013's Risk of Rain, it was released in early access for ...</p>
    <a href="About.php" class="btn btn-primary">Read More</a>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card">
	<h6 class="card-header card-title">Passive Items</h6>
      <div class="card-body">  
        <p class="card-text"> 
		A passive item visually appears in the top bar in-game and provides 
		a certain benefit to a player (or in some cases, a drawback), specific 
		to that item, as long as it is in a player's inventory. If it is removed 
		from their inventory (e.g. by using a 3D printer), they no longer are affected by that item's effects.
		</p>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?common-items=Common" class="btn btn-outline-secondary">Common</a>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?uncommon-items=Uncommon" class="btn btn-outline-success">Uncommon</a>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?legendary-items=Legendary" class="btn btn-outline-danger">Legendary</a>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?boss-items=Boss" class="btn btn-outline-warning">Boss</a>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?lunar-items=Lunar" class="btn btn-outline-info">Lunar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
	<h6 class="card-header card-title">Active Items</h6>
      <div class="card-body">
        <p class="card-text">An active item ("Equipment") often provides no benefit unless it 
		is used by the player (as they would one of their skill), which provides a powerful effect 
		but incurs a comparatively lengthy cooldown period during which it (or other active items) 
		cannot be activated. A player can normally hold only one active item at any time; 
		if they try to pick up an active item while they are already holding one, they will swap it 
		for the new one instead. There are 21 standard equipments.</p>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?equip-items=Equipment" class="btn btn-outline-primary">Equipment</a>
        <a href="https://mi-linux.wlv.ac.uk/~1800168/Task2/AllItems.php?lunarequip-items=Lunar+Equipment" class="btn btn-outline-info">Lunar Equipment</a>
      </div>
    </div>
  </div>
</div>


<?php
	include_once("footer.php");
?>