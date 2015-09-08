function calculator(){
	var exp_milestones = [1000,2250,3750,5500,7500,10000,13000,16500,20500,26000,32000,39000,47000,57000,69000,83000,99000,119000,143000,175000,210000,255000,310000,375000,45000,550000,675000,825000,1000000];
	for(var i=0; i<exp_milestones.length; i++){
		if(Char['experience']<exp_milestones[i] && Char['experience']>exp_milestones[i-1]){
			Char['level']=i+1;
			$('[name="Character_Level"]').text(Char['level']);
			break;
		} else {
            Char['level']=1;
            $('[name="Character_Level"]').text(Char['level']);
        }
	}
	var stats = ['StrScore','ConScore','DexScore','IntScore','WisScore','ChaScore'];

	for (var j=0; j<stats.length; j++){
		$('#target-Abil-Mod-' + j).text(Math.floor(($('[name="' + stats[j] + '"]').val()-10)/2)); 
		$(document.getElementById('target-1/2Lvl-' + j)).text(Math.floor(($('[name="' + stats[j] + '"]').val()-10)/2+Math.floor((Char['level']/2)))); 
		if(j==2){
			$("#target-DEX").text("" + $('#target-Abil-Mod-' + j).text());
			$(document.getElementById("target-1/2Lvl")).text("" + Math.floor((Char['level'])/2));
			$("#target-Score").text(Math.floor(($('[name="' + stats[j] + '"]').val()-10)/2)+Math.floor((Char['level']/2)));
		}
	}
	//this is the start of the hp calculations
	var lvlhp = 0;
	
	if($('[name="Class"]').value == "Fighter"){
		if(Char['level'] > 1){
           for(var x=0; x < Char['level'] - 1; x++){
				lvlhp += 6;
            }
        } 
		$('#target-HP').text(22);
    }
}
