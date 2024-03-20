<?php
include 'header.php';
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
	<form role="search">
		<div class="form-group">
			<!-- <input type="text" class="form-control" placeholder="Search"> -->
		</div>
	</form>
	<ul class="nav menu">
		<li class="">
			<a href="dashboard">
				<svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use>
				</svg>
				Dashboard
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
			<li>
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
				<a href="manageReport">
					<svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph" />
					</svg>
					Reports
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
		($_SESSION['branch_type'] == 3) ? include ('../views/include_history.php') : false;
		?>
	</ul>
</div><!--/.sidebar-->


<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">

	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Graph</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>User</th>
								<th>Description</th>
								<th>Date</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$con = mysqli_connect("localhost", "root", "", "lms20");
							$name = $_SESSION['branch_name'];
							$query = mysqli_query($con, "SELECT * FROM history_logs LEFT JOIN user ON user.id = history_logs.user_id WHERE user.branches = '$name' ORDER BY history_logs.date_created ASC");
							$count = mysqli_num_rows($query);
							if ($count > 0) {
								while ($row = mysqli_fetch_array($query)) {
									$date = date('M d,Y H:i:s A', strtotime($row['date_created']));
									?>
									<tr>
										<td>
											<?= $row['name']; ?>
										</td>
										<td>
											<?= $row['description']; ?>
										</td>
										<td>
											<?= $date; ?>
										</td>
									</tr>
									<?php
								}
							}
							?>

						</tbody>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->
	</div><!-- row -->


</div>


<?php include 'footer.php'; ?>