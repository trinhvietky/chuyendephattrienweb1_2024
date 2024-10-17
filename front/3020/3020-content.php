<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<div class="type-3020">
    <header class="baner text-white py-4 ">
        <div class="container baner-content">
            <span class="badge bg-success">Fast Service</span>
            <h1 class="my-3">Why Quick Repairs Matter: How MobiCare Keeps You Connected</h1>
            <hr>
            <p class="text-white"><i class="fa fa-calendar"></i> October 8, 2024 <i class="fa fa-commenting-o"></i> No Comments</p>
        </div>
    </header>

    <section class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <img src="./img/master-in-electronics-repair-service-center-fixing-smartphone.jpg" alt="Phone Repair" class="img-fluid mb-4 rounded">
            </div>

            <div class="col-md-4">
                <div class="bg-light p-3 rounded">
                    <h4 class="category_name">Popular Categories</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Phone Issues</a></li>
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Repair Advice</a></li>
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Screen Protection</a></li>
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Screen Protection</a></li>
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Camera Repair</a></li>
                        <li class="list-group-item"><i class="fa fa-tags"></i><a href="#">Maintenance Tips</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>