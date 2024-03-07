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
            <li class="active">
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
            <li class="active">Borrower</li>
        </ol>
        <div class="breadcrumb">
            <button class="btn btn-primary col-sm-offset-7 add_member">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg>
                Upload CSV File
            </button>
            <button class="btn btn-primary add_student">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg>
                Add Student
            </button>
            <button class="btn btn-primary add_faculty">
                <svg class="glyph stroked plus sign">
                    <use xlink:href="#stroked-plus-sign" />
                </svg>
                Add Faculty
            </button>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table dataTable no-footer" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Department</th>
                                <th>Type</th>
                                <th>Year/Section</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "lms20");
                            $name = $_SESSION['branch_name'];

                            $query = mysqli_query($con, "SELECT * FROM member WHERE m_compus = '$name'");
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row['m_school_id']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_fname'] . ' ' . $row['m_lname']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_gender']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_contact']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_department']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_type']; ?>
                                    </td>
                                    <td>
                                        <?= $row['m_year_section']; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:;" class="edit-member"><i class="fa fa-edit"></i>
                                                        Edit</a></li>
                                                <li>' . $status . '</li>
                                                <li><a
                                                        href="member_profile?id=' . $value['id'] . '&name=' . $value['m_fname'] . ' ' . $value['m_lname'] . '"><i
                                                            class="fa fa-user"></i> Borrower Profile</a></li>
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


<div class="right-sidebar member-side">
    <div class="sidebar-form">
        <div class="container-fluid">
            <h4 class="alert bg-success">Add Member</h4>
            <div class="form-group">
                <a class="btn btn-primary btn-block" target="_blank" download="member_format.csv"
                    href="../assets/downloadables/member_format.csv">
                    <i class="fa fa-download"></i>
                    Download Format
                </a>
            </div>
            <form class="frm_addmember" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="file" class="form-control" required>
                    <input type="hidden" name="key" value="add_member">
                </div>
                <div class="form-group">
                    <button class="btn btn-danger cancel_member" type="button">Cancel</button>
                    <button class="btn btn-success" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="right-sidebar divedit-member">
    <div class="container-fluid">
        <br>
        <br>
        <div class="member-form"></div>
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