/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".form-control").focusout(function() {
    
    pushStuff(this);
    
});

function pushStuff(g) {
    if (g.value !== "") {
        console.log(g.value);
        $.post("query.php",
        [g.name, g.value],
        null);
    }
}

function updateSheet(data) {
    
    for (var i = 0; i < data.length; i++) {
        $(data[i][0]).val = data[i][1];
    }
}