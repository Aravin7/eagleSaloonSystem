//Under the leaves
<?php
  // Get the selected start and end dates from the form submission
  $startDate = $_POST["start_date"];
  $endDate = $_POST["end_date"];

  // Convert the dates to timestamp
  $startTimestamp = strtotime($startDate);
  $endTimestamp = strtotime($endDate);

  // Calculate the difference in days between the start and end dates
  $daysDifference = ($endTimestamp - $startTimestamp) / (60 * 60 * 24);

  // Check if the selected dates violate the rule of 4 consecutive days of leave
  if ($daysDifference >= 4) {
    echo "Error: You cannot take more than 3 consecutive days of leave."; // Replace with your desired action
  } else {
    // Process the leave request and perform other validations if needed
    echo "Leave request processed successfully."; // Replace with your desired action
  }
?>


//JOIN THE more then 2 tables
SELECT
    *
FROM
    tbl_leave l
LEFT JOIN tbl_users u ON
   l.UserId = u.UserId
LEFT JOIN tbl_leave_types lt ON
    l.LeaveType = lt.Id
