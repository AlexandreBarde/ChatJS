$("#boutonSubmit").on( "myCustomEvent", function()
{
    if($("#inlineFormInputName2").val().length === 0)
    {
        $("#erreur").text("Le message ne peut pas être vide !").show().fadeOut(2000);
    }
    else
    {
        console.log("Event bien triggered");
        console.log($("#inlineFormInputName2").val());
        console.log($("#username").text());
        var m = $("#inlineFormInputName2").val();
        $.get("SaveMess.php",{message : m});
        $("#inlineFormInputName2").val('');
        setTimeout(reloadChat(),500);
    }
});
$( "#boutonSubmit" ).click(function (event) {
    event.preventDefault();
    $("#boutonSubmit").trigger( "myCustomEvent");
});

function affichageChat()
{
    $(document).load("GetMessChat.php",function (response)
    {
        var x = JSON.parse(response);
        jQuery.each(x, function (i,val)
        {
            var id = "<span id='id_message' style='visibility : hidden'>"+val.id_message+"</span>";
            var h5 = "<h5 class='card-title'>"+val.id_compte+"</h5>";
            var p = "<p class='card-text'>"+val.contenu+"</p>";
            var t = "<small class='form-text text-muted'><i class='fas fa-clock' style='display: inline;'></i> <p class='time' style='display: inline'>" + val.contenu + "</p><p style='visibility: hidden' class='timestamp'>" + val.timestamp + "</p></small>";
            var fin = "<div class=\"dropdown-divider\"></div>";
            $("#affichage").prepend(id + h5 + p + t + fin);
            j = $("#affichage").find("span").last().text();
        });
        convertTimeStamp();
        $("#affichage").scrollTop(9000);
    });
}

affichageChat();

var j = $("#affichage").find("span").last().text();

setInterval(function () {
    reloadChat();
},2000);

function convertTimeStamp()
{
    $('p.timestamp').each(function(index)
    {
        //console.log("index test : " + index);
        if($(this).attr('class') === 'timestamp')
        {
            var times = $(".time");
            var timeCurrent = times[index];

            var timestampCurrent = $(this).html();

            var now = new Date();
            now.setTime(Date.now());
            var timestampBDD = new Date(timestampCurrent * 1000);

            var timeTruc = Math.abs(now.getTime() - timestampBDD.getTime());

            var diff = (timestampBDD - now)/1000;
            var diff = Math.abs(Math.floor(diff));

            var days = Math.floor(diff/(24*60*60));
            var sec = diff - days * 24*60*60;

            var hrs = Math.floor(sec/(60*60));
            var sec = sec - hrs * 60*60;

            var min = Math.floor(sec/(60));
            var sec = sec - min * 60;

            var diff = new Date((now.getTime() - timestampBDD.getTime()) * 1000);

            timeCurrent.innerHTML = days + " jour(s) " + hrs + " heure(s) " + min + " minute(s) " + sec + " seconde(s) ";

        }
        else
        {

        }
    });

}

function reloadChat(){
    $(document).load("GetMessChat.php",function (response)
    {
        var x = JSON.parse(response);
        jQuery.each(x, function (i,val)
        {
            if(val.id_message > j)
            {
                var id = "<span id='id_message' style='visibility : hidden'>"+val.id_message+"</span>";
                var h5 = "<h5 class='card-title'>"+val.id_compte+"</h5>";
                var p = "<p class='card-text'>"+val.contenu+"</p>";
                var t = "<small class='form-text text-muted'><i class='fas fa-clock' style='display: inline;'></i> <p class='time' style='display: inline'>" + val.contenu + "</p><p style='visibility: hidden' class='timestamp'>" + val.timestamp + "</p></small>";
                var fin = "<div class=\"dropdown-divider\"></div>";
                $("#affichageFin").append(id + h5 + p + t + fin);
                j = $("#affichage").find("span").last().text();
                console.log("valeur id message : " + val.id_message + " j : " + j);
                $("#affichage").scrollTop(9000);
            }
        });
        convertTimeStamp();
    });
}