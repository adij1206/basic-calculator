<!DOCTYPE html>
<html lang="en">
<body>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
        <input type = "number" name = "nums0" placeholder="Number One" required>
        <select name = "operator">
            <option value = "add">+</option>
            <option value = "subtract">-</option>
            <option value = "multiply">*</option>
            <option value = "divide">/</option>
        </select>
        <input type = "number" name = "nums1" placeholder="Number Two" required>
        <button>Calculate</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nums0 = filter_input(INPUT_POST, "nums0", FILTER_SANITIZE_NUMBER_FLOAT);
            $nums1 = filter_input(INPUT_POST, "nums1", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            $errors = false;

            if (empty($nums0) || empty($nums1) || empty($operator)) {
                $errors = true;
                echo "<p class='calc-error'> Fill the empty fields</p>";
            }

            if (!is_numeric($nums0) || !is_numeric($nums1)) {
                $errors = true;
                echo "<p class='calc-error'> Fill the empty fields</p>";
            }

            if (!$errors) {
                $value;
                switch($operator) {
                    case "add" :
                        $value = $nums0 + $nums1;
                        break;
                    case "subtract" :
                        $value = $nums0 - $nums1;
                        break;
                    case "multiply" :
                        $value = $nums0 * $nums1;
                        break;
                    case "divide" :
                        $value = $nums0 / $nums1;
                        break;
                    default :
                        echo "<p class='calc-error'> Something went wrong</p>";
                        break;
                }

                echo "<p class = 'calc-result'>Result = " . $value . "</p>"; 
            }
        } 
    ?>
</body>
</html>
