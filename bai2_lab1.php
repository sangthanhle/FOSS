<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BT2_LAB1</title>
    <style>
        div.main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        div.list_cmt table {
            width: 270px;
        }

        div.list_cmt tr {
            background-color: orangered;
        }

        div.input_cmt table {
            text-align: center;
            width: 270px;
            height: 170px;
        }

        div.input_cmt tr.title {
            background-color: blue;
        }

        div.input_cmt tr {
            background-color: aqua;
        }
    </style>
</head>

<body>
<div class="main">
    <div class="input_cmt">
        <form action="" method="post">
            <table>
                <tr class="title">
                    <th colspan="4">GỞI Ý KIẾN</th>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td colspan="3">
                        <input type="text" name="txtHoTen">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td colspan="3">
                        <input type="text" name="txtEmail">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td colspan="3">
                        <textarea name="txtNoiDung" cols="27" rows="7"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="list_cmt">
        <table>
            <tr>
                <th>DANH SÁCH Ý KIẾN</th>
            </tr>
            <tr>
                <td>
                    <?php
                        if (isset($_POST["txtHoTen"]))  // Trường hợp insert
                        {
                            $file = fopen("data.txt","a");  // Mở file
                            $ht = $_POST["txtHoTen"];
                            $email = $_POST["txtEmail"];
                            $nd = $_POST["txtNoiDung"];
                            // Tạo một dòng cmt các thành phần cách nhau tab
                            $dong = "\r\n".$ht."\t".$email."\t".$nd;

                            fputs($file,$dong); // Ghi cmt lên 1 dòng
                            fclose($file);
                        }
                        $file = fopen("data.txt","r");  // Mở file đọc
                        while (!feof($file))    // Nếu chưa cuối file làm
                        {
                            $line = fgets($file);   // Đọc 1 dòng
                            // Bỏ các dòng trống
                            if ($line == "\r\n") continue;
                            $strArr = explode("\t",$line);  // Tách ra các chuỗi con...
                            $str = "";
                            foreach ($strArr as $s) // Duyệt qua hoten, email, noidung
                            $str = "$s<br />";  // Nối lại
                            // Xuất ra 1 dòng, <tr> là thành phần của <table> chính
                            echo "<tr bgcolor=\"orangered\"><td>$str</td></tr>";
                        }
                        fclose($file);  // Đóng file
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>