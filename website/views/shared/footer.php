<!--small footer start -->
<div class="footer-small">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-6 pull-right">
                <ul class="social-link-footer list-unstyled">
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i
                                class="fa fa-facebook"></i></a></li>        
                    
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i
                                class="fa fa-twitter"></i></a></li>
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".6s"><a href="#"><i
                                class="fa fa-skype"></i></a></li>
                   
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".8s"><a href="#"><i
                                class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="copyright">
                    <p>&copy; Copyright - Trường Đại học Sao Đỏ</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=PATH_URL?>/public/js/responsiveslides.min.js"></script>

<script>
    $('#q').focus(function()
    {
        $(this).attr('data-default', $(this).width());
        $(this).animate({ width:370 }, 'slow');
    }).blur(function()
    {
        var w = $(this).attr('data-default');
        $(this).animate({ width: w }, 'slow');
    });
</script>

<script>
    $(function () {
        $("#slider").responsiveSlides({
            auto: true,
            speed: 500,
            namespace: "callbacks",
            pager: true,
        });
    });
</script>

<script>
    this.screenshotPreview = function () {
        xOffset = 10;
        yOffset = 30;
        $("a.screenshot").hover(function (e) {
                this.t = this.title;
                this.title = "";
                var c = (this.t != "") ? "<br/>" + this.t : "";
                $("body").append("<p id='screenshot'><img src='" + this.rel + "' alt='url preview' width='350' height='500' />" + c + "</p>");
                $("#screenshot")
                    .css("top", (e.pageY - xOffset) + "px")
                    .css("left", (e.pageX + yOffset) + "px")
                    .fadeIn("fast");
            },
            function () {
                this.title = this.t;
                $("#screenshot").remove();
            });
        $("a.screenshot").mousemove(function (e) {
            $("#screenshot")
                .css("top", (e.pageY - xOffset) + "px")
                .css("left", (e.pageX + yOffset) + "px");
        });
    };
</script>

</body>
</html>
