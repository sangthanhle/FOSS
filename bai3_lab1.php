<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAI3_LAB1</title>
    <style>
        div.main {
            display: flex;
            justify-content: center;
            margin-top: 15%;
            text-align: center;
        }

        div.main tr.title {
            background-color: blue;
        }

        div.main tr {
            background-color: aqua;
        }

        table {
            border: solid 2px;
            width: 370px;
            height: 220px;
        }

        input {
            border-radius: 5px;
        }

        input.submit:hover {
            height: 27px;
            background-color: blue;
        }
    </style>
</head>

<body>
    <div class="main">
        <form action="" method="post">
            <table>
                <tr class="title">
                    <th colspan="3">GIẢI PHƯƠNG TRÌNH BẬC 2</th>
                </tr>
                <tr>
                    <td>a</td>
                    <td colspan="2">
                        <input type="text" name="txtA" value="<?php if (isset($_POST['txtA'])
                        && $_POST['txtA'] != NULL) { echo $_POST['txtA']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td>b</td>
                    <td colspan="2">
                        <input type="text" name="txtB" value="<?php if (isset($_POST['txtB'])
                        && $_POST['txtB'] != NULL) { echo $_POST['txtB']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td>c</td>
                    <td colspan="2">
                        <input type="text" name="txtC" value="<?php if (isset($_POST['txtC'])
                        && $_POST['txtC'] != NULL) { echo $_POST['txtC']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input class="submit" type="submit" value="Giải">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td colspan="2">
                        <?php
                        // đọc các hệ số từ FORM
                        if (isset($_POST['txtA'])) {
                            $heso_a = $_POST['txtA'];
                        }
                        if (isset($_POST['txtB'])) {
                            $heso_b = $_POST['txtB'];
                        }
                        if (isset($_POST['txtC'])) {
                            $heso_c = $_POST['txtC'];
                        }

                        function giaiPTB2($a, $b, $c)
                        {
                            // kiểm tra biến đầu vào
                            if ($a == "")
                                $a = 0;
                            if ($b == "")
                                $b = 0;
                            if ($c == "")
                                $c = 0;
                            // in phương trình ra màn hình
                            echo "Phương trình: " . $a . "x^2 + " . $b . "x + " . $c . " = 0";
                            echo "<br>";
                            // kiểm tra các hệ số
                            if ($a == 0) {
                                if ($b == 0) {
                                    echo ("Phương trình vô nghiệm!");
                                } else {
                                    echo ("Phương trình có một nghiệm: " . "x = " . (-$c / $b));
                                }
                                return;
                            }
                            // tính delta
                            $delta = $b * $b - 4 * $a * $c;
                            $x1 = "";
                            $x2 = "";
                            // tính nghiệm
                            if ($delta > 0) {
                                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                                echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
                            } else if ($delta == 0) {
                                $x1 = (-$b / (2 * $a));
                                echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
                            } else {
                                echo ("Phương trình vô nghiệm!");
                            }
                        }
                        // gọi hàm giải phương trình bậc 2
                        // đọc các biến toàn cầu và truyền vào hàm
                        if (is_numeric($heso_a) && is_numeric($heso_b) && is_numeric($heso_c))
                        {
                            giaiPTB2($heso_a, $heso_b, $heso_c);
                        } else {
                            echo ("Giá trị input không hợp lệ!");
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>