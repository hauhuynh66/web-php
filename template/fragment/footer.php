<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-double-up"></i></button>
<footer class="text-center">
    <div class="row mt-2">
        <div class="col-xl-4 col-lg-6 col-mb-6 col-sm-12">
            <p class="text-primary">PowerPoint</p>
            <a href="../templates/powerpoint.php?page=1&filter=dls" class="footer-link">Most Downloads</a>
            <a href="../templates/powerpoint.php?page=1&filter=new" class="footer-link">Recently Uploads</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-mb-6 col-sm-12">
            <p class="text-primary">Web</p>
            <a href="../templates/web.php?filter=dls&page=1" class="footer-link">Most Downloads</a>
            <a href="../templates/web.php?filter=new&page=1" class="footer-link">Recently Uploads</a>
        </div>
        <div class="col-xl-4 col-lg-6 col-mb-6 col-sm-12">
            <p class="text-primary">Contacts</p>
            <div class="container-fluid">
                <a href="https://facebook.com">
                    <i class="fab fa-facebook fa-2x"></i>
                </a>
                <a href="https://google.com.vn" class="ml-3">
                    <i class="fab fa-google fa-2x icon-danger"></i>
                </a>
                <a href="https://twitter.com" class="ml-3">
                    <i class="fab fa-twitter fa-2x icon-info"></i>
                </a>
                <a href="https://instagram.com" class="ml-3">
                    <i class="fab fa-linkedin fa-2x icon-info"></i>
                </a>
                <a href="https://github.com/hauhuynh66" class="ml-3">
                    <i class="fab fa-github fa-2x icon-black"></i>
                </a>
            </div>
            <div class="container-fluid text-center mt-2">
                <p class="text-dark mb-0">Phone : 01234567xxx</p>
                <p class="text-dark">Address : BK University</p>
            </div>
            <div class="container">
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-12">
        <?php
            $t = time();
            echo(date("Y-m-d",$t));
            echo(" - &copy; Free Templates<sup>TM<sup>");
        ?>
        </div>
    </div>
</footer>