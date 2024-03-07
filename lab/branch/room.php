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
            <a href="#">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Dashboard
            </a>
        </li>
        <!-- <li>
            <a href="reserve_logs">
                <svg class="glyph stroked female user">
                    <use xlink:href="#stroked-female-user" />
                </svg>
                Reservation Status
            </a>
        </li> -->
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
            <li class="active">
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



<div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="dashboard"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Rooms</li>
        </ol>
        <div class="breadcrumb">
            <button class="btn btn-primary col-sm-offset-10 add_room">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg>
                Add Room
            </button>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover dataTable no-footer" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th>Room Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "lms20");
                            $name = $_SESSION['branch_name'];
                            $query = mysqli_query($con, "SELECT * FROM room WHERE branch_name ='$_SESSION[branch_name]'");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['rm_name']; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:;" class="edit-room"><i class="fa fa-edit"></i>
                                                        Edit</a></li>
                                                <li><a href="room_info?name=' . $myname . '&id=' . $value[" id"].'"><i
                                                            class="fa fa-search"></i> View Items</a></li>
                                            </ul>
                                        </div>
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

    </div><!-- row -->
</div>
<div class="right-sidebar room-side">
    <div class="sidebar-form">
        <div class="container-fluid">
            <form class="frm_addroom">
                <h4 class="alert bg-success"><i class="fa fa-plus"></i> Add Room</h4>
                <div class="form-group">
                    <label>Room Number</label>
                    <input type="number" name="room_name" min="0" class="form-control" autofocus autocomplete="off"
                        required>
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
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-danger btn-block cancel_room" type="button">
                                <i class="fa fa-remove"></i>
                                CANCEL
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" type="submit">
                                SAVE
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- <form>
                <hr>
                <div class="form-group">
                    <h4 class="alert bg-success">Upload csv file here</h4>
                </div>
                <div class="form-group">
                    <a href="">Download csv format here.</a>
                </div>
                <div class="form-group">
                    <input type="file" name="csv_room" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Upload File</button>
                </div>
            </form> -->
            <div class="div_editroom"></div>
        </div>
    </div>
</div>

<div class="right-sidebar editroom-side">
    <div class="sidebar-form">
        <div class="container-fluid">
            <form class="frm_editroom">
                <h4 class="alert bg-success"><i class="fa fa-edit"></i> Edit Room</h4>
                <div class="form-group">
                    <label>Room Name</label>
                    <input type="text" name="edit_rm_name" class="form-control" autofocus required autocomplete="off">
                    <input type="hidden" name="edit_rm_id">
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
                    <div class="col-md-6">
                        <button class="btn btn-danger btn-block cancel_editroom" type="button">
                            <i class="fa fa-remove"></i>
                            CANCEL
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" type="submit">
                            UPDATE
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#timeLimit").datetimepicker({
            minTime: ' <?php echo date("H:i"); ?>', maxTime: '18:00', minDate: 0, format: 'Y-m-d h:i A', step: 15
        });
    }); </script>