
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
<select class="form-control" name="subject" required="">
  <?php 
  //echo $q;
  $querys = "SELECT * from tblsubjects WHERE department_id = '$q'";
        $runs = mysqli_query($con,$querys)or die(mysqli_error($con));

        while($get_subject  = mysqli_fetch_assoc($runs)):
   ?>
  <option value="<?php echo $get_subject['subject_id']?>"><?php echo $get_subject['subject_name']?></option>
<?php endwhile;?>
  </select>
</div>