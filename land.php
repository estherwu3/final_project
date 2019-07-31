<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143256738-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143256738-2');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>客庄景點</title>

    <!-- FAVIOCN -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

    <!-- 網站META -->
    <!-- 說明最好要設，讓Google搜尋能抓到網站說明 -->
    <meta name="keywords" content="客家庄,客家,景點">
    <meta name="description" content="客家庄景點介紹網">
    <meta name="author" content="ESTHER WU">

    <!-- FACEBOOK META -->
    <meta property="og:title" content="客家庄">
    <meta property="og:image" content="./img/huabu.jpg">
    <meta property="og:description" content="客家庄景點介紹網">
    <meta property="og:site_name" content="客家景點">

    <!-- Twitter META -->
    <meta name="twitter:card" content="./img/huabu.jpg">
    <meta name="twitter:site" content="客家 || 景點">
    <meta name="twitter:title" content="客家庄">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="./img/huabu.jpg">

    <!-- Apple META -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/coffee.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">



    <!-- PWA -->
    <link rel="manifest" href="./js/manifest.json">

</head>

<body>

    <div id="particles-js"></div>
    <!-- <nav class="navbar navbar-expand-lg navbar fixed-top shadow-sm"> -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./index.html">
                <img src="./img/Taiwan_Hakka.png" width="30" height="30" class="d-inline-block align-top" alt="">
                客家庄
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.html">
                            <i class="fas fa-home"></i> 首頁
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./land.php">
                            <i class="fas fa-monument"></i> 景點介紹
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./shop.html">
                            <i class="fas fa-info-circle"></i> 旅遊諮詢
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./chart.html">
                            <i class="fas fa-chart-bar"></i> 景點分布圖表
                        </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./map.html">
                            <i class="fas fa-atlas"></i> 客庄台灣地圖分布
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page">
        <div class="container-fluid" id="loading">
            <div class="row h-100">
                <div class="col-12 text-center align-self-center">
                    <img src="./img/earth.svg" alt="" width="300" height="300">
                    <p class="text-white">loading...</p>
                </div>
            </div>
        </div>
        <div class="container" id="content" style="margin-top: 70px; margin-bottom:64px">
            <div class="col-12 text-center text-white rubberBand wow">
                <h1>景點介紹</h1>
            </div>
            <hr class="hr-white">
            <div class="row">
                <div class="col-12">
                    <table id="site" class="table table-hover table-rwd table-light my-2 rounded mx-auto">
                        <thead class="thead-dark rounded tr-hide">
                            <?php
//初始化 curl
  $curl = curl_init();
  //識別發出請求的軟體,/瀏覽器類型
  curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
  
  //預設為ture,要驗證https ssl憑證
  //如果來源是https網站時,沒有做其他設定會錯誤
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
  //將curl回傳的資料以字串接收,而不是直接顯示
/*   curl_setopt($curl, CURLOPT_RETURNTRANSFER,false); */  //AA
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

  curl_setopt($curl, CURLOPT_URL,"https://cloud.hakka.gov.tw/Pub/Opendata/DTST20171100025.json");
  


  //curl_exec($curl); //AA
  $result = curl_exec($curl);
  //關閉curl
  curl_close($curl);

  $json=json_decode($result,true);
?>
                            <tr>
                                <th>景點名稱</th>
                                <th>縣市</th>
                                <th>鄉鎮</th>
                                <th>地址</th>
                                <th>網頁</th>
                                <th style="display:none;">說明</th>
                                <th style="display:none;">緯度</th>
                                <th style="display:none;">經度</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        foreach($json["NewDataSet"]["Table"] as $rec){
                            ?>
                            <tr>
                                <td data-th="景點名稱"><?=$rec["title"]?></td>
                                <td data-th="縣市"><?=$rec["area_name"]?></td>
                                <td data-th="鄉鎮"><?=$rec["country_name"]?></td>
                                <td data-th="地址"><?=$rec["address"]?></td>
                                <td data-th="介紹"><button type="button" class="btn btn-more btn-link">
                                        <i class="fas fa-eye"></i>詳細資料</button></td>
                                <td data-th="地址" style="display:none;"><?=$rec["explanation"]?>
                                <td data-th="緯度" style="display:none;"><?=$rec["latitude"]?>
                                <td data-th="經度" style="display:none;"><?=$rec["longitude"]?>
                            </tr>

                            <?php  
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- card -->
                <div class="modal-body">
                    <img src="" alt="" class="w-100 modal-img">
                    <br>
                    <br>
                    <br>
                    <h6><i class="fas fa-exclamation-circle text-success"></i>&nbsp;&nbsp;說明:<span
                            class="modal-addr"></span></h6>

                    <h6><i class="fas fa-thumbtack text-success"></i>&nbsp;緯度:<span class="modal-latitude"></span></h6>
                    <h6><i class="fas fa-thumbtack text-success"></i>&nbsp;經度:<span class="modal-longitude"></span></h6>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid  mt-4" id="footer">
        <div class="row justify-content-center">
            <div class="col-12 text-white text-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://www.facebook.com/www.hakka.gov.tw/"><i
                                class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href=" https://www.hakka.gov.tw/Content/Content?NodeID=447&PageID=20822&LanguageType=CH"><i
                                class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href=" https://instagram.com/dongshi.hakka?igshid=vg2i0gpdr4us"><i
                                class="fab fa-instagram"></i></a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href=" https://www.tripadvisor.com.tw/Attraction_Review-g13806929-d7064174-Reviews-Taiwan_Hakka_Museum-Tongluo_Miaoli.html?m=19905"><i
                                class="fab fa-tripadvisor"></i></a>
                    </li>
                </ul>
                &copy;<script>
                    let d = new Date;
                    document.write(d.getFullYear());
                </script> ESTHER WU
            </div>
        </div>

        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/wow.min.js"></script>
        <script src="./js/jquery.dataTables.min.js"></script>
        <script src="./js/dataTables.bootstrap4.min.js"></script>
        <script src="./js/particles.min.js"></script>
        <script>
            particlesJS.load('particles-js', './js/particlesjs-config (2).json', function () {});
            $(document).on("readystatechange", function () {
                if (document.readyState == "complete") {
                    $("#loading").fadeOut(2000, function () {
                        $("#content").fadeIn(1000);
                        $("#footer").fadeIn(1000);



                        new WOW().init();
                    });
                }
            })
            $("#site").DataTable({
                "language": {
                    "url": "./js/datatables-chinese-traditional.json"
                },
                // "columnDefs": [{
                //     "targets": 3,
                //     "orderable": false,
                //     "searchable": false
                // }]
            });

            $(".btn-more").on("click", function () {
                let title = $(this).parents("tr").find("td").eq(0).text();
                $("#modal .modal-title").text(title);

                let addr = $(this).parents("tr").find("td").eq(5).text();
                $("#modal .modal-addr").text(addr);

                let lat = $(this).parents("tr").find("td").eq(6).text();
                $("#modal .modal-latitude").text(lat);

                let lon = $(this).parents("tr").find("td").eq(7).text();
                $("#modal .modal-longitude").text(lon);

                // let img = $(this).attr("data-img");
                // $("#modal .modal-img").attr("src", "./img/" + img);

                $("#modal").modal("show");
            });
            document.addEventListener('DOMContentLoaded', function () {
                $('.navbar-toggler').on('click', function () {
                    $(this)
                        .find('[data-fa-i2svg]')
                        .toggleClass('fa-bars')
                        .toggleClass('fa-times');
                });
            });
        </script>
</body>

</html>