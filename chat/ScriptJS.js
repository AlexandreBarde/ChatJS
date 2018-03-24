$("#boutonSubmit").on( "myCustomEvent", function() {
    console.log("Event bien triggered");
    console.log($("#inlineFormInputName2").val());
    console.log($("#username").text());
    var m = $("#inlineFormInputName2").val();
    $.get("SaveMess.php",{message : m}).done(function() {
        alert("Message envoyé");
    });
});
$( "#boutonSubmit" ).click(function (event) {
    event.preventDefault();
    $("#boutonSubmit").trigger( "myCustomEvent");
});
