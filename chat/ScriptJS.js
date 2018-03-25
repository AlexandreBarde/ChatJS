$("#boutonSubmit").on( "myCustomEvent", function() {
    console.log("Event bien triggered");
    console.log($("#inlineFormInputName2").val());
    console.log($("#username").text());
    var m = $("#inlineFormInputName2").val();
    $.get("SaveMess.php",{message : m});
    $("#inlineFormInputName2").val('');
    setTimeout(reloadChat(),500);
});
$( "#boutonSubmit" ).click(function (event) {
    event.preventDefault();
    $("#boutonSubmit").trigger( "myCustomEvent");
});

function affichageChat() {
    $(document).load("GetMessChat.php",function (response){
        var x = JSON.parse(response);
        jQuery.each(x, function (i,val) {
            var id = "<span id='id_message' style='visibility : hidden'>"+val.id_message+"</span>";
            var h5 = "<h5 class='card-title'>"+val.id_compte+"</h5>";
            var p = "<p class='card-text'>"+val.contenu+"</p>";
            var t = "<small class='form-text text-muted'><i class='fas fa-clock'></i> Il y a "+val.timestamp+"</small>";
            var fin = "<div class=\"dropdown-divider\"></div>";
            $("#affichage").prepend(id + h5 + p + t + fin);
            j = $("#affichage").find("span").last().text();
        })
    });
}

affichageChat();

var j = $("#affichage").find("span").last().text();

setInterval(function () {
    reloadChat();
},2000);

function reloadChat(){
    $(document).load("GetMessChat.php",function (response){
        var x = JSON.parse(response);
        jQuery.each(x, function (i,val) {
            if(val.id_message > j){
                var id = "<span id='id_message' style='visibility : hidden'>"+val.id_message+"</span>";
                var h5 = "<h5 class='card-title'>"+val.id_compte+"</h5>";
                var p = "<p class='card-text'>"+val.contenu+"</p>";
                var t = "<small class='form-text text-muted'><i class='fas fa-clock'></i> Il y a "+val.timestamp+"</small>";
                var fin = "<div class=\"dropdown-divider\"></div>";
                $("#affichageFin").append(id + h5 + p + t + fin);
                j = $("#affichage").find("span").last().text();
            }
        });
    });
}