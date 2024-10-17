<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>

<body>
    <div class="type-3036">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="recent">
                    <h4>RECENT POST</h4>
                    <div class="post">
                        <a href="#">We denounce with righteous indignation and dislike men who are...</a>
                        <p><i class="far fa-clock"></i>September 21, 2019</p>
                    </div>

                    <div class="post">
                        <a href="#">Plesures and praising pains was born and will give you ....</a>
                        <p><i class="far fa-clock"></i>September 21, 2019</p>
                    </div>

                    <div class="post">
                        <a href="#">Plesures and praising pains was born and will give you ....</a>
                        <p><i class="far fa-clock"></i>September 21, 2019</p>
                    </div>

                </div>

                <div class="blog">
                    <h4>BLOCK ARCHIVES</h4>
                    <div class="post">
                        <p><i class="far fa-folder"></i>September 21, 2019 <span style="margin-left: 60px;">(8)</span></p>
                    </div>
                </div>

                <div class="tag">
                    <h4>POPULAR TAGS</h4>
                    <div class="tag-content">
                        <a class="border p-2" href="#">Full Damage</a>
                        <a class="border p-2" href="#">Ideas</a>
                        <a class="border p-2" href="#">Pc&Laptop</a>
                        <a class="border p-2" href="#">Pin Number</a>
                        <a class="border p-2" href="#">Unlocked</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>