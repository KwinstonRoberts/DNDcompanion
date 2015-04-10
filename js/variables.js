/* 
 * This file will hold all the variables to be used in the sheet.
 */

var Class = {
    name: "",
    scores: "",
    powerType: "",
    surges: 0,
    skills: 0,
    defenseBonus: {
        FORT: 0,
        REF: 0,
        WILL: 0
    }
};

var Race = {
    name: "",
    language: "",
    power: "",
    atwill: "",
    features: ["", ""],
    stats: {
        Choice: false,
        choiceList: ["" , ""]
    },
    AScoreBonus: {
        STR: 0,
        CON: 0,
        DEX: 0,
        INT: 0,
        WIS: 0,
        CHA: 0
    },
    defenseBonus: {
        FORT: 0,
        REF: 0,
        WILL: 0
    },
    skillBonus: {
        Acrobatics: 0,
        Arcana: 0,
        Athletics: 0,
        Bluff: 0,
        Diplomacy: 0,
        Dungeoneering: 0,
        Endurance: 0,
        Heal: 0,
        History: 0,
        Insight: 0,
        Intimidate: 0,
        Nature: 0,
        Perception: 0,
        Religion: 0,
        Stealth: 0,
        Streetwise: 0,
        Thievery: 0,
        Speed: 0
    }
};

var Char = {
    name: "",
    race: Race['name'],
    cclass: Class['name'],
    paragon: "",
    destiny: "",
    level: 0,
    experience: 0,
    
    size: "",
    age: 0,
    gender: "",
    height: "",
    weight: "",
    
    alignment: "",
    deity: "",
    company: ""
};

// ABILITY SCORES //
{
    var STR = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
    
    var CON = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
    
    var DEX = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
    
    var INT = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
    
    var WIS = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
    
    var CHA = {
        base: 0,
        abilityMod: 0,
        lvlMod: 0
    };
}

// DEFENSES //
{
    var AC = {
        base: 0,
        armorMod: 0,
        lvlMod: 0,
        featMod: 0,
        enhancement: 0,
        misc: [0, 0]
    };
    
    var FORT = {
        base: 0,
        armorMod: 0,
        lvlMod: 0,
        featMod: 0,
        enhancement: 0,
        misc: [0, 0]
    };
    
    var REF = {
        base: 0,
        armorMod: 0,
        lvlMod: 0,
        featMod: 0,
        enhancement: 0,
        misc: [0, 0]
    };
    
    var WILL = {
        base: 0,
        armorMod: 0,
        lvlMod: 0,
        featMod: 0,
        enhancement: 0,
        misc: [0, 0]
    };
}

// HIT POINTS //
{
    var maxHP;    
    var surgeValue;
    
    var curHP;
    var curSurges;
}

var cFeats;     // This will be an array of the feats, well talk about it.