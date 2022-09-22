<!DOCTYPE html>
<html lang="ja" class="js-focus-visible" data-js-focus-visible>

<head>
    <meta charset="utf-8">
    <title>被害金額推定</title>
    <link rel="stylesheet" href="style.css" media="all">
</head>

<body>
    <div class="container">
        <h1 class="title">被害金額推定</h1>
        <?php
        $higaikin = 0;
        $x1 = $_GET["people"];
        $x2 = $_GET["value"];
        $x3 = $_GET["intent"];
        $x4 = $_GET["res"];
        $x5 = $_GET["eco"];
        $x6 = $_GET["mind"];
        $x8 = $_GET["indus"];
        $x9 = $_GET["name"];
        $x10 = $_GET["adress"];
        $x11 = $_GET["number"];
        $x12 = $_GET["date"];
        $x13 = $_GET["sex"];
        $x14 = $_GET["job"];
        $x15 = $_GET["email"];
        $x16 = $_GET["id"];
        $x17 = $_GET["soc"];
        $x18 = $_GET["mul"];
        $x19 = $_GET["law"];

        if ($x9 == 1 && $x10 == 1) {
            $x7 = 6;
        } elseif ($x9 == 1 || ($x10 == 1 && $x11 == 1)) {
            $x7 = 3;
        } else {
            $x7 = 1;
        }

        $higaikin1 = -3.9632 + 0.0379 * log($x1) + 0.9904 * log($x2) + 0.6261 * $x3 + 0 * $x4 + 0.1590 * $x5 + 0.0128 * $x6 + 0.2079 * $x7 + $x8 - 0.6231 * $x9 - 0.5169 * $x10 - 0.5337 * $x11 - 0.2348 * $x12 + 0.2624 * $x13 + 0.1453 * $x14 - 0.3845 * $x15 - 0.2810 * $x16;
        #$higaikin = - 4.959 + 0.00000005146 * log($x1) + 1.005 * log($x2) - 0.529 - 0.467 * $x11;
        $higaikin1 = exp($higaikin1) * 100;

        $higaikin2 = 500 * (pow(10, $x6 - 1) + pow(5, $x5 - 1)) * $x7 * $x4 * $x17 * $x1 / 10000;

        $higaikin3 = -3.858 + 0.133 * log($x1) + 0.294 * log($x2 / 113) - 0.352 * $x18 - 0.029 * $x3 + 0.444 * $x19;
        // $higaikin3 = -3.858 + 0.133 * log($x1) + 0.294 * log($x2);
        $higaikin3 = exp($higaikin3) * 100 * 113;
        ?>
        <div style="text-align: center;">各モデルにおいて推定される被害金額は以下の通りです。
            <div id="pri">
                <?php
                echo "<table border='1' style='border-collapse: collapse;' align='center'><tr><th>各モデル</th><th>推定損害額</th></tr><tr><td>山田モデル</td><td>";
                echo number_format($higaikin1, 2);
                echo " 万円</td></tr><tr><td>JOモデル</td><td>";
                echo number_format($higaikin2, 2);
                echo " 万円</td></tr><tr><td>Romanoskyモデル" . '<br>' . "(一部省略版)</td><td>";
                echo number_format($higaikin3, 2);
                echo " 万円</td></tr></table>";
                ?></div>
        </div>

        <div class="form-submit">
            <input type="button" onclick="location.href='./index.html'" value="戻る" class="m-form-submit-button">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/focus-visible@5.2.0/dist/focus-visible.min.js"></script>
</body>

</html>