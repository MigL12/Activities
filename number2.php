<!DOCTYPE html>
<html>
<head>
    <title>Consonants in a String</title>
</head>
<body>
    <h2>Consonants in a String</h2>
    <form method="post" action="">
        <label for="input">Enter a string:</label>
        <input type="text" name="input" id="input">
        <input type="submit" value="Submit">
    </form>

    <?php
    function is_consonant($char) {
        $char = strtolower($char);
        return (strlen($char) === 1 && preg_match('/[a-z]/i', $char) && !in_array($char, ['a', 'e', 'i', 'o', 'u']));
    }

    function extract_consonants($input) {
        $consonants = "";
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];
            if (is_consonant($char)) {
                $consonants .= $char;
            }
        }
        return $consonants;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input"];
        $consonants = extract_consonants($input);

        if (!empty($consonants)) {
            echo "Consonants in the input: $consonants";
        } else {
            echo "No consonants found in the input.";
        }
    }
    ?>
</body>
</html>
