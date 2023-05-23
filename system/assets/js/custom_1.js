//Declare the global Swal value for sweet alert
var Swal;

//Add the eventlistner to the input field 'number leave applies'
document.getElementById('number_of_days').addEventListener('input', validateLeaveRemaining);
document.getElementById('number_of_days').addEventListener('input', calculateEndDate);



function calculateEndDate() {
    //Create SelectElement
    var selectElement = document.getElementById('half_day_leave_day');

    // Get the selected start date and number of days from the user
    var startDate = new Date(document.getElementById('leave_start_date').value);
    var numberOfDays = parseFloat(document.getElementById('number_of_days').value);


    // Calculate the end date by adding the number of days to the start date
    var endDate = new Date(startDate);
    endDate.setDate(startDate.getDate() + Math.floor(numberOfDays));

    // Update the end date field with the calculated end date
    document.getElementById('leave_end_date').value = endDate.toISOString().slice(0, 10);


    // Generate and update options in the select field with leave starting and ending dates
    var startDateFormat = startDate.toLocaleDateString('en-US', {month: 'numeric', day: 'numeric', year: 'numeric'});
    var endDateFormat = endDate.toLocaleDateString('en-US', {month: 'numeric', day: 'numeric', year: 'numeric'});

    // Clear any existing options
    selectElement.innerHTML = '';

    // Create option elements with startdate and endDate as values and texts
    var optionElement1 = new Option(startDateFormat, startDateFormat);
    var optionElement2 = new Option(endDateFormat, endDateFormat);

    // Append the option elements to the select element
    selectElement.add(optionElement1);
    selectElement.add(optionElement2);

    //Check if leave is single day
    if (numberOfDays <= 1) {
        document.getElementById('leave_end_div').style.display = 'none';
    } else {
        document.getElementById('leave_end_div').style.display = 'block';
    }



    // Check if partial day leave is selected
    var partialDayLeave = numberOfDays % 1;
    if (partialDayLeave !== 0) {
        // Display the half day leave options
        if (numberOfDays === 0.5) {
            document.getElementById('half_day_leave_day_div').style.display = 'none';

        } else {
            document.getElementById('half_day_leave_div').style.display = 'block';
            document.getElementById('half_day_leave_day_div').style.display = 'block';
        }
    } else {
        // Hide the half day leave options
        document.getElementById('half_day_leave_div').style.display = 'none';
        document.getElementById('half_day_leave_day_div').style.display = 'none';
    }
}



function validateLeaveRemaining() {
    // Get the leave type and days applied input fields
    var leaveTypeField = document.getElementById('leave_type');
    var daysAppliedField = document.getElementById('number_of_days');

    var remainingAnnualLeaves = document.getElementById('remainingAnnualLeaves').value;
    var remainingCasualLeaves = document.getElementById('remainingCasualLeaves').value;
    //console.log(remainingAnnualLeaves);
    //console.log(remainingCasualLeaves);

    // Add event listener for form submission
    document.getElementById('number_of_days').addEventListener('change', function () {
        var leaveType = leaveTypeField.value;
        var daysApplied = daysAppliedField.value;
        console.log(remainingAnnualLeaves);
        console.log(remainingCasualLeaves);

        // Check if days applied exceeds leave entitlement based on leave type
        if (leaveType === '1' && parseFloat(daysApplied) > remainingCasualLeaves) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have exceeded your casual leave entitlement limit. Your casual leave balance is' + remainingCasualLeaves + 'days.'
            });
            //alert('Error: You have exceeded your casual leave entitlement limit. Your casual leave balance is' + remainingCasualLeaves + 'days.');
            //event.preventDefault(); // Prevent form submission
        } else if (leaveType === '2' && parseFloat(daysApplied) > remainingAnnualLeaves) {
             Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You have exceeded your casual leave entitlement limit. Your annual leave balance is' + remainingAnnualLeaves + 'days.'
            });
            //alert('Error: You have exceeded your annual leave entitlement limit. Your annual leave balance is' + remainingAnnualLeaves + 'days.');
            //event.preventDefault(); // Prevent form submission
        }
    });
}


document.getElementById('number_of_days').addEventListener('input', validateLeaveRemaining);
