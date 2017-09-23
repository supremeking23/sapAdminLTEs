<!-- still not use -->

 <div class="col-md-3">
            <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">

                  <?php 
                    //search for admins info
                    $get_professor_info = get_professor_by_id($_GET['professor_id']);
                    if($get_professor_info){
                      //table id
                      $tbl_prof_id = $get_professor_info['tbl_prof_id'];

                      $professor_name = $get_professor_info['first_name'] . ' ' . $get_professor_info['last_name'];
                      $professor_image = $get_professor_info['image'];
                      $prof_dept_id = $get_professor_info['department'];

                      $date_added = $get_professor_info['date_added'];
                      $gender = $get_professor_info['gender'];
                      $prof_date_birth = $get_professor_info['date_birth'];

                    }

                   $get_prof_dept = get_department_details_by_department_id($prof_dept_id);
                   while($prof_dept = mysqli_fetch_assoc($get_prof_dept)){
                     $prof_dept_code = $prof_dept['department_code'];
                   }
                   

                  ?>

                    <img class="profile-user-img img-responsive img-circle" src="professor_images/<?php echo $professor_image;?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $professor_name;?></h3>

                    <p class="text-muted text-center">Department: <?php echo  $prof_dept_code; ?></p>

                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <?php $date =date_create($date_added);
                         $prof_since= date_format($date,"F  Y ");?>
                        <b>Admin since:</b> <a class="pull-right"><?php echo $prof_since?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Gender</b> <a class="pull-right"><?php echo $gender;?></a>
                      </li>
                      <li class="list-group-item">
                      <?php $date =date_create($prof_date_birth);
                         $birthdate= date_format($date,"F d Y");?>
                        <b>Birthdate:</b> <a class="pull-right"><?php echo $birthdate;?></a>
                      </li>
                      <li class="list-group-item">
                       <?php $age = floor((time() - strtotime($birthdate)) / 31556926);?>
                        <b>Age:</b> <a class="pull-right"><?php echo $age;?></a>
                      </li>
                    </ul>

                    <a href="professor_full_info.php?professor_id=<?php echo $_GET['professor_id']?>" class="btn btn-primary btn-block"><b>Bact to Log History</b></a> 
                    <a href="prof_rating_info.php?professor_id=<?php echo $_GET['professor_id']?>" class="btn btn-success btn-block"><b>Professor's Rating</b></a> 
                    <a href="prof_classes_info.php?professor_id=<?php echo $_GET['professor_id']?>" class="btn btn-warning btn-block"><b>Professor's Classes</b></a> 
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->


          </div> <!-- /.cols -->