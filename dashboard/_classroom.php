<?php 
include 'header.php';
?>

                            
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
                        <?php
                        $v_sql = query("SELECT * FROM tutorial_video");
                        confirm($v_sql);
                        
                        if (mysqli_num_rows($v_sql) > 0) //{
                        while ($v_row = fetch_array($v_sql)) //{
                            

                        ?>

                        <div class="col-lg-6 col-md-6">
                            <div class="panel info-box panel-white">
                                <div class="panel-body">
                                  <div class="card">
                                   <a href="index.php"> <div class="card-body">
                                        <iframe width="325" height="250" src="https://www.youtube-nocookie.com/embed/<?= $v_row['youtube_id']?>?modestbranding=1&&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;" allowfullscreen></iframe>
                                    </div></a>
                                    <div class="card-title h4">
                                        <?= $v_row['title']; ?>
                                    </div> <hr>
                                    <div class="card-title">
                                        <a href="classroom.php?"><button class="h1 btn btn-success btn-block">Proceed to Course</button></a>
                                    </div>
                                      
                                  </div>
                                </div>
                            </div>
                        </div>

                        <?php /*} 

                        } else {
                            echo "<h4 style='text-align:center'>We are sorry, there is something wrong. Check back later</h4>";
                        }*/

                        ?>
<style>
.accordion {
  background-color: #eee;
  color: #444;
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
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.apanel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>

                        <div class="col-lg-6 col-md-6">
                            
                                  <div class="card">
                                   
                                   <button class="accordion">Section 1</button>
                                   <a><button href="" class="apanel">Business day</button></a> 
                                
                                      
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
    var apanel = this.nextElementSibling;
    if (apanel.style.maxHeight) {
      apanel.style.maxHeight = null;
    } else {
      apanel.style.maxHeight = apanel.scrollHeight + "px";
    } 
  });
}
</script>   
        <?php include "footer.php"; ?>