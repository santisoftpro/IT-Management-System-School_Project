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
			<li class="active">
				<a href="#">
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


<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">

	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Inventory</li>
		</ol>
		<div class="breadcrumb">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-pills">
						<li class="active"><a href="#new" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;New</a></li>
						<li><a href="#old" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Old</a></li>
						<li><a href="#lost" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Lost</a></li>
						<li><a href="#damaged" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Damaged</a></li>
						<li><a href="#pulledout" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Total Items</a></li>
						<li><a href="#transferred" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Transferred</a></li>
						<li><a href="#report2" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Borrowed</a></li>
					</ul>
				</div>
				<!-- <div class="col-md-2">
						<button class="btn btn-primary add_equipment ">
							<svg class="glyph stroked plus sign">
								<use xlink:href="#stroked-plus-sign"/>
							</svg> &nbsp;
							Add Equipment
						</button>
					</div> -->
			</div>
		</div>
	</div><!--/.row-->


	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="new">
							<table class="table table_inventory_new_branch">
								<thead>
									<tr>
										<th>Model</th>
										<th>Category</th>
										<th>Brand</th>
										<th>Quantity</th>
										<th>Quantity Left</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$con = mysqli_connect("localhost", "root", "", "lms20");
									$name = $_SESSION['branch_name'];
									$query = mysqli_query($con, "SELECT * FROM item_stock 
									LEFT JOIN item ON item.id = item_stock.item_id
									WHERE item_stock.item_status = '1' AND item.branch_name = '$name'");
									while ($row = mysqli_fetch_array($query)) {
										?>

										<tr>
											<td>
												<?= $row['i_model']; ?>
											</td>
											<td>
												<?= $row['i_category']; ?>
											</td>
											<td>
												<?= $row['i_brand']; ?>
											</td>
											<td>
												<?= $row['item_rawstock']; ?>
											</td>
											<td>
												<?= $row['items_stock']; ?>
											</td>
										</tr>
										<?php

									}

									?>

								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="old">
							<table class="table table_inventory_old">
								<thead>
									<tr>
										<th>Model</th>
										<th>Category</th>
										<th>Brand</th>
										<th>Quantity</th>
										<th>Quantity Left</th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="tab-pane fade" id="lost">
							<table class="table table_inventory_lost">
								<thead>
									<tr>
										<th>Model</th>
										<th>Category</th>
										<th>Brand</th>
										<th>No. of items</th>
										<th>Remarks</th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="tab-pane fade" id="damaged">
							<table class="table table_inventory_damaged">
								<thead>
									<tr>
										<th>Model</th>
										<th>Category</th>
										<th>Brand</th>
										<th>No. of items</th>
										<th>Remarks</th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="tab-pane fade" id="pulledout">
							<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
								aria-describedby="DataTables_Table_0_info">
								<thead>
									<tr>
										<th>Category</th>
										<th>New</th>
										<th>(Old / Damage / Lost / Borrowed / Transferred)</th>
										<th>Total</th>
									</tr>

								</thead>
								<tbody>
									<?php
									$con = mysqli_connect("localhost", "root", "", "lms20");
									$name = $_SESSION['branch_name'];
									$query = mysqli_query($con, "SELECT * FROM item LEFT JOIN item_stock ON item_stock.item_id = item.id WHERE item.branch_name = '$name' GROUP BY item.i_category");
									while ($row = mysqli_fetch_array($query)) {
										$unusable = $row['item_rawstock'] - $row['items_stock'];
										?>


										<tr>
											<td>
												<?= $row['i_category']; ?>
											</td>
											<td>
												<?= $row['items_stock']; ?>
											</td>
											<td>
												<?= $unusable; ?>
											</td>
											<td>
												<?= $row['item_rawstock']; ?>
											</td>

										</tr>
										<?php

									}

									?>

								</tbody>
							</table>
						</div>

						<div class="tab-pane fade" id="transferred">
							<div class="row">
								<div class="col-sm-1 pull-right">
									<div class="form-group text-right">
										<button type="button" class="btn btn-primary"
											id="btnReloadTransferredList">Reload List</button>
									</div>
								</div>
								<div class="col-sm-3 pull-right">
									<div class="form-group">
										<select id="selectYearTransferred" class="form-control">
											<option value="">Show All</option>
											<?php
											$currentYear = date('Y');
											for ($i = $currentYear; $i >= ($currentYear - 15); $i--):
												?>
												<option value="<?php echo $i; ?>">
													<?php echo $i; ?>
												</option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-3 pull-right">
									<div class="form-group">
										<select id="selectMonthTransferred" class="form-control">
											<option value="">Show All</option>
											<?php
											$monthArr = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
											for ($i = 0; $i < 12; $i++):
												$month = ($i + 1);
												?>
												<option value="<?php echo $month; ?>">
													<?php echo $monthArr[$i]; ?>
												</option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table table_inventory_transfer">
										<thead>
											<tr>
												<th>Model</th>
												<th>Category</th>
												<th>Brand</th>
												<th>No. of items</th>
												<th>Room</th>
												<th>Person-in-charge</th>
												<th>User</th>
												<th>Date Transferred</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="report2">
							<div class="row">
								<div class="col-sm-1 pull-right">
									<div class="form-group text-right">
										<button type="button" class="btn btn-primary" id="btnReloadList">Reload
											List</button>
									</div>
								</div>
								<div class="col-sm-3 pull-right">
									<div class="form-group">
										<select id="selectYear" class="form-control">
											<option value="">Show All</option>
											<?php
											$currentYear = date('Y');
											for ($i = $currentYear; $i >= ($currentYear - 15); $i--):
												?>
												<option value="<?php echo $i; ?>">
													<?php echo $i; ?>
												</option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-3 pull-right">
									<div class="form-group">
										<select id="selectMonth" class="form-control">
											<option value="">Show All</option>
											<?php
											$monthArr = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
											for ($i = 0; $i < 12; $i++):
												$month = ($i + 1);
												?>
												<option value="<?php echo $month; ?>">
													<?php echo $monthArr[$i]; ?>
												</option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
										aria-describedby="DataTables_Table_0_info">
										<thead>
											<tr>
												<th>Borrower</th>
												<th>Items</th>
												<th>Borrowed Date</th>
												<th>Returned Date</th>

											</tr>

										</thead>
										<tbody>
											<?php
											$con = mysqli_connect("localhost", "root", "", "lms20");
											$name = $_SESSION['branch_name'];
											if (isset($_POST['month']) && isset($_POST['year']) && $_POST['month'] != "" && $_POST['year'] != "") {
												$sql = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
																		 LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
																		 LEFT JOIN item ON item.id = item_stock.item_id
																		 LEFT JOIN member ON member.id = borrow.member_id
																		 WHERE MONTH(borrow.date_borrow) = " . $_POST['month'] . " AND  YEAR(borrow.date_borrow) = " . $_POST['year'] . "
																		 GROUP BY borrow.borrowcode";
												$query = mysqli_query($con, $sql);
												while ($row = mysqli_fetch_array($query)) {
													$date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
													$date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));

													?>


													<tr>
														<td>
															<?= $row['m_fname'] . $row['m_lname']; ?>
														</td>
														<td>
															<?= $row['item_borrow']; ?>
														</td>
														<td>
															<?= $date; ?>
														</td>
														<td>
															<?= $date2; ?>
														</td>

													</tr>
													<?php

												}
											} else if (isset($_POST['month']) && $_POST['month'] != "") {
												$sql = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
																		 LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
																		 LEFT JOIN item ON item.id = item_stock.item_id
																		 LEFT JOIN member ON member.id = borrow.member_id
																		 WHERE MONTH(borrow.date_borrow) = " . $_POST['month'] . " GROUP BY borrow.borrowcode";
												$query = mysqli_query($con, $sql);
												while ($row = mysqli_fetch_array($query)) {
													$date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
													$date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));

													?>


														<tr>
															<td>
															<?= $row['m_fname'] . $row['m_lname']; ?>
															</td>
															<td>
															<?= $row['item_borrow']; ?>
															</td>
															<td>
															<?= $date; ?>
															</td>
															<td>
															<?= $date2; ?>
															</td>

														</tr>
													<?php

												}
											} else if (isset($_POST['year']) && $_POST['year'] != "") {
												$sql = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
																		 LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
																		 LEFT JOIN item ON item.id = item_stock.item_id
																		 LEFT JOIN member ON member.id = borrow.member_id
																		 WHERE YEAR(borrow.date_borrow) = " . $_POST['year'] . "
																		 GROUP BY borrow.borrowcode";
												$query = mysqli_query($con, $sql);
												while ($row = mysqli_fetch_array($query)) {
													$date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
													$date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
													?>


															<tr>
																<td>
															<?= $row['m_fname'] . $row['m_lname']; ?>
																</td>
																<td>
															<?= $row['item_borrow']; ?>
																</td>
																<td>
															<?= $date; ?>
																</td>
																<td>
															<?= $date2; ?>
																</td>

															</tr>
													<?php

												}
											} else {
												echo $name = $_SESSION['branch_name'];
												$sql = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
												LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
												LEFT JOIN item ON item.id = item_stock.item_id
												LEFT JOIN member ON member.id = borrow.member_id WHERE item.branch_name='$name'
												GROUP BY borrow.borrowcode";
												$query = mysqli_query($con, $sql);
												while ($row = mysqli_fetch_array($query)) {
													$date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
													$date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
													?>


															<tr>
																<td>
															<?= $row['m_fname'] . $row['m_lname']; ?>
																</td>
																<td>
															<?= $row['item_borrow']; ?>
																</td>
																<td>
															<?= $date; ?>
																</td>
																<td>
															<?= $date2; ?>
																</td>

															</tr>
													<?php

												}
											}



											?>

										</tbody>
									</table>
									</table>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->
	</div><!-- row -->


</div>



<?php include 'footer.php'; ?>