<h4 class="text-primary">Upload Template</h4>
<hr>
<div class="row">
    <div class="col-xl-9 col-lg-9 col-mb-9 col-sm-12">
        <form class="form-group" method="post" action="../controller/upload.php" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-2">
                    <label for="file" class="pt-2">File</label>
                </div>
                <div class="col-10">
                    <input id="file" type="file" class="form-control" name="file" accept="application/zip">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label for="image" class="pt-2">Images</label>
                </div>
                <div class="col-10">
                    <input id="image" type="file" name="image[]" class="form-control" multiple="multiple" accept="image/jpeg">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label class="pt-2">Name</label>
                </div>
                <div class="col-10">
                    <input class="form-control" type="text" id="name">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <label class="pt-2">Type</label>
                </div>
                <div class="col-10">
                    <select class="form-control" name="type" id="type">
                        <option>Powerpoint</option>
                        <option>Web</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-info mt-4" type="submit" name="post"><i class="fa fa-upload mr-2"></i>Upload</button>
        </form>
    </div>
</div>