<?php include 'header.php'; ?>

<style>
  .accordion {
    background-color: #34425A;
    color: #fff;
    cursor: pointer;
    padding: 5px;
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

  .panel {
    padding: 0 18px;
    margin-bottom: 2px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.2s ease-out;
  }
</style>

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
      <div class="col-lg-8 col-md-8">
        <?php
          $vid = $_GET['vid'];

          $s_vid = query("SELECT * FROM tutorial_video WHERE youtube_id='$vid'");
          confirm($s_vid);
          $s_row = fetch_array($s_vid);

          // check if no vid id is passed in url

          if ($vid == 'null') {
            $s_row['title'] = "";
            $s_row['description'] = "";
            $vid = "E5RHzKxMYls"; // id to introductory vid
          }
        ?>
        <div class="info-box panel-white">
          <div class="panel-body">
            <div class="card">
              <a href="index.php">
                <div class="card-body">
                  <iframe width="100%" height="400" src="https://www.youtube-nocookie.com/embed/<?= $vid ?>?modestbranding=1&&controls=1" frameborder="0" allow="accelerometer; autoplay; gyroscope;" allowfullscreen></iframe>
                </div>
              </a>
              <div class="card-title">
                <h3><?= $s_row['title']; ?></h3>
              </div>
              <hr>
              <div class="card-title">
                <p><?= $s_row['description']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4">
        <div class="info-box panel-white">
          <div class="panel-body">
            <div class="card">
              <div class="card-header">
                <?php
                  $module = 1;

                  while ($module < 16) {
                    $sql = query("SELECT * FROM tutorial_video WHERE module=$module");
                    confirm($sql);

                    $accordionID = 'accordion-' . $module;
                ?>
                    <button class="accordion btn btn-success btn-block" id="<?php echo $accordionID; ?>">Module <?= $module; ?></button>
                    <div class="panel" id="<?php echo $accordionID . '-panel'; ?>">
                      <?php
                        while ($row = fetch_array($sql)) {
                          $videoID = $row['youtube_id'];
                          $title = $row['title'];
                      ?>
                          <div class="panel-content" style="font-size: 16px">
                            <a style="font-family: sans-serif; font-size: 14px" href="__classroom.php?vid=<?php echo $videoID; ?>"><?= $title; ?></a>
                          </div>
                      <?php
                        }
                      ?>
                    </div>
                <?php
                    $module++;
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-footer">
    <p class="no-s"><?php echo date("Y"); ?>&copy; Copyright Staflate.</p>
  </div>
</div>

<script>
  var accordions = document.getElementsByClassName("accordion");
  var panels = document.getElementsByClassName("panel");

  for (var i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", function() {
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
