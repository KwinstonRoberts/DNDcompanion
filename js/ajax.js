/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".form-control").focusout(function() {
    
    pushStuff(this);
    
});

function pushStuff(n) {
    if (n.value !== "") {
        console.log(n.name);
        console.log(n.value);
        $.ajax({  
            type: 'POST',  
            url: 'query.php', 
            data: { name: n.name , value: n.value },
            success: function(response) {
            alert(response);
            }
        });
    }
}

function updateSheet(data) {
    
    for (var i = 0; i < data.length; i++) {
        $(data[i][0]).val = data[i][1];
    }
}