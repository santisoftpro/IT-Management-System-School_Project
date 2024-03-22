<?php
include 'header.php';
include '../views/connect.php';
$name = $_SESSION['branch_name'];
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

            <li class="active">
                <a href="manageReport">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-clipboard-with-paper" />
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
                                <div class="dt-buttons btn-group">
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"
                                        onclick="exportToExcel()"><span>Excel</span></a><a
                                        class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success"
                                        tabindex="0" aria-controls="DataTables_Table_0"
                                        onclick="printTable()"><span>PDF</span></a><a
                                        class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                        aria-controls="DataTables_Table_0" onclick="printTable()"><span>Print</span></a>
                                </div>
                                <div class="col-sm-1 pull-right">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" id="btnReloadList"
                                            name="borrowed">Reload
                                            List</button>
                                    </div>
                                </div>

                                <div class="col-sm-3 pull-right">
                                    <div class="form-group">
                                        <select id="selectYear" class="form-control" name="year">
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
                                        <select id="selectMonth" class="form-control" name="month">
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
                                <?php
                                $sql = "SELECT *, GROUP_CONCAT(item.i_deviceID, ' - ' ,item.i_category,  '<br/>') item_borrow FROM borrow
                                LEFT JOIN item_stock ON item_stock.id = borrow.stock_id
                                LEFT JOIN item ON item.id = item_stock.item_id
                                LEFT JOIN member ON member.id = borrow.member_id WHERE item.branch_name='$name'
                                GROUP BY borrow.borrowcode";
                                $query_run = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($query_run)) {
                                    $date = ($row['date_return'] == 'NULL' || $row['date_return'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['date_return']));
                                    $date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
                                    if ($row['branch_name'] != "") {
                                        $compus = $row['branch_name'];
                                    } else {
                                        $compus = "Kigali Compus";
                                    }
                                    ?>
                                    <tbody class="tableRequest">
                                        <td>
                                            <?= $row['m_fname'] . $row['m_lname'] ?>
                                        </td>
                                        <td>
                                            <?= $row['item_borrow'] ?>
                                        </td>
                                        <td>
                                            <?= $date ?>
                                        </td>
                                        <td>
                                            <?= $date2 ?>
                                        </td>
                                        <td>
                                            <?= $compus ?>
                                        </td>


                                    </tbody>
                                    <?php
                                }

                                ?>



                            </table>
                        </div>
                        <div class="tab-pane fade in active dataTables_wrapper no-footer" id="old">

                            <div class="dt-buttons btn-group">
                                <a class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"
                                    onclick="exportToExcel()"><span>Excel</span></a><a
                                    class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0" onclick="printTable()"><span>PDF</span></a><a
                                    class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0" onclick="printTable()"><span>Print</span></a>
                            </div>
                            <form method="POST">
                                <div class="col-sm-1 pull-right">
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary" id="requestedReport" name="submitRequest">Reload
                                            List</button>

                                    </div>
                                </div>

                                <div class="col-sm-3 pull-right">

                                    <div class="form-group">
                                        <select id="selectRequest" class="form-control" name="selectRequest">
                                            <option selected disabled>Select Report</option>
                                            <option value="Padding">Padding Report</option>
                                            <option value="Requested">Requested Report</option>
                                            <option value="Waiting">Waiting Report</option>
                                            <option value="Declined">Declined Report</option>
                                        </select>
                                    </div>

                                </div>
                            </form>
                            <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
                                aria-describedby="DataTables_Table_0_info" class="requestingReport">
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

                                <?php
                                if (isset ($_POST['submitRequest'])) {
                                    $sql = "SELECT * FROM request WHERE branch_name='$name' AND status='$_POST[selectRequest]' ORDER BY names ASC";
                                    $query_run = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        $date = ($row['dates'] == 'NULL' || $row['dates'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['dates']));
                                        // $date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
                                        if ($row['branch_name'] != "") {
                                            $compus = $row['branch_name'];
                                        } else {
                                            $compus = "Kigali Compus";
                                        }
                                        ?>
                                        <tbody>
                                            <td>
                                                <?= $row['names'] ?>
                                            </td>
                                            <td>
                                                <?= $compus ?>
                                            </td>
                                            <td>
                                                <?= $row['messages'] ?>
                                            </td>
                                            <td>
                                                <?= $row['status'] ?>
                                            </td>
                                            <td>
                                                <?= $date ?>
                                            </td>
                                            <td>
                                                <?= $row['response'] ?>
                                            </td>


                                        </tbody>
                                        <?php
                                    }
                                } else {
                                    $sql = "SELECT * FROM request WHERE branch_name='$name' ORDER BY names ASC";
                                    $query_run = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($query_run)) {
                                        $date = ($row['dates'] == 'NULL' || $row['dates'] == NULL) ? " --- " : date('F d,Y H:i:s A', strtotime($row['dates']));
                                        // $date2 = date('F d,Y H:i:s A', strtotime($row['date_borrow']));
                                        if ($row['branch_name'] != "") {
                                            $compus = $row['branch_name'];
                                        } else {
                                            $compus = "Kigali Compus";
                                        }
                                        ?>
                                        <tbody>
                                            <td>
                                                <?= $row['names'] ?>
                                            </td>
                                            <td>
                                                <?= $compus ?>
                                            </td>
                                            <td>
                                                <?= $row['messages'] ?>
                                            </td>
                                            <td>
                                                <?= $row['status'] ?>
                                            </td>
                                            <td>
                                                <?= $date ?>
                                            </td>
                                            <td>
                                                <?= $row['response'] ?>
                                            </td>


                                        </tbody>
                                        <?php
                                    }
                                }



                                ?>
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
                        <div class="tab-pane fade in active dataTables_wrapper no-footer" id="pulledout">

                            <div class="dt-buttons btn-group">
                                <a class="btn btn-default buttons-excel buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0"
                                    onclick="exportToExcel()"><span>Excel</span></a><a
                                    class="btn btn-default buttons-pdf buttons-html5 btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0" onclick="printTable()"><span>PDF</span></a><a
                                    class="btn btn-default buttons-print btn-sm btn-success" tabindex="0"
                                    aria-controls="DataTables_Table_0" onclick="printTable()"><span>Print</span></a>
                            </div>



                            <table class="table table_inventory_all">
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
                                <?php
                                $sql = "SELECT * FROM item
                                LEFT JOIN item_stock ON item_stock.item_id = item.id WHERE item.branch_name='$name'
                                GROUP BY item.i_category";
                                $query_run = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($query_run)) {
                                    $unusable = $row['item_rawstock'] - $row['items_stock'];
                                    if ($row['branch_name'] != "") {
                                        $compus = $row['branch_name'];
                                    } else {
                                        $compus = "Kigali Compus";
                                    }
                                    ?>
                                    <tbody>
                                        <td style="text-align: center;">
                                            <?= $row['i_category'] ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?= $row['items_stock'] ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?= $unusable ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?= $row['item_rawstock'] ?>
                                        </td>

                                        <td style="text-align: center;">
                                            <?= $compus ?>
                                        </td>


                                    </tbody>
                                    <?php
                                }

                                ?>

                            </table>
                        </div>

                        <div class="tab-pane fade" id="transferred">
                            <div class="row">
                                <div class="col-sm-1 pull-right">
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-primary"
                                            id="btnReloadTransferredList">Reload
                                            List</button>
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
    $(document).ready(function () {
        $('#requestedReport').click(function (e) {
            e.preventDefault();
            alert("hello");
        });

        $('#selectRequest').on('change', function () {
            var value = $(this).val();
            // alert(value);
            $.ajax({
                url: "fetch",
                type: "POST",
                data: "request=" + value;
                beforeSend: function () {
                    $(".requestingReport").html("<span>Working...</span>");
                },
                success: function (data) {
                    $(".requestingReport").html(data);
                }
            })
        });

    });
</script>
<!-- JavaScript functions -->
<script>
    function exportToExcel() {
        const table = document.getElementById('DataTables_Table_0');
        const html = table.outerHTML;
        const url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);

        const link = document.createElement('a');
        link.setAttribute('href', url);
        link.setAttribute('download', 'table.xls');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function exportToPdf() {
        const table = document.getElementById('DataTables_Table_0');
        const html = table.outerHTML;

        const pdf = new jsPDF();
        pdf.text(20, 20, 'Table Exported to PDF');
        pdf.fromHTML(html, 20, 30);
        pdf.save('table.pdf');
    }

    function printTable() {
        window.print();
    }
</script>
<?php include 'footer.php'; ?>