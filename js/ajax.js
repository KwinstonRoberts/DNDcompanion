/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".form-control").focusout(function() {
    
    pushStuff($(this).name(), $(this).value());
    
});

function pushStuff(n,v) {
    if (v !== "") {
        console.log(n);
        console.log(v);
        $.ajax({  
            type: 'POST',  
            url: 'query.php', 
            data: { name: n , value: v },
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