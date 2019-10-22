<div class="row pb-3">
    <div class="col-12">
        <div class="input-group">
            <input class="form-control" placeholder="Search">
            <button class="input-group-prepend btn btn-info"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>
<p>Order By</p>
<hr>
<form>
<div class="row">
    <div class="col-4 form-inline">
        <?php
            if(isset($_GET["filter"])){
                if($_GET["filter"]=="dls"){
                    echo("<input type=\"checkbox\" name='filter-type' class=\"form-control\" checked>");
                }else{
                    echo("<input type=\"checkbox\" name='filter-type' class=\"form-control\">");
                }
            }
        ?>
        <label class="ml-2">Most Download</label>
    </div>
    <div class="col-4 form-inline">
        <?php
        if(isset($_GET["filter"])){
            if($_GET["filter"]=="new"){
                echo("<input type=\"checkbox\" name='filter-type' class=\"form-control\" checked>");
            }else{
                echo("<input type=\"checkbox\" name='filter-type' class=\"form-control\">");
            }
        }
        ?>
        <label class="ml-2">New Upload</label>
    </div>
    <div class="col-4 float-right">
        <button type="button" class="btn btn-outline-info"><i class="fa fa-bars mr-2"></i>Filter</button>
    </div>
</div>
</form>

