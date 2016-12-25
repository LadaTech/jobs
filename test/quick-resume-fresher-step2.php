<!DOCTYPE html>
<html>
	<head>
		<title>Jatja</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/custom.css">
		<link rel="stylesheet" type="text/css" href="./css/responsive.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<style>
		.navbar-nav>li {
			padding-bottom: 20px;
		}
	</style>
	<body class="homepage">
			<header id="header">
				<div class="top-bar">
					<div class="container">
						<div class="col-sm-6 col-xs-4">
						</div>
						<div class="col-sm-6 col-xs-8">
							<div class="pull-right">
								<ul class="account_menu">
									<li style="margin-right:0px;"> 
										<i class="fa fa-user"></i> Welcome
										<a><b>Dinesh</b></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<nav class="navbar navbar-inverse" role="banner">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="http://jatka.in/test/job-seeker/dashboard.aspx"><img src="http://jatka.in/test/images/logo_js.png" alt="logo"></a>
						</div>
						<div class="collapse navbar-collapse navbar-right">
							<ul class="nav navbar-nav">
								<li><a href="../pages/dashboard.html">Dashboard</a></li>
								<li class="active"><a href="../pages/quick-resume.html">Rusems</a></li>
								<li><a href="../pages/create-formate.html">Create Formate</a></li>
								<li><a href="../pages/jobseekers-list.html">Jobseekers List</a></li>
								<li><a href="../pages/positions.html">Positions</a></li>
								<li><a href="../pages/edit-profile.html">Chat</a></li>
								<li><a>Settings</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</header>
			<section class="inner_page_info">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-sm-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div id="quick-resume">
										<h1 class="heading">Quick Resume</h1>
										<form>
											<h2 class="text-primary" style="margin-top: -7px;font-weight: 400;">Personal Details</h2> 
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="first-name">First Name</label>
														<input class="form-control" type="first-name" name="first-name" placeholder="Dinesh" disabled>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="first-name">Last Name</label>
														<input class="form-control" type="first-name" name="first-name" placeholder="Yagnti" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="first-name">Email</label>
														<input class="form-control" type="first-name" name="first-name" placeholder="Email" disabled>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="first-name">Contact Number</label>
														<input class="form-control" type="first-name" name="first-name" placeholder="9676537345" disabled>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="first-name">Industry</label>
														<select class="form-control">
															<option>Select Industry</option>
															<option>IT Software</option>
															<option>IT Software</option>
														</select>
													</div>
												</div>
												<div class="col-md-6" class="form-control">
													<div class="form-group">
														<label for="first-name">Domain</label>
														<select class="form-control">
															<option>Select Domain</option>
															<option>Networking</option>
														</select>
													</div>
												</div>
											</div>
											<div class="form-group">
			    								<label for="exampleInputEmail1">Residence Address</label>
			    								<textarea class="form-control" rows="2"></textarea>
			  								</div>
			  								<div class="form-group">
			    								<label for="exampleInputEmail1">What you are expecting from the company?</label>
			    								<textarea class="form-control" rows="2"></textarea>
			    								<span>
			    									<ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
			    										<li>1. Screen readers will have trouble with your forms if you don't include</li>
			    										<li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
			    										<li>3. as a replacement for other labelling methods is not advised.</li>
			    									</ul>
			    								</span>
			  								</div>
			  								<div class="form-group">
			    								<label for="exampleInputEmail1">Any Offers In Hand? – If Yes - Please mention the details why you are still looking out for a change?</label>
			    								<textarea class="form-control" rows="2"></textarea>
			    								<span>
			    									<ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
			    										<li>1. Screen readers will have trouble with your forms if you don't include</li>
			    										<li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
			    										<li>3. as a replacement for other labelling methods is not advised.</li>
			    									</ul>
			    								</span>
			  								</div>
			  								<div align="center" class="form-group">
			  									<a href="quick-resume-fresher-step1.php" class="btn btn-default-custom open2">Back</a>
			  									<a href="" class="btn btn-primary open2">Submit</a>
			  								</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-12">
						</div>
					</div>
				</div>
			</section>
		</body>
	</header>
</html>
