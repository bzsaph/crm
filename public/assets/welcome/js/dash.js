

function getSelectValue() {
    var selectedValue = document.getElementById("areYourRegistred").value;
    var uploadRegistration = '';
    if (selectedValue == "yes") {
        document.getElementById("uploadRegistration").style.display = "block";
        console.log(document.getElementById("uploadRegistration"));
    } else {
        document.getElementById("uploadRegistration").style.display = "none";
    }
}

function team() {
    var haveATeam = document.getElementById("havingATeam").value;
    var uploadTeamMembers = '';
    if (haveATeam == "iDo") {
        document.getElementById("uploadTeamMembers").style.display = "block";
        console.log(document.getElementById("uploadTeamMembers"));
    } else {
        document.getElementById("uploadTeamMembers").style.display = "none";
    }
}

// $(document).ready(function ($) {
//     $("#yes").click(function() {
//         $("#question1").hide();
//         $("#form1").show();
//     });

//     $("#no").click(function() {
//         $("#question1").hide();
//         $("#form2").show();
//     });

// });


