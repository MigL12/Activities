<!DOCTYPE html>
<html>
<head>
    <title>Even Numbers from String</title>
</head>
<body>
    <h2>Even Numbers from a String</h2>
    <form method="post" action="">
        <label for="input">Enter a string:</label>
        <input type="text" name="input" id="input">
        <input type="submit" value="Submit">
    </form>

    <?php
    function extract_even_digits($input) {
        $even_digits = "";
        $numeric_chars = str_replace(" ", "", preg_replace("/[^0-9 ]/", "", $input));
        for ($i = 0; $i < strlen($numeric_chars); $i++) {
            $digit = $numeric_chars[$i];
            if ($digit % 2 == 0) {
                $even_digits .= $digit;
            }
        }
        return $even_digits;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input"];
        $even_numbers = extract_even_digits($input);

        if (!empty($even_numbers)) {
            echo "Even numbers: $even_numbers";
        } else {
            echo "No even numbers found.";
        }
    }
    ?>
</body>
</html>
