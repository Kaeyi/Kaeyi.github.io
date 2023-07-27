<!DOCTYPE html>
<html>
<head>
    <title>Table 1 and Table 2</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php
    // Read data from CSV file and populate Table 1
    $table1 = array();
    if (($handle = fopen("Table_Input.csv", "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $table1[$data[0]] = (int) $data[1];
        }
        fclose($handle);
    }

    // Define Table 2 data based on Table 1 calculations
    $table2 = array(
        'Alpha' => $table1['A5'] + $table1['A20'],
        'Beta' => $table1['A15'] / $table1['A7'],
        'Charlie' => $table1['A13'] * $table1['A12']
    );
    ?>

    <h2>Table 1</h2>
    <table>
        <tr>
            <th>Index #</th>
            <th>Value</th>
        </tr>
        <?php
        foreach ($table1 as $index => $value) {
            echo "<tr><td>$index</td><td>$value</td></tr>";
        }
        ?>
    </table>

    <h2>Table 2</h2>
    <table>
        <tr>
            <th>Category</th>
            <th>Value</th>
        </tr>
        <?php
        foreach ($table2 as $category => $value) {
            echo "<tr><td>$category</td><td>$value</td></tr>";
        }
        ?>
    </table>
</body>
</html>
