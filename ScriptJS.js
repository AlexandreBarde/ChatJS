$("#target").on( "myCustomEvent", function() {
    console.log("Event bien triggered");
    console.log($("#nom").val());
    console.log($("#message").val());
    var n = $("#nom").val();
    var m = $("#message").val();
    $.get("SaveMess.php",{auteur : n,message : m});
});
$( "#target" ).click(function () {
    $( "#target" ).trigger( "myCustomEvent");
});

$("#zoneAffichage").load("GetMessChat.php");