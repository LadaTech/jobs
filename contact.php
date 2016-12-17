<?php
$page="contact";
include "header.php";
?>
    <section id="middle">
        <div class="container">
            <div class="row contact-wrap">
      <div class="status alert alert-success" style="display: none"></div>
      
        <div class="col-sm-5 col-sm-offset-1">
          <div>
      <h2>Contact Us</h2>
      <h4 style=" border-bottom:1px dashed #333333; width:150px">Hyderabad</h4>
      <h5>
      Survey No : 12(P), White Field Road,<br />
Opp: Ramalayam Temple, Kothaguda,<br />
Kondapur, Hyderabad - 500081<br />
Telangana.<br />
Office : 040 4012 0229<br />
Mail Id: info@virtuellhire.com<br />
Sales Id: sales@virtuellhire.com<br />
Support Id: support@virtuellhire.com<br />
Web site: www.virtuellhire.com<br />
      </h5>
      <h4>&nbsp;</h4>
      <h4 style=" border-bottom:1px dashed #333333; width:150px">Banglore</h4>
      <h5>
      2nd Floor, Prestige Omega,<br />
No. 104 EPIP Zone,<br />
Whitefield,<br />
Bangalore, 560066.<br />
      </h5>
      <h4></h4>
      <h4 style=" border-bottom:1px dashed #333333; width:150px">US</h4>
      <h5>
      7One Commerce Center – 1201<br />
Orange St. #600, Wilmington,<br />
Delaware 19899<br />
      </h5>
    </div>
        </div>
        <div class="col-sm-5">
        <div class="center">
      <h4>Drop Your Message</h4>
    </div>
        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="number" class="form-control">
          </div>
          <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Subject *</label>
            <input type="text" name="subject" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Message *</label>
            <textarea name="message" id="message" required class="form-control" rows="8"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
          </div>
          </form>
        </div>
      </form>
    </div>
    <!--/.row--> 
            </div>
            <!--/.container-->
    </section>
    <!--/#middle-->
    <?php
include "footer.php";
?>
