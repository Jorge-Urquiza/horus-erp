!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Invoice1</title>

	<!-- Bootstrap cdn 3.3.7 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Custom font montseraat -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">

	<!-- Custom style invoice1.css -->
	<link rel="stylesheet" type="text/css" href="./invoice1.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<section class="back">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="invoice-wrapper">
						<div class="invoice-top">
							<div class="row">
								<div class="col-sm-6">
									<div class="invoice-top-left">
										<h2 class="client-company-name">Google Inc.</h2>
										<h6 class="client-address">31 Lake Floyd Circle, <br>Delaware, AC 987869 <br>India</h6>
										<h4>Reference</h4>
										<h5>UX Design &amp; Development for <br> Android App.</h5>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="invoice-top-right">
										<h2 class="our-company-name">Acme LLP</h2>
										<h6 class="our-address">477 Blackwell Street, <br>Dry Creek, Alaska <br>India</h6>
										<div class="logo-wrapper">
											<img src="./Acme.png" class="img-responsive pull-right logo" />
										</div>
										<h5>06 September 2017</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="invoice-bottom">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="title">Invoice</h2>
								</div>
								<div class="clearfix"></div>

								<div class="col-sm-3 col-md-3">
									<div class="invoice-bottom-left">
										<h5>Invoice No.</h5>
										<h4>BJI 009872</h4>
									</div>
								</div>
								<div class="col-md-offset-1 col-md-8 col-sm-9">
									<div class="invoice-bottom-right">
										<table class="table">
											<thead>
												<tr>
													<th>Qty</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Initial research</td>
													<td>???10,000</td>
												</tr>
												<tr>
													<td>1</td>
													<td>UX design</td>
													<td>???35,000</td>
												</tr>
												<tr>
													<td>1</td>
													<td>Web app development</td>
													<td>???50,000</td>
												</tr>
												<tr style="height: 40px;"></tr>
											</tbody>
											<thead>
												<tr>
													<th>Total</th>
													<th></th>
													<th>???95,000</th>
												</tr>
											</thead>
										</table>
										<h4 class="terms">Terms</h4>
										<ul>
											<li>Invoice to be paid in advance.</li>
											<li>Make payment in 2,3 business days.</li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12">
									<hr class="divider">
								</div>
								<div class="col-sm-4">
									<h6 class="text-left">acme.com</h6>
								</div>
								<div class="col-sm-4">
									<h6 class="text-center">contact@acme.com</h6>
								</div>
								<div class="col-sm-4">
									<h6 class="text-right">+91 8097678988</h6>
								</div>
							</div>
							<div class="bottom-bar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- jquery slim version 3.2.1 minified -->
	<script src="{{ assset('invoice/js.js') }}" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ assset('invoice/js2.js') }}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
