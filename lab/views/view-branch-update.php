<?php
include 'header.php';
$conn = mysqli_connect('localhost', 'root', '', 'lms20');
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
            <li class="">
                <a href="#">
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
            <li>
                <a href="request">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-clipboard-with-paper" />
                    </svg>
                    Requested Services
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




<form action="branch-code" method="POST" enctype="multipart/form-data" style="margin-left: 400px; margin-top: 40px;">
    <?php
    $branch_query = mysqli_query($conn, "SELECT * FROM branches WHERE branch_id = '$_GET[branch_id]'");
    while ($row = mysqli_fetch_array($branch_query)) {

        ?>
        <div class="form-group">
            <div class="row">
                <input type="hidden" name="update_id" class="form-control" value="<?= $row['branch_id'] ?>">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <label class="text-success">Branch Name</label>
                    <input type="text" name="b_name" class="form-control" value="<?= $row['branche_name'] ?>">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">

                    <label class="text-success">Phone Numbeer</label>
                    <input type="text" name="phoneNumber" class="form-control" value="<?= $row['phoneNumber'] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="text-success">Compus Email</label>
                    <input type="text" name="email" class="form-control" value=" <?= $row['emails'] ?>">
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="branch"> <button class="btn btn-danger btn-block cancel-equipment" type="button">
                            <i class="fa fa-remove"></i>
                            CANCEL
                        </button></a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <button class="btn btn-primary btn-block" type="submit" name="submit_branch_update">
                        Update
                        <i class="fa fa-check"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</form>









<?php
include '../js/script.php';
include 'footer.php';
?>