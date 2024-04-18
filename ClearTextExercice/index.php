<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear text Exercices</title>
</head>
    <style>
        body {
            font-family: monospace;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 20px auto;
        }

        #EnterTextPlace , #Generated_text{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
        #Generated_text
        {
            margin-top: 20px;
        }
        textarea:focus
        {
            outline: none;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
        <!-- PHP SECTION -->
    <?php 
        // Transformed Text
        function slugifier($entry)
        {
            $Entertext = strtolower($entry);
            $transformText = str_replace(array("/","<",">","$","-","*",";","!","?",":",",","#",'"',"'"),"", $Entertext);
            $transformText = str_replace(array("%"),"percent",$transformText);
            $transformText = str_replace(array(" "),"-",$transformText);
            $transformText = str_replace(array("á","à","â","ä","å","ã"),"a",$transformText);
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
        // End Tranform Text
        if(isset($_POST["SubmitButton"]))
        {
            $entertext = $_POST["EnterTextPlace"];  
            if(empty($entertext))
            {
                echo"<p> The Text Box Is Empty Please Write Something </p>";
            }
        }  


    ?>
        <!-- FORM SECTION -->
    <form action="index.php" method="post">
        <textarea name="EnterTextPlace" id="EnterTextPlace" cols="30" rows="10" maxlength="250"></textarea>
        <label for="EnterTextPlace"> Enter You text with the special character</label>
        <input type="submit" value="Transfrom" name="SubmitButton">
        <textarea disabled name="Generated_text" id="Generated_text" cols="30" rows="10"><?php if(isset($entertext)){echo slugifier($entertext) ;}?></textarea>
        <label for="Generated_text">Generated text</label>
    </form>

</body>
</html>