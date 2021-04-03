<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<html lang="ja">



<?php
if(isset($_POST['colorname'])) {
    $dsn = 'mysql:dbname=color_php;host=mysql-color';
    $user     = 'root';
    $password = 'root';
    // DBへ接続
    try{
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $select_array=array();
        $query = "select * from kusakabe where name='$_POST[colorname]';";
        $select_array=$PDO->query($query);

        foreach($select_array as $key){
          $order=$key['order'];
          $name=$_POST['colorname'];
          $series=$key['series'];
          $capacity=$_POST['capacity'];
          // クエリの実行
          $query2 = "insert into have_kusakabe values(0, :order, :name, :series, :capacity ,CURRENT_DATE);";
          $stmt = $PDO->prepare($query2);
          $params = array(':order' => $order,':name' => $name,':series' =>$series, ':capacity' =>$capacity); 
          $stmt->execute($params);
        }
    }catch(PDOException $e){
        print("データベースへの登録に失敗しました".$e->getMessage());
        die();
    }
    // 接続を閉じる
    $dbh = null;
}
?>
<?php
if(isset($_POST['delete'])) {
    $dsn = 'mysql:dbname=color_php;host=mysql-color';
    $user     = 'root';
    $password = 'root';
    // DBへ接続
    try{
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "delete from have_kusakabe where id=$_POST[delete];";
        $PDO->query($query);

    }catch(PDOException $e){
        print("データの削除に失敗しました".$e->getMessage());
        die();
    }
    // 接続を閉じる
    $dbh = null;
}
?>




<div class="wrapper">
<nav class="navbar navbar-dark bg-dark sticky-top" style="width: 100%;">
    <span class="navbar-brand">Navbar</span>
    <input class="navbar-brand btn-primary btn-lg" type="button" onclick="location.href='home.php'" value="back">
</nav>
  <div class="card" style="margin-top: 10px; margin-bottom: 10px;">
    <form class="form" style="padding: 10px; margin-top: 16px;" method="POST" action="kusakabe.php">
      <select class="select" name="colorname">
        <option hidden>選択してください</option>
          <?php $dsn = 'mysql:dbname=color_php;host=mysql-color';
          $user     = 'root';
          $password = 'root';
          // DBへ接続
          try{
              $PDO = new PDO($dsn, $user, $password);
              $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $colors_array=array();
              // クエリの実行
              $query = "select * from kusakabe;";
              $colors_array=$PDO->query($query);
          }catch(PDOException $e){
              print("データベースの接続に失敗しました".$e->getMessage());
              die();
          }// 接続を閉じる
          $PDO = null;
          foreach($colors_array as $key){
            echo "<option name='colorname' value='$key[name]'>$key[name]</option>";
          }
          ?>
      </select>
      <select name="capacity">
        <option name="capacity" value="20ml">
          20ml
        </option>
        <option name="capacity" value="40ml">
          40ml
        </option>
        <option name="capacity" value="110ml">
          110ml
        </option>
      </select>
      <button name="save_kusakabe" type="submit" class="btn-lg btn-primary">保存</button>
    </form>
  </div>
  <div class="card overflow-auto" style="max-height: 50%;">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">型番</th>
      <th scope="col">色名</th>
      <th scope="col">色</th>
      <th scope="col">ランク</th>
      <th scope="col">容量</th>
      <th scope="col">購入日</th>
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $dsn = 'mysql:dbname=color_php;host=mysql-color';
  $user     = 'root';
  $password = 'root';
  // DBへ接続
  try{
      $PDO = new PDO($dsn, $user, $password);
      $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $have_array=array();
      $query = "select * from have_kusakabe order by `order` asc;";
      $have_array=$PDO->query($query);
      foreach($have_array as $row){
        echo "<tr>
          <td>$row[order]</td>
          <td>$row[name]</td>
          <td><img src='kusakabe_files/K$row[order].jpg'></td>
          <td>$row[series]</td>
          <td>$row[capacity]</td>
          <td>$row[date]</td>
          <td><form class='form' method='POST' action='kusakabe.php'><button type='submit' name='delete' value='$row[id]'>削除</button></form></td>
        </tr>";
      }
    }
    catch(PDOException $e){
      print("データベースの接続に失敗しました".$e->getMessage());
      die();
    }
    // 接続を閉じる
    $dbh = null;?>
  </tbody>
  </table>
  </div>
</div>

</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<style>
  .formboxkusakabe{
    padding: 10px;
    margin-top: 16px;
  }
.wrapper {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    max-height: 100%;
}

select.imgSel {
    background-repeat: no-repeat;
    background-position: 2px 0;
    /* 背景画像を若干右に移動 */
    padding-left: 62px;
    /* 画像.width + α background-position */
    height: 22px;
    /* 画像.height + 2 (borderの分を足す) */
    font-size: 15px;
    /* 画像.height - 3 */
}

_::-webkit-full-page-media,
_:future,
select.imgSel {
    -webkit-appearance: button;
    appearance: button;
}
</style>