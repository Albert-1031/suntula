<?php                  //針對留言的處理
	include_once "database.php";
    session_start();
	/**切換 抓method(送出的資料) */	
	switch ($_GET["method"]) {
		case "add":
			add();
			break;
		case "update":
			update();
			break;
		case "del":
			del();
			break;
		default:
			break;
	}

	function add(){
		/**uid抓id */
		$uid = $_SESSION["id"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		/**插入mes裡的uid等等 */
		$sql = "INSERT INTO `mes` (uid, title, content)
		VALUES ('$uid', '$title', '$content')";
		/**通用連線 */
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		/**呼叫script */
		echo "<script type='text/javascript'>";
		echo "alert('新增留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

	function update(){
		$id = $_GET["id"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		/**更新 設定mes裡內容 */ /**查詢有沒有這個id */
		$sql = "UPDATE `mes` SET title = '$title', content = '$content' WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('編輯留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

	function del(){
		$id = $_GET["id"];
		/**刪除 mes裡*/ /**id(主索引詞) */
		$sql = "DELETE FROM `mes` WHERE id = $id";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		echo "<script type='text/javascript'>";
		echo "alert('刪除留言成功');";
		echo "location.href='index.php';";
		echo "</script>";
	}

?>