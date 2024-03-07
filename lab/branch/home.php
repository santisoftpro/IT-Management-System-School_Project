<?php
date_default_timezone_set('Asia/Manila');
include 'header.php';
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
	<form role="search">
		<div class="form-group">
			<!-- <input type="text" class="form-control" placeholder="Search"> -->
		</div>
	</form>
	<ul class="nav menu">
		<li class="active">
			<a href="#">
				<svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use>
				</svg>
				Dashboard
			</a>
		</li>
		<li>
			<a href="reserve_logs">
				<svg class="glyph stroked female user">
					<use xlink:href="#stroked-female-user" />
				</svg>
				Reservation Status
			</a>
		</li>
		<li class="parent ">
			<a href="#sub-item-1" data-toggle="collapse">
				<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down">
						<use xlink:href="#stroked-chevron-down"></use>
					</svg></span> Transaction
			</a>
			<ul class="children collapse" id="sub-item-1">

				<li>
					<a class="" href="reservation">
						<svg class="glyph stroked eye">
							<use xlink:href="#stroked-eye" />
						</svg>
						Reservations
					</a>
				</li>


				<li>
					<a class="" href="new">
						<svg class="glyph stroked plus sign">
							<use xlink:href="#stroked-plus-sign" />
						</svg>
						New
					</a>
				</li>
				<li>
					<a class="" href="borrow">
						<svg class="glyph stroked download">
							<use xlink:href="#stroked-download" />
						</svg>
						Borrowed Items
					</a>
				</li>
				<li>
					<a class="" href="return">
						<svg class="glyph stroked checkmark">
							<use xlink:href="#stroked-checkmark" />
						</svg>
						Returned Items
					</a>
				</li>
			</ul>
		</li>
		<?php if ($_SESSION['branch_type'] == 3) { ?>
			<li class="">
				<a href="items">
					<svg class="glyph stroked desktop">
						<use xlink:href="#stroked-desktop" />
					</svg>
					Item
				</a>
			</li>
			<li>
				<a href="members">
					<svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user" />
					</svg>
					Borrower
				</a>
			</li>
			<li>
				<a href="room">
					<svg class="glyph stroked app-window">
						<use xlink:href="#stroked-app-window"></use>
					</svg>
					Room
				</a>
			</li>
			<li>
				<a href="inventory">
					<svg class="glyph stroked clipboard with paper">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg>
					Inventory
				</a>
			</li>
			<li>
				<a href="report">
					<svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph" />
					</svg>
					Graph
				</a>
			</li>
			<li>
				<a href="manageReport">
					<svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph" />
					</svg>
					Reports
				</a>
			</li>
			<li>
				<a href="request">
					<svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg>
					Request new devices
				</a>
			</li>
			<li>
				<a href="user">
					<svg class="glyph stroked female user">
						<use xlink:href="#stroked-female-user" />
					</svg>
					User
				</a>
			</li>
			<?php
		}
		($_SESSION['branch_type'] == 3) ? include('../views/include_history.php') : false;
		?>
	</ul>
</div><!--/.sidebar-->

<div class="row-fluid">
	<div class="col-md-12 main">
		<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">


			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Reservation</h1>
				</div>
			</div><!--/.row-->

			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-email"></use>
						</svg> Make Reservation</div>
					<div class="panel-body">
						<form class="form-horizontal client_reservation" action="">
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Items (maximum of 5 items)</label>
									<div class="col-md-9">
										<select class="form-control input-lg borrowitem" name="reserve_item[]"
											multiple="multiple" required="required" style="width: 100%">
											<option></option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Date </label>
									<div class="col-md-9">
										<input type="text" class="form-control datepicker" name="reserved_date"
											required="required">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Time</label>
									<div class="col-md-9">
										<input type="time" placeholder="" class="form-control" name="reserved_time"
											required="required">
										<input type="hidden" name="client_id"
											value="<?php echo $_SESSION['member_id']; ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Select Room</label>
									<div class="col-md-9">
										<select class="form-control" name="reserve_room" required></select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Time Limit</label>
									<div class="col-md-9">
										<input name="time_limit" id="timeLimit" type="text" class="form-control"
											value="" />
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-primary btn-md pull-right">Make
											Reservation</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>



<?php include 'footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#timeLimit").datetimepicker({
			minTime: '<?php echo date("H:i"); ?>',
			maxTime: '18:00',
			minDate: 0,
			format: 'Y-m-d h:i A',
			step: 15
		});
	});
</script>