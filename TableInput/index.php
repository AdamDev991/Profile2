
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT TABLE</title>
</head>
        <!-- CSS -->
    <style>
              /* General styling */
              body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for form and table */
        .container {
            width: 80%;
            position: relative;
        }

        /* Form styling */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: calc(100% - 20px); /* Subtract padding from width */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: calc(100% - 20px); /* Subtract padding from width */
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p.error-message {
            color: red;
            font-weight: bold;
            position: absolute;
            top: 100%;
            width: 100%;
            text-align: center;
        }

    </style>
<body>
    <section class="container">
       <!-- FORM -->
        <form action="index.php" method="post">
            <input type="text" name="Verical_Input" id = "Verical_Input">
            <label for="First_Input"> VERTICAL CELL </label><br>
            <input type="text" name="Horizontal_Input" id = "Horizontal_Input">
            <label for="Second_Input"> HORZONTAL CELL </label><br>
            <input type="submit" value="Generate" id="submitone" name="ButtonName" >
        </form>
        <br>
        <p>     </p>
    </section>

    <section class="container">

        <?php 
        if(isset($_POST["ButtonName"]))
        {
            $horizontal = $_POST["Horizontal_Input"];
            $vertical = $_POST["Verical_Input"]; 
            if(empty($horizontal) || empty($vertical))
            {
                echo '<p style="color: red; font-weight: bold; position: absolute; top: 34%;">Error: Assign a Number</p>';

            }
            elseif(isset($horizontal) && !is_numeric($horizontal) && !is_numeric($vertical))
            {
                echo '<p style="color: red; font-weight: bold; position: absolute; top: 34%; ">Error: You need to assign a numeric input</p>';
            }elseif($horizontal >0 && $horizontal <= 20 && $vertical >0 && $vertical <= 20)
            {
                if(isset($vertical) && is_numeric($vertical) && is_numeric($horizontal))
                {
                    echo "<table border='1'>";
                    for ($i = 0; $i < $vertical; $i++) 
                    {
                        echo "<tr>";
                            for ($j = 0; $j < $horizontal; $j++)
                            {
                                echo '<td> line '. $i + 1 .' collumn '. $j + 1 . '</td>';
                            }
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            else
            {
                echo '<p style="color: red; font-weight: bold; position: absolute; top: 34%;">You need to assign a number between 0 and 20</p>';
            }


    }
        ?>
    </section>

<!-- PHP START -->


</body>

</html>