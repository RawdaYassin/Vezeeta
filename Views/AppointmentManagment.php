<?php
session_start();
include '../include/headeradmin.php';
if($_SESSION['username'] && $_SESSION['userRole'] === "Admin")
{
?>
<section class="overlay"></section>

    <div class="fresh-table full-color-blue">


      <table id="fresh-table" class="table">

        <thead>
            <th data-field="AppointmentID">AppointmentID</th>
            <th data-field="DoctorID">DoctorID</th>
            <th data-field="Appointment_time">Appointment time:</th>
            <th data-field="Appointment_date">Appointment date:</th>
            <th data-field="status">status:</th>
        <th>Actions</th>
        </thead>
        <tbody>
            <?php

          
          $data = $admin->displayAppointments();
          foreach ($data as $row) {
            if ($row['status'] === 'Accepted'){
            echo '<tr>';
            echo '<td>' . $row['AppointmentID']        . '</td>';
            echo '<td>' . $row['DoctorID']        . '</td>';
            echo '<td>' . $row['Appointment_time']        . '</td>';
            echo '<td>' . $row['Appointment_date']        . '</td>';
            echo '<td>' . $row['status']   . '</td>';
            
            ?>
                  <td>
                      <form action="<?php echo APPURL ?>/views/admin/EditData.php" method="POST">
                        <button type="submit" name="Edit_Appointment" value="<?=$row['AppointmentID']?>" class="btm btn-danger">Edit</button>
                      </form>
                  </td>
                  <td>
                      <form action="<?php echo APPURL ?>/controllers/RemoveAppointmentAdmin.php" method="POST">
                        <button type="submit" name="Remove_Appointment" value="<?=$row['AppointmentID']  ?>" class="btm btn-danger">Remove</button>
                      </form>
                  </td> 

                    <?php

            echo '</tr>';
            }
            ?>
            <?php
            if( $row['Status'] === 'Refused'){

                echo '<tr>';
            echo '<td>' . $row['AppointmentID']        . '</td>';
            echo '<td>' . $row['DoctorID']        . '</td>';
            echo '<td>' . $row['Appointment_time']        . '</td>';
            echo '<td>' . $row['Appointment_date']        . '</td>';
            echo '<td>' . $row['status']   . '</td>';
            
                ?>
                        <td>
                            <form action="<?php echo APPURL ?>/controllers/RemoveAppointmentAdmin.php" method="POST">
                                <button type="submit" name="Remove_Appointment" value="<?=$row['AppointmentID']  ?>" class="btm btn-danger">Remove</button>
                            </form>
                        </td>
    
                        <?php
    
              echo '</tr>';
            }
          }
            ?>
        </tbody>
      </table>
    </div>
            
<div style="height: 60px; width: 40px" >
        <div class = "center">
            <section class="overlay"></section>
            <?php echo 'Appointment requests'?>
            <div class="Requests-table full-color-blue"> 


              <table id="Requests-table" class="table">

                <thead>
                <th data-field="AppointmentID">AppointmentID</th>
            <th data-field="DoctorID">DoctorID</th>
            <th data-field="Appointment_time">Appointment time:</th>
            <th data-field="Appointment_date">Appointment date:</th>
            <th data-field="status">status:</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <?php
                $data = $admin->displayAppointments();
                  foreach ($data as $row) {
                    if( $row['Status'] === 'Pending'){
                        echo '<tr>';
                        echo '<td>' . $row['AppointmentID']        . '</td>';
                        echo '<td>' . $row['DoctorID']        . '</td>';
                        echo '<td>' . $row['Appointment_time']        . '</td>';
                        echo '<td>' . $row['Appointment_date']        . '</td>';
                        echo '<td>' . $row['status']   . '</td>';
                        ?>
                        <td>
                            <form action="<?php echo APPURL ?>/controllers/AcceptAppointmentAdmin.php" method="POST" style=" flex: 2px;">
                                <button type="submit" name="Accept_Appointment" value="<?=$row['AppointmentID']  ?>" class="btm btn-danger">Accept</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo APPURL ?>/controllers/RefuseAppointmentAdmin.php" method="POST">
                                <button type="submit" name="Refuse_Appointment" value="<?=$row['AppointmentID']  ?>" class="btm btn-danger">Refuse</button>
                            </form>
                        </td>
                        <?php
                        }
                  }
                  ?>

                </tbody>
              </table>
            </div>
        </div>
</div>        
<?php
include '../include/footeradmin.php';
}
else {
  header("Location:../../index.php");
}
?>