<?php
include_once "database.php";
/**抓database資料檢查是否已登入 */
session_start();
if (!isset($_SESSION["id"])) {
    /***如果未登入不能新增留言 */
    header("Location: login.php");
    /**就回到登入頁 */
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增留言</title>


    <!-- 新 Bootstrap4 核心 CSS 檔案 -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery檔案。務必在bootstrap.min.js 之前引入 -->
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

    <!-- bootstrap.bundle.min.js 用於彈窗、提示、下拉式選單，包含了 popper.min.js -->
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>

    <!-- 最新的 Bootstrap4 核心 JavaScript 檔案 -->
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/ccf0382bbb.js" crossorigin="anonymous">
    </script>
    <!--js效果路徑-->
    <script src="fotorama-4.6.2/fotorama-4.6.2/fotorama.js">
    </script>

    <!--jq外掛ui-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--jq外掛ui-css-->
    <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <script src='zoom-master/jquery.zoom.min.js'></script>
    <script src='zoom-master/jquery.zoom.js'></script>

    <style>
        body{
			background-color:black;
			color:white;
		}
        .parallax {
    min-height: 200px; /*設定區塊高度*/
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }
    /*可滑動背景圖*/
	h1 {
    text-align: center;
      /* font-size: 100px; */
      font-weight: 900;
      -webkit-text-stroke: 0.5px #fff; /**層疊樣式，寬度和顏色屬性**/
      font-family: 'Montserrat', sans-serif;
	  color:gray;
  }
  	p {
    	color: white;
  	}
	  .center{
		  text-align:center;
	  }
      .btn{
          background-color:gray;
          color:white;
      }
    </style>
</head>

<body>
    <div class="container">

        <!--logo-->
	<div class="parallax">
        <h1>SUNTULA</h1>
        <p>SYSTEM INTEGRATION</p>
        <p>Add Message<br>
          新增留言</p>
      </div>


        <form role="form" action="mes.php?method=add" method="post">
            <!--mes留言 add新增-->
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title">
                <!--資料庫名稱title 要轉資料庫-->
            </div>

            <div class="form-group">
                <label for="content">文章內容</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="請輸入內容"></textarea>
            </div>

            <button type="submit" class="btn">新增</button>

        </form>
    </div>
</body>

</html>