<!-- PHP code to fetch remaining leaves for selected employee and leave type -->
<?php
include '../functions.php';
// Fetch remaining leaves from database based on selected employee and leave type
$db= dbConnection();

$sql = "SELECT remaining_leaves FROM employee_leaves WHERE employee_id = ? AND leave_type = ?";
$result = $db->query($sql);
?>

<!-- HTML form with remaining leaves included as hidden field -->
<form id="leaveForm">
    <label for="leaveType">Leave Type:</label>
    <select id="leaveType" name="leaveType">
        <!-- Leave type options -->
    </select>
 </form>
<form id="leaveForm">
    <label for="numDays">Number of Days:</label>
    <input type="number" id="numDays" name="numDays">
    <input type="hidden" id="remainingLeaves" name="remainingLeaves" value="<?php echo $remainingLeaves; ?>">
    <button type="submit">Submit</button>
</form>
