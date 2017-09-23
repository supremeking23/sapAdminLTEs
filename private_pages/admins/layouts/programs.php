
<?php


$con = mysqli_connect('localhost','root','','sappdb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
 $q = intval($_GET['q']);
//mysqli_select_db($con,"ajax_demo");
//$sql="SELECT * FROM user WHERE id = '".$q."'";
//$result = mysqli_query($con,$sql); WHERE department_id  = '$q'
?>




<div class="form-group has-feedback">
<select class="form-control" name="program" required="">
  <?php 
  //echo $q;
  $querys = "SELECT * from tblcollegeprograms WHERE department_id = '$q'";
        $runs = mysqli_query($con,$querys)or die(mysqli_error($con));

        while($get_programs  = mysqli_fetch_assoc($runs)):
   ?>
  <option value="<?php echo $get_programs['program_id']?>"><?php echo $get_programs['program_name']?></option>
<?php endwhile;?>
  </select>
</div>