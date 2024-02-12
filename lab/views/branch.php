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


<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="dashboard"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Branches</li>
        </ol>
        <div class="breadcrumb">
            <button class="btn btn-primary col-sm-offset-10 add_equipment">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg> &nbsp;
                Add Branch
            </button>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered  dataTable no-footer" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>branch Names</th>
                                <th>Phone Number</th>
                                <th>Emails</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $branch_query = mysqli_query($conn, "SELECT * FROM branches");
                            while ($row = mysqli_fetch_array($branch_query)) {
                                // echo '<td>' . $row['branch_id'] . '</td>';
                                // echo '<td>' . $row['branche_name'] . '</td>';
                            
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['branch_id'] ?>
                                    </td>
                                    <td>
                                        <?= $row['branche_name'] ?>
                                    </td>
                                    <td>
                                        <?= $row['phoneNumber'] ?>
                                    </td>
                                    <td>
                                        <?= $row['emails'] ?>
                                    </td>
                                    <td><button class="btn btn-primary">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;<button
                                            class="btn btn-danger">Remove</button></td>
                                </tr>
                                <?
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
                Add Branch
            </h4>
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Branch Name</label>
                    <input type="text" name="b_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone Numbeer</label>
                    <input type="text" name="phoneNumber" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Compus Email</label>
                    <input type="text" name="email" class="form-control" required>
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
                            <button class="btn btn-primary btn-block" type="submit" name="submit_branch">
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

            <?php

            if (isset($_POST['submit_branch'])) {
                $name = "hello";
                $sql = mysqli_query($conn, "SELECT * FROM branches");
                if (mysqli_num_rows($sql) > 0) {
                    ?>
                    <script>
                        alert("This Compus Is already Exist");
                        window.location = "branch";
                    </script>
                    <?php
                } else {
                    $query = mysqli_query($conn, "INSERT INTO `branches` (`branch_id`, `branche_name`,`phoneNumber`,`emails`) VALUES (NULL, '$_POST[b_name]','$_POST[phoneNumber]','$_POST[email]');");
                    if ($query) {
                        header("Location: branch");
                    } else {
                        header("Location: home.php");
                    }
                }
            }
            ?>
        </div>
    </div>
</div>


<div class="right-sidebar equipment-view">
    <div class="sidebar-form equipment-form">

    </div>
</div>



<?php include 'footer.php'; ?>