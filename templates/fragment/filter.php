<div class="container px-0">
    <div class="input-group">
        <input class="form-control" placeholder="Search">
        <button class="input-group-prepend btn btn-info"><i class="fa fa-search"></i></button>
    </div>
</div>
<hr>
<div class="card shadow">
    <a href="#filter" class="d-block card-header py-2 normal-text" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h5 class="font-weight-bold text-primary ml-2">Filter</h5>
    </a>
    <div class="collapse" id="filter" style="">
        <div class="card-body">
            <form>
                <div class="row form-group">
                    <div class="col-4 mt-2">
                        <input type="radio" name='filter-type' id='dls-type'>
                        <label class="ml-2" for="dls-type">Most Download</label>
                    </div>
                    <div class="col-4 mt-2">
                        <input type="radio" name='filter-type' id='new-type'>
                        <label class="ml-2" for="new-type">New Upload</label>
                    </div>
                    <div class="col-4 float-right">
                        <button type="button" class="btn btn-outline-info" id="filter-btn"><i class="fa fa-bars mr-2"></i>Filter</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<hr>


