<?php
    include("../script/session.php");
    include("../script/template-query.php");
    include("../script/review.php");
    if(!isset($_GET["name"])){
        header("Location:../template/404.php");
    }
    $name = $_GET["name"];
    $result = get_web_template($conn,$name);
    if($result==null){
        header("Location:../template/404.php");
    }
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
                    $downloads = $result["downloads"];
                    $des = $result["description"];
                    $path = $result["path"];
                    $relative_path = "/assignment/image/preview".$path."/";
                    $absolute_path = $_SERVER["DOCUMENT_ROOT"]."/assignment/image/preview".$path."/";
                    $uploader = $result["uploader"];
                    $title = $result["title"];
                    $upload_date = $result["upload_date"];
                    $reviews = get_all_review($conn,$_GET["name"]);
                    $n = mysqli_num_rows($reviews);
                    $file = glob($absolute_path."*.jpg",GLOB_BRACE);
                    $count = 0;
                    if($file){
                        $count = count($file);
                    }
                ?>
                <?php
                    echo("<div class='container text-left'>
                        <h4 class='text-info' id='tp-name'>$title</h4>
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
                        <h5>Description</h5>
                        <hr>
                        <?php
                            echo("<p>$des</p>");
                        ?>
                    </div>
                </div>
                <form method="post" action="../script/review.php">
                    <div class="row">
                        <div class="col-9">
                            <textarea class="form-control" rows="5" name="comment" placeholder="Comment" id="comment"></textarea>
                            <?php
                            $name = $_GET["name"];
                            echo("<input class='form-control' name='template' value='$name' hidden>");
                            echo("<input class='form-control' name='type' value='Web' hidden>")
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
                            <button class="btn btn-block btn-success" name="post" type="submit">
                                <i class="fas fa-save mr-2 icon-blue"></i>Post
                            </button>
                        </div>
                    </div>
                    <hr>
                    <?php
                        echo("<h5 class='mb-4'>".$n." Comments</h5>");
                    ?>
                    <?php
                    while ($row = $reviews->fetch_assoc()){
                        display_review($row);
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
<script src="../static/vendor/jquery/jquery-3.4.1.js"></script>
<script src="../static/vendor/bootstrap/bootstrap.js"></script>
<script src="../static/vendor/font-awesome/js/fontawesome.js"></script>
<script src="../static/js/main.js"></script>
<script src="../static/js/download.js"></script>
</body>
</html>