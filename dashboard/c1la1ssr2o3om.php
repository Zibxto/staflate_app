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
                        
                        if (mysqli_num_rows($v_sql) > 0) {
                        while ($v_row = fetch_array($v_sql)) {
                            $vid_id = $v_row['id'];

                        ?>

                        <div class="col-lg-4 col-md-4">
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
                                        <!-- <a href="_classroom.php?<?=$vid_id?>"><button class="h1 btn btn-success btn-block">Proceed to Course</button></a> -->
                                    </div>
                                      
                                  </div>
                                </div>
                            </div>
                        </div>

                        <?php } 

                        } else {
                            echo "<h4 style='text-align:center'>We are sorry, there is something wrong. Check back later</h4>";
                        }

                        ?>

                    </div><!-- Row -->

                </div><!-- Main Wrapper -->


                <div class="page-footer">
                    <p class="no-s"><?php echo date("Y"); ?> &copy;Copyright Staflate.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

       
        <?php include "footer.php"; ?>