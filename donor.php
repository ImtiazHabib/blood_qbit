<?php  
 include "inc/admin/header.php";
 include "inc/admin/topbar.php";
 include "inc/admin/menubar.php";
?>
  

  
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Blood Donor Informations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Blank</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- manage all donor start -->
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#Serial</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Blood Group</th>
                  <th scope="col">Contact Number</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Last Donation Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- php code for reading donor information from database start -->
                <?php

                   $get_donor_data_sql = "SELECT * FROM donor";

                   $get_donor_data_query = mysqli_query($connect,$get_donor_data_sql);
                   $i=0;
                   while($row = mysqli_fetch_assoc($get_donor_data_query)){
                      $donor_id             = $row['donor_id'];
                      $donor_full_name      = $row['donor_full_name'];
                      $donor_age            = $row['donor_age'];
                      $donor_gender         = $row['donor_gender'];
                      $donor_blood_group    = $row['donor_blood_group'];
                      $donor_contact_number = $row['donor_contact_number'];
                      $donor_email          = $row['donor_email'];
                      $donor_status         = $row['donor_status'];
                      $donor_last_date      = $row['donor_last_date'];
                      $i++;
                      ?>
                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $donor_full_name; ?></td>
                        <td><?php echo $donor_age; ?></td>
                        <td>
                          <?php
                           if($donor_gender == 1){
                               ?> 
                              <span class="badge badge-success">Male</span>
                                
                            <?php
                           }else if($donor_gender == 2){
                            ?> 
                              <span class="badge badge-success">Female</span>
                                
                            <?php

                           }else if($donor_gender == 3){
                            ?> 
                              <span class="badge badge-success">Other</span>
                                
                            <?php
                           }
                          ?>
                        </td>
                        <td>
                          <?php
                           if($donor_blood_group == 1){
                               ?> 
                              <span class="badge badge-success">A+</span>
                                
                            <?php
                           }else if($donor_blood_group == 2){
                            ?> 
                              <span class="badge badge-success">A-</span>
                                
                            <?php

                           }else if($donor_blood_group == 3){
                            ?> 
                              <span class="badge badge-success">B+</span>
                                
                            <?php
                           }else if($donor_blood_group == 4){
                            ?> 
                              <span class="badge badge-success">B-</span>
                                
                            <?php
                           }else if($donor_blood_group == 5){
                            ?> 
                              <span class="badge badge-success">AB+</span>
                                
                            <?php
                           }else if($donor_blood_group == 6){
                            ?> 
                              <span class="badge badge-success">AB-</span>
                                
                            <?php
                           }else if($donor_blood_group == 7){
                            ?> 
                              <span class="badge badge-success">O+</span>
                                
                            <?php
                           }else if($donor_blood_group == 8){
                            ?> 
                              <span class="badge badge-success">O-</span>
                                
                            <?php
                           }
                          ?>
                        </td>
                        <td><?php echo $donor_contact_number; ?></td>
                        <td><?php echo $donor_email; ?></td>
                        <td><?php echo $donor_last_date; ?></td>
                        <th scope="row">
                            <?php

                            if($donor_status == 0)
                            { ?> 
                              <span class="badge badge-info">Active</span>
                                
                            <?php
                          }
                            else if($donor_status == 1)
                              { ?>
                                     
                              <span class="badge badge-danger">In-active</span>

                            <?php
                            } 

                            ?>
                              
                          </th>
                          <td>
                              <div class="estyle">
                                 <ul>
                                    <li>
                                       <a href="donor.php?update_donor_id=<?php echo $donor_id; ?>"><i class="fa fa-edit"></i></a>
                                    </li>
                                    <li>
                                       <a href="" data-toggle="modal" data-target="#delete_donor_id<?php echo $donor_id; ?>" ><i class="fa fa-trash"></i></a>
                                    </li>
                                 </ul>
                              </div>
                           </td>
                           <!--  Delete user modal start -->
                            <!-- Modal -->
                            <div class="modal fade" id="delete_donor_id<?php echo $donor_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="donor.php?delete_donor_id=<?php echo $donor_id ?>" method="POST">
                                      <input type="submit" name="delete_donor" class="btn btn-danger" value="Confirm">
                                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>

                                    </form>
                                  </div>
                                   
                                </div>
                              </div>
                            </div>
                            <!--  Delete user modal end  -->
                        
                      </tr>
                      <?php
                   }
                ?>
                <!-- php code for reading donor information from database end -->
              </tbody>
            </table>
          </div>
        </div>
        <!-- manage all donor end -->

        <!-- delete donor from php start -->
        <?php
        if (isset($_GET['delete_donor_id'])) {
                      
                      $delete_donor_id =$_GET['delete_donor_id'];

                       $delete_donor_sql ="DELETE FROM donor WHERE donor_id='$delete_donor_id'";
                         
                         $delete_donor_query = mysqli_query($connect,$delete_donor_sql);

                         if($delete_donor_query)
                              {
                                 
                                header("Location: donor.php");
                              }
                              else{
                                die("inserting failed". mysqli_error($connect));
                              }     


                    }
             ?>
          <!-- delete donor from php end -->

      <!-- add new donor start -->
      <div class="row">
          <div class="col-md-12">
            
            <!-- edit donor information section start -->
            <?php 
                    
                    if(isset($_GET['update_donor_id']))
                    {
                        $update_donor_id_new = $_GET['update_donor_id'];

                      $update_donor_id_query = "SELECT * FROM donor WHERE donor_id='$update_donor_id_new'";

                      $update_id_data = mysqli_query($connect,$update_donor_id_query);

                      while($row = mysqli_fetch_assoc($update_id_data))
                      {
                            $donor_id             = $row['donor_id'];
                            $donor_full_name      = $row['donor_full_name'];
                            $donor_age            = $row['donor_age'];
                            $donor_gender         = $row['donor_gender'];
                            $donor_blood_group    = $row['donor_blood_group'];
                            $donor_contact_number = $row['donor_contact_number'];
                            $donor_email          = $row['donor_email'];
                            $donor_status         = $row['donor_status'];
                            $donor_last_date      = $row['donor_last_date'];
                          ?>
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Edit  Donor</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body" style="display: block;">
                              <form action="" method="POST">
                                <!-- Full Name -->
                                <div class="form-group">
                                  <label for="inputName">Full Name</label>
                                  <input type="text" id="inputName" class="form-control" name="donor_full_name" value="<?php echo $donor_full_name; ?>">
                                </div>
                                <!-- Age-->
                              <div class="form-group">
                                <label for="inputName">Age</label>
                                <input type="text" id="inputName" class="form-control" name="donor_age" value="<?php echo $donor_age; ?>">
                              </div>
                              <!-- Contact Number -->
                              <div class="form-group">
                                <label for="inputName">Contact Number</label>
                                <input type="text" id="inputName" class="form-control" name="donor_contact_number" value="<?php echo $donor_contact_number; ?>">
                              </div>
                              <!-- Email-->
                              <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" id="inputName" class="form-control" name="donor_email" value="<?php echo $donor_email; ?>">
                              </div>
                              <!-- Gender-->
                              <div class="form-group">
                                <label for="inputStatus">Gender</label>
                                <select id="inputStatus" class="form-control custom-select" name="donor_gender">
                                  <option selected="" disabled="">Select one</option>
                                  <option value="1" <?php if($donor_gender == 1){ echo "selected";} ?>>Male</option>
                                  <option value="2" <?php if($donor_gender == 2){ echo "selected";} ?>>Female</option>
                                  <option value="3" <?php if($donor_gender == 3){ echo "selected";} ?>>Other</option>
                                </select>
                              </div>
                              <!-- Blood Goup-->
                              <div class="form-group">
                                <label for="inputStatus">Blood Group</label>
                                <select id="inputStatus" class="form-control custom-select" name="donor_blood_group">
                                  <option selected="" disabled="">Select one</option>
                                  <option value="1" <?php if($donor_blood_group == 1){ echo "selected";} ?> >A+</option>
                                  <option value="2" <?php if($donor_blood_group == 2){ echo "selected";} ?>>A-</option>
                                  <option value="3" <?php if($donor_blood_group == 3){ echo "selected";} ?>>B+</option>
                                  <option value="4" <?php if($donor_blood_group == 4){ echo "selected";} ?>>B-</option>
                                  <option value="5" <?php if($donor_blood_group == 5){ echo "selected";} ?>>AB+</option>
                                  <option value="6" <?php if($donor_blood_group == 6){ echo "selected";} ?>>AB-</option>
                                  <option value="7" <?php if($donor_blood_group == 7){ echo "selected";} ?>>O+</option>
                                  <option value="8" <?php if($donor_blood_group == 8){ echo "selected";} ?>>O-</option>
                                </select>
                              </div>
                              <!-- Status-->
                              <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" class="form-control custom-select" name="donor_status">
                                 <option selected="" disabled="">Select one</option>
                                  <option value="0" <?php if($donor_status == 0){ echo "selected";} ?> >ACTIVE</option>
                                  <option value="1" <?php if($donor_status == 1){ echo "selected";} ?> >INACTIVE</option>
                                </select>
                              </div>
                              <!-- Last Date of Donation-->
                              <div class="form-group">
                                <label for="inputClientCompany">Last date of Donation</label>
                                <input type="date" id="inputClientCompany" class="form-control" name="donor_last_date" value="<?php echo $donor_last_date; ?>">
                              </div>
                              <!-- Add New Donor -->
                              <div class="form-group">
                                <input type="submit" name="edit_donor" class="btn btn-primary" value="Edit Donor">
                              </div>
                              </form>
                            </div>
                          </div>

                          <?php
                       }
                     }
              ?>

             <!-- update the donor information in DB start -->
             <?php
                if(isset($_POST['edit_donor'])){
                   // for security I use here mysqli_real_escape_sring
                  $donor_full_name = mysqli_real_escape_string($connect,$_POST['donor_full_name']);
                  $donor_age = mysqli_real_escape_string($connect,$_POST['donor_age']);
                  $donor_gender = $_POST['donor_gender'];
                  $donor_blood_group = $_POST['donor_blood_group'];
                  $donor_contact_number = mysqli_real_escape_string($connect,$_POST['donor_contact_number']);
                  $donor_email = mysqli_real_escape_string($connect,$_POST['donor_email']);
                  $donor_status = $_POST['donor_status'];
                  $donor_last_date = $_POST['donor_last_date'];

                  $update_donor_sql = "UPDATE donor SET donor_full_name='$donor_full_name', donor_age='$donor_age', donor_gender='$donor_gender', donor_blood_group='$donor_blood_group', donor_contact_number='$donor_contact_number',donor_email='$donor_email', donor_status='$donor_status',donor_last_date='$donor_last_date'  WHERE donor_id='$donor_id'";

                  $update_donor_query =mysqli_query($connect,$update_donor_sql);

                
                 if($update_donor_query)
                 {
                  header("Location: donor.php");
                 }
                 else{
                  die("Catagories additions failed" . mysqli_error($connect));
                 }

                }
                ?>
             <!-- update the donor information in DB end -->

            <!-- eid donor information section end -->

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Donor</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
                <form action="" method="POST">
                  <!-- Full Name -->
                  <div class="form-group">
                    <label for="inputName">Full Name</label>
                    <input type="text" id="inputName" class="form-control" name="donor_full_name">
                  </div>
                  <!-- Age-->
                <div class="form-group">
                  <label for="inputName">Age</label>
                  <input type="text" id="inputName" class="form-control" name="donor_age">
                </div>
                <!-- Contact Number -->
                <div class="form-group">
                  <label for="inputName">Contact Number</label>
                  <input type="text" id="inputName" class="form-control" name="donor_contact_number">
                </div>
                <!-- Email-->
                <div class="form-group">
                  <label for="inputName">Email</label>
                  <input type="email" id="inputName" class="form-control" name="donor_email">
                </div>
                <!-- Gender-->
                <div class="form-group">
                  <label for="inputStatus">Gender</label>
                  <select id="inputStatus" class="form-control custom-select" name="donor_gender">
                    <option selected="" disabled="">Select one</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                  </select>
                </div>
                <!-- Blood Goup-->
                <div class="form-group">
                  <label for="inputStatus">Blood Group</label>
                  <select id="inputStatus" class="form-control custom-select" name="donor_blood_group">
                    <option selected="" disabled="">Select one</option>
                    <option value="1">A+</option>
                    <option value="2">A-</option>
                    <option value="3">B+</option>
                    <option value="4">B-</option>
                    <option value="5">AB+</option>
                    <option value="6">AB-</option>
                    <option value="7">O+</option>
                    <option value="8">O-</option>
                  </select>
                </div>
                <!-- Status-->
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select id="inputStatus" class="form-control custom-select" name="donor_status">
                   <option selected="" disabled="">Select one</option>
                    <option value="0">ACTIVE</option>
                    <option value="1">INACTIVE</option>
                  </select>
                </div>
                <!-- Last Date of Donation-->
                <div class="form-group">
                  <label for="inputClientCompany">Last date of Donation</label>
                  <input type="date" id="inputClientCompany" class="form-control" name="donor_last_date">
                </div>
                <!-- Add New Donor -->
                <div class="form-group">
                  <input type="submit" name="add_donor" class="btn btn-primary" value="Add New Donor">
                </div>
                </form>
              </div>
            </div>
          </div>     
       </div>
      <!-- add new donor end -->

      <!-- adding Donor information to DB through php start -->
      <?php
        if(isset($_POST['add_donor'])){
// for security I use here mysqli_real_escape_sring
          $donor_full_name = mysqli_real_escape_string($connect,$_POST['donor_full_name']);
          $donor_age = mysqli_real_escape_string($connect,$_POST['donor_age']);
          $donor_gender = $_POST['donor_gender'];
          $donor_blood_group = $_POST['donor_blood_group'];
          $donor_contact_number = mysqli_real_escape_string($connect,$_POST['donor_contact_number']);
          $donor_email = mysqli_real_escape_string($connect,$_POST['donor_email']);
          $donor_status = $_POST['donor_status'];
          $donor_last_date = $_POST['donor_last_date'];

          $add_donor_sql = "INSERT INTO donor (donor_full_name,donor_age,donor_gender,donor_blood_group,donor_contact_number,donor_email,donor_status,donor_last_date) VALUES ('$donor_full_name','$donor_age','$donor_gender','$donor_blood_group','$donor_contact_number','$donor_email','$donor_status','$donor_last_date')";

          $add_donor_query = mysqli_query($connect,$add_donor_sql);

          if($add_donor_query){
            header("Location: donor.php");
          }else{
            die("Donor Add Failed" . mysqli_error($connect));
          }

        } 
      ?>
      <!-- adding Donor information to DB through php end -->



    </section>
  </div>
  <!-- /.content-wrapper -->
  
<?php
 include "inc/admin/footer.php"; 
?>