       <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Add new Subject</h3>
            </div>
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Register a New Subject</p>
                <form action="process_pages/subject_page_process.php" method="post" enctype="multipart/form-data">

                 
                 
                  <div class="form-group has-feedback">
                    <input type="text"   required="" class="form-control" placeholder="Subject Code"  name="subject_code">
                    <span class="fa fa-book form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" required="" class="form-control" placeholder="Subject Name" name="subject_name">
                    <span class="fa fa-book form-control-feedback"></span>
                  </div>



                  <div class="form-group has-feedback">
                        <select required="" class="form-control" name="department">
                        <option value="">Please choose a department</option>
                          <?php //departments for student_use?>
                           <?php $all_departments = get_all_department_for_student_insertions($admin_department_id);
                                        while($departments = mysqli_fetch_assoc($all_departments)){
                                          ?>
                                       <option value="<?php echo $departments['department_id']?>"><?php echo $departments['department_name'] ?> <?php echo $departments['department_code'] ?></option>

                            <?php }?>
                        </select>
                      </div>
                  
               
                  

                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="add_subject">Add Subject</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>