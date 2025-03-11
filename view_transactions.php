<?php
$host = 'part2';
$user = 'root';
$dbname = 'faker';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT t.id, t.employee_id, t.office_id, t.datelog, t.action, 
            t.remarks, t.documentcode, 
            CONCAT(e.firstname, ' ', e.lastname) as employee_name,
            o.name as office_name
            FROM transactions t
            JOIN employees e ON t.employee_id = e.id
            JOIN offices o ON t.office_id = o.id
            ORDER BY t.id";
            
    $stmt = $pdo->query($sql);
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>
          <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Office ID</th>
            <th>Office Name</th>
            <th>Date</th>
            <th>Action</th>
            <th>Document Code</th>
          </tr>";

    foreach ($transactions as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['employee_id'] . "</td>";
        echo "<td>" . $row['employee_name'] . "</td>";
        echo "<td>" . $row['office_id'] . "</td>";
        echo "<td>" . $row['office_name'] . "</td>";
        echo "<td>" . $row['datelog'] . "</td>";
        echo "<td>" . $row['action'] . "</td>";
        echo "<td>" . $row['documentcode'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<p>Total Transactions: " . count($transactions) . "</p>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
