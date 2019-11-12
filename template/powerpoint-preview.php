<?php
    require_once("../controller/session.php");
    require_once("../model/template.php");
    require_once("../controller/review.php");
    require_once("../controller/utils.php");
    if(!isset($_GET["name"])){
        header("Location:../template/404.php");
    }
    $name = $_GET["name"];
    $template = new template($conn);
    $review = new review($conn);
    $result = $template->get_by_name($name,"powerpoint")->fetch_assoc();
    if($result==null){
        header("Location:../template/404.php");
    }
    $name = $result["name"];
    $downloads = $result["downloads"];
    $des = $result["description"];
    $relative_path = "/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
    $absolute_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview/".$result["type"]."/".$result["name"]."/";
    $uploader = $result["uploader"];
    $upload_date = $result["upload_date"];
    $reviews = $review->get_all($_GET["name"]);
    $n = mysqli_num_rows($reviews);
    $count = count_file($absolute_path,["*.jpg"]);
?>
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
        <div class="col-sm-12 col-mb-3 col-lg-3 col-xl-3 sidebar bg-danger" id="sidebar">
            <?php
                include("fragment/sidebar.php");
            ?>
        </div>
        <div class="col-sm-12 col-mb-9 col-lg-9 col-xl-9 content" id="content">
            <?php
                include("fragment/topbar.php");
            ?>
            <div class="main-content  my-4 ml-4">
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
                            <div class="card-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <?php
                                    echo("<ol class=\"carousel-indicators\">");
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
                                                echo("<div class=\"carousel-item active\">
                                                    <img class=\"d-block w-100\" src='$img' alt='$j slide'>
                                                    </div>");
                                            }else{
                                                echo("<div class=\"carousel-item\">
                                                    <img class=\"d-block w-100\" src='$img' alt='$j slide'>
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
                                        <h5 class="pt-2">Share : </h5>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-info round"><i class="fab fa-facebook"></i></div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-warning round"><i class="fab fa-twitter"></i></div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <div class="btn btn-success round"><i class="fab fa-linkedin"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-xl-4 col-lg-4 col-mb-4 col-sm-12">
                        <h5>Properties</h5>
                        <hr>
                        <?php
                            echo("<p>Upload by : <a href='./list.php?uploader=$uploader'>$uploader</a></p>");
                            echo("<p>Upload date : ".$upload_date."</p>");
                            echo("<p>Downloads : $downloads</p>
                                    <div class='row'>
                                        <div class='col-12'>
                                            <button class='btn btn-block btn-info' data-toggle='modal' data-target='#download-modal' id='download-btn'>
                                                <i class='fas fa-download mr-2'></i>Download
                                            </button>
                                        </div>
                                    </div>");
                        ?>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-mb-8 col-sm-12">
                        <h5>Description</h5>
                        <hr>
                        <?php
                            echo("<p>$des</p>");
                        ?>
                    </div>
                </div>
                <form method="post" action="../controller/review.php">
                    <div class="row">
                        <div class="col-9">
                            <textarea class="form-control" rows="5" name="comment" placeholder="Comment" id="comment"></textarea>
                            <?php
                            $name = $_GET["name"];
                            echo("<input class='form-control' name='template' value='$name' hidden>");
                            echo("<input class='form-control' name='type' value='Powerpoint' hidden>")
                            ?>
                        </div>
                        <div class="col-3">
                            <div class="container text-center">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4"/><label class = "full" for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3"/><label class = "full" for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2"/><label class = "full" for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1"></label>
                                </fieldset>
                            </div>
                            <button class="btn btn-block btn-success" name="post" type="submit"><i class="fas fa-save mr-2 icon-blue"></i>Post</button>
                        </div>
                    </div>
                    <hr>
                    <?php
                        echo("<h5 class='mb-4'>".$n." Comments</h5>")
                        ?>
                        <?php
                        while ($row = $reviews->fetch_assoc()){
                            $review->render($row);
                        }
                    ?>
                </form>
            </div>
            <?php
                include("fragment/footer.php");
                include("fragment/modals.php");
            ?>
        </div>
    </div>
</div>
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/download.js"></script>
</body>
</html>