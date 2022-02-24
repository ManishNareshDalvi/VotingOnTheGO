<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Voting OnTheGo</title>
  <?php
  ob_start();
  session_start();
  if (!isset($_SESSION['otp_login']))
    header('location:login.php');
  include('./header.php');
  ?>

</head>
<style>
 body{
        background: #2ec4b6;
  }

  main {
    margin-left: unset !important;
    width: calc(100%) !important
  }
  #if-part{
    position: relative;
    top: -330px;
  }


</style>

<body>
  <?php include 'topbar.php'; ?>
  <div id='else-part' style='visibility: hidden'>
    <center><br><br><br><br><br><br><br><br><br><br><br><br>
      <h1 class="ab">

<?php include 'db_connect.php';

        $sql = "SELECT `notice` FROM `notice` WHERE `event` ='voting start'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
?> <div style="font-size:0.3em; position: relative; top:-10px; ">
              <h1 style=" font-size: 50px;"><?php echo $row['notice'];
                                          }
                                        } ?><h1>
            </div>


      </h1>
    </center>
  </div>
  <div id='if-part' style='visibility: hidden;'>
  <br><br>
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-body text-white">
      </div>
    </div>
    <main id="view-panel">
      <?php $page = isset($_GET['page']) ? $_GET['page'] : 'vote_sheet'; ?>
      <?php include $page . '.php' ?>


    </main>



    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
          </div>
          <div class="modal-body">
            <div id="delete_content"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</body>
<script>
  window.start_load = function() {
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function() {
    $('#preloader2').fadeOut('fast', function() {
      $(this).remove();
    })
  }

  window.uni_modal = function($title = '', $url = '') {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          $('#uni_modal').modal('show')
          end_load()
        }
      }
    })
  }
  window._conf = function($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
  }
  window.alert_toast = function($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success')
    $('#alert_toast').removeClass('bg-danger')
    $('#alert_toast').removeClass('bg-info')
    $('#alert_toast').removeClass('bg-warning')

    if ($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if ($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if ($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if ($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({
      delay: 3000
    }).toast('show');
  }
  $(document).ready(function() {
    $('#preloader').fadeOut('fast', function() {
      $(this).remove();
    })
  })
</script>




<?php


$sql = "SELECT * FROM notice where event='Voting Start'	";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$date_main = $row['date'];
$start_time=$row['start_time'];
$end_time=$row['end_time'];









ob_end_flush();
?>


<script>
  var currentdate = new Date();
  var date1 = +currentdate.getDate() + "/" +
    (currentdate.getMonth() + 1) + "/" +
    currentdate.getFullYear();

  var time1 = +currentdate.getHours() + ":" +
    currentdate.getMinutes() + ":" +
    currentdate.getSeconds();



  if (date1 == '<?php echo $date_main ?>' && time1 >= '<?php echo $start_time ?>' && time1 <= '<?php echo $end_time ?>') {
    node = document.getElementById('if-part');
  } else {
    node = document.getElementById('else-part');
  }
  node.style.visibility = 'visible';
</script>

</html>

