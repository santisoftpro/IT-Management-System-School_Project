<?php
date_default_timezone_set('Asia/Manila');
include 'header.php';
$getId = $_GET['id'];
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
        <li class="parent active">
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
                <li class="active">
                    <a class="" href="#">
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
                <a href="inventory">
                    <svg class="glyph stroked clipboard with paper">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Inventory
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
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-line-graph" />
                    </svg>
                    Graph
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
            <li class="active">Borrow</li>
        </ol>

        <div class="row">
            <br />
            <br />

            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                <div class="panel panel-primary custom-panel">
                    <div class="panel-heading">
                        <i class="fa fa-plus-circle"></i>
                        Borrow Item/s
                    </div>
                    <div class="panel-body">
                        <form action="codes" method="GET">
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "lms20");
                            $query = mysqli_query($con, "SELECT * FROM request WHERE id ='$getId'");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>

                                <div class="form-group">
                                    <label class="">Branch Name</label>
                                    <input type="text" name="compus" value="<?= $row['branch_name']; ?>"
                                        class="form-control" readonly>
                                    <input type="hidden" name="requstId" value="<?= $row['id']; ?>" class="form-control">

                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label class="">status</label>
                                <select class="form-control input-lg" name="status" required="required">
                                    <option value="Padding">Padding</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Waiting">Waiting</option>
                                    <option value="Diclined">Diclined</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Message For branch</label>
                                <textarea name="e_message" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button class="btn btn-primary" name="confirmRequest" type="submit">
                                        Confirm Request
                                        <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
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
                maxDate: 0,
                format: 'Y-m-d h:i A',
                step: 15
            });
        });
    </script>