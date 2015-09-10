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
			if(Char['cclass'] == "Cleric"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Fighter"){
				lvlhp += 6;
				base = 15;
				val = 9;
            } else if(Char['cclass'] == "Paladin"){
				lvlhp += 6;
				base = 15;
				val = 10;
			} else if(Char['cclass'] == "Ranger"){
				lvlhp += 5;
				base = 12;
				val = 6;
			} else if(Char['cclass'] == "Rogue"){
				lvlhp += 5;
				base = 12;
				val = 6;
			} else if(Char['cclass'] == "Warlock"){
				lvlhp += 5;
				base = 12;
				val = 6;
			} else if(Char['cclass'] == "Warlord"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Wizard"){
				lvlhp += 4;
				base = 10;
				val = 6;
			} else if(Char['cclass'] == "Avenger"){
				lvlhp += 6;
				base = 14;
				val = 7;
			} else if(Char['cclass'] == "Barbarian"){
				lvlhp += 6;
				base = 15;
				val = 8;
			} else if(Char['cclass'] == "Bard"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Druid"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Invoker"){
				lvlhp += 4;
				base = 10;
				val = 0;
			} else if(Char['cclass'] == "Shaman"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Sorcerer"){
				lvlhp += 5;
				base = 12;
				val = 6;
			} else if(Char['cclass'] == "Warden"){
				lvlhp += 7;
				base = 17;
				val = 9;
			} else if(Char['cclass'] == "Ardent"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Battlemind"){
				lvlhp += 6;
				base = 15;
				val = 9;
			} else if(Char['cclass'] == "Monk"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Psion"){
				lvlhp += 4;
				base = 12;
				val = 6;
			} else if(Char['cclass'] == "Runepriest"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else if(Char['cclass'] == "Seeker"){
				lvlhp += 5;
				base = 12;
				val = 7;
			} else {
				lvlhp += 1;
				base = 1;
				val = 1;
			}
        }
    }
	
	var str = document.getElementById(stats[0]).value;
	var con = document.getElementById(stats[1]).value;
	var dex = document.getElementById(stats[2]).value;
	var intel = document.getElementById(stats[3]).value;
	var wis = document.getElementById(stats[4]).value;
	var cha = document.getElementById(stats[5]).value;
	var num1 = parseInt(con);
	var hp = num1 + base + lvlhp;
	val = val + (Math.floor((con-10)/2));
	$('.target-HP').text(hp);
	$('.target-bloodied').text(Math.floor(hp/2));
	$('.target-surge').text(Math.floor(hp/2/2));
	$('.target-surgeperday').text(val);
	
	//Defenses calculations 
	//Forgot semi collon
	var defs = ['AC', 'FORT', 'REF', 'WILL'];
	var classScore = [0,0,0,0];
	var AC = 0;
	var FORT = 0;
	var REF = 0;
	var WILL = 0;
	
	if(Char['cclass'] == "Cleric"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Fighter"){
		classScore = [0,2,0,0];
    } else if(Char['cclass'] == "Paladin"){
		classScore = [0,1,1,1];
	} else if(Char['cclass'] == "Ranger"){
		classScore = [0,1,1,0];
	} else if(Char['cclass'] == "Rogue"){
		classScore = [0,0,2,0];
	} else if(Char['cclass'] == "Warlock"){
		classScore = [0,1,1,0];
	} else if(Char['cclass'] == "Warlord"){
		classScore = [0,1,1,0];
	} else if(Char['cclass'] == "Wizard"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Avenger"){
		classScore = [0,1,1,1];
	} else if(Char['cclass'] == "Barbarian"){
		classScore = [0,2,0,0];
	} else if(Char['cclass'] == "Bard"){
		classScore = [0,0,1,1];
	} else if(Char['cclass'] == "Druid"){
		classScore = [0,1,0,1];
	} else if(Char['cclass'] == "Invoker"){
		classScore = [0,1,1,1];
	} else if(Char['cclass'] == "Shaman"){
		classScore = [0,1,0,1];
	} else if(Char['cclass'] == "Sorcerer"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Warden"){
		classScore = [0,1,0,1];
	} else if(Char['cclass'] == "Ardent"){
		classScore = [0,1,0,1];
	} else if(Char['cclass'] == "Battlemind"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Monk"){
		classScore = [0,1,1,1];
	} else if(Char['cclass'] == "Psion"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Runepriest"){
		classScore = [0,0,0,2];
	} else if(Char['cclass'] == "Seeker"){
		classScore = [0,1,0,1];
	} else {
		classScore = [0,0,0,0];
	}
	
	if(parseInt(dex) > parseInt(intel)){
		AC = Math.floor((parseInt(dex) - 10) / 2);
	} else {
		AC = Math.floor((parseInt(intel) - 10) / 2);
	}
	
	if(parseInt(str) > parseInt(con)){
		FORT = Math.floor((parseInt(str) - 10) / 2);
	} else {
		FORT = Math.floor((parseInt(con) - 10) / 2);
	}
	
	if(parseInt(dex) > parseInt(intel)){
		REF = Math.floor((parseInt(dex) - 10) / 2);
	} else {
		REF = Math.floor((parseInt(intel) - 10) / 2);
	}
	
	if(parseInt(wis) > parseInt(cha)){
		WILL = Math.floor((parseInt(wis) - 10) / 2);
	} else {
		WILL = Math.floor((parseInt(cha) - 10) / 2);
	}
	
	for(var x=0; x < 4; x++){
		$(document.getElementById("target-" + defs[x] + x)).text(10 + (Math.floor(Char['level']/2)));
		$(document.getElementById("target-class" + x)).text(classScore[x]);
	}
	$(document.getElementById("target-armor0")).text(AC);
	$(document.getElementById("target-armor1")).text(FORT);
	$(document.getElementById("target-armor2")).text(REF);
	$(document.getElementById("target-armor3")).text(WILL);	
	
}
