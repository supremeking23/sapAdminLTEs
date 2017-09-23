
<?php


$con = mysqli_connect('localhost','root','','sappdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
 //$q = intval($_GET['q']);
//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT * FROM user WHERE id = '".$q."'";
//$result = mysqli_query($con,$sql); WHERE department_id  = '$q'
?>


<p>Select Program:</p>

<div class="form-group has-feedback">
<select class="form-control" name="year" required="" onchange="showYear(this.value)">
  <?php 
  //echo $q;
  $querys = "SELECT * from tblyearlevel";
        $runs = mysqli_query($con,$querys)or die(mysqli_error($con));

        while($get_year  = mysqli_fetch_assoc($runs)):
   ?>
  <option value="<?php echo $get_year['tbl_yearlevel_id']?>"><?php echo $get_year['yearlevel']?></option>
<?php endwhile;?>
  </select>
</div>