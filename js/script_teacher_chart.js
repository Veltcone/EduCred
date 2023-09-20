$(document).ready(function () {
    function loadData(type, category_id, course_id) {
        $.ajax({
            url: "teacher_load-cs.php",
            type: "POST",
            data: { type: type, id: category_id, cid: course_id },    //passing the value
            success: function (data) {
                if (type == "semesterdata") {
                    $('#semester').html(data);
                }
                else if (type == "subjectdata") {
                    $('#subject').html(data);
                }
                else {
                    $('#course').append(data);
                }
            }
        });
    }
    loadData();

    $("#course").on("change", function () {
        var course = $("#course").val(); //getting value from html form
        if (course != "") {
            loadData("semesterdata", course);
        }
        else {
            $("#semester").html("");
        }
    })

    $(document).ready(function() {
        var selectedCourse;
        var selectedSemester;
        var barChart; // Declare a variable to store the chart instance
    
        function handleSelection() {
            selectedCourse = $("#course").val();
            selectedSemester = $("#semester").val();
            // You can now use the selectedCourse and selectedSemester variables in your JavaScript logic
            console.log("Selected Course: " + selectedCourse);
            console.log("Selected Semester: " + selectedSemester);
            // Call your other functions or perform any operations with the selected data here
        }
    
        // Add event listeners to the course and semester dropdowns
        $("#course").on("change", handleSelection);
        $("#semester").on("change", handleSelection);
    
        // Add event listener to the "Save" button
        $("#show").on("click", function() {
            // Call the handleSelection function to update the selectedCourse and selectedSemester variables
            handleSelection();
    
            // The AJAX call to data.php should be placed here to ensure it's triggered on button click.
            var dataToSend = "course_id=" + encodeURIComponent(selectedCourse) + "&semester_id=" + encodeURIComponent(selectedSemester);
            var url = "teacher_chart_data.php?" + dataToSend;
    
            var ajax = new XMLHttpRequest();
            ajax.open("GET", url, true);
            ajax.send();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);
                    const ctx = document.getElementById('bar-chart').getContext('2d');
    
                    // Destroy the previous chart instance if it exists
                    if (barChart) {
                        barChart.destroy();
                    }
    
                    // Extract the student credits and registration IDs from the JSON data
                    const creditsData = data.map(student => student.credits);
                    const regIdData = data.map(student => student.registration_id);
    
                    // Create a new chart instance
                    barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: regIdData, // Use the registration IDs as labels
                            datasets: [
                                {
                                    label: '# student credits',
                                    data: creditsData, // Use the credits data
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // You can customize the colors here
                                    borderColor: 'rgba(54, 162, 235, 1)', // You can customize the border colors here
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                }
            };
        });
    
        // You can call handleSelection once at the beginning to set the initial selected values.
        handleSelection();
    });
    
    
});








