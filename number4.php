
<!DOCTYPE html>
<html>
<head>
    <title>Number to Words Converter</title>
</head>
<body>
    <h2>Enter a Number</h2>
    <form method="post" action="">
        <input type="text" name="number" placeholder="Enter a number">
        <input type="submit" value="Convert">
    </form>
    <br>
    <?php
function numberToWords($number) {
    $units = ["", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
    $teens = ["", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
    $tens = ["", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];
    $thousands = ["", "thousand", "million", "billion", "trillion", "quadrillion"];
    
    if ($number == 0) {
        return "zero";
    }
    
    $numArray = str_split(strrev((string)$number), 3);
    $result = '';
    
    for ($i = 0; $i < count($numArray); $i++) {
        $chunk = (int)strrev($numArray[$i]);
        if ($chunk == 0) continue;
        
        $chunkResult = '';
        if ($chunk >= 100) {
            $chunkResult .= $units[$chunk / 100] . ' hundred ';
            $chunk %= 100;
        }
        
        if ($chunk >= 11 && $chunk <= 19) {
            $chunkResult .= $teens[$chunk - 10];
        } elseif ($chunk == 10 || $chunk >= 20) {
            $tensDigit = (int)($chunk / 10);
            $chunkResult .= $tens[$tensDigit];
            if ($chunk % 10 > 0) {
                $chunkResult .= ' ' . $units[$chunk % 10];
            }
        } elseif ($chunk > 0) {
            $chunkResult .= $units[$chunk];
        }
        
        $chunkResult .= ' ' . $thousands[$i];
        $result = $chunkResult . ' ' . $result;
    }
    
    return trim($result);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userInput = isset($_POST["number"]) ? $_POST["number"] : "";

    if (is_numeric($userInput) && is_int((int)$userInput)) {
        $number = (int)$userInput;
        $spelledOut = numberToWords($number);
        echo "Input value: $number<br>";
        echo "Spelled-out form: $spelledOut";
    } else {
        echo "Invalid input. Please enter a valid number.";
    }
}
?>
</body>
</html>
