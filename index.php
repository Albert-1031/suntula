<?php
include_once "database.php";
/**抓database資料 */
session_start();
$sql = "SELECT * FROM `mes`";
$result = mysqli_query($con, $sql) or die('MySQL query error');

?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言版</title>


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
		.card{
			background-color:gray;
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
          background-color:black;
          color:white;
      }
	  a{
		  color:white;
	  }
	  a:hover{
		color:gray;
	  }
	  div.card a:hover{
		color:white
	  }
    </style>
</head>

<body>
<div class="container">
	<!--logo-->
	<div class="parallax">
        <h1>SUNTULA</h1>
        <p>SYSTEM INTEGRATION</p>
        <p>Message board<br>
          留言版</p>
      </div>
	  
	  	<div class="center">
		  <?php if(isset($_SESSION["id"])){?>    <!--如果有id資料的話-->
				<a href="config.php?method=logout">登出</a>
				<a href="add_mes.php">新增留言</a>
				<a href="index.html">回網站首頁</a>
			<?php }else{?>
				<a href="login.php">登入</a>
				<a href="signup.php">註冊</a>
				<a href="index.html">回網站首頁</a>
			<?php }?>
		</div>
			

		<?php 
		    while($row = mysqli_fetch_array($result)){ ?> <!--迴圈 把資料一直秀出來 $row=把結果排成陣列-->
			<div class="card">   <!--要秀的資料 (卡片)-->
				<h4 class="card-header">標題：<?php echo $row['title'];?> <!--標題抓row的title資料-->
				<?php if(@$_SESSION["id"]===$row["uid"]){ ?>     <!--如果登入的id=這份訊息的uid-->  
					<!--做刪除的動作 : 判別訊息處理(mes)關鍵字del.id抓這份訊息的id是第幾個訊息-->
					<a href="mes.php?method=del&id=<?php echo $row["id"]?>" class="btn mybtn">刪除</a>
					<!--到編輯頁面-->
					<a href="update_mes.php?id=<?php echo $row["id"]?>" class="btn mybtn">編輯</a>
				<?php }?>
				</h4>
				<div class="card-body">
					<h5 class="card-title">作者：<?php echo $row["uid"];?></h5>  <!--作者->呼叫uid-->
					<p class="card-text">
						<!--叫出內文-->
						<?php echo $row["content"];?>
						<br>
						<!--叫出時間-->
						<?php echo $row["time"];?>
					</p>
				</div>
			</div>		 
		<?php  	}?>
	</div>
</body>

</html>