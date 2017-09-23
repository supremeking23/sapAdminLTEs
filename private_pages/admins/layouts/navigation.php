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
          <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> <span>Overview</span></a></li>
          <li><a href="admins.php"><i class="glyphicon glyphicon-user"></i> <span>Admins</span></a></li>
          <?php if($admin_department_id == 1){ ?>
          <li class="treeview">
          <a href="#">
            <span class="glyphicon glyphicon-th-list"></span>
            <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="departments.php"><i class="fa fa-circle-o"></i> <span>All Departments</span></a></li>
            <li><a href="add_department_and_programs.php"><i class="fa fa-circle-o"></i><span>Add Departments / Programs</span></a></li>
          
          </ul>
        </li>
         <li><a href="guidance_councilor.php"><i class="glyphicon glyphicon-user"></i> <span>Guidance Councilors</span></a></li>

         <li><a href="subjects.php"><i class="glyphicon glyphicon-book"></i> <span>Subjects</span></a></li>
          <li><a href="class.php"><i class="fa fa-object-group"></i> <span>Class</span></a></li>
        
           <?php }else{ ?>
           <li><a href="department_info.php?department_id=<?php echo $admin_department_id?>"><i class="glyphicon glyphicon-th-list"></i> <span>Department</span></a></li>
           <?php } ?>
          <li><a href="professors.php"><i class="glyphicon glyphicon-user"></i> <span>Professors</span></a></li>
         
          <li><a href="students.php"><i class="glyphicon glyphicon-user"></i> <span>Students</span></a></li>
           
           <li><a href="inbox.php"><i class="glyphicon glyphicon-inbox"></i> <span>Inbox</span></a></li>
       </ul>


       <!--   <li><a href="departments.php"><i class="glyphicon glyphicon-th-list"></i> <span>Departments</span></a></li> -->