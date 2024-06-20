<!-- Generate with chatgpt -->
<!DOCTYPE html>
<html>
<head>
    <title>Snort Alerts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            border: 1px solid #e0e0e0;
            text-align: left;
        }

        th {
            background-color: #961412;
            color: #fdb813;
            font-weight: 700;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        caption {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>

<h2>Snort Alerts</h2>

<table>
    <thead>
        <tr>
            <th>Date and Time</th>
            <th>Alert</th>
            <th>Classification</th>
            <th>Priority</th>
            <th>Protocol</th>
            <th>Source IP:Port</th>
            <th>Destination IP:Port</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $file = '/var/log/snort/snort.alert.fast';

        if (file_exists($file)) {
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                // Debugging line
                echo '<!-- ' . htmlspecialchars($line) . ' -->';

                preg_match('/^(\d+\/\d+-\d+:\d+:\d+\.\d+)\s+\[\*\*\]\s+\[\d+:(\d+):\d+\]\s+(.*?)\s+\[\*\*\]\s+\[Classification:\s+(.*?)\]\s+\[Priority:\s+(\d+)\]\s+\{(\w+)\}\s+(\d+\.\d+\.\d+\.\d+:\d+)\s+->\s+(\d+\.\d+\.\d+\.\d+:\d+)/', $line, $matches);
                if ($matches) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($matches[1]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[3]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[4]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[5]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[6]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[7]) . '</td>';
                    echo '<td>' . htmlspecialchars($matches[8]) . '</td>';
                    echo '</tr>';
                } else {
                    // Debugging line
                    echo '<!-- No match for this line -->';
                }
            }
        } else {
            echo '<tr><td colspan="7">Log file not found: ' . htmlspecialchars($file) . '</td></tr>';
        }
        ?>
    </tbody>
</table>

</body>
</html>
