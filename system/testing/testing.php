<?php
$remainingAnnualLeaves = 4;
$remainingCasualLeaves = 2;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leave Application Form</title>
    </head>
    <body>
        <h1>Leave Application Form</h1>
        <form action="#" method="post">
            <label for="leaveType">Leave Type:</label>
            <select id="leaveType" name="leaveType">
                <option value="casual">Casual Leave</option>
                <option value="annual">Annual Leave</option>
            </select>
            <br>
            <label for="daysApplied">Number of Days:</label>
            <input type="number" id="daysApplied" name="daysApplied">
            <br>
            <input type="submit" value="Submit">
        </form>

        <script>
            // Get the leave type and days applied input fields
            var leaveTypeField = document.getElementById('leaveType');
            var daysAppliedField = document.getElementById('daysApplied');

            var remainingAnnualLeaves = "<?php echo"$remainingAnnualLeaves" ?>";
            var remainingCasualLeaves = "<?php echo"$remainingCasualLeaves" ?>";
            // Add event listener for form submission
            document.getElementById('daysApplied').addEventListener('change', function (event) {
                var leaveType = leaveTypeField.value;
                var daysApplied = daysAppliedField.value;

                // Check if days applied exceeds leave entitlement based on leave type
                if (leaveType === 'casual' && parseInt(daysApplied) > remainingCasualLeaves) {
                    alert('Error: You have exceeded your casual leave entitlement limit. Your casual leave balance is 2 days.');
                    event.preventDefault(); // Prevent form submission
                } else if (leaveType === 'annual' && parseInt(daysApplied) > remainingAnnualLeaves) {
                    alert('Error: You have exceeded your annual leave entitlement limit. Your annual leave balance is 14 days.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        </script>
    </body>
</html>
