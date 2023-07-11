<?php
include 'dbconn.php';
require "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_GET['gen'])) {

    $par = $_GET['gen'];

    if ($par === 'users') {
        echo "user data base";
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Users");

        $sql = "select * from `users`";

        $result = mysqli_query($con, $sql);

        $i = 3;

        if ($result && mysqli_affected_rows($con) > 0) {
            $sheet->setCellValue("B" . 1, "Users List Report");
            $sheet->setCellValue("A" . 2, "id");
            $sheet->setCellValue("B" . 2, "user name");
            $sheet->setCellValue("C" . 2, "email");
            $sheet->setCellValue("D" . 2, "password");
            $sheet->setCellValue("E" . 2, "role");
            $sheet->setCellValue("F" . 2, "intime");
            $sheet->setCellValue("G" . 2, "outtime");

            while ($row = mysqli_fetch_assoc($result)) {
                $sheet->setCellValue("A" . $i, $row["uid"]);
                $sheet->setCellValue("B" . $i, $row["username"]);
                $sheet->setCellValue("C" . $i, $row["email"]);
                $sheet->setCellValue("D" . $i, $row["password"]);
                $sheet->setCellValue("E" . $i, $row["urole"]);
                $sheet->setCellValue("F" . $i, $row["intime"]);
                $sheet->setCellValue("G" . $i, $row["outtime"]);
                $i++;
            }
            // (E) SAVE FILE
            ob_clean();
            ob_start();
            $writer = new Xlsx($spreadsheet);
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header("Content-Disposition: attachment;filename=\"users list report.xlsx\"");
            header("Cache-Control: max-age=0");
            header("Expires: Fri, 11 Nov 2030 11:11:11 GMT");
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: cache, must-revalidate");
            header("Pragma: public");
            $writer->save("php://output");
            ob_end_flush();

            header("Location: ../pages/reportPage.php?success=Users Report generated successfully.");

        }else{
            header("Location: ../pages/reportPage.php?error=Users Report not generated empty table.");
        }



    } else if ($_GET['gen'] === 'store') {
        echo "store data base";
        $par = $_GET['gen'];

        if ($par === 'store') {
            echo "user data base";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle("Store List Report");

            $sql = "select * from `store`";

            $result = mysqli_query($con, $sql);

            $i = 3;

            if ($result && mysqli_affected_rows($con) > 0) {

                $sheet->setCellValue("B" . 1, "Store List Report");
                $sheet->setCellValue("A" . 2, "id");
                $sheet->setCellValue("B" . 2, "Item name");
                $sheet->setCellValue("C" . 2, "Item type");
                $sheet->setCellValue("D" . 2, "Quantity");
                $sheet->setCellValue("E" . 2, "Price");

                while ($row = mysqli_fetch_assoc($result)) {
                    $sheet->setCellValue("A" . $i, $row["id"]);
                    $sheet->setCellValue("B" . $i, $row["item_name"]);
                    $sheet->setCellValue("C" . $i, $row["item_type"]);
                    $sheet->setCellValue("D" . $i, $row["quantity"]);
                    $sheet->setCellValue("E" . $i, $row["price"]);
                    $i++;
                }
                // (E) SAVE FILE
                ob_clean();
                ob_start();
                $writer = new Xlsx($spreadsheet);
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                header("Content-Disposition: attachment;filename=\"Store list report.xlsx\"");
                header("Cache-Control: max-age=0");
                header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: cache, must-revalidate");
                header("Pragma: public");
                $writer->save("php://output");
                ob_end_flush();

                header("Location: ./pages/reportPage.php?success=Store Report generated successfully.");

            }else{
                header("Location: ../pages/reportPage.php?error=Store Report not generated empty table.");
            }
        }

    } else if ($_GET['gen'] === 'sells') {
        echo "sells data base";

        echo "store data base";
        $par = $_GET['gen'];

        if ($par === 'sells') {
            echo "user data base";
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle("sells List Report");

            $sql = "select * from `sells`";

            $result = mysqli_query($con, $sql);

            $i = 3;

            if ($result && mysqli_affected_rows($con) > 0) {

                $sheet->setCellValue("B" . 1, "Sells List Report");
                $sheet->setCellValue("A" . 2, "id");
                $sheet->setCellValue("B" . 2, "Items");
                $sheet->setCellValue("C" . 2, "Date and time");
                $sheet->setCellValue("D" . 2, "Total Price");
                $sheet->setCellValue("D" . 2, "sells person");

                while ($row = mysqli_fetch_assoc($result)) {
                    $sheet->setCellValue("A" . $i, $row["id"]);
                    $sheet->setCellValue("B" . $i, $row["items"]);
                    $sheet->setCellValue("C" . $i, $row["date_time"]);
                    $sheet->setCellValue("D" . $i, $row["total_price"]);
                    $sheet->setCellValue("E" . $i, $row["user"]);
                    $i++;
                }
                // (E) SAVE FILE
                ob_clean();
                ob_start();
                $writer = new Xlsx($spreadsheet);
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                header("Content-Disposition: attachment;filename=\"Sells list report.xlsx\"");
                header("Cache-Control: max-age=0");
                header("Expires: Fri, 11 Nov 2011 11:11:11 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                header("Cache-Control: cache, must-revalidate");
                header("Pragma: public");
                $writer->save("php://output");
                ob_end_flush();

                header("Location: ./pages/reportPage.php?success=Sells Report generated successfully.");
            }else{
                header("Location: ../pages/reportPage.php?error=Sells Report not generated empty table.");
            }
        }
    }
}
?>