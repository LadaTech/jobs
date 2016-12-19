<?php
include_once '../db.php';

//include_once 'content_writer_model.php';

//$content_writer = new content_writer($db);
?>

<?php include_once 'header.php'; ?>

<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">

 	<section class="charts">
        <div class="page-header">
              <h1>      <i class="md md-input"></i>      Dashboard    </h1>
            </div>
        
            <div class="col-sm-6 col-md-4">
                <div class="card small load-chart">
                  <div class="card-header">
                    <div class="card-title">Jobseeker Payments</div>
                  </div>
                  <div class="card-content">
                    <div id="load-chart"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card small cpu-chart">
                  <div class="card-header">
                    <div class="card-title">Contentwriter Payments</div>
                  </div>
                  <div class="card-content">
                    <div id="cpu-chart"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card small mem-chart">
                  <div class="card-header">
                    <div class="card-title">Expenses</div>
                  </div>
                  <div class="card-content">
                    <div id="mem-chart"></div>
                  </div>
                </div>
              </div>
        
        <div class="col-sm-12 col-md-12">
                <div class="card small bar-chart">
                  <div class="card-header">
                    <div class="card-title">Bar charts</div>
                  </div>
                  <div class="card-content">
                    <div id="bar-chart"></div>
                  </div>
                </div>
              </div>
        
    </section>
  
</div>