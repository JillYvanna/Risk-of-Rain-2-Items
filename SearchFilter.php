<?php
include('dbaccess.inc.php');
#SECTION TO SELECT DISCTINCT CATEGORIES
$category = '';
$query = "SELECT DISTINCT Item_Category FROM ror2items";
$result=mysqli_query($mysqli,$query);
while($row = mysqli_fetch_assoc($result)) 
{
 $category .= '<option value="'.$row['Item_Category'].'">'.$row['Item_Category'].'</option>';
}

#NEED SECTION TO SELECT DISTINCT TYPES
//COPY ONE ABOVE
$type = '';
$query2= "SELECT DISTINCT Item_Type FROM ror2items";
$result2=mysqli_query($mysqli,$query2);
while($row2 = mysqli_fetch_assoc($result2)) 
{
 $type .= '<option value="'.$row2['Item_Type'].'">'.$row2['Item_Type'].'</option>';
}

include_once("header.php");
?>

  <div class="container box">
   <h3 class="pageTitle">All Items Filtered Search</h3>
   <br />
   <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <div class="form-group">
	 
	 	 <?php #AMEND FOR CATEGORY?>

      <select name="filter_category" id="filter_category" class="form-control" required> 
      <option value="">Select Category</option>
       <?php echo $category; ?>
      </select>
	  
     </div><br/>
     <div class="form-group">
	 
	 <?php #AMEND FOR TYPES?>
      <select name="filter_type" id="filter_type" class="form-control" required>
       <option value="">Select Type</option>
       <?php echo $type; ?>
	   
	   
      </select>
     </div><br/>
     <div class="form-group alignText">
      <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
     </div><br/>
    </div>
    <div class="col-md-3"></div>
   </div>
   <div class="table">
    <table id="ror2items" class="table itemsSearchFilter">
     <thead>
      <tr>
       <th class='itCa' >Category</th>
       <th class='itNa' >Name</th>
       <th class='itDe' >Description</th>
       <th class='itTy' >Type</th>
       <th class='itTy' >Additional Type</th>
       <th class='itTy' >SubType</th>
      </tr>
     </thead>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
  
 <script>
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(filter_category = '', filter_type = '')
  {
   var dataTable = $('#ror2items').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"SearchFilterFetch.php",
     type:"POST",
     data:{
      filter_category:filter_category, filter_type:filter_type
     }
    }
   });
  }
  
  $('#filter').click(function(){
   var filter_category = $('#filter_category').val();
   var filter_type = $('#filter_type').val();
   if(filter_category != '' && filter_type != '')
   {
    $('#ror2items').DataTable().destroy();
    fill_datatable(filter_category, filter_type);
   }
   else
   {
    alert('Select Both filter option');
    $('#ror2items').DataTable().destroy();
    fill_datatable();
   }
  });
  
  
 });
 
</script>
<?php
include_once("footer.php");

?>