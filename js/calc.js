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
	var base = 0;
	var val = 0;
	if(Char['level'] > 1){
        for(var x=0; x < Char['level'] - 1; x++){
			if(Char['cclass'] == "Fighter"){
				lvlhp += 6;
				base = 15;
				val = 9;
            }
        } 
    }
	var con = document.getElementById(stats[1]).value;
	var num1 = parseInt(con);
	var hp = num1 + base + lvlhp;
	var bloodied = Math.floor(hp/2);
	var surge = Math.floor(bloodied/2);
	val = val + (Math.floor((con-10)/2));
	$('.target-HP').text(hp);
	$('.target-bloodied').text(Math.floor(hp/2));
	$('.target-surge').text(Math.floor(bloodied/2));
	$('.target-surgeperday').text(val);
}
