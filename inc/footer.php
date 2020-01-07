
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Footer section -->
<footer class="footer-section">
	<div class="customContainer">
		<div class="row">
			<div class="col-xl-4 col-lg-4 order-lg-2 custom-left">
				<div class="row">
					<div class="col-sm-4">
						<div class="footer-widget">
							<h2>Address</h2>
							<address>
							No.5, Maharbawga Street,Kamaryut Township, Yangon. 	<br>	
							Phone :+1 123 456 789 <br>
							Email :itvisionhub@gmail.com <br>
							</address>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 order-lg-2 custom-left">
				<div class="row">
					<div class="col-sm-4">
						<div class="footer-widget">
							<h2>Useful Links</h2>
							<ul class="useful">
								<li><a href="index.php">Home</a></li>
								<li><a href="customer_list.php">Customers</a></li>
								<li><a href="prize_list.php">Prize</a></li>
								<li><a href="luckynumber_list.php">Lucky Numbers</a></li>
								<li><a href="customer_prize.php">Winning Numbers</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 order-lg-2 custom-left">
				<div class="row">
					<div class="col-sm-4">
						<div class="footer-widget">
							<h2 class="connect">Connect With Us</h2>
							<ul class="useful">
								<li><a href=""> <i class= "fa fa-facebook">&nbsp;&nbsp;Facebook</i></a></li>
								<li><a href=""><i class= "fa fa-twitter">&nbsp;&nbsp;Twitter</i></a></li>
								<li><a href=""><i class= "fa fa-instagram">&nbsp;&nbsp;Instagram </i></a></li>
								<li><a href=""><i class= "fa fa-youtube">&nbsp;&nbsp;Youtube</i></a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
	</div>

		</footer>
		<!-- Footer section end -->
		<!-- copy right start -->
		<!-- <div class="copyright"></div> -->
		<div class="copyright">
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <span class="footer-logo"><a href="http://luckydrawphp.itbankus.com/" target="_blank">LuckyDraw System</a> </span>
		</div>
		<!-- copy right end -->

		<!--====== Javascripts & Jquery ======-->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mixitup.min.js"></script>
		<script src="js/main.js"></script>

	<!-- datatable start -->
	<!-- <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready( function () {
		$('#myTable').DataTable();
		} );
	
	</script> -->
	<!-- datatable end -->


	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	
		<script>
            $(document).ready(function() {
            	$('#myTable').DataTable( {
            		"processing": true,
            		"serverSide": true,
            		"ajax": "data.php",
            		"columns": [
            		{ "data": "id" },
            		{ "data": "name" },
            		{ "data": "email" },
            		{ "data": "ph_no" },
					{"data": "id",
					 "searchable": false,
					 "sortable": false,
					 "render": function (id, type, full, meta) {
						return "<a class='btn btn-primary btn-sm' href='customer.php?id=" + id + "'>Edit</a>"
								+  "<form method='post' action='customer_list.php' class='d-inline float-right' onsubmit=\"return confirm('Are you sure you want to delete this project?');\">" 
								+ "<input type='hidden' value='" + id + "' name='delete'>" 
								+ "<input type='submit' class='btn btn-danger btn-sm' value='Delete'>" 
								+ "</form>";
						}
					}
            		]
            	} );
            } );
		</script>
		
		
</body>
</html>