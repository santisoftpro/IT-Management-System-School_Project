<?php
date_default_timezone_set('Asia/Manila');
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
            <a href="#">
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
            <li class="active">
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


<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="dashboard"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Requesting</li>
        </ol>
        <div class="breadcrumb">
            <button class="btn btn-primary col-sm-offset-10 add_equipment">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg> &nbsp;
                New Request
            </button>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered dataTable no-footer" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Message</th>
                                <th>status</th>
                                <th>dates</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $name = $_SESSION['branch_name'];
                            $query = mysqli_query($con, "SELECT * FROM request WHERE branch_name = '$_SESSION[branch_name]'");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['id']; ?>
                                    </td>
                                    <td>
                                        <?= $row['names']; ?>
                                    </td>
                                    <td>
                                        <?= $row['branch_name']; ?>
                                    </td>
                                    <td>
                                        <?= $row['messages']; ?>
                                    </td>
                                    <td>
                                        <?= $row['status']; ?>
                                    </td>
                                    <td>
                                        <?= $row['dates']; ?>
                                    </td>

                                    <td>
                                        <?= $row['response']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- panel -->
        </div><!-- panel -->
    </div>
</div>


<div class="right-sidebar equipment-side">
    <div class="sidebar-form">
        <div class="container-fluid">
            <h4 class="alert bg-success">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg>
                Request Anything?
            </h4>
            <form action="test" method="GET" class="">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Branch Name</label>


                    <?php

                    $query = mysqli_query($con, "SELECT * FROM branches WHERE branche_name='$_SESSION[branch_name]'");
                    while ($rw = mysqli_fetch_array($query)) {
                        ?>

                        <input type="text" name="branches" class="form-control" value="<?= $rw['branche_name']; ?>"
                            readonly>
                        <?php
                    }

                    ?>


                </div>


                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>





                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <button class="btn btn-danger btn-block cancel-equipment" type="button">
                                <i class="fa fa-remove"></i>
                                CANCEL
                            </button>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <button class="btn btn-primary btn-block" type="submit" name="request">
                                ADD
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </form>


        </div>
    </div>
</div>



<?php
include '../js/script.php';
include 'footer.php';
?>

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