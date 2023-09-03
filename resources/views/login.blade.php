<!doctype html>
<html lang="en">

<head>
	<title>Fi-Maps Kota Bandung JUARA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/png" href="icon/fimaps.png" />

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.png); backdrop-filter: blur(5px);">
	<section class="vh-100">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card shadow-2-strong" style="border-radius: 1rem;">
						<div class="card-body p-5 text-center form-card">

							<h3 class="mb-4 font-weight-bold">Login</h3>

							<form method="post" action="login">

								@if($data)
									<div class="alert alert-danger" role="alert">
										{{ $data; }}
									</div>
								@endif
								{{ csrf_field() }}
								<!-- <div class="form-group">
									<div class="row">
										<div class="col-4">
											Username :
										</div>
										<div class="col-8">
											<input type="text" class="form-control" name="username" placeholder="Username" required style="color: black !important; border-radius: 25px; border: 2px solid black; padding: 20px; width: 100%; height: 30px; ">
										</div>
									</div>
								</div> -->
								<div class="form-group" style="text-align: left; font-weight: bold;">
									Username : 
								</div>
								<div class="form-group pb-2">
									<input type="text" class="form-control" name="username" placeholder="Username" required style="color: black !important; border-radius: 25px; border: 2px solid black; padding: 20px; width: 100%; height: 30px; ">
								</div>
								<div class="form-group" style="text-align: left; font-weight: bold;">
									Password : 
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" style="color: black !important; border-radius: 25px; border: 2px solid black; padding: 20px; width: 100%; height: 30px; " placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>