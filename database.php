<?php                              //連線資料庫用
    $server='localhost';
    $id='root';
    $pwd='';
    $dbname='board';  /***設定資料庫名稱 */
    $con=mysqli_connect($server,$id,$pwd);  /*設定連線常數 mysqli(php5跟資料庫連結方式)找伺服器id密碼 */
    if(!$con){
        die("Count not connect:".mysql_error());  /**如果連線死了秀出.mysql_error */
    }
    mysqli_select_db($con,$dbname);            /**選擇資料庫 連線資料庫名稱 */
    mysqli_query($con,"SET NAMES utf8");        /**查詢 連線設編碼utf8 */
    ?>