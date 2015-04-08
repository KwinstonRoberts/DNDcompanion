/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: 'query.php',
        success: function(response) {
            var names = response.split(",");
            for (var i=0; i<names.length; i++){
                console.log(names[i]);
                var html = $('#players').html();
                $('#players').html(html + '<li><a href="#">' + names[i] + '</a></li>');
            }
        }
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