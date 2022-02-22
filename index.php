		<?php
		include "database.php";
		$db = new database();
		if (isset($_POST['submit'])){
			$Titre = $_POST['Titre'];
			$Message = $_POST['Message'];
			
			if (isset($_FILES['Image']['tmp_name'])) {
				$tmp_name = $_FILES['Image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["Image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");	
  			}
  			$image = $name;
  			

			if ($Titre == ''|| $Message == '' ) {
				$msg = "Field must not be empty";
			}else{
				$uery = "INSERT INTO data (Titre,Message,Image) VALUES('$Titre','$Message','$image')";
				$insert = $db->insert($uery);
			}

		}

		$db = new database();
		$query = "SELECT * FROM data";
		$read = $db->select($query);

		?>
		<!DOCTYPE html>
		<html>
		<head>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="icon" href="icon/téléchargement.png">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
			<title>Egio</title>
			<link rel="stylesheet" href="" type="text/css" />
			<script type="text/javascript"></script>
		</head>

		<body>
			<div class="container"></br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="panel panel-primary">
						
							<div class="panel-body">
						</br>
								<form method="POST" action="index.php" enctype="multipart/form-data">
								<link rel="stylesheet" href="css.css">
									<table class="table table-hover">
										<tr>
											<td >TITRE *</td>
											<td>
										<br>
												<input type="text" class="form-control"  name="Titre">
												<input type="hidden"  name="id" >
												<br>
											</td>
	
										</tr>
										<br>
											<td>IMAGE</td>
											<td>
												<input type="file" class="form-control" name="Image"  >
											</td>
										</tr>
										<tr>
										<br>
											<td>MESSAGE *</td>
											<td>
												<textarea  class="form-control" name="Message" > </textarea>
											</td>
										</tr>
										<tr>
										<tr>
											<td colspan="2" align="content">
													<input type="submit" class="btn btn-primary" name="submit" value="ADD NEW TESTTEMONIAL"><br>
											</td>
											
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container"></br>
				
					<h1>Testimonials</h1>						
							<table class="table table-bordered">

								<?php if ($read) { ?>

									<?php while($row = $read->fetch_assoc()) {  ?>
										
										<td>
											<img src="<?php echo 'imagess/'.$row['Image'];?>" width="200px" height="150px" /><br>
										    	<h2><?php echo $row['Titre'];?></h2><br>
											    <h2><?php echo $row['Message'];?></h2>
											</td>
										
										
									<?php } ;?>
								<?php } ;?>
								<br>

								
							</table>
							<br>
				
			</div>		
		</body>
		</html>