<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Templates</title>
    <link rel="shortcut icon" href="#" />
    <link href="/assignment/static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="/assignment/static/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <link href="/assignment/static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-info" id="sidebar">
            <?php
            include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
            include("fragment/topbar.php");
            ?>
            <div class="main-content m-4">
                <div class="container text-center">
                    <i class="fas fa-file-alt fa-8x icon-info"></i>
                </div>
                <div class="card shadow mt-3 mb-5">
                    <div class="card-header text-center">

                    </div>
                    <div class="card-body">
                        <div class="dataTables_wrapper">
                            <table class="table table-bordered dataTable" id="templateTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead class="text-center">
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%;">
                                        <span>Name</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 20%;">
                                        <span>Uploader</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">
                                        <span>Downloads</span>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 10%;">
                                        <span>Type</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">
                                        <span>Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                    for($j=0;$j<sizeof($template_list);$j++){
                                        $name = $template_list[$j]["name"];
                                        $uploader = $template_list[$j]["uploader"];
                                        $download = $template_list[$j]["downloads"];
                                        $type = $template_list[$j]["type"];
                                        $btn1 = "<button class='btn btn-danger' id='template-delete-$j' data-toggle='modal' data-target='#confirm-modal'><i class='fa fa-minus'></i></button>";
                                        $btn2 = "<button class='btn btn-info ml-4' id='template-info-btn-$j' data-toggle='modal' data-target='#template-info-modal'><i class='fa fa-search'></i></button>";
                                        echo("<tr>
                                                <td id='template-$j'>$name</td>
                                                <td>".$uploader."</td>
                                                <td>$download</td>
                                                <td>$type</td>
                                                <td>$btn1 $btn2</td>");
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="confirm-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Proceed</h5>
                        </div>
                        <div class="modal-body text-center">
                            <i class="fa fa-info fa-8x icon-red"></i>
                            <br>
                            <h5 class="text-info m-4">You sure you want proceed ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info fixed-button" id="proceed-btn">Yes</button>
                            <button class="btn btn-outline-danger fixed-button" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="template-info-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Info</h5>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-info">Name:</p>
                                </div>
                                <div class="col-8">
                                    <p id="template-name"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-info">Uploader:</p>
                                </div>
                                <div class="col-8">
                                    <p id="template-uploader"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-info">Type:</p>
                                </div>
                                <div class="col-8">
                                    <p id="template-type"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-info">Upload Date:</p>
                                </div>
                                <div class="col-8">
                                    <p id="template-date"></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-danger fixed-button" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assignment/static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="/assignment/static/vendor/bootstrap/bootstrap.js"></script>
<script src="/assignment/static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="/assignment/static/vendor/datatables/jquery.dataTables.js"></script>
<script src="/assignment/static/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="/assignment/static/js/main.js"></script>
<script src="/assignment/static/js/list.js"></script>
</body>
</html>