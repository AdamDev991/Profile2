
    <!-- PHP START -->
    <?php
if(isset($_POST["Calcule"]))
{
    if(isset($_POST["number"]) && isset($_POST["number2"]) && isset($_POST["fa_operator"]))
    {
        $number = $_POST["number"];
        $number2 = $_POST["number2"];

        if($number >= 0 && $number <= 100 && $number2 >= 0 && $number2<= 100)
        {
            if(empty($_POST["fa_operator"]))
            {
                echo '<p class="error-message">Error: You need to Choose a symbol</p>';
            }
            elseif(!is_numeric($number) || !is_numeric($number2))
            {
                echo '<p class="error-message">Error: You need to assign a number</p>';
            }
        }
        else
        {
            echo '<p class="error-message">Error: You need to assign a number between 0 and 100</p>';
        }
    }
    else
    {
        echo '<p class="error-message">Error: You need to fill all the input fields and choose an operator.</p>';
    }
}

function addition($num1, $num2)
{
    $result = (float)$num1 + (float)$num2;
    return $result;
}

function moins($num1, $num2)
{
    $result = (float)$num1 - (float)$num2;
    return $result;
}

function fois($num1, $num2)
{
    $result = (float)$num1 * (float)$num2;
    return $result;
}

function division($num1, $num2)
{
    if($num2 == 0 || $num1 == 0)
    {
        return "Error: Division by zero is not allowed";
    }
    else
    {
        $result = (float)$num1 / (float)$num2;
        return $result;
    }
}


if(isset($_POST["fa_operator"]) && is_numeric($number) && is_numeric($number2))
{
    $operator = $_POST["fa_operator"];
    switch ($operator)
    {
        case "Plus":
            $result = addition($number, $number2);
            echo '<p class="result-message">RESULT IS :' . $result . '</p>';
            break;
        case "Moins":
            $result = moins($number, $number2);
            echo '<p class="result-message">RESULT IS :' . $result . '</p>';
            break;
        case "Fois":
            $result = fois($number, $number2);
            echo '<p class="result-message">RESULT IS :' . $result . '</p>';
            break;
        case "Division":
            $result = division($number, $number2);
            if(is_numeric($result))
            {
                echo '<p class="result-message">RESULT IS :' . $result . '</p>';
            }
            else
            {
                echo '<p class="error-message">' . $result . '</p>';
            }
            break;
        default:
            echo "Undefined Operator Symbol";
            break;           
    }
}
?>
    <!-- PHP END -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .calculator {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .calculator form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .calculator input[type="text"],
        .calculator input[type="submit"],
        .calculator label {
            margin: 5px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .calculator input[type="text"] {
            flex: 1;
        }

        .calculator input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculator input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-weight: bold;
            position: absolute;
            bottom: 38%;

        }

        .result-message {
            color: green;
            font-weight: bold;
            position: absolute;
            bottom: 38%;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form action="index.php" method="post">
            <input type="text" name="number" placeholder="Enter a number">
            <input type="radio" id="plus" name="fa_operator" value="Plus">
            <label for="plus">+</label>
            <input type="radio" id="moins" name="fa_operator" value="Moins">
            <label for="moins">-</label>
            <input type="radio" id="fois" name="fa_operator" value="Fois">
            <label for="fois">x</label>
            <input type="radio" id="division" name="fa_operator" value="Division">
            <label for="division">/</label>
            <input type="text" name="number2" placeholder="Enter another number">
            <input type="submit" value="Calculate" name="Calcule">
        </form>
    </div>
</body>
</html>