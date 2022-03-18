<?php 
    include_once "database.php";
	/**切換 抓method(送出的資料) */
	switch ($_GET["method"]) {
		/** 資料是login */
		case "login":
			 /**執行function login */
			login();
			break;
		case "signup":
			signup();
			break;
		case "logout":
			logout();
			break;
		default:
			break;
	}

	function login(){
		/**查詢=選取資料庫member */
		$sql="SELECT * FROM `member`
				WHERE username = '$_POST[username]' && password = '$_POST[password]'";
		global $con;
		$result = mysqli_query($con , $sql) or die('MySQL query error');
		/**列內容做陣列資料 */
	    $row = mysqli_fetch_array($result);
		 /**row=空 */
	    if($row==""){
			echo "<script type='text/javascript'>";
			echo "alert('帳密錯誤');";
			echo "location.href='login.php';";
			echo "</script>";
	    }else{
	    	session_start();
			/**使用者輸入=列的id*/
	    	$_SESSION["id"] = $row['id'];
	    	echo "<script type='text/javascript'>";
			echo "alert('登入成功');";
			/**回首頁 */
			echo "location.href='index.php';";
			echo "</script>";
	    }
	} 

	function signup(){
		 /**查詢=選取資料庫member */
		$sql="SELECT * FROM `member`
				WHERE username = '$_POST[username]'";
		global $con;
	    $result = mysqli_query($con , $sql) or die('MySQL query error');
		/**列內容做陣列資料 */
	    $row = mysqli_fetch_array($result);
		/**row不等於空 */
		if($row!=""){
			echo "<script type='text/javascript'>";
			echo "alert('已有此帳號');";
			/**回登入頁 */
			echo "location.href='login.php';";
			echo "</script>";
		}
		else{
			/**插入mes的資料uid 標題 內容 */
			$sql="INSERT INTO `member` (username, password, name)
					VALUES ('$_POST[username]','$_POST[password]','$_POST[name]')";
			global $con;
		    $result = mysqli_query($con , $sql) or die("MySQL query error");
		    
			$sql="SELECT * FROM `member`
				WHERE username = '$_POST[username]' && password = '$_POST[password]'";
			global $con;
	    	$result = mysqli_query($con , $sql) or die('MySQL query error');
			/**列內容做陣列資料 */
	    	$row = mysqli_fetch_array($result);		    
		    session_start();
	    	$_SESSION["id"] = $row["id"];
		 	echo "<script type='text/javascript'>";
			echo "alert('註冊成功');";
			/**回首頁 */
			echo "location.href='index.php';";
			echo "</script>";
		}
	} 

	function logout(){
		session_start();
		if(isset($_SESSION["id"])){
			session_unset();
			echo "<script type='text/javascript'>";
			echo "alert('登出成功');";
			/**回首頁 */
			echo "location.href='index.php';";
			echo "</script>";
		}
	} 

?>