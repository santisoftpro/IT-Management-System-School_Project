<?php
include 'header.php';
$con = mysqli_connect("localhost", "root", "", "lms20");
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
        <?php if ($_SESSION['admin_type'] == 1) { ?>
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
                <a href="#">
                    <svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Inventory
                </a>
            </li>
            <li>
                <a href="request">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Requested
                </a>
            </li>
            <li>
                <a href="branch">
                    <svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Manage Branch
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
            <li class="active">
                <a href="manageReport">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Reports
                </a>
            </li>
            <li>
                <a href="request">
                    <svg class="glyph stroked line-graph">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-line-graph" />
                    </svg>
                    Requesting Services
                </a>
            </li>
            <li>
                <a href="branch">
                    <svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Manage Branch
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
        ($_SESSION['admin_type'] == 1) ? include('include_history.php') : false;
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
                        <li class="active"><a href="#new" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Borrowed</a>
                        </li>
                        <li><a href="#old" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Request Reports</a></li>
                        <li><a href="#damaged" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Damaged</a></li>
                        <li><a href="#pulledout" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Inventory</a></li>
                        <li><a href="#transferred" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Transferred</a></li>
                        <!-- <li><a href="#report2" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Borrowed</a></li> -->
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
                        <div class="tab-pane fade in active dataTables_wrapper no-footer" id="new">
                            <form action="" method="get">
                                <div class="dt-buttons btn-group"><a
                                        class="btn btn-default buttons-copy buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>Copy</span></a><a
                                        class="btn btn-default buttons-csv buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>CSV</span></a><a
                                        class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a><a
                                        class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>PDF</span></a><a
                                        class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                        aria-controls="DataTables_Table_0"><span>Print</span></a></div>

                                <div class="col-sm-1 pull-right">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" id="borrowingBtn"
                                            name="borrowed">Reload
                                            List</button>
                                    </div>
                                </div>
                                <div class="col-sm-3 pull-right" style="width: 220px;">
                                    <div class="form-group">
                                        <select id="borredCompus" class="form-control" name="compusName">
                                            <option value="" hidden>SELECT COMPUS</option>
                                            <?php

                                            $query = "SELECT * FROM branches ORDER BY branche_name ASC";
                                            $query_run = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($query_run)) {
                                                ?>
                                                <option value="<?php echo $row['branche_name']; ?>">
                                                    <?php echo $row['branche_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 pull-right">
                                    <div class="form-group">
                                        <select id="yearBorred" class="form-control" name="year">
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
                                        <select id="monthBorred" class="form-control" name="month">
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
                            </form>
                            <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
                                aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>Borrower</th>
                                        <th>Items</th>
                                        <th>Borrowed Date</th>
                                        <th>Returned Date</th>
                                        <th>Compus Name</th>
                                    </tr>
                                </thead>

                                <tbody id="displayBorrowed">


                                </tbody>



                            </table>
                        </div>
                        <div class="tab-pane fade in active dataTables_wrapper no-footer" id="old">

                            <div class="dt-buttons btn-group"><a
                                    class="btn btn-default buttons-copy buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span>Copy</span></a><a
                                    class="btn btn-default buttons-csv buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span>CSV</span></a><a
                                    class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span>Excel</span></a><a
                                    class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span>PDF</span></a><a
                                    class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span>Print</span></a></div>

                            <div class="col-sm-1 pull-right">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" id="requestedReport"
                                        name="request">Reload
                                        List</button>
                                </div>
                            </div>
                            <div class="col-sm-3 pull-right" style="width: 220px;">
                                <div class="form-group">
                                    <select id="selectBranchReported" class="form-control" name="selectBranchReported">
                                        <option value="" hidden>SELECT COMPUS</option>
                                        <?php

                                        $query = "SELECT * FROM branches ORDER BY branche_name ASC";
                                        $query_run = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($query_run)) {
                                            ?>
                                            <option value="<?php echo $row['branche_name']; ?>">
                                                <?php echo $row['branche_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 pull-right">
                                <div class="form-group">
                                    <select id="selectReported" class="form-control" name="selectReported">
                                        <option value="" hidden>Select Report</option>
                                        <option value="Padding">Padding Report</option>
                                        <option value="Accepted">Requested Report</option>
                                        <option value="Waiting">Waiting Report</option>
                                        <option value="Diclined">Declined Report</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
                                aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>Names</th>
                                        <th>Compus Name</th>
                                        <th>Messages</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Respomse</th>
                                    </tr>
                                </thead>
                                <tbody id="displayReport">

                                </tbody>
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
                        <div class="tab-panel fade in active dataTables_wrapper no-footer" id="pulledout">
                            <form action="" method="POST">
                                <div class="dt-buttons btn-group"><a
                                        class="btn btn-default buttons-copy buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>Copy</span></a><a
                                        class="btn btn-default buttons-csv buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>CSV</span></a><a
                                        class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span></a><a
                                        class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"><span>PDF</span></a><a
                                        class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                        aria-controls="DataTables_Table_0"><span>Print</span></a></div>
                                <!-- 
                                <div class="col-sm-1 pull-right">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" id="btnReloadList"
                                            name="borrowed">Reload
                                            List</button>
                                    </div>
                                </div> -->
                                <div class="col-sm-3 pull-right">
                                    <div class="form-group">
                                        <select id="task" class="form-control" name="compusName">
                                            <option value="" hidden>SELECT COMPUS</option>
                                            <?php

                                            $query = "SELECT * FROM branches ORDER BY branche_name ASC";
                                            $query_run = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($query_run)) {
                                                ?>
                                                <option value="<?php echo $row['branche_name']; ?>">
                                                    <?php echo $row['branche_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                            </form>
                            <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
                                aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Category</th>
                                        <th style="text-align: center;">New</th>
                                        <th style="text-align: center;">(Old / Damage / Lost / Borrowed / Transferred)
                                        </th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Compus Name</th>
                                    </tr>

                                </thead>

                                <tbody id="inventoryDisplay">

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
                                        <select id="selectBranch" class="form-control">
                                            <option value="" hidden>SELECT COMPUS</option>
                                            <?php
                                            $con = mysqli_connect("localhost", "root", "", "lms20");
                                            $query = "SELECT * FROM branches ORDER BY branche_name ASC";
                                            $query_run = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($query_run)) {
                                                ?>
                                                <option value="<?php echo $row['branche_name']; ?>">
                                                    <?php echo $row['branche_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
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
                                    <table class="table tbl_return">
                                        <thead>
                                            <tr>
                                                <th>Borrower</th>
                                                <th>Items</th>
                                                <th>Borrowed Date</th>
                                                <th>Returned Date</th>

                                            </tr>
                                        </thead>
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


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    function fetchData() {
        var action = 'fetchData';
        $.ajax({
            url: "action",
            method: "POST",
            data: { action: action },

            success: function (data) {
                $('#displayReport').html(data);
            }
        });
    }

    function displayBorrowed() {
        var action = 'displayBorrowed';
        $.ajax({
            url: "action",
            method: "POST",
            data: { action: action },

            success: function (data) {
                $('#displayBorrowed').html(data);
            }
        });
    }

    function displayInventory() {
        var action = 'displayInventory';
        $.ajax({
            url: "action",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#inventoryDisplay').html(data);
            }
        });
    }
    $(document).ready(function () {
        $('#requestedReport').click(function (e) {
            e.preventDefault();
            var action = 'requestedReport';
            var selectReported = $('#selectReported').val();
            var selectBranchReported = $('#selectBranchReported').val();

            if (selectReported != '' || selectBranchReported != '') {
                $.ajax({
                    type: "POST",
                    url: "action",
                    data: { action: action, selectReported: selectReported, selectBranchReported: selectBranchReported },
                    success: function (data) {
                        $('#displayReport').html(data);

                    }
                });

            }
            else {
                console.log('data not found');
            }
        });

        $('#borrowingBtn').click(function (e) {
            e.preventDefault();
            var action = 'borrowingReport';
            var monthBorred = $('#monthBorred').val();
            var yearBorred = $('#yearBorred').val();
            var borredCompus = $('#borredCompus').val();

            if (borredCompus != '' && yearBorred != '' && borredCompus != '') {
                $.ajax({
                    type: "POST",
                    url: "action",
                    data: { action: action, monthBorred: monthBorred, yearBorred: yearBorred, borredCompus: borredCompus },
                    success: function (data) {
                        $('#displayBorrowed').html(data);
                    }
                });
            }



        });

        $('#task').on('change', function () {
            event.preventDefault();
            var action = 'searchByStatus';
            var status_name = $(this).val();
            $.ajax({
                url: "action",
                method: "POST",
                data: { action: action, status_name: status_name },
                success: function (data) {
                    $('#inventoryDisplay').html(data);
                }
            });
        });
    });

    fetchData();
    displayBorrowed();
    displayInventory();
</script>

<?php include 'footer.php'; ?>