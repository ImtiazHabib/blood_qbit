<?php
ob_start();
  include "admin/inc/db.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- style.css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- style.css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- datatable -->
    <link rel="stylesheet" href="assets/css/jquery-ztables.css" />

    <title>Blood Donor | Qbit</title>
  </head>
  <body>
    
    <!-- header section start -->
    <header class="header_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>
             Welcome to Blood Donor Management System Qbit
            </h1>
          </div>
        </div>
      </div>
    </header>
    <!-- header section end -->

    <!-- main table Section Start -->
    <section class="table_section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="table_inner">
              <table class="table" id="mytable">
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
                  </tr>
                </thead>
                <tbody>
                  <!-- php code for reading donor information from database start -->
                 <?php

                   $get_donor_data_sql = "SELECT * FROM donor";

                   $get_donor_data_query = mysqli_query($connect,$get_donor_data_sql);
                   $i=0;
                   while($row = mysqli_fetch_assoc($get_donor_data_query)){
                      $donor_full_name      = $row['donor_full_name'];
                      $donor_age            = $row['donor_age'];
                      $donor_gender         = $row['donor_gender'];
                      $donor_blood_group    = $row['donor_blood_group'];
                      $donor_contact_number = $row['donor_contact_number'];
                      $donor_email          = $row['donor_email'];
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
                            
                              echo "Male";
                           }else if($donor_gender == 2){
                            
                              echo "Female";
                                
                           }else if($donor_gender == 3){
                            
                            echo "Others";
                           }
                          ?>
                        </td>
                        <td>
                          <?php
                           if($donor_blood_group == 1){
                               echo "A+";

                           }else if($donor_blood_group == 2){
                            
                            echo "A-";

                           }else if($donor_blood_group == 3){
                             echo "B+";

                           }else if($donor_blood_group == 4){
                            
                            echo "B-";
                           }else if($donor_blood_group == 5){
                            
                            echo "AB+";

                           }else if($donor_blood_group == 6){
                            
                            echo "AB-";

                           }else if($donor_blood_group == 7){
                            
                             echo "O+";

                           }else if($donor_blood_group == 8){
                            
                            echo "O-";
                           }
                          ?>
                        </td>
                        <td><?php echo $donor_contact_number; ?></td>
                        <td><?php echo $donor_email; ?></td>
                        <td><?php echo $donor_last_date; ?></td>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </section>


    <!-- main table Section end -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    


    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- datatable search js -->
   <script src="assets/js/jquery-ztables.js"></script>
   <script>
     var table = $('#mytable').ZTable();
   </script>
    <?php
     ob_end_flush();
    ?>
  </body>
</html>