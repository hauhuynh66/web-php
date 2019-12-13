<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview</title>
    <link rel="shortcut icon" href="#" />
    <link href="../static/vendor/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="../static/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css"/>
    <link href="../static/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="content shadow ml-2">
    <div class="row">
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-green" id="sidebar">
            <?php
                include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content my-4 ml-4">
                <?php
                    echo("<div class='container text-left'>
                        <h4 class='text-info' id='tp-name'>$name</h4>
                        <div class='row mb-3'>
                            <div class='col-3'>
                                <small><i class='fas fa-clock mx-2'></i>$upload_date</small>
                            </div>
                            <div class='col-3'>
                                <small>
                                    <i class='fas fa-user mx-2'></i>
                                    <a class='text-dark' href='./list.php?uploader=$uploader'>$uploader</a>
                                </small>
                            </div>
                            <div class='col-3'>
                                <small><i class='fas fa-comments mx-2'></i>$n</small>
                            </div>
                            <div class='col-3'>
                                <small><i class='fas fa-download mx-2'></i>$downloads</small>
                            </div>
                        </div>
                    </div>");
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header d-flex pt-0">
                                <div class="w-haft">
                                    <h5 class="text-info">Image</h5>
                                </div>
                                <?php
                                if($editable){
                                    echo("<div class='w-haft justify-content-end'>
                                        <button class='btn btn-info round' id='add-image' data-toggle='modal' data-target='#add-image-modal'>
                                            <i class='fa fa-plus'></i>
                                        </button>
                                    </div>");
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <?php
                                        echo("<ol class='carousel-indicators'>");
                                        for($i=0;$i<$count;$i++){
                                            if($i==0){
                                                echo("<li data-target='#carouselExampleIndicators' data-slide-to='$i' class='active'></li>");
                                            }else{
                                                echo("<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>");
                                            }
                                        }
                                        echo("</ol>");
                                    ?>
                                    <div class="carousel-inner preview-image">
                                        <?php
                                            for($i=0;$i<$count;$i++){
                                                $j = $i+1;
                                                $img = $relative_path."img"."$j".".jpg";
                                                if($i==0){
                                                    echo("<div class='carousel-item active'>
                                                    <img class='d-block w-100' src='$img' alt='$j slide'>
                                                    </div>");
                                                }else{
                                                    echo("<div class='carousel-item'>
                                                    <img class='d-block w-100' src='$img' alt='$j slide'>
                                                    </div>");
                                                }
                                            }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row mb-2">
                                    <div class="col-3 text-center">
                                        <h6 class="pt-2">Share This : </h6>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-info round"><i class="fab fa-facebook"></i></div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-warning round"><i class="fab fa-twitter icon-info"></i></div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-success round"><i class="fab fa-linkedin"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-xl-4 col-lg-4 col-mb-4 col-sm-12">
                        <h5>Properties</h5>
                        <hr>
                        <?php
                            echo("<p>Upload by: <a href='./list.php?uploader=$uploader'>$uploader</a></p>");
                            echo("<p>Upload date : ".$upload_date."</p>");
                            echo("<p>Downloads : $downloads</p>
                                        <div class='row'>
                                            <div class='col-12'>
                                                <button class='btn btn-info btn-block' data-toggle='modal' data-target='#download-modal' id='download-btn'>
                                                    <i class='fas fa-download mr-2'></i>Download
                                                </button>
                                            </div>
                                        </div>");
                            ?>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-mb-8 col-sm-12">
                        <h5 class="d-inline">Description</h5>
                        <?php
                        if($editable){
                            echo ("<button class='btn btn-info d-inline float-right' id='get-template-info' data-toggle='modal' data-target='#edit-template-modal'>
                                    <i class='fa fa-edit'></i>
                                </button>");
                        }
                        ?>
                        <hr>
                        <?php
                            echo("<p>$des</p>");
                        ?>
                    </div>
                </div>
                <form>
                    <div class="row">
                        <div class="col-9">
                            <textarea class="form-control" rows="5" name="comment" placeholder="Comment" id="comment"></textarea>
                        </div>
                        <div class="col-3">
                            <div class="container text-center">
                                <fieldset class="rating" id="star">
                                    <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4"/><label class = "full" for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2"/><label class = "full" for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1"></label>
                                </fieldset>
                            </div>
                            <button class="btn btn-block btn-success" name="post" type="button" id="review-post"><i class="fas fa-save mr-2 icon-blue"></i>Post</button>
                        </div>
                    </div>
                    <hr>
                    <?php
                        echo("<h5 class='mb-4'>".$n." Comments</h5>");
                    ?>
                    <?php
                        for($i=0;$i<sizeof($review_list);$i++){
                            review::render($review_list[$i]);
                        }
                    ?>
                </form>
            </div>
            <?php
                include("fragment/modals.php");
                include("fragment/footer.php");
            ?>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="edit-template-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center p-2 d-block mt-1">
                <h5 class="text-info">Edit</h5>
            </div>
            <div class="modal-body">
                <label for="edit-template-name" class="text-info">Name</label>
                <input id="edit-template-name" class="form-control">
                <label for="edit-template-description" class="my-2 text-info">Description</label>
                <textarea id="edit-template-description" class="form-control" cols="10" maxlength="1000"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info fixed-button" id="edit-template-btn">Confirm</button>
                <button class="btn btn-outline-danger fixed-button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="add-image-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center p-2 d-block mt-1">
                <h5 class="text-info">Add Image</h5>
            </div>
            <div class="modal-body">
                <form id="new-image-form">
                    <label for="new-image">New Image</label>
                    <input type="file" accept="image/jpeg" id="new-image" name="new-image" placeholder="Image" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info fixed-button" id="add-image-btn">Confirm</button>
                <button class="btn btn-outline-danger fixed-button" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script src="/assignment/static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="/assignment/static/vendor/bootstrap/bootstrap.js"></script>
<script src="/assignment/static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="/assignment/static/js/main.js"></script>
<script src="/assignment/static/js/download.js"></script>
<script src="/assignment/static/js/review.js"></script>
<script src="/assignment/static/js/template.js"></script>
</body>
</html>