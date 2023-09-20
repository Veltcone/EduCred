$(document).ready(function(){
    function loadData(type, category_id,course_id){
        $.ajax({
            url : "teacher_load-cs.php",
            type : "POST",
            data : {type: type, id: category_id, cid: course_id},    //passing the value
            success: function(data){
                if(type == "semesterdata"){     
                    $('#semester').html(data);
                }
                else if(type == "subjectdata"){
                    $('#subject').html(data);
                }
                else{
                    $('#course').append(data);
                }
            }
        });
    }
    loadData();

    $("#course").on("change",function(){
        var course = $("#course").val(); //getting value from html form
        if(course != ""){
            loadData("semesterdata",course);
        }
        else{
            $("#semester").html("");
        }
    })
    
    $("#semester").on("change",function(){
        var semester = $("#semester").val();
        var course = $("#course").val();
        if(semester != ""){
            loadData("subjectdata",semester,course);
        }
        else{
            $("#subject").html("");
        }
    })
});