<?php 
include 'header.php';
?>

<style>
.accordion {
  background-color: #34425A;
  color: #fff;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bolder;
  font-size: 20px;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panell {
  padding: 0 18px;
  margin-bottom: 2px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>

                            
                <!-- page inner -->

            <div class="page-inner">
                <div class="page-title">
                    <h3>Classroom</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Classroom</li>
                        </ol>
                    </div>
                </div>

                

                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                    <div class="card">

                                    <?php

                                    // $c_sql = query("SELECT * FROM tutorial_video");
                                    // confirm($c_sql);
                                    

                                    // $count = 0;
                                    // $module = 1;
                                    // while ($count  < mysqli_num_rows($c_sql)) {
                                    //     while ($c_row = fetch_array($c_sql)){


                                     ?>
                                        <div class="card-header">
                                            <button class="accordion btn btn-success btn-block">Module </button>
                                            <div class="panell" style="font-size: 16px">
                                            <a href="#"></a>
                                            </div> 

                                            
                                        
                                        </div>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>

                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Metareels.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

      <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
        <?php include "footer.php"; ?>