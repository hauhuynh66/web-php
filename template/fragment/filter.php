<?php
    function filter($type,$mode){
        echo ("<div class='container px-0'>
            <h5 id='filter-type' hidden>$type</h5>
            <div class='input-group'>
                <input class='form-control' placeholder='Search' id='search-param'>
                <button class='input-group-prepend btn btn-info' id='search-btn'><i class='fa fa-search'></i></button>
            </div>
        </div>
        <hr>
        <div class='card shadow'>
            <a href='#filter' class='d-block card-header py-2 normal-text' data-toggle='collapse' role='button' aria-expanded='true' aria-controls='collapseCardExample'>
                <h5 class='font-weight-bold text-primary ml-2'>Filter</h5>
            </a>
            <div class='collapse show' id='filter'>
                    <div class='card-body'>
                        <div class='row d-flex'>");
        if($mode=="dls"){
            echo ("<div class='col-4 mt-2'>
                                <input type='radio' name='filter-type' id='dls-type' checked>
                                <label class='ml-2' for='dls-type'>Most Download</label>
                            </div>
                            <div class='col-4 mt-2'>
                                <input type='radio' name='filter-type' id='new-type'>
                                <label class='ml-2' for='new-type'>New Upload</label>
                            </div>");
        }else{
            echo ("<div class='col-4 mt-2'>
                                <input type='radio' name='filter-type' id='dls-type'>
                                <label class='ml-2' for='dls-type'>Most Download</label>
                            </div>
                            <div class='col-4 mt-2'>
                                <input type='radio' name='filter-type' id='new-type' checked>
                                <label class='ml-2' for='new-type'>New Upload</label>
                            </div>");
        }
        echo("<div class='w-33 justify-content-end'>
             <button type='submit' class='btn btn-outline-info' id='filter-$type'><i class='fa fa-bars mr-2'></i>Filter</button>
             </div></div></div></div></div>
        <hr>");
    }


