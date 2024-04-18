<?php         
        function slugifier($entry)
        {
            $transformText = strtolower($entry);
            $transformText = str_replace(array("/","<",">","$","-","*",";","!","?",":",",","#",'"',"'"),"", $transformText);
            $transformText = str_replace(array("%"),"percent",$transformText);
            $transformText = str_replace(array(" "),"-",$transformText);
            $transformText = str_replace(array("á","à","â","ä","å","ã","Â","Å"),"a",$transformText);
            $transformText = str_replace(array("æ"),"ae",$transformText);
            $transformText = str_replace(array("ç"),"c",$transformText);
            $transformText = str_replace(array("é","è","ê","ë"),"e",$transformText);
            $transformText = str_replace(array("í","ì","î","ï"),"i",$transformText);
            $transformText = str_replace(array("ó","ò","ô","ö","õ","ø"),"o",$transformText);
            $transformText = str_replace(array("ç"),"c",$transformText);
            $transformText = str_replace(array("ñ"),"n",$transformText);
            $transformText = str_replace(array("œ"),"oe",$transformText);
            $transformText = str_replace(array("š"),"s",$transformText);
            $transformText = str_replace(array("ú","ù","û","ü"),"u",$transformText);
            $transformText = str_replace(array("ý","ÿ"),"y",$transformText);
            $transformText = str_replace(array("ž"),"z",$transformText);
            return $transformText;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SVC File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 400px;
            background-color: #f9f9f9;
        }
        label {
            font-weight: bold;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
        <label for="File"> Select a File </label><br>
        <input type="file" name="csv_file" id="File" accept=".csv"><br>
        <input type="submit" value="Upload" name="Upload">
    </form>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["csv_file"]) && $_FILES["csv_file"]["error"] == 0) {
        $file_name = $_FILES["csv_file"]["name"];
        $file_size = $_FILES["csv_file"]["size"];
        $file_tmp = $_FILES["csv_file"]["tmp_name"];
        $file_ext = explode(".", $file_name);
        $file_real_ext = strtolower(end($file_ext));
        $row = 1;

        if (($handle = fopen($file_name, "r")) !== FALSE) {

            $output_filename = 'modified_' . basename($file_name);
            $output_handle = fopen($output_filename, 'w');

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $num = count($data);
                $modified_data = [];

                for ($c = 0; $c < $num; $c++) {
                    switch ($c) {
                        case 0:
                            $value = $data[0];
                            break;
                        case 1:
                            $value = $data[1];
                            break;
                        case 2:
                            $value = $data[2];
                            break;
                        case 3:
                            $value = $data[3];
                            break;
                        case 4:
                            if (empty($data[4])) {
                                $variantComparePrice = str_replace(",", ".", $data[2]);
                                $variantPrice = str_replace(",", ".", $data[1]);
                                $diffrenceprice = (float)$variantComparePrice - (float)$variantPrice;
                                $value = $diffrenceprice;
                            } else {
                                $value = $data[4];
                            }

                            break;
                        case 5:
                            if (empty($data[5])) {
                                $stock = $data[3];
                                $variantPrice = str_replace(",", ".", $data[1]);
                                $ROI = (float)$variantPrice * (float)$stock;
                                $value = $ROI;
                            } else {
                                $value = $data[5];
                            }
                            break;
                        case 6:
                            if (empty($data[6])) {
                                $title = $data[0];
                                $slug = slugifier($title);
                                $value = $slug;
                            } else {
                                $value = $data[6];
                            }
                            break;
                    }

                    $modified_data[] = $value;
                }

                fputcsv($output_handle, $modified_data, ";");
            }

            // Close both input and output files
            fclose($handle);
            fclose($output_handle);

            // Provide link to download the modified CSV file
            echo '<p class="success"><a href="' . $output_filename . '">Download CSV File</a></p>';
        }
    } else {
        echo '<p class="error">Error uploading file.</p>';
    }
}
?>

</body>
</html>
