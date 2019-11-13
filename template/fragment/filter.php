<?php
    function filter($type){
        echo ("<div class='container px-0'>
    <div class='input-group'>
        <input class='form-control' placeholder='Search'>
        <button class='input-group-prepend btn btn-info'><i class='fa fa-search'></i></button>
    </div>
</div>
<hr>
<div class='card shadow'>
    <a href='#filter' class='d-block card-header py-2 normal-text' data-toggle='collapse' role='button' aria-expanded='true' aria-controls='collapseCardExample'>
        <h5 class='font-weight-bold text-primary ml-2'>Filter</h5>
    </a>
    <div class='collapse' id='filter'>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-4 mt-2'>
                        <input type='radio' name='filter-type' id='dls-type'>
                        <label class='ml-2' for='dls-type'>Most Download</label>
                    </div>
                    <div class='col-4 mt-2'>
                        <input type='radio' name='filter-type' id='new-type'>
                        <label class='ml-2' for='new-type'>New Upload</label>
                    </div>
                    <div class='w-third justify-content-end'>
                        <button type='submit' class='btn btn-outline-info' id='filter-$type'><i class='fa fa-bars mr-2'></i>Filter</button>
                    </div>
                </div>
            </div>
    </div>
</div>
<hr>");
    }


