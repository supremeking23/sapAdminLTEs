      <div class="user-panel">
        <div class="pull-left image">
          <img  src="admin_images/<?php echo $image;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo limit_text($first_name . " " . $last_name,3); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $admin_department; ?></a>
        </div>
      </div>


       <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Control Panel</li>
          <!-- Optionally, you can add icons to the links -->
          <li><a href="index.php"><i class="fa fa-link"></i> <span>Overview</span></a></li>
          <li><a href="admins.php"><i class="fa fa-link"></i> <span>Admins</span></a></li>
          <?php if($admin_department_id == 1){ ?>
          <li><a href="departments.php"><i class="fa fa-link"></i> <span>Departments</span></a></li>
           <?php }else{ ?>
           <li><a href="programs.php"><i class="fa fa-link"></i> <span>Programs</span></a></li>
           <?php } ?>
          <li><a href="professors.php"><i class="fa fa-link"></i> <span>Professors</span></a></li>
          <li><a href="guidance_councilor.php"><i class="fa fa-link"></i> <span>Guidance Councilors</span></a></li>
          <li><a href="students.php"><i class="fa fa-link"></i> <span>Students</span></a></li>
       </ul>