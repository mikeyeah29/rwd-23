<?php

class RwdGuava
{
    static public function getVisitorData($slug)
    {
        $url = 'https://rwdstaging.co.uk/' . $slug . '/data/visitor_data.json';
        $json = file_get_contents($url);
        return json_decode($json, true);
    }

    static public function generateVisitorTable($slug) {

        $data = Self::getVisitorData($slug);

        // Check if $data is an array
        if (is_array($data)) {

            // Start building the HTML table
            $table_html = '<table border="1">';

            // Table header
            $table_html .= '<tr>';
            $table_html .= '<th>IP Address</th>';
            $table_html .= '<th>Country</th>';
            $table_html .= '<th>Region</th>';
            $table_html .= '<th>City</th>';
            $table_html .= '<th>ISP</th>';
            $table_html .= '<th>Visit Count</th>';
            $table_html .= '</tr>';

            // Loop through the data and add rows to the table
            foreach ($data as $key => $value) {
                if (is_numeric($key) && $value['ip'] !== '127.0.0.1') {
                    $table_html .= '<tr>';
                    $table_html .= '<td>' . htmlspecialchars($value['ip']) . '</td>';
                    $table_html .= '<td>' . htmlspecialchars($value['location']['country']) . '</td>';
                    $table_html .= '<td>' . htmlspecialchars($value['location']['regionName']) . '</td>';
                    $table_html .= '<td>' . htmlspecialchars($value['location']['city']) . '</td>';
                    $table_html .= '<td>' . htmlspecialchars($value['location']['isp']) . '</td>';
                    $table_html .= '<td>' . $value['visit_count'] . '</td>';
                    $table_html .= '</tr>';
                }
            }

            // Close the table
            $table_html .= '</table>';

            // Output the HTML table
            echo $table_html;
        }
    }
}

?>
