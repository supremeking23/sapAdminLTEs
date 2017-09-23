       <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
              <h3 class="box-title">Add new Students</h3>
            </div>
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Register a New Student</p>
                <form action="process_pages/students_page_process.php" method="post" enctype="multipart/form-data">

                 
                 
                  <div class="form-group has-feedback">
                    <input type="text"  title="Letters only!" required="" class="form-control" placeholder="First Name" onkeypress = "return lettersonly(event)" name="first_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text"  title="Letters only!" onkeypress = "return lettersonly(event)" required="" class="form-control" placeholder="Middle Name" name="middle_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" pattern="[a-zA-Z\s]{1,}" title="Letters only!" required="" class="form-control" placeholder="Last Name" onkeypress = "return lettersonly(event)" name="last_name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <select class="form-control" name="gender">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="date" required="" class="form-control" name="date_birth" placeholder="Date of Birth">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                  </div>
                 
                 <div class="form-group has-feedback">
                    <input type="email" required="" class="form-control" placeholder="Email" required="" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div> 

                  <div class="form-group has-feedback">
                      <input title="Number only!" type="text" class="form-control" required="" placeholder="Contact" name="contact" onkeypress = "return numbersonly(event)" >
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>

                     <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Address" name="address" value="">
                                <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                      </div>

                       <div class="form-group has-feedback">
                                <input type="text" class="form-control" required="" placeholder="Guardian's Name" name="guardian" value="">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>

                      <div class="form-group has-feedback">
                        <select required="" onchange="showProgram(this.value)" class="form-control" name="department">
                        <option value="">Please choose a department</option>
                          <?php //departments for student_use?>
                           <?php $all_departments = get_all_department_for_student_insertions($admin_department_id);
                                        while($departments = mysqli_fetch_assoc($all_departments)){
                                          ?>
                                       <option value="<?php echo $departments['department_id']?>"><?php echo $departments['department_name'] ?> <?php echo $departments['department_code'] ?></option>

                            <?php }?>
                        </select>
                      </div>

                      <div id="txtHint2"><b></b></div>
                  
                  <div class="form-group has-feedback">
                    <input type="password"   required="" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" required="" class="form-control" placeholder="Retype password" name="confirm_password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  </div> 
                  <input type="file" name="upload_image" class="input-group">

                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="register_student">Register</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>