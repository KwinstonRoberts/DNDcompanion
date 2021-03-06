

$(document).ready(function(){
    $('input').prop('disabled',true);
    $('#playername').prop('disabled',false);
    $.ajax({
        type: 'GET',
        url: 'query.php',
        success: function(response) {
            var names = response.split(",");
            for (var i=0; i<names.length; i++){
                console.log(names[i]);
                var html = $('#players').html();
                $('#players').html(html + '<li class="player"><a>' + names[i] + '</a></li>');
            }
        }
    });


    $(".dropdown-menu").on('click', '.player a', function(){
        var name = this.text;
        console.log(name);
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data:{name: name,
                    header: 0},
            success: function(response){
                console.log(response);
                var names = response.split(",");
                 $('#characters').html("");
                for (var i=0; i<names.length; i++){
                    console.log(names[i]);
                    var html = $('#characters').html();
                    $('#characters').html(html + '<li class="character"><a>' + names[i] + '</a></li>');  
                }
                $('#btn-player').html(name);
                $("#playername").val(name);
            }
        });
    });

      $(".dropdown-menu").on('click', '.character a', function(){
        var name = this.text;
        console.log(name);
        $('[name="Character_Name"]').val(name);
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data:{name: name,
                    header: 1},
            success: function(response){
                console.log(response);
                var info = response.split(",");
                $('#btn-character').html(name);
                $('input').prop('disabled',false);
                var fields = ['Character_Level','Class','Paragon_Path','Epic_Destiny',
                            'Exp','Race','Size','Age','Gender','Height',
                            'Weight','Alignment','Diety','Adventuring_Company','StrScore',
                            'ConScore','DexScore','IntScore','WisScore','ChaScore']; 

                for(var i=0; i<info.length; i++){
                    $("[name ='" + fields[i] + "']").val(info[i]);
                }
            }
        });
    });
       $("#btn-save").click(function(){
        var name = $('#playername').val();
        console.log(name);
        updateVar();
        $.ajax({
            type: 'POST',
            url: 'query.php',
            data:{name: name,
                    character : Char['name'],
                    Class : Char['cclass'],
                    Paragon : Char['paragon'],
                    Destiny : Char['destiny'],
                    EXP : Char['experience'],
                    Race : Char['race'],
                    size : Char['size'],
                    age : Char['age'],
                    gender : Char['gender'],
                    height : Char['height'],
                    weight : Char['weight'],
                    alignment : Char['alignment'],
                    diety : Char['diety'],
                    company : Char['company'],

                    strength : STR['base'],
                    constitution : CON['base'],
                    dexterity : DEX['base'],
                    intelligence : INT['base'],
                    wisdom : WIS['base'],
                    charisma : CHA['base'],
                    header: 2},
            success: function(response){
                console.log(response);
                $.ajax({
                    type: 'POST',
                    url: 'query.php',
                    data: {
                    Class : Char['cclass'], 
                    header: 3},
                    success: function(response){
                        var names = response.split(',');
                        $('#target-hp').text(names[0]);
                        calculator();
                    } 
                });          
            }
        });
    });
});
// $('#players').click(saveData());

/*function saveData(){
    if (n.value !== "") {
        console.log(n.name);
        console.log(n.value);
        $.ajax({  
            type: 'POST',  
            url: 'query.php', 
            data: { name: n.name , value: n.value },
            success: function(response) {
                console.log(response);
            }
        });
    }
}*/