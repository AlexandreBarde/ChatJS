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
            var t = "<small class='form-text text-muted'><i class='fas fa-clock'></i> Il y a "+val.timestamp+"</small>";
            var t2 = "<small class='form-text text-muted'><i class='fas fa-clock'></i> <p class='time'>" + val.contenu + "</p><p class='timestamp'>" + val.timestamp + "</p></small>";
            var fin = "<div class=\"dropdown-divider\"></div>";
            $("#affichage").prepend(id + h5 + p + t2 + fin);
            j = $("#affichage").find("span").last().text();
            $("#affichage").scrollTop(9000);
        });
        convertTimeStamp();
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
            var timestampBDD = new Date();
            timestampBDD.setTime(timestampCurrent);
            var diff = new Date(now.getTime() - timestampBDD.getTime());

            console.log("Index : " + index + " | TimeStamp : " + $(this).html() + " BDD : " + timestampBDD + " | Date : " + now);

            //console.log("Now : " + now.getDay() + ":" + now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds() + " BDD : " + timestampBDD.getDay() + ":" + timestampBDD.getHours() + ":" + timestampBDD.getMinutes() + ":" + timestampBDD.getSeconds() );

            timeCurrent.innerHTML = diff.getYear() + " année(s) " + diff.getMonth() + " mois " + diff.getDay() + " jour(s) " + diff.getHours() + " heure(s) " + diff.getMinutes() + " minute(s) " + diff.getSeconds() + " seconde(s) " + " || " + diff.getTime();

            /**
            //console.log("timestamp : " + $(this).html());
            var times = $(".time");
            //console.log("index : " + index);
            var timeCurrent = times[index];
            //console.log(timeCurrent);
            var now = new Date();
            var timestampBDD = new Date();
            timestampBDD.setTime($(this).html());
            var diff = new Date(now.getTime() - $(this).html());
            console.log(diff);
            timeCurrent.innerHTML = diff.getDay() + " jour(s) " + diff.getHours() + " heure(s) " + diff.getMinutes() + " minute(s)"; **/
        }
        else
        {

        }
    });
    /**
    var now = new Date();
    var timestampBDD = new Date();
    timestampBDD.setTime($(".timestamp").html());
    var diff = new Date(now.getTime() - timestampBDD.getTime());
    $(".time").html(diff.getDay() + " " + diff.getHours() + " " + diff.getMinutes()); **/
    //alert($(".timestamp").html());
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
                var t = "<small class='form-text text-muted'><i class='fas fa-clock'></i> Il y a "+val.timestamp+"</small>";
                var t2 = "<small class='form-text text-muted'><i class='fas fa-clock'></i> <p class='time'>" + val.contenu + "</p><p class='timestamp'>" + val.timestamp + "</p></small>";
                var fin = "<div class=\"dropdown-divider\"></div>";
                $("#affichageFin").append(id + h5 + p + t2 + fin);
                j = $("#affichage").find("span").last().text();
                console.log("valeur id message : " + val.id_message + " j : " + j);
            }
        });
        convertTimeStamp();
    });
}