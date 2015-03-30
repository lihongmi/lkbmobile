<style type="text/css">
    .swiper-container {
        width: 100%;
    }

    #header {
        padding: 10px 0;
        background-color: #e2f5e3;
        margin: 0 -25px;
    }

    #scroll {
        margin: 0 -30px;
    }

    #healthyHeader {
        background-color: #e2f5e3;
    }

    #tag {
        margin-top: 10px;
    }

    #tag li {
        padding: 0 !important;
        margin-bottom: 10px;
    }

    #tag li a {
        display: block;
        width: 60px;
        height: 60px;
        border-radius: 20%;
        margin-left: auto;
        margin-right: auto;
        text-decoration: none;
        font-size: 1.8em;
        color: #ffffff;
    }

    #tag ul {
        padding: 0;
        list-style: none;
    }

    .a2 {
        padding: 17px 11px;
    }

    .a4 {
        padding: 5px 11px;
    }

    .bk-0 {
        background-color: #ea477f;
    }
    .bk-1 {
        background-color: #fd7354;
    }
    .bk-2 {
        background-color: #43a8e2;
    }
    .bk-3 {
        background-color: #fcb60e;
    }
    .bk-4 {
        background-color: #907dc0;
    }
    .bk-5 {
        background-color: #62be98;
    }
    .bk-6 {
        background-color: #ec9147;
    }
    .bk-7 {
        background-color: #c37cd0;
    }


</style>

<div id="header" class="row">
    <div class="col-xs-4" style="padding-top: 2px">
        <a href="/home">
            <img id="logo" src="/images/logo-2.png" width="90px" height="24px" alt="logo" />
        </a>
    </div>
    <div id="search" class="col-xs-8">
        <div class="input-group">
            <input id="searchText" type="text" class="form-control" placeholder="请输入关键词" value="<?php echo $data['keywords']?>">
            <span class="input-group-btn">
                <button id="searchButton" class="btn btn-success" type="button">
                    <span class="glyphicon glyphicon-search" aria-hidden="true" aria-label="search"></span>
                </button>
            </span>
        </div>
    </div>
</div>

<div id="scroll" class="row">
    <div class="col-xs-12">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($data['scrollList'] as $article) {
                    echo "<div class='swiper-slide'>
                    <a href='/article?id=$article->id'>
                        <img src='$article->litpic!300x180' width='100%'/>
                    </a>
                    <h4 style='position: absolute; bottom: 20px; right: 20px; z-index: 10; color: #ffffff;';>$article->title</h4>
                  </div>" ;
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<div id="healthyHeader" class="row">
    <div class="col-xs-4" style="border-left: solid green ">
        <h4 style="color: green">
            健康字典
        </h4>
    </div>
    <div class="col-xs-3 col-xs-offset-5">
        <h5 style="color: green;">
            更多
        </h5>
    </div>
</div>

<div id="tag" class="row">
    <div class="col-xs-12">
        <ul>
            <?php
                foreach($data['tags'] as $key => $value) {

                    // 判断标签的长度，使用不同的css样式
                    if (strlen($value) == 6)
                        echo "<li class='col-xs-3'><a href='/search?keywords=$value' class='a2 bk-$key'><p>". $value ."</p></a></li>";

                    if (strlen($value) == 12)
                        echo "<li class='col-xs-3'><a href='/search?keywords=$value' class='a4 bk-$key'><p>". $value ."</p></a></li>";
                }
            ?>
        </ul>
    </div>
</div>


<h4>推荐列表文章标题</h4>
<ul>
    <?php
    foreach ($data['wapList'] as $article) {
        echo "<li>".$article->title."</li>" ;
    }
    ?>
</ul>

<script>
    window.onload = function() {
        $(document).ready(function () {
            //initialize swiper when document ready
            var mySwiper = new Swiper ('.swiper-container', {
                // Optional parameters
                pagination: '.swiper-pagination',
                paginationClickable: true,
                direction: 'horizontal',
                loop: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false
            });
        });

        $("#searchButton").click(function() {
            var keywords = $("#searchText").val();
            location.href = "/search?keywords=" + keywords;
        });
    }
</script>