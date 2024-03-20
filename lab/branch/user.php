<?php
include 'header.php';
include '../views/connect.php';
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
	<form role="search">
		<div class="form-group">
			<!-- <input type="text" class="form-control" placeholder="Search"> -->
		</div>
	</form>
	<ul class="nav menu">
		<li class="">
			<a href="home">
				<svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use>
				</svg>
				Dashboard
			</a>
		</li>
		<li class="parent">
			<a href="#">
				<span data-toggle="collapse" href="#sub-item-1">
					<svg class="glyph stroked chevron-down">
						<use xlink:href="#stroked-chevron-down"></use>
					</svg>
				</span>
				Transaction
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
				<a href="request">
					<svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-clipboard-with-paper" />
					</svg>
					Request new devices
				</a>
			</li>
			<li class="active">
				<a href="#">
					<svg class="glyph stroked female user">
						<use xlink:href="#stroked-female-user" />
					</svg>
					Users
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
			<li class="active">Users</li>
		</ol>
		<div class="breadcrumb">
			<button class="btn btn-primary col-sm-offset-10 add_user">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign" />
				</svg>
				Add User
			</button>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Type</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$name = $_SESSION['branch_name'];
							$query = mysqli_query($con, "SELECT * FROM user WHERE branches = '$name'");
							$count = mysqli_num_rows($query);
							if ($count > 0) {
								while ($row = mysqli_fetch_array($query)) {
									$status = ($row['status'] == 1) ? '<a href="javascript:;" class="deactivate-user" ><i class="fa fa-remove"></i> deactivate</a>' : '<a href="javascript:;" class="activate-user" ><i class="fa fa-remove"></i> activate</a>';
									$button = '<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="javascript:;" class="edit-user" ><i class="fa fa-edit"></i> Edit</a></li>
										<li>' . $status . '</li>
										<li><a href="javascript:;" class="edit-upass" ><i class="fa fa-lock"></i> Change Password</a></li>
									</ul>
								</div>';
									$type = ($row['type'] == 3) ? 'Branches' : 'Staff/ Student Assistance';
									?>
									<tr>
										<td>
											<?= $row['name']; ?>
										</td>
										<td>
											<?= $type; ?>
										</td>
										<td>
											<?= $row['username']; ?>
										</td>
										<td>
											<?= $button ?>
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

<div class="right-sidebar user-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<form class="" action="new_codes" method="POST">
				<h4 class="alert bg-success">Add User</h4>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="u_fname" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="u_username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="u_password" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label>User Type</label>
					<select class="form-control" name="u_type" required="required">
						<option value="3">Branch</option>

					</select>
				</div>
				<div class="form-group">
					<label>Choose Branch Name</label>
					<select class="form-control" name="u_branch" required="required">
						<?php

						$query = mysqli_query($con, "SELECT * FROM branches WHERE branche_name='$name'");
						while ($rw = mysqli_fetch_array($query)) {
							?>

							<option value="<?= $rw['branche_name']; ?>">
								<?= $rw['branche_name']; ?>
							</option>
							<?php
						}

						?>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<button class="btn btn-danger btn-block cancel_user" type="button">
								CANCEL
							</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-primary btn-block" name="save_user" type="submit">
								SAVE
							</button>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>

<div class="right-sidebar userdiv">
	<div class="container-fluid">
		<div class="edit-userside"></div>
	</div>
</div>


<?php include 'footer.php'; ?>