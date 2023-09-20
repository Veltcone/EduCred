document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector("#btn-convert");

    button.addEventListener("click", function () {
        // console.log("clickeds");
        document.querySelector(".pop-up").style.display = "block";

        setTimeout(function () {
            $('.loader').fadeToggle();
            location.replace('student_profile.php');
        }, 3000);

        function updateData(id, value) {
            $.ajax({
                url: "student_credits.php",
                type: "POST",
                data: { id: id, value: value },
                success: function (data) {
                },
                error: function (xhr, status, error) {
                    // Handle errors if any
                }
            });
        }
        

        var coinsElement = document.getElementById("coins");
        var coins = coinsElement.textContent;
        // console.log(coins);
        // var registration_id = "20IT102001"
        var regid=registration_id;
        

        updateData(regid, coins);
    });
});

//loading data of student
var ajax = new XMLHttpRequest();
var registrationId = registration_id;
// console.log(registrationId)
var semesterId = semester_id;
var dataToSend = "registration_id=" + encodeURIComponent(registrationId) + "&semester_id=" + encodeURIComponent(semesterId);
var url = "student_data.php?" + dataToSend;
ajax.open("GET", url, true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        console.log(data);
        var points = "",
            points2 = "",
            points3 = "",
            items = "";

        points += data[0].count_result;
        document.getElementById("present").innerHTML += points;

        if (data[1] && data[1].curricular_score) {
            points2 = data[1].curricular_score;
        } else {
            points2 = "0";
        }
        document.getElementById("extracurricular").innerHTML += points2;


        if (data[2] && data[2].interaction_score) {
            points3 = data[2].interaction_score;
        }
        else {
            points3 = "0";
        }
        document.getElementById("interaction").innerHTML += points3;


        var start = 6,
            limit = 10;
        for (var i = 3; i < 6; i++) {
            var subject = data[i].name;
            items += "<tr>";
            items += "<td>";
            items += subject;
            items += "</td>";
            for (var j = start; j < limit; j++) {
                // var marks = data[j] && data[j].score ? data[j].score : "N/A";
                var marks;
                if (data[j] && data[j].score) {
                    marks = data[j].score;
                } else {
                    marks = "0";
                }
                items += "<td>";
                items += marks;
                items += "</td>";
            }
            limit += 4;
            start += 4;
            items += "</tr>";
        }
        // console.log("clicked");
        document.getElementById("table").innerHTML += items;

        function sumIntegerValues(arr) {
            return arr.reduce((sum, obj) => {
                ['score', 'count_result', 'curricular_score', 'interaction_score'].forEach(prop => {
                    const value = parseInt(obj[prop], 10);
                    if (!isNaN(value)) {
                        sum += value;
                    }
                });
                return sum;
            }, 0) * 10;
        }
        // Call the function and get the sum
        const coins = sumIntegerValues(data);
        document.getElementById("coins").innerHTML += coins;
    }
};






