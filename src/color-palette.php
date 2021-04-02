<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="../css/styles.css">

<?php
if(isset($_POST['colorpalatte'])) {
    $dsn = 'mysql:dbname=color_php;host=localhost';
    $user     = 'root';
    $password = '';
    // DBへ接続
    try{

        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $color=$_POST['colorpalatte'];
        // クエリの実行
        $query = "insert into color_palatte(rgb) values(:color);";
        $stmt = $PDO->prepare($query);
        $params = array(':color' => $color); 
        $stmt->execute($params);


    }catch(PDOException $e){
        print("データベースの接続に失敗しました".$e->getMessage());
        die();
    }
    // 接続を閉じる
    $dbh = null;
}
?>
<?php
if(isset($_POST['delete'])) {
    $dsn = 'mysql:dbname=color_php;host=localhost';
    $user     = 'root';
    $password = '';
    // DBへ接続
    try{
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "delete from color_palatte where id=$_POST[delete];";
        $PDO->query($query);

    }catch(PDOException $e){
        print("データベースの接続に失敗しました".$e->getMessage());
        die();
    }
    // 接続を閉じる
    $dbh = null;
}
?>


<div class="wrapperWhite">
    <nav class="navbar navbar-dark bg-dark sticky-top" style="width: 100%">
        <span class="navbar-brand">Navbar</span>
        <input class="navbar-brand btn-primary btn-lg" type="button" onclick="location.href='home.php'" value="back">
    </nav>
    <div class="container">
        <div id="colorcode"></div>
        <label for="colorWell"></label>
        <input class="color" type="color" value="#ffffff" id="colorWell">
        <form class="form" method="POST" action="color-palette.php">
            <input type="hidden" id="colorpalatte" name="colorpalatte" value="">
            <p>選択されている色</p>
            <button type="submit" style="background-color: #000000;">
                パレット保存
            </button>
        </form>
    </div>
    <div class="card overflow-auto" style="max-height: 40%;">
    <div class="container-fluid">
        <div class="flex">
            <?php 
                $dsn = 'mysql:dbname=color_php;host=localhost';
                $user     = 'root';
                $password = '';
                // DBへ接続
                try{
                    $PDO = new PDO($dsn, $user, $password);
                    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $colors_array=array();
                    // クエリの実行
                    $query = "select * from color_palatte order by rgb asc;";
                    $stmt=$PDO->prepare($query);
                    $colors_array = $stmt->execute();
                }catch(PDOException $e){
                    print("データベースの接続に失敗しました".$e->getMessage());
                    die();
                }// 接続を閉じる
                $PDO = null;
                if(count($colors_array)>0){
                    foreach($stmt as $key){
                    echo "
                    <form class='boxform' method='POST' action='color-palette.php'>
                    <input style='height=90px' type='hidden' name='delete' value='$key[id]'>
                    <button class='circle' style='background-color: $key[rgb]; margin-bottom: 0;' type='submit' onclick='return confirmDelete()'>
                    </button>
                    </input>
                    </form>
                   
                    ";
                }
            }?>
        </div>
    </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>
var colorWell;
var defaultColor = "#ffffff";

window.addEventListener("load", startup, false);


function startup() {
    colorWell = document.querySelector("#colorWell");
    colorWell.value = defaultColor;
    colorWell.addEventListener("input", updateFirst, false);
    colorWell.addEventListener("change", updateAll, false);
    colorWell.select();
}


function updateFirst(event) {
    var p = document.querySelector("p");
    
    if (p) {
        p.style.color = event.target.value;
        document.getElementById("colorpalatte").value = event.target.value;
    }
}

function updateAll(event) {
    document.querySelectorAll("p").forEach(function(p) {
        p.style.color = event.target.value;
        document.getElementById("colorpalatte").value = event.target.value;
    });
}


function confirmDelete(){
    flag = confirm("削除しますか？");
    // 「はい」が押されたときの処理
    if ( flag == true ){
        return true;
    }else{    // 「いいえ」が押されたときの処理
        return false;
    }
};

</script>

<style>
    .left{
        width:90px;
        height:90px;
        text-align:left;
    }
    .palatte{
        text-align:left;
        display: inline-block;
        width: 90px;
        margin-right: auto;
        margin-left : auto;
        margin-top: 1px;
        margin-bottom: 1px;
    }
    .boxform{
        text-align:left;
        display: inline-block;
        width: 90px;
        height: 90px;
        margin-right: auto;
        margin-left : auto;
        margin-top: 1px;
        margin-bottom: 1px;
        padding: 2px;
    }
    input.color {
        width: 100px;
        height: 100px;
    }

    .circle {
        text-align:center;
        height: 80px;
        width: 80px;
        border: solid 2px black;
        margin-right: auto;
        margin-left : auto;
        margin-top: auto;
        margin-bottom: auto;
    }

    .flex {
        flex-grow: 0;
        flex-shrink: 0;
        padding: 2.5% 0;
        flex-direction: row;
        flex-wrap: wrap;
        text-align: center;
    }
</style>