<!DOCTYPE html>
<?php 
ob_start();
$page="";
include_once 'header.php';
?>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css">
    <link rel="stylesheet" href="templates/Css.jtp">
    <script src="http://static.nabble.com/trk5.js"></script>
    <script src="templates/Javascript.jtp"></script>
    <link rel="stylesheet" href="templates/slider/css/slider.css">
    <link rel="stylesheet" href="templates/summernote/summernote.css">	
  
    
<script type="text/javascript" src="assets/addhtml.js"></script>  <link rel="stylesheet" href="Css.jtp">
    <style>
body.modal-open {
	margin-right: 0
}
div.left {
	float: left;
	width: 25%;
}
div.left-inner {
	padding-left: .5em;
	overflow: auto;
}
div.right {
	float: right;
	width: 75%;
}
#resume-left-inner button.btn-default {
	background-color: #FAFAFA;
	color: #0F6791;
	font-family: 'Roboto Condensed';
}
div.viewer {
	background: #e5e5e5;
}
div.papersheet-outer {
	border: 1px solid #A2A2A2;
	top: 1.25em;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
#form-search {
	font-family: 'Roboto Condensed', Raleway, sans-serif;
	border-bottom: 1px solid #eee;
	margin: 0;
	padding: .6em .5em;
	white-space: nowrap;
}
div.toolbar {
	padding: 1px 0;
	background: #f5f5f5;
}
div.toolbar button.btn {
	padding: 2px 7px;
	background: #f5f5f5;
	font-family: 'Roboto Condensed', Raleway, sans-serif;
}
div.toolbar button.btn.btn-info {
	color: #000;
	background-color: #5bc0de;
}
div.toolbar button.btn.toolbar {
	background: #f5f5f5;
	color: #0087cf;
	outline: none;
}
div.toolbar button.btn.toolbar:hover,  div.toolbar button.btn.toolbar:focus {
	background: #DFEAF5;
}
h3.popover-title {
	font-weight: bold;
}
h3.popover-title button.close {
	margin-top: -.1em;
}
div.popover-label {
	font-weight: bold;
	margin-top: .8em;
}
.popover {
	min-width: 15em;
	max-width: 500px;
}
img.thumb {
	display: inline;
	cursor: pointer;
	width: 130px; height:150px;
	border: 2px solid #ddd; margin: 6px;
}
img.selected-thumb {
	border: 2px solid #0087cf;
}
img.hover-thumb {
	border: 2px solid #aaa;
}
.selected-block {
	border: 2px solid #0087cf !important;
}
.selected-subsection {
	background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAJVVVUzGWF8EKetrS0dLADjgNiMyByQAACfmQ4Me8gdegAAAABJRU5ErkJggg==) repeat;
}
div.subsection-toolbar {
	display: none;
	position: absolute;
	right: -.9em;
}
div.subsection-toolbar button {
	font-size: 11pt;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	font-family: 'Roboto Condensed', Raleway, sans-serif;
}
div.papersheet-inner .btn {
	border: 2px solid #0087cf !important;
	margin-left: .3em;
	padding: 1px 6px;
}
div.section-toolbar {
	display: none;
	position: absolute;
	z-index: 1000;
	padding: .2em;
	border-bottom: none;
	font-weight: bold;
	text-align: right;
	margin-right: -1em;
}
div.section-toolbar button {
	font-size: 11pt;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	font-family: 'Roboto Condensed', Raleway, sans-serif;
}
div.btn-toolbar {
	margin: 0 0 5px;
}
div.btn-toolbar .btn {
	padding: 2px 8px;
}
div.btn-toolbar .btn:not(.btn-info) {
	color: #555;
	background-color: #eee;
}
a.home {
	float: left;
	padding: .9em .6em 0;
}
ul.nav-tabs {
	padding: 6px 5px 0;
	font-size: 1.1em;
	margin-bottom: 0;
	border-color: #b1b1b1;
}
ul.nav-tabs li a {
	font-family: 'Roboto Condensed', Arial, sans-serif;
	background: #ececec;
	border: 1px dotted #d5d5d5;
	padding: .3em 1em .2em;
	outline: none;
	color: #555;
	min-width: 7em;
	text-align: center;
}
ul.nav-tabs li a:hover {
	background: #e4e4e4;
	border-color: #e4e4e4;
}
ul.nav-tabs>li {
	margin-left: 3px
}
ul.nav-tabs> li.active a,  ul.nav-tabs> li.active a:hover,  ul.nav-tabs> li.active a:focus {
	padding: .3em 1em .3em;
	border-color: #b1b1b1;
	border-bottom-color: transparent;
}
#l7 {
	text-align: center;
	padding: 1em;
	font-size: 1.3em;
	color: #777;
}
div.resume {
	margin-bottom: .5em;
	padding: 10px 5px;
	cursor: pointer;
	color: #555;
	border-left: 5px solid transparent;
	background-image: -ms-linear-gradient(top, #FFF 0%, #F8F8F8 100%);
	background-image: -moz-linear-gradient(top, #FFF 0%, #F8F8F8 100%);
	background-image: -o-linear-gradient(top, #FFF 0%, #F8F8F8 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFF), color-stop(1, #F8F8F8));
	background-image: -webkit-linear-gradient(top, #FFF 0%, #F8F8F8 100%);
	background-image: linear-gradient(to bottom, #FFF 0%, #F8F8F8 100%);
}
div.selected-resume {
	color: #000;
	border-left: 5px solid #428bca;
	text-shadow: 1px 1px 1px #fff;
	background: #A5CBEB;
	background-image: -ms-linear-gradient(top, #E0F2FF 0%, #A5CBEB 100%);
	background-image: -moz-linear-gradient(top, #E0F2FF 0%, #A5CBEB 100%);
	background-image: -o-linear-gradient(top, #E0F2FF 0%, #A5CBEB 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #E0F2FF), color-stop(1, #A5CBEB));
	background-image: -webkit-linear-gradient(top, #E0F2FF 0%, #A5CBEB 100%);
	background-image: linear-gradient(to bottom, #E0F2FF 0%, #A5CBEB 100%);
	-webkit-border-radius: 10px 0 0 10px;
	-moz-border-radius: 10px 0 0 10px;
	border-radius: 10px 0 0 10px;
}
div.hover-resume {
	color: #000;
	border-left: 5px solid #BBC7D1;
	background: #EEE;
	-webkit-border-radius: 10px 0 0 10px;
	-moz-border-radius: 10px 0 0 10px;
	border-radius: 10px 0 0 10px;
}
div.jobtitle {
	font-size: 120%;
	font-weight: bold;
	word-break: keep-all;
}
table.result {
	font-family: 'Roboto Condensed', Arial, sans-serif;
}
table.result td.left {
	font-weight: bold;
	font-size: 1.2em;
	vertical-align: top;
	padding-right: .3em;
}
table.result td.middle {
	width: 95%;
	padding-top: .2em;
}
table.result td.right {
	vertical-align: middle;
	min-width: 1em;
}
div.selected-resume td.left {
	color: #174D9E;
}
p.move-info {
	padding: 0 0 1em;
	border-bottom: 2px solid #ddd;
}
div.move-controls {
	top: 45%;
	position: absolute;
	right: 0;
	padding: 0 1em;
	width: 5em;
}
div.section-row1,  div.section-row2 {
	width: 70%;
	cursor: pointer;
	padding: .1em;
	border: 1px solid #fff;
	border-left: 2px solid #fff;
}
div.section-hover-row {
	border-left: 2px solid #ddd;
	background: #f2f2f2;
}
div.section-selected-row {
	background: #0087cf;
	color: #fff;
	font-weight: bold;
}
div.section-row1 {
	font-weight: bold;
}
div.section-row2 {
	margin-left: 2em;
}
#search-list div.alert {
	margin-right: 1em
}
#custom-title-radio {
	margin-top: .6em
}
#custom-title-input {
	margin-bottom: 0
}
#samples-toolbar button.save,  #search-toolbar button.save,  #favorite-toolbar button.save {
	position: absolute;
	font-size: 140%;
	padding: 0px .5em;
	z-index: 1;
	border: 1px solid #BAC7D5;
	border-width: 0px 0px 2px;
}
span.highlighted {
	color: #333;
	background-color: #ffffbd
}
#section-list {
	min-height: 15em;
}
div.slider {
	width: 100% !important
}
a.resume-cog {
	color: #dadada;
	white-space: nowrap;
	text-decoration: none;
	text-shadow: none
}
a.resume-cog i.icon-caret-down {
	font-size: 150%
}
ul.resume-menu a {
	text-shadow: none
}
div.selected-resume a.resume-cog {
	color: #428BCA
}
div.hover-resume a.resume-cog {
	color: #ACACAC
}
a.fake {
	color: inherit;
	outline: none;
	text-decoration: none
}
#saving-icon {
	font-size: 10pt;
	color: #aaa;
	margin: 5px;
	position: fixed;
	z-index: 3000;
	display: none
}
ul.templates {
	padding: .5em;
	margin-left: -150%
}
span.hint {
	color: #578DB1;
	position: absolute;
	left: 40%
}
.required {
	border: 1px solid red!important
}
div.faded-toolbar {
	height: 2em;
	background: #ffffff;
	background: -moz-linear-gradient(left, #ffffff 50%, #f5f5f5 100%);
	background: -webkit-gradient(linear, left top, right top, color-stop(50%, #ffffff), color-stop(100%, #f5f5f5));
	background: -webkit-linear-gradient(left, #ffffff 50%, #f5f5f5 100%);
	background: -o-linear-gradient(left, #ffffff 50%, #f5f5f5 100%);
	background: -ms-linear-gradient(left, #ffffff 50%, #f5f5f5 100%);
	background: linear-gradient(to right, #ffffff 50%, #f5f5f5 100%);
 filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f5f5f5', GradientType=1);
}
div.snippets-heading {
	font-weight: bold;
	padding: .3em 0 .5em .5em;
	border-bottom: 1px solid #cecece
}
div.snippet-search {
	position: absolute;
	right: 1em;
	width: 16em;
	top: 6px
}
input.snippet-search {
	width: 13em;
	height: 1.9em;
	border-radius: 5px 0 0 5px;
	margin: 0!important;
	display: inline
}
button.snippet-search {
	border-radius: 0 5px 5px 0;
	padding: .18em .7em
}
div.inline-snippets {
	overflow: auto;
	height: 26.4em;
	font-size: 95%;
	background: #FEFFE8;
	padding-left: .5em;
	color: #222
}
div.snippet-text {
	border-bottom: 1px solid #D6D688;
	padding: .75em .3em .75em 1.5em
}
#l7 {
	text-align: center;
	padding: 1em;
	font-size: 1.3em;
	color: #777;
}
.pill {
	float: right;
	padding: .5em 2px;
	font-size: 80%
}
i.icon-star.tab {
	opacity: .3;
	filter: alpha(opacity=30)
}
i.star {
	float: right;
	color: #000;
	opacity: .15
}
i.star.hover {
	opacity: .4
}
i.star.starred {
	color: #A6A853;
	opacity: 1
}
#btncopy {
	float: left;
	margin-left: -6px;
	padding: 10px 5px;
	margin-top: 10px
}
p.tip {
	margin: 2px 0;
	color: #777;
	font-size: 85%
}
span.ptn {
	background: #EDEDD1
}
[agree] {
	font-size: 85%;
	margin: 3em 0 0 3em;
	color: #777
}
</style>
    <!--  <script id="tpl_start" type="text/template">
         <div style="padding:0 1em"> <label class=""> <input id="" type="hidden" name="new-resume" /> <span style="font-size:120%">Create a new resume</span> <p style="font-weight:normal"></p> </label>   </div> 
        <!-- <div agree> By clicking Continue, you agree to our <a href="#" target="_blank">Terms of Use</a> and <a href="#" target="_blank">Privacy Policy</a>. </div> 
    </script> --><?php
$stmtje=$db->prepare("SELECT * FROM job_seeker WHERE Job_Seeker_Id ='".$_SESSION['Job_Seeker_Id']."'");
	


$stmtje->execute();
	
$js=$stmtje->fetch(PDO::FETCH_ASSOC);
//echo "SELECT * FROM js_work_experience WHERE Job_Seeker_Id ='".$_SESSION['Job_Seeker_Id']."' order by js_work_experience_id desc limit 0,1";
$stmtwe=$db->prepare("SELECT * FROM js_work_experience WHERE Job_Seeker_Id ='".$_SESSION['Job_Seeker_Id']."' order by js_work_experience_id desc limit 0,1");

$stmtwe->execute();
	
$jsw=$stmtwe->fetch(PDO::FETCH_ASSOC);
?>
<?php
$sql="SELECT * FROM job_seeker WHERE Job_Seeker_Id ='".$_SESSION['Job_Seeker_Id']."'";
//echo $sql;
?>
    <script id="tpl_person" type="text/x-template" data-title="Personal Information" data-script="minWidthEdit(600);">
        <div class="form" style="margin-top:1em">
            <div style="width:12em;float:left;margin-right:.5em"> <label for="firstName">First Name</label> <input id="firstName" type="text" readonly value="<?php echo $js['First_name']; ?>" class="form-control" maxlength="50"> </div>
            <div style="float:left;width:12em"> <label for="lastName">Last Name</label> <input id="lastName" type="text" class="form-control" readonly value="<?php echo $js['Last_name']; ?>" maxlength="50"> </div>
            <div style="clear:both;height:.7em"></div> <label for="jobTitle">Present Designation</label>
            <p class="tip">Examples: Project manager, Web Developer, UI Designer ..etc</p> <input id="jobTitle" readonly type="text" class="form-control" value="<?php echo $jsw['Designation']; ?>" maxlength="100">
           <!-- <div style="height:.7em"></div> <label for="location">Current Location</label>
            <p class="tip">City or State</p> <input id="location" type="text" class="form-control" maxlength="100"> </div> -->
    </script>
    <script id="tpl_contact" type="text/x-template" data-title="Contact Information" data-script="minWidthEdit(600);richText({height:'10em'},'8em')">
        <div class="form">
            <div id="html" maxlength="2000|right"></div>
            <p style="width:17em;float:left;margin-top:2em;font-size:90%"> <span class="bold">Example 1:</span><br/> vijay72@gmail.com<br/>999-888-7777<br/>http://virtuelltech.com/ </p>
            <p style="width:15em;float:left;margin-top:2em;font-size:90%"> <span class="bold">Example 2:</span><br/> 100 Main Street<br/>Los Angeles, CA 12345<br/><br/>vijay72@gmail.com<br/>444-333-2222 (home)<br/>987-654-2222 (mobile)<br/>http://virtuelltech.com/ </p>
        </div>
    </script>
    <script id="tpl_text" type="text/x-template" data-title="Text Section" data-script="minWidthEdit(1100);richText({height:'20em'},'20em');loadSnippets();">
        <div class="form">
            <div style="width:50%;float:left;padding-right:1em"> <label for="title">Title</label> <input id="title" type="text" class="form-control" maxlength="100" />
                <div id="html" maxlength="5000"></div>
            </div>
            <div style="width:50%;float:left;float:left;height:27.2em">
                <div class="snippets-heading"> Sample Text
                    <div class="snippet-search"><input class="form-control snippet-search" /><button class="btn btn-primary snippet-search"><span class="icon-search"></span></button></div>
                </div>
                <div class="inline-snippets"></div>
            </div>
        </div>
    </script>
    <script id="tpl_experience" type="text/x-template" data-script="minWidthEdit(1100);experienceForm();richText({height:'25em',width:'39.5%',float:'left',paddingRight:'5px'},'25em');loadSnippets('experience');" data-class="wide-window">
        <div class="form">
            <div style="width:21%;float:left;padding-right:1em"> <label for="title">Position</label> <input id="title" type="text" class="form-control" maxlength="100" /> <label for="where">Company</label> <input id="where" type="text" class="form-control" maxlength="100" /> <label for="location">Location</label> <input id="location" type="text" class="form-control" maxlength="100" /> <label for="fromMonth">Date From</label> <select id="fromMonth" class="form-control" style="width:6em"> <option value="">empty</option> <option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sep">Sep</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select> <select id="fromYear" class="form-control" style="width:6em"> <option value="">empty</option> <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option> </select> <label for="toMonth">Date To</label> <select id="toMonth" class="form-control" style="width:6em"> <option value="">empty</option> <option value="Current">Current</option> <option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sep">Sep</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select> <select id="toYear" class="form-control" style="width:6em"> <option value="">empty</option>  <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option> </select> </div>
            <div id="html" maxlength="5000"></div>
            <div style="width:39.5%;float:left;float:left;height:27.2em">
                <div class="snippets-heading"> Sample Text
                    <div class="snippet-search"><input class="form-control snippet-search" /><button class="btn btn-primary snippet-search"><span class="icon-search"></span></button></div>
                </div>
                <div class="inline-snippets"></div>
            </div>
        </div>
    </script>
    <script id="tpl_education" type="text/x-template" data-script="minWidthEdit(1100);richText({height:'25em',width:'40%',float:'left',paddingRight:'5px'},'25em');loadSnippets('education');" data-class="wide-window">
        <div class="form">
            <div style="width:20%;float:left;padding-right:1em"> <label for="title">Course / Field of Study</label> <input id="title" type="text" class="form-control" maxlength="100" /> <label for="where">School</label> <input id="where" type="text" class="form-control" maxlength="100" /> <label for="location">Location</label> <input id="location" type="text" class="form-control" maxlength="100" /> <label for="fromYear">Start Year</label> <select id="fromYear" class="form-control"> <option value="">empty</option> <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option> </select> <label for="toYear">Grad Year</label> <select id="toYear" class="form-control"> <option value="">empty</option> <option value="Current">Current</option> <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option> </select> </div>
            <div id="html" maxlength="5000"></div>
            <div style="width:40%;float:left;float:left;height:27.2em">
                <div class="snippets-heading"> Sample Text
                    <div class="snippet-search"><input class="form-control snippet-search" /><button class="btn btn-primary snippet-search"><span class="icon-search"></span></button></div>
                </div>
                <div class="inline-snippets"></div>
            </div>
        </div>
    </script>
    </head>

    <body>
<div id="notice" class="notice"></div>
<div class="tab-content">
      <div id="tab-resumes" class="tab-pane active">
    <div class="left">
          <div id="resume-left-inner" class="left-inner">
        <div>
              <div id="resume-toolbar" class="toolbar">
            <button class="add-section btn toolbar"><i class="icon-plus"></i> Add Section</button>
            <button class="formatting btn has-popover toolbar">Formatting <i class="icon-caret-down"></i></button>
            <button class="print btn toolbar"><i class="icon-print"></i> Print</button>
            <div class="dropdown" style="display:inline-block">
                  <button class="btn dropdown-toggle toolbar pdf" data-toggle="dropdown">Download 
				 </i></button>
                 <!-- <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li>    <form action="test.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="create" id="create_pdf" class="download-pdf">
<input type="submit" name="pdf" value="Save"> 
</form> </li>
<li><a href="jobseeker.php?type=profile_valid&inserted" id="" class="download-pdf"><img src="templates\img\pdf.png" style="height:20px"> Adobe PDF</a> </li>
                <!-- vvv 
  <li><a href="#" id="" class="pdf"><img src="templates\img\pdf.png" style="height:20px"> AS PDF</a> </li>               
                <li> <a href="#" class="download-html"><img src="templates\img\html.png" style="height:20px"> Web Page Html</a> </li>
              </ul>-->
                </div>
	<button class="zoom-in btn pull-right toolbar"><i class="icon-zoom-in icon-large"></i></button>
            <button class="zoom-out btn pull-right toolbar"><i class="icon-zoom-out icon-large"></i></button>
          </div>
            </div>
        <div class="faded-toolbar"></div>
        <div id="user-resumes"></div>
        <div style= "">
              <button id="add-new-btn" class="btn btn-default"><i class="icon-plus"></i> Add New Resume</button>
            </div>
        <div class="dropdown template-dropdown open" style="display:inline-block">
              <ul class="templates dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li  class="template-list" ></li>
          </ul>
            </div>
      </div>
        </div>
    <div class="right">

          <div id="resume-viewer" class="viewer" style="height:1200px;"> 
        <!--   <div id="saving-icon"><i class="ic on-spinner icon-spin icon-large"></i> Saving</div> -->
      
        <div class="papersheet-outer" id="resume" >
              <div id="resume-papersheet-inner" class="papersheet-inner"></div>
            </div>
      </div>
        </div>
             <div class="clearfix"></div>
  </div>
    <div class="clearfix"></div>
      <div id="tab-search" class="tab-pane">
    <div id="search-left" class="left">
          <form id="form-search" class="form-search" action="/Resume_Services/create_resume.php" method="get">
        <!-- <div class="input-append"> <input id="query" type="text" name="query" value="" class="form-control" style="width:60%;display:inline" maxlength="1000"> <button type="submit" class="btn btn-primary search">Search</button> </div> -->
      </form>
          <div id="search-left-inner" class="left-inner">
        <div id="search-list"></div>
      </div>
        </div>
    <div class="right">
          <div id="search-toolbar" class="toolbar"> </div>
          <div id="search-viewer" class="viewer">
        <div class="papersheet-outer">
              <div class="papersheet-inner"></div>
            </div>
      </div>
        </div>
  </div>
      <div id="tab-favorites" class="tab-pane">
    <div id="favorite-left" class="left">
          <div class="left-inner">
        <div class="faded-toolbar"></div>
        <div id="favorites"></div>
      </div>
        </div>
    <div class="right">
          <div id="favorite-toolbar" class="toolbar">
        <div class="dropdown favorite-template-dropdown" style="display:inline-block">
              <button class="btn dropdown-toggle toolbar" data-toggle="dropdown">Templates <i class="icon-caret-down"></i></button>
              <ul class="templates dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li class="template-list"></li>
          </ul>
            </div>
        <button class="zoom-out btn pull-right toolbar"><i class="icon-zoom-out icon-large"></i></button>
      </div>
          <div id="favorite-viewer" class="viewer">
        <div class="papersheet-outer">
              <div class="papersheet-inner"></div>
            </div>
      </div>
        </div>
  </div>
    </div>
<div id="new-resume-window" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>New Resume</h4>
      </div>
          <div class="modal-body" style="min-height:1em">This is default resume template</div>
          <div class="modal-footer">
        <button class="btn btn-default back"><i class="icon-chevron-left"></i> Back</button>
        <button class="btn btn-close btn-default">Cancel</button>
        <button class="btn btn-primary create-resume">Create Resume</button>
        <button class="btn btn-primary next">Continue <i class="icon-chevron-right"></i></button>
      </div>
        </div>
  </div>
    </div>
<div id="edit-window" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
      <div id="edit-dialog" class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4 id="edit-window-title"></h4>
      </div>
          <div id="edit-window-body" class="modal-body edit-window-body"></div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Cancel</button>
        <button id="btn-save" class="btn btn-primary">Save Changes</button>
      </div>
        </div>
  </div>
    </div>
<div id="delete-section-confirm-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Delete Section</h4>
      </div>
          <div class="modal-body">
        <p>Do you really want to delete the <span id="section-name" style="font-weight:bold"></span> section?</p>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
        <button class="btn btn-danger delete">Delete Section</button>
      </div>
        </div>
  </div>
    </div>
<div id="delete-subsection-confirm-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Delete Subsection</h4>
      </div>
          <div class="modal-body">
        <p>Do you really want to delete the <span id="subsection-name" style="font-weight:bold"></span> subsection?</p>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
        <button class="btn btn-danger delete">Delete Subsection</button>
      </div>
        </div>
  </div>
    </div>
<div id="rename-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Edit Title</h4>
      </div>
          <div class="modal-body">
        <label for="section-title">Title</label>
        <input id="section-title" type="text" class="form-control" maxlength="100">
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Cancel</button>
        <button class="btn btn-primary save">Save Changes</button>
      </div>
        </div>
  </div>
    </div>
<div id="move-sections-window" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Move Sections</h4>
      </div>
          <div class="modal-body move-section-window-body">
        <div class="move-controls">
              <button class="btn btn-lg move-up"><i class="icon-chevron-up"></i></button>
              <button class="btn btn-lg move-down" style="margin-top:5px"><i class="icon-chevron-down"></i></button>
            </div>
        <p class="move-info"><b>Personal Information</b> and <b>Contact</b> have fixed positions in each template and cannot be moved. But you can move the sections below:</p>
        <div id="section-list"></div>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
        <button class="btn btn-primary save">Save Changes</button>
      </div>
        </div>
  </div>
    </div>
<div id="add-section-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Add Section</h4>
      </div>
          <div id="add-section-window-body" class="modal-body add-section-window-body">
        <p>Choose a section or write your own.</p>
        <label id="custom-title-label" class="radio category">
              <input id="custom-title-radio" type="radio" name="category" value="custom">
              <input id="custom-title-input" type="text" placeholder="Write your title here" style="min-width:15em;padding:3px" maxlength="100">
            </label>
        <div id="section-options"></div>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
        <button class="btn btn-primary add-selected-section">Add Section</button>
      </div>
        </div>
  </div>
    </div>
<div id="delete-user-resume-confirm-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Delete Resume</h4>
      </div>
          <div class="modal-body">
        <p>Do you really want to delete the <span id="user-resume-name" style="font-weight:bold"></span> resume?</p>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
        <button class="btn btn-danger delete">Delete Resume</button>
      </div>
        </div>
  </div>
    </div>
<div id="edit-label-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Edit Label</h4>
      </div>
          <div class="modal-body">
        <label for="inputLabel">Label</label>
        <input id="inputLabel" type="text" class="form-control" maxlength="30">
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Cancel</button>
        <button class="btn btn-primary save">Save Changes</button>
      </div>
        </div>
  </div>
    </div>
<div id="change-visibility-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Change Visibility</h4>
      </div>
          <div class="modal-body">
        <label class="checkbox">
              <input type="checkbox" id="isSampleCheckbox">
              <b>Allow this resume to be displayed in search results</b> </label>
        <div>Personal information is always hidden for privacy reasons.</div>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Cancel</button>
        <button class="btn btn-primary save">Save Changes</button>
      </div>
        </div>
  </div>
    </div>
<div id="import-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4>Import Resume</h4>
      </div>
          <div class="modal-body">
        <div id="x-upload-error" class="alert alert-danger" style="padding:.5em;color:#800;margin-bottom:.5em;display:none"></div>
        <p style="font-weight:bold;font-size:120%;margin-bottom:0">Import an existing resume from your computer</p>
        <p style="color:#555">Upload a DOC, DOCX, ODT, HTML, RTF or TXT file.</p>
        <div id="x-upload-l7" style="display:none"><i class="icon-spinner icon-spin icon-large"></i> Please wait...</div>
        <div id="x-upload-fields">
              <form id="x-upload-form" action="/create_resume$Upload.php" method="POST" enctype="multipart/form-data" target="x-uploadframe">
            <input id="x-fileInput" type="file" name="file">
            <input type="submit" value="Submit" id="x-upload-btn" style="position:absolute;top:-10000px">
          </form>
              <span id="x-filename" style="padding-left:1em;color:#275B83"></span> </div>
        <iframe id="x-uploadframe" name="x-uploadframe" style="position:absolute;top:-10000px"></iframe>
      </div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
      </div>
        </div>
  </div>
    </div>
<div id="message-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close btn-close" aria-hidden="true">&times;</button>
        <h4></h4>
      </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
        <button class="btn btn-close btn-default">Close</button>
      </div>
        </div>
  </div>
    </div>
<div id="savetoedit-window" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-body" style="padding:2em 3em 0;text-align:center;font-size:1.4em"> This sample resume will be copied to the "Edit" tab where you can modify it. </div>
          <div class="modal-footer" style="text-align:center;padding-bottom:2em">
        <button class="btn btn-close btn-primary" style="font-size:1.2em">Continue </button>
        <div agree=""> By clicking Continue, you agree to our <a href="#" target="_blank">Terms of Use</a> and <a href="#" target="_blank">Privacy Policy</a>. </div>
      </div>
        </div>
  </div>
    </div><div id="editor"></div>
<!--<script src="templates/jquery/jquery-1.10.2.min.js"></script> -->
<?php
include "footer.php";
?>
<!--<script src="templates/bootstrap3/js/bootstrap.min.js"></script> -->
<!--<script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 
<script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script> -->
<script>
        Product.d0 = function(extra, domain) {
            $(document).ready(function() {
                var s = '<ul class="nav">';
                if (extra) {
                    s += '<li>' + extra + '</li>';
                } else {
                    s += '<li><a href="/Resume_Services/Contact.php"></a></li>';
                }
                domain = domain ? 'http://' + domain : '';
                if (!Product.d7()) {
                    
                    var n = window.location.pathname;
                    n = n.search(/(Resumes|Account).jtp/) >= 0 ? "?nextUrl=" + encodeURIComponent(n) : '';
                    s += '<li><a href="#"></a></li>';
                    s += '<li><a href="#"></a></li>';
                }
                s += '<li><a href="#"></a></li>';
                if (Product.d7()) s += '<li><a href="#"></a></li>';
                s += '</ul>';
                $('#top-header').html(s);
                window.onerror = function(msg, url, line, col, obj) {
                    if (!url || navigator.userAgent.indexOf('MSIE 7') >= 0) return;
                    var err = msg;
                    err += ' | url=' + url;
                    if (url != window.location) err += ' | page=' + window.location;
                    err += ' | user=' + Product.userId;
                    err += ' | user-agent=' + navigator.userAgent;
                    err += ' | line=' + line;
                    if (col) err += ' | column=' + col;
                    if (obj && obj.stack) err += ' | stack=' + obj.stack;
                    $.get('/ErrorLog.php?err=' + encodeURIComponent(err));
                }
            });
        };
        Product.notice = function(s, wait, fade) {
            var $n = $('#notice');
            $n.html(s);
            var hw = $n.width() / 2;
            $n.css('margin-left', -hw + 'px');
            $n.show();
            if (wait && fade) setTimeout(function() {
                $n.fadeOut(fade);
            }, wait);
        };
    </script> 
<script src="templates/slider/js/bootstrap-slider.min.js"></script> 
<script src="templates/summernote/summernote.min.js"></script> 
<script src="templates/Viewer.php"></script> 
<script src="templates/Editor.php"></script> 
<script>
        var e22 = Viewer.create('#search-viewer');
        var favoriteViewer = Viewer.create('#favorite-viewer');
        var sampleViewer = Viewer.create('#samples-viewer');
		
		// vvv
		
        var e23 = Viewer.create('#resume-viewer');
        var resumeEditor = Editor.create(e23);
        var sampleCount = 0;
        var llA = {};
        var searchCount = 0;
        var lla = {};
        var e26 = 0;
        var Lla = {};
        var lFA = {};
        var favoriteCount = 0;
        var searchTemplate = Viewer.a15.T6;
        var favoriteTemplate = Viewer.a15.T6;
        var sampleTemplate = Viewer.a15.T6;
        var query = null;
        if (query != null) Product.ga("search");

        function msg(title, message, pre) {
            var a45 = $('#message-window');
            a45.find('h4').html(title);
            a45.find('div.modal-body').html(message).css('white-space', pre ? 'pre' : 'normal');

            function close() {
                a45.modal('hide');
            };
            $('button.btn-close', a45).unbind('click').click(close);
            a45.modal('show');
        };
        var e27 = 'Resume Limit Reached';
        var e28 = 'You have reached the maximum number of resumes for your account.';
        var e29 = 'Section Limit Reached';
        var e30 = 'You have reached the maximum number of sections for this resume.';
        var e31 = 'Subsection Limit Reached';
        var e32 = 'You have reached the maximum number of subsections for this section.';
        var e2 = null;

        function e1(a47) {
            if (e2) {
                a47.each(function() {
                    var $p = $(this);
                    var h = $p.html();
                    if (h.indexOf('<span class="highlight">') >= 0) return;
                    var h = h.replace(/&amp;/g, '&');
                    if (e2) h = h.replace(e2, '<span class="highlight">$1</span>');
                    $p.html(h);
                });
            }
        };

        function applyHighlighting() {
            var isChecked = $('#highlighting').is(':checked');
            var $spans = $('span.highlight');
            isChecked ? $spans.addClass('highlighted') : $spans.removeClass('highlighted');
        };

        function e3() {
            e1($('#search-viewer').find('p,li'));
            applyHighlighting();
        };

        function e0() {
            e1($('#search-list').find('div.jobtitle,div.snippet'));
            applyHighlighting();
        };

        function getResume(id, type) {
            var list = type == 'sample' ? llA : type == 'search' ? lla : type == 'user' ? Lla : lFA;
            return list[id];
        };

        function _getCurrent(scope) {
            return $(scope + ' div.selected-resume');
        };

        function oks() {
            return _getCurrent('#samples-list');
        };

        function getCurrentSearchResume() {
            return _getCurrent('#search-list');
        };

        function e4() {
            return _getCurrent('#user-resumes');
        };

        function gs4() {
            return _getCurrent('#favorites');
        };
//vvv
        function e5() {
            return e4().attr('data-id');
        };
//vvv
        function e6() {
            return '/Resume_Services/create_resume.php?resume=' + e5();
        };

        function _snipInfo(json) {
            var exp = null;
            for (var i = 0; i < json.blocks.length; i++) {
                if (json.blocks[i].category == 'experience') {
                    exp = json.blocks[i].children[0];
                    break;
                }
            }
            exp = exp || {};
            return {
                where: exp.where,
                title: json.person.jobTitle || exp.title,
                location: exp.location || json.person.location,
                dates: (exp.fromYear ? exp.fromYear + ' to ' + (exp.toYear ? exp.toYear : 'Now') : null)
            };
        };

        function snip(json) {
            var info = _snipInfo(json);
            var h = '';
            h = '<div class="jobtitle">' + (json.person.jobTitle || info.title) + '</div>';
            h += (json.person.location || info.location);
            return h;
        };

        function rp2(json) {
            json.person.firstName = 'Your';
            json.person.lastName = 'Name';
            json.contact = {
                html: 'your.email@example.com<br/>111-222-3333<br/>www.your-website.com'
            };
        };

        function se7(resume) {
            lla[resume.id] = resume;
            rp2(resume.json);
            var h = '<div id="search' + (++searchCount) + '" class="resume" data-id="' + resume.id + '" data-type="search">';
            h += '<a href="/Resume_Services/create_resume.php?resume=' + resume.id + '" class="fake" onclick="return false;">';
            h += '<table class="result"><tr>';
            h += '<td class="text-muted left">' + searchCount + '.</td>';
            h += '<td class="middle">';
            h += '<div class="snippet">';
            h += snip(resume.json);
            h += '</div>';
            h += '</td>';
            h += '<td class="right">';
            var icon = resume.starred ? ' starred' : '';
            h += '<i class="sample-star' + resume.id + icon + ' icon-star icon-2x star" title="' + (resume.starred ? 'Remove from' : 'Add to') + ' favorites"></i>';
            h += '</td>';
            h += '</table></a></div>';
            $('#search-list').append(h);
        };

        function addFavorite(resume) {
            rp2(resume.json);
            lFA[resume.id] = resume;
            resume.order = ++favoriteCount;
            var h = '<div id="favorite' + resume.id + '" class="resume resume' + resume.order + '" data-id="' + resume.id + '" data-type="favorite">';
            h += '<a href="/Resume_Services/create_resume.php?resume=' + resume.id + '" class="fake" onclick="return false;">';
            h += '<table class="result"><tr>';
            h += '<td class="muted left">' + resume.order + '.</td>';
            h += '<td class="middle">';
            h += '<div class="snippet">';
            h += snip(resume.json);
            h += '</div>';
            h += '</td>';
            h += '<td class="right">';
            h += '<i class="starred icon-star icon-2x star" title="Remove from favorites"></i>';
            h += '</td></table></a></div>';
            favoriteCount == 1 ? $('#favorites').html(h) : $('#favorites').append(h);
            e12('#favorite' + resume.id, '#favorites', favoriteViewer);
        };

        function removeFavorite(id) {
            if (lFA[id]) {
                delete lFA[id];
                $('i.sample-star' + id).removeClass('starred');
                $('#favorite' + id).remove();
                favoriteCount--;
            }
            favoriteViewer.data = null;
            refreshFavoriteResumes();
        };

        function refreshFavoriteResumes() {
            var id = gs4().attr('data-id');
            $('#favorites').html('');
            var list = lFA;
            lFA = {};
            favoriteCount = 0;
            var sorted = [];
            for (key in list) sorted.push(list[key]);
            sorted.sort(function(a, b) {
                return a.order - b.order
            });
            for (var i = 0; i < sorted.length; i++) {
                addFavorite(sorted[i]);
            }
            id ? $('#favorite' + id).click() : e18('#favorites');
            ef5(favoriteCount > 0);
        };

        function e8(resume, select) {
            Lla[resume.id] = resume;
            resume.order = ++e26;
            var h = '<div id="user-resume' + resume.id + '" class="resume resume' + resume.order + '" data-id="' + resume.id + '" data-type="user">';
            h += '<a href="/Resume_Services/create_resume.php?resume=' + resume.id + '" class="fake" onclick="return false;">';
            h += '<table class="result"><tr>';
            h += '<td class="muted left">' + resume.order + '.</td>';
            h += '<td class="middle">';
            h += '<div class="jobtitle">' + resume.json.person.firstName + ' ' + resume.json.person.lastName + '</div>';
            h += '<div class="snippet">';
            h += (resume.label ? resume.label : 'No Label');
            h += '</div>';
            h += '</td>';
            h += '<td class="right">';
            h += '<div class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="resume-cog"><i class="icon-cog icon-2x"></i> <i class="icon-caret-down"></i></a>';
            h += '<ul class="dropdown-menu pull-right resume-menu" role="menu">';
            h += '<li><a href="javascript:void(0)" onclick="e20(\'' + resume.id + '\')">Edit Label</a></li>';
            
            if (resume.isSample != null) h += '<li><a href="javascript:void(0)" id="sample' + resume.id + '" data-sample="' + resume.isSample + '" onclick="changeVisibility(\'' + resume.id + '\')">Change Visibility</a></li>';
            h += '<li><a href="javascript:void(0)" onclick="removeUserResume(\'' + resume.id + '\')">Delete</a></li>';
            h += '</ul></div></td></table></a></div>';
            $('#user-resumes').append(h);
            e12('#user-resume' + resume.id, '#user-resumes', e23);
            if (select) {
                $('#your-resumes').click();
                var zZz = $('#user-resume' + resume.id);
                zZz.click();
                zZz.get(0).scrollIntoView();
            }
        };

        function removeUserResume(id) {
            var a47 = $('#user-resume' + id);
            var a45 = $('#delete-user-resume-confirm-window');
            $('#user-resume-name').html(a47.find('div.jobtitle').text() + ' (' + a47.find('div.snippet').text() + ')');

            function close() {
                a45.modal('hide');
            };

            function e9() {
                if (Lla[id]) {
                    delete Lla[id];
                    e26--;
                }
                e23.data = null;
                p_a({
                    id: id,
                    action: 'delete'
                });
                e19();
                e18('#user-resumes');
                close();
            };
            $('button.btn-close', a45).unbind('click').click(close);
            $('button.delete', a45).unbind('click').click(e9);
            a45.modal('show');
        };

        function e19(newId) {
            var id = e4().attr('data-id');
            id = newId ? newId : id;
            $('#user-resumes').html('');
            var list = Lla;
            Lla = {};
            e26 = 0;
            var sorted = [];
            for (key in list) sorted.push(list[key]);
            sorted.sort(function(a, b) {
                return a.order - b.order
            });
            for (var i = 0; i < sorted.length; i++) {
                e8(sorted[i]);
            }
            $('#user-resume' + id).click();
            enableResumeViewer(e26 > 0);
        };

        function e18(scope) {
            $(scope + ' div.resume:first').click();
        };

        function e12(selector, scopeSelector, viewer) {
            $(selector).each(function() {
                var _T = $(this);
                if (_T.attr('done')) return;
                var id = _T.attr('data-id');
                var type = _T.attr('data-type');
                var resume = getResume(id, type);
                _T.click(function() {
                    $(scopeSelector + ' div.selected-resume').removeClass('selected-resume');
                    _T.removeClass('hover-resume');
                    _T.addClass('selected-resume');
                    viewer.ready = false;
                    viewer.data = resume.json;
                    viewer.setFormatting(resume.formatting ? resume.formatting : Viewer.df0);
                    viewer.setTemplate(resume.template ? Viewer.a15[resume.template] : type == 'sample' ? sampleTemplate : type == 'search' ? searchTemplate : favoriteTemplate);
                    viewer.ready = true;
                    type == 'user' && enableResumeViewer(true);
                    type == 'favorite' && ef5(true);
                    viewer.aza();
                    viewer.a0();
                    viewer.update();
                    viewer.a1();
                    viewer.a54.scrollTop(0);
                    if (type == 'search') {
                        e3();
                        $.get('/create_resume$Viewed.php');
                    }
                });
                _T.hover(function() {
                    if (!_T.hasClass('selected-resume')) _T.addClass('hover-resume');
                }, function() {
                    _T.removeClass('hover-resume');
                });
                if (type == 'search' || type == 'sample') {
                    var $star = _T.find('i.star');
                    $star.click(function() {
                        var starred = $star.hasClass('starred');
                        starred ? $star.removeClass('starred').attr('title', 'Add to favorites') : $star.addClass('starred').attr('title', 'Remove from favorites');
                        $.get('/create_resume$Star.php?resume=' + id + '&action=' + (starred ? 'unstar' : 'star'), function() {
                            if (starred) {
                                removeFavorite(id);
                                Product.ga("unstarred");
                            } else {
                                addFavorite(resume);
                                Product.ga("starred");
                            }
                        });
                    });
                    $star.hover(function() {
                        $star.addClass('hover');
                    }, function() {
                        $star.removeClass('hover');
                    });
                } else if (type == 'favorite') {
                    var $star = _T.find('i.star');
                    $star.click(function() {
                        $.get('/create_resume$Star.php?resume=' + id + '&action=unstar', function() {
                            removeFavorite(id);
                        });
                    });
                }
                _T.attr('done', true);
            });
        };
        var _ww = false;

        function Pia(l7, selector) {
            _ww = l7;
            $('#l7').remove();
            if (l7) {
                var h = '<div id="l7"><i class="icon-spinner icon-spin icon-large"></i></div>';
                $(selector).append(h);
            }
        };
        var hms = true;

        function ws8() {
            var $leftInner = $('#search-left-inner');
            var pos = $leftInner.scrollTop() + $leftInner.height();
            var h = $('#search-list').height();
            if (h - pos < 400 && !_ww && hms) {
                loadMoreSearchResults();
            }
        };

        function loadMoreSearchResults(a44) {
            if (!query) {
                e21();
                return;
            }
            Pia(true, '#search-list');
            var url = '/create_resume$SearchJs.php?query=' + encodeURIComponent(query) + '&i=' + searchCount;
            $.get(url, function(data) {
                eval(data);
                e12('#search-list div.resume', '#search-list', e22);
                Pia(false);
                a44 && a44();
            });
        };

        function lf2(a44) {
            var url = '/create_resume$Favorites.php?';
            $.get(url, function(data) {
                eval(data);
                a44 && a44();
            });
        };
		<?php

$stmtje=$db->prepare("SELECT * FROM js_educational_information WHERE job_seeker_id ='".$_SESSION['Job_Seeker_Id']."'");
$stmtje->execute();
	
$row_js=$stmtje->fetch(PDO::FETCH_ASSOC); ?>
		<?php
		

		$stmtje = $db->prepare("SELECT * FROM job_seeker AS a  
		JOIN js_work_experience AS b
		ON a.Job_Seeker_Id=b.Job_Seeker_Id  
		 
		WHERE a.Job_Seeker_Id='".$_SESSION['Job_Seeker_Id']."'");		
		$stmtje->execute();		

		while($row=$stmtje->fetch(PDO::FETCH_ASSOC))
			{
				//$row1 = split('-',$row['Start_date']);
				//$row2 = split('-',$row['End_date']);
?>
			var defaultJson = {
            contact: {
                html: '<?php echo $row['Email_id']; ?><br/><?php echo $row['Phone_No']; ?>'
            },
            blocks: [{
                category: 'text',
                title: 'Summary',
                html: 'List here your top selling points, including your most relevant strengths, skills and core competencies.'
            } 
		
<?php
$lang=$db->query("select * from js_work_experience where Job_Seeker_Id='$_SESSION[Job_Seeker_Id]'");
if($lang->rowCount()!=0){
?> ,{
                category: 'experience',
                title: 'Work Experience',
                children: [
    /**experience Get from dynamic**/ 
    <?php   while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){ ?>
            {
                    title: '<?php echo $rec_j['Job_Title']; ?> ',
                    where: '<?php echo $rec_j['Company_Name']; ?> ',
                    location: '<?php echo $rec_j['Location']; ?>',
                    fromMonth: '',
                    fromYear: '<?php echo $rec_j['Start_date']; ?>',
                    toMonth: '',
                    toYear: '<?php echo $rec_j['End_date']; ?>',
                    html: 'Describe your job responsibilities, accomplishments and technologies you have used. It is highly recommended that you use bullet points to describe your experience.'
                },  
                        <?php } ?>
                ]
             }
<?php } ?>				

<?php
$lang=$db->query("select * from js_educational_information where job_seeker_id='$_SESSION[Job_Seeker_Id]'");
if($lang->rowCount()!=0){
?>				
            ,{
                category: 'education',
                title: 'Education',
                children: [
 <?php  while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){  ?>
            {
                    title: '<?php echo $rec_j['js_qualification_name']; ?>',
                    where: '<?php echo $rec_j['js_institution_name']; ?>',
                    location: '<?php echo $rec_j['js_education_location']; ?>',
                    fromYear: '<?php echo $rec_j['js_start_date']; ?>',
                    toYear: '<?php echo $rec_j['js_end_date']; ?>'
                },
            <?php } ?>
                ]
            }
<?php } ?>            
            
            
            ,{
                category: 'text',
                title: 'Additional Information',
                html: 'Include other relevant information that employers should know about. This may include activities, experiences and interests that you have that relate to the position you are trying to get.'
            }]
        };
		
			<?php 
			}

	  ?>
        var templateName = 'T1';

        function addNewResume() {
            if (e26 >= 50) {
                msg(e27, e28);
                return;
            }
            var a45 = $('#new-resume-window');
            var $mbody = $('div.modal-body', a45);
            var _t = {};
            _t.tplStart = $('#tpl_start').html();
            _t.tplCreate = $('#tpl_person').html();
            _t.validate = function(field) {
                var $field = $(field);
                if ($field.val().replace(/^\s+|\s+$/g, '') == '') {
                    $field.css('border-color', 'red').focus();
                    return false;
                }
                $field.css('border-color', 'lightgray');
                return true;
            };
            _t.close = function() {
                a45.modal('hide');
            };
            _t.save = function() {
               // if (!_t.validate('#firstName') || !_t.validate('#lastName') || !_t.validate('#jobTitle')) return;
                var json = jQuery.extend(true, {}, defaultJson);
                json.person = {};
                json.person.category = "person";
                json.person.firstName = $('#firstName').val();
                json.person.lastName = $('#lastName').val();
                json.person.jobTitle = $('#jobTitle').val();
                json.person.location = $('#location').val();
                var resume = {
                    id: '_' + new Date().getTime(),
                    template: templateName,
                    formatting: jQuery.extend(true, {}, Viewer.df0),
                    json: json
                };
                e8(resume, true);
                _t.close();
                $mbody.html('');
                e13();
            };
            _t.start = function() {
                $mbody.html(_t.tplStart);
                _t.updateBtn(0);
                var $file = $('#fileInput');
                $file.attr('disabled', 'true');
                $('#radio-create').unbind().click(function() {
                    $file.attr('disabled', 'true');
                });
                $('#radio-import').unbind().click(function() {
                    $file.removeAttr('disabled');
                });
                $file.on('change', function() {
                    $('#upload-error').html('');
                });
            };
            var $btnBack = $('button.back', a45);
            var $btnNext = $('button.next', a45);
            var $btnClose = $('button.btn-close', a45);
            var $btnCreate = $('button.create-resume', a45);
            _t.next = function() {
                var isImport = $('#radio-import').is(':checked');
                if (isImport) {
                    if ($('#fileInput').val()) {
                        $('#upload-l7').show();
                        $('#upload-fields').hide();
                        $btnNext.attr('disabled', 'true');
                        window._finishUpload = function(o) {
                            if (typeof o == 'string') {
                                $('#upload-l7').hide();
                                $('#upload-fields').show();
                                $('#upload-error').html(o);
                                $btnNext.removeAttr('disabled');
                            } else {
                                var resume = {
                                    id: '_' + new Date().getTime(),
                                    template: templateName,
                                    formatting: jQuery.extend(true, {}, Viewer.df0),
                                    json: o,
                                    label: 'Imported'
                                };
                                e8(resume, true);
                                _t.close();
                                $mbody.html('');
                                e13();
                            }
                            window._finishUpload = null;
                        };
                        $('#upload-form').submit();
                    } else {
                        $('#upload-error').html('Please choose a file on your computer.');
                    }
                } else {
                    $mbody.html(_t.tplCreate);
                    _t.updateBtn(1);
                    $('#firstName').focus();
                }
            };
            _t.updateBtn = function(level) {
                if (level == 0) {
                    $btnBack.hide();
                    $btnNext.show();
                    $btnClose.show();
                    $btnCreate.hide();
                } else {
                    $btnBack.show();
                    $btnNext.hide();
                    $btnClose.hide();
                    $btnCreate.show();
                }
            };
            _t.start();
            $btnBack.unbind().click(_t.start);
            $btnNext.unbind().click(_t.next);
            $btnClose.unbind().click(_t.close);
            $btnCreate.unbind().click(_t.save);
            $btnNext.removeAttr('disabled');
            a45.modal('show');
        };

        function e20(resumeId) {
            var resume = getResume(resumeId, 'user');
            var a45 = $('#edit-label-window');
            var $inputLabel = $('#inputLabel');
            $('button.save', a45).unbind().click(function() {
                var label = $inputLabel.val();
                $.get('/create_resume$SetLabel.php?resume=' + resumeId + '&label=' + label, function(data) {
                    if (data == 'done') {
                        resume.label = label;
                        e19();
                        a45.modal('hide');
                    }
                });
            });
            $('button.btn-close', a45).unbind().click(function() {
                a45.modal('hide');
            });
            a45.on('shown.bs.modal', function() {
                $inputLabel.focus();
            });
            $inputLabel.val(resume.label);
            a45.modal('show');
        };

        function e17(resumeId) {
            if (e26 >= 50) {
                msg(e27, e28);
                return;
            }
            var resume = getResume(resumeId, 'user');
            var clone = jQuery.extend(true, {}, resume);
            clone.id = '_' + new Date().getTime();
            clone.parentId = resume.id;
            clone.action = 'update';
            clone.label = 'Duplicate';
            clone.htmlBody = e23.getBodyHtml();
            clone.htmlCss = e23.a18.a14(false);
            e8(clone, true);
            p_a(clone);
        };

        function changeVisibility(resumeId) {
            var a45 = $('#change-visibility-window');
            var $ddOption = $('#sample' + resumeId);
            var isSample = $ddOption.attr('data-sample') == 'true';
            $('button.save', a45).unbind().click(function() {
                var _isSample = $('#isSampleCheckbox').is(':checked');
                $.get('/create_resume$SetSample.php?resume=' + resumeId + '&sample=' + _isSample, function(data) {
                    if (data == 'done') {
                        $ddOption.attr('data-sample', _isSample);
                        a45.modal('hide');
                    }
                });
            });
            $('button.btn-close', a45).unbind().click(function() {
                a45.modal('hide');
            });

            function prepare() {
                $('#isSampleCheckbox').prop('checked', isSample);
            };
            prepare();
            a45.modal('show');
        };

        function tWs(zZz) {
            var id = zZz.attr('data-id');
            var type = zZz.attr('data-type');
            var isSearch = type == 'search';
            var isSample = type == 'sample';
            var isFavorite = type == 'favorite';
            var isNew = isSearch || isSample || isFavorite;
            var viewer = isSample ? sampleViewer : isSearch ? e22 : isFavorite ? favoriteViewer : e23;
            var resume = isNew ? {
                id: '_' + new Date().getTime(),
                parentId: id
            } : getResume(id, type);
            resume.label = isNew ? null : resume.label;
            resume.template = viewer.a18.name;
            resume.formatting = jQuery.extend(true, {}, viewer.formatting);
            resume.json = jQuery.extend(true, {}, viewer.data);
            resume.htmlBody = viewer.getBodyHtml();
            resume.htmlCss = viewer.a18.a14(false);
            resume.action = 'update';
            isNew && (resume.type = 'sample');
            isNew ? e8(resume, true) : e19();
            p_a(resume);
        };

        function saveToEdit(a44) {
            if (e26 == 0) {
                var a45 = $('#savetoedit-window');
                $('button.btn-close', a45).unbind().click(function() {
                    a44();
                    a45.modal('hide');
                });
                a45.modal('show');
            } else a44();
        };

        function saveSample() {
            if (e26 >= 50) {
                msg(e27, e28);
                return;
            }
            saveToEdit(function() {
                Product.ga("saved sample");
                tWs(oks());
            });
        };

        function pQW() {
            if (e26 >= 50) {
                msg(e27, e28);
                return;
            }
            saveToEdit(function() {
                Product.ga("saved sample");
                tWs(getCurrentSearchResume());
            });
        };

        function sf11() {
            if (e26 >= 50) {
                msg(e27, e28);
                return;
            }
            saveToEdit(function() {
                Product.ga("saved favorite");
                tWs(gs4());
            });
        };

        function e13() {
            Product.ga("saved editing");
            tWs(e4());
        };
        var isSaving = false;

        function setSaving(v) {
            isSaving = v;
            var $s = $('#saving-icon');
            if (v) $s.show();
            else $s.hide();
        };
        var e11 = [];

        function p_a(resume) {
            if (!resume.action) return;
            setSaving(true);
			//vvv
            var url = '/create_resume$Save.php';

            function fail() {
                setSaving(false);
                if (resume.action == 'delete') e11.push(resume);
            };

            function done(data) {
                eval(data);
                resume.action = null;
                setSaving(false);
            };
            if (resume.action == 'update') {
                data = {
                    action: 'update',
                    id: resume.id,
                    parentId: resume.parentId,
                    label: resume.label,
                    formatting: JSON.stringify(resume.formatting, null, 2),
                    json: JSON.stringify(resume.json, null, 2),
                    template: resume.template,
                    htmlBody: resume.htmlBody,
                    htmlCss: resume.htmlCss,
                    type: resume.type
                };
                $.post(url, data).fail(fail).done(done);
            } else if (resume.action == 'delete') {
                $.get(url + '?action=delete&id=' + resume.id).fail(fail).done(done);
            }
        };

        function e15() {
            setInterval(function() {
                if (isSaving) return;
                for (key in Lla) {
                    var r = Lla[key];
                    if (r.action) {
                        p_a(r);
                    }
                }
                var deleteList = e11;
                e11 = [];
                for (var i = 0; i < deleteList.length; i++) {
                    var r = deleteList[i];
                    p_a(r);
                }
            }, 2500);
        };

        function minWidthEdit(v) {
            $('#edit-dialog').css('width', window.innerWidth >= v ? v + 'px' : '100%');
        };

        function richText(style, height) {
            var $html = $('#html');
            window.updateChars = function() {};
            var $btnSave = $('#btn-save');
            $btnSave.removeAttr('disabled');
            $html.unbind();
            $html.summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['para', ['ul', 'ol', 'outdent', 'indent']],
                    ['align', ['alignL', 'alignR', 'alignC', 'justify']]
                ],
                oninit: function() {
                    var _T = $html.next();
                    style && _T.css(style);
                    var $text = $html.next().find('div.note-editable');
                    height && $text.css({
                        height: height
                    });
                    $text.attr('id', 'html');
                    $text.mouseup(function() {
                        setTimeout(function() {
                            $text.focus();
                        }, 50);
                    });
                    var _max = $html.attr('maxlength');
                    if (_max) {
                        var _zad = parseInt(_max);
                        $text.after('<div class="chars font-sans"></div>');
                        var $chars = $text.next();
                        if (_max.indexOf('|right') > 0) $chars.css('text-align', 'right');
                        window.updateChars = function() {
                            var size = $text.text().length;
                            var info = size + ' / ' + _zad;
                            if (size > _zad) {
                                $chars.addClass('red');
                                info += ' - limit exceeded';
                                $btnSave.attr('disabled', 'true');
                            } else {
                                $chars.removeClass('red');
                                $btnSave.removeAttr('disabled');
                            }
                            $chars.html('<span class="chars-inner">' + info + '<span>');
                        };
                        $text.keyup(window.updateChars);
                        $text.keydown(window.updateChars);
                        window.updateChars();
                    }
                },
                onChange: function() {
                    window.updateChars();
                },
                onpaste: function() {
                    var $text = $html.next().find('div.note-editable');
                    setTimeout(function() {
                        $text.find('*').each(function() {
                            var _T = $(this);
                            _T.removeAttr('id');
                            _T.removeClass();
                            var _name = this.nodeName.toLowerCase();
                            if (_name == 'blockquote') return;
                            else if (_name.match(/button|input|textarea|img|select|form|script|col|colgroup/)) {
                                $(this).remove();
                                return;
                            }
                            var style = _T.attr('style');
                            if (style) {
                                var _style = '';
                                var parts = style.split(';');
                                for (var i = 0; i < parts.length; i++) {
                                    var part = parts[i].trim().toLowerCase();
                                    if (part != '' && part.search(/(font-weight|font-style|text-decoration|text-align):/) >= 0) {
                                        _style += part + ';';
                                    }
                                }
                                _T.attr('style', _style);
                            }
                        });
                        $('font', $text).removeAttr('color').removeAttr('size').removeAttr('face');
                        window.updateChars();
                    }, 5);
                }
            });
        };

        function experienceForm() {
            function monthChanged(m, y) {
                var $year = $(y);
                if ($(m).val() == 'Current') $year.val('').addClass('disabled').attr('disabled', true);
                else $year.removeClass('disabled').removeAttr('disabled', true);
            };
            $('#fromMonth').change(function() {
                monthChanged(this, '#fromYear');
            }).change();
            $('#toMonth').change(function() {
                monthChanged(this, '#toYear');
            }).change();
        };

        function e25() {
            var h = $(window).height() - 5;
            var tabh = $('#tabs').outerHeight();
            $('div.left,div.right').height((h - tabh) + 'px');
            var rli = $('#resume-left-inner');
            rli.height((h - rli.offset().top) + 'px');
            var rth = $('#resume-toolbar').outerHeight();
            //$('#resume-viewer').height((h - tabh - rth) + 'px');
			$('#resume-viewer').height('1000px');
            var sli = $('#search-left-inner');
            sli.height((h - sli.offset().top) + 'px');
            var $sToolbar = $('#search-toolbar');
            var sth = $sToolbar.outerHeight();
            $('#search-viewer').height((h - tabh - sth) + 'px');
            var qw = $('#search-left').width() - $('button.search').outerWidth() - 50;
            $('#query').width(qw + 'px');
            var Rod = $('button.save', $sToolbar);
            var left = $sToolbar.offset().left + $sToolbar.outerWidth() * 0.5 - Rod.outerWidth() * 0.5;
            Rod.css('left', left + 'px');
            var $fToolbar = $('#favorite-toolbar');
            var fth = $fToolbar.outerHeight();
            $('#favorite-viewer').height((h - tabh - fth) + 'px');
            var $sf11Btn = $('button.save', $fToolbar);
            var left = $fToolbar.offset().left + $fToolbar.outerWidth() * 0.5 - $sf11Btn.outerWidth() * 0.5;
            $sf11Btn.css('left', left + 'px');
        };

        function enableViewer(vselector, tbselector, enabled) {
            var $p = $(vselector + ' div.papersheet-outer');
            var $b = $(tbselector + ' button');
            if (enabled) {
                $p.show();
                $b.removeAttr('disabled');
            } else {
                $p.hide();
                $b.attr('disabled', true);
            }
        };

        function enableResumeViewer(enabled) {
            enableViewer('#resume-viewer', '#resume-toolbar', enabled);
        };

        function ef5(enabled) {
            enableViewer('#favorite-viewer', '#favorite-toolbar', enabled);
            if (favoriteCount == 0) {
                $('#favorites').html('<div style="margin:1em"><div class="bold">You don\'t have any favorite resume.</div>If you want to add a favorite resume, go to the <i>Search</i> tab above and search for sample resumes. Then click on the star icon next to them.</div>');
            }
        };

        function e21() {
            $('#search-viewer div.papersheet-outer').hide();
            $('#search-toolbar button,#search-toolbar input').attr('disabled', true);
        };

        function e14(a44) {
            a44 && a44();
        };
        var waiting = null;
//vvv
        function e24(elem, a44) {
            if (waiting && waiting != elem) return;
            else if (isSaving || e5().indexOf('_') == 0) {
                waiting = elem;
                $(elem).css('cursor', 'wait');
                setTimeout(function() {
                    e24(elem, a44);
                }, 250);
            } else {
                $(elem).css('cursor', 'pointer');
                waiting = null;
                a44();
            }
        };
        var _l7 = '<div id="l7"><i class="icon-spinner icon-spin icon-large"></i></div>';

        function copy(v) {
            $('div.note-editable').append('<ul><li>' + v + '</li></ul>');
            window.updateChars && window.updateChars();
            Product.ga("copy snippet");
        };
        var defaultTitle = /^(.*Job Title|Degree|Your Degree, Your Field)$/;

        function loadSnippets(fixedCat) {
            var a45 = $('#edit-window');
            var s1p = $('div.inline-snippets', a45);
            var $title = $('#title', a45);
            var $input = $('input.snippet-search', a45);
            var $button = $('button.snippet-search', a45);
            var autoSearch = fixedCat;
            var q = !autoSearch || $title.val().match(defaultTitle) ? e23.data.person.jobTitle : $title.val();
            fixedCat = fixedCat || $title.val();
            var i = 0;
            var _ww = false;
            var hmS = true;
            s1p.html('');
            $input.val(q);

            function go(_cat, _q, _i) {
                _ww = true;
                s1p.append(_l7);
                $.get('/create_resume$SnippetJs.php?a=1&h=1&query=' + encodeURIComponent(_q) + '&category=' + encodeURIComponent(_cat) + '&i=' + _i, function(data) {
                    $('#l7').remove();
                    s1p.append(data);
                    hmS = data.indexOf('<div class="snippet-text">') >= 0;
                    _ww = false;
                    $('div.snippet-text', s1p).each(function() {
                        var _t = $(this);
                        if (_t.attr('done')) return;
                        _t.hover(function() {
                            $('#btncopy').remove();
                            var txt = _t.text().replace(/(['"])/g, '\\$1');
                            _t.before('<button id="btncopy" onclick="copy(\'' + txt + '\')"><span class="icon-chevron-left"></span></button>');
                            var $b = $('#btncopy');
                            var mtop = _t.outerHeight() / 2 - $b.outerHeight() / 2;
                            $b.css('margin-top', mtop + 'px');
                        }, function() {});
                        _t.attr('done', 1);
                    });
                });
            };
            s1p.unbind().scroll(function() {
                var diff = s1p.get(0).scrollHeight - s1p.scrollTop();
                if (diff < 1000 && !_ww && hmS) {
                    i += 60;
                    go(fixedCat, q, i);
                }
            });

            function _search() {
                s1p.html('');
                i = 0;
                q = $input.val() == '' ? q : $input.val();
                hmS = true;
                go(fixedCat, q, i);
            };
            $input.unbind().keypress(function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    _search();
                }
            });
            $button.click(_search);
            if (autoSearch) {
                $title.change(function() {
                    s1p.html('');
                    q = $title.val() || q;
                    $input.val(q);
                    i = 0;
                    go(fixedCat, q, i);
                });
            }
            go(fixedCat, q, i);
        };
        $(document).ready(function() {
            var _generated = 1468643011238;
            var _last = Product.d3("last");
            if (_last && _last > _generated) {
                window.location.reload(true);
                return;
            }
            Product.d0('<a href="#"></a>');
            e25();
            e22.init();
            favoriteViewer.init();
            sampleViewer.init();
            e23.init();
            resumeEditor.init();
            $('#resume-toolbar button.import').click(function() {
                var a45 = $('#import-window');
                var _t = {};
                _t.close = function() {
                    a45.modal('hide');
                };
                _t.reset = function() {
                    $('#x-fileInput').val(null);
                    $('#x-upload-error').html('').hide();
                    $('#x-upload-fields').show();
                    $('#x-upload-l7').hide();
                };
                _t.start = function() {
                    var $file = $('#x-fileInput');
                    $file.on('change', function() {
                        var name = $file.val().replace(/^c:\\fakepath\\/i, '');
                        $('#x-upload-error').html('').hide();
                        $('#x-upload-fields').hide();
                        $('#x-upload-l7').show();
                        window._finishUpload = function(o) {
                            if (typeof o == 'string') {
                                $('#x-upload-l7').hide();
                                $('#x-upload-fields').show();
                                $('#x-upload-error').html(o).show();
                            } else {
                                var resume = {
                                    id: '_' + new Date().getTime(),
                                    template: templateName,
                                    formatting: jQuery.extend(true, {}, Viewer.df0),
                                    json: o,
                                    label: 'Imported'
                                };
                                e8(resume, true);
                                _t.close();
                                e13();
                            }
                            window._finishUpload = null;
                        };
                        $('#x-upload-form').submit();
                    });
                };
                _t.reset();
                _t.start();
                $('button.btn-close', a45).unbind().click(_t.close);
                a45.modal('show');
            });
            $('#add-new-btn').click(addNewResume);
            $('#search-toolbar button.zoom-in').click(e22.d0);
            $('#search-toolbar button.zoom-out').click(e22.e0);
            $('#search-toolbar button.save').click(pQW);
            $('#favorite-toolbar button.zoom-in').click(favoriteViewer.d0);
            $('#favorite-toolbar button.zoom-out').click(favoriteViewer.e0);
            $('#favorite-toolbar button.save').click(sf11);
            $('#resume-toolbar button.zoom-in').click(e23.d0);
            $('#resume-toolbar button.zoom-out').click(e23.e0);
            $('#resume-toolbar button.print').click(function() {
                e24(this, function() {
                    e23.print(e5(), e6());
                });
            });
            $('a.download-html').click(function() {
                e24(this, function() {
                    e23.html(e5(), e6());
                });
            });
            $('a.download-doc').click(function() {
                e24(this, function() {
                    e23.doc(e5(), e6());
                });
            });
			//vvv
            $('a.download-pdf').click(function() {
                (this, function() {
                    pdf(e5(), e6());
                });
            });

            function delayedUpdate() {
                var $c = e4();
                var type = $c.attr('data-type');
                var id = $c.attr('data-id');
                var resume = getResume(id, type);
                resume.template = e23.a18.name;
                resume.formatting = jQuery.extend(true, {}, e23.formatting);
                resume.htmlBody = e23.getBodyHtml();
                resume.htmlCss = e23.a18.a14(false);
                resume.action = 'update';
            };
            Viewer.a11('div.samples-template-dropdown', sampleViewer, function(t) {
                sampleTemplate = t;
            });
            Viewer.a11('div.search-template-dropdown', e22, function(t) {
                searchTemplate = t;
            });
            Viewer.a11('div.favorite-template-dropdown', favoriteViewer, function(t) {
                favoriteTemplate = t;
            });
            Viewer.a11('div.template-dropdown', e23, function() {
                delayedUpdate();
            });
            Viewer.a9('#resume-toolbar button.formatting', e23, function() {
                delayedUpdate();
            });
            Editor.windows.editSection(resumeEditor, function(size) {
                if (size >= 10) {
                    msg(e31, e32);
                    return true;
                }
                return false;
            });
            Editor.windows.a36(resumeEditor);
            Editor.windows.RE0(resumeEditor);
            Editor.windows.renameSection(resumeEditor);
            Editor.windows.moveSections(resumeEditor);
            Editor.windows.addSection(resumeEditor, function(size) {
                if (size >= 10) {
                    msg(e29, e30);
                    return true;
                }
                return false;
            });
            resumeEditor.a30 = e13;
            e22.setTemplate(searchTemplate);
            e22.ready = true;
            favoriteViewer.setTemplate(favoriteTemplate);
            favoriteViewer.ready = true;
            sampleViewer.setTemplate(sampleTemplate);
            sampleViewer.ready = true;
			//vvv	
		    e23.ready = true;
            resumeEditor.ready = true;
            $(window).resize(e25).load(e25);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function() {
                e25();
                e22.a1();
                e22.aza();
                e23.a1();
                e23.aza();
                favoriteViewer.a1();
                favoriteViewer.aza();
                sampleViewer.a1();
                sampleViewer.aza();
            });
            ef5(false);
            lf2(function() {
                e18('#favorites');
            });
            $('#search-left-inner').scroll(ws8);
            loadMoreSearchResults(function() {
                e18('#search-list');
            });
            enableResumeViewer(false);
            e14(function() {
                e18('#user-resumes');
            });
            e15();
            if (location.hash == '#new') addNewResume();
            $('#highlighting').change(applyHighlighting);
        });
		
	
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    
	





    </script><div id="export-content">
<?php //include 'actionpdf.php'; 

?>
</div>

<!--<script type="text/javascript" src="assets/FileSaver.js"></script>
<script type="text/javascript" src="assets/html2canvas.js"></script><script type="text/javascript" src="assets/html2canvas.min.js"></script>	<script type="text/javascript" src="assets/from_html.js"></script>	

<script type="text/javascript" src="assets/split_text_to_size.js"></script>	
<script type="text/javascript" src="assets/standard_fonts_metrics.js"></script>	-->
<script>
//$(document).ready(function($) { 
//$("a.download-doc").click(function() { 
//$("#resume").wordExport();
//
//
//});
 
   

    $('.pdf').click(function () { 
        
      var pdf = new jsPDF('P','pt','letter');
 //alert($(window).height());
 //alert($('#resume').html());
     pdf.addHTML($('#resume'),0,0,{pagesplit:true},function() {
            pdf.save('resume.pdf');
        });
    });
</script>

