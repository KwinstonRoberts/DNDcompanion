function updateVar() {
    
    Char['name'] = $('[name="Character_Name"]').val();
    Char['cclass'] = $('[name="Class"]').val();
    
    Char['paragon'] = $('[name="Character_Path"]').val();
    Char['destiny'] = $('[name="Epic_Destiny"]').val();
    Char['experience'] = $('[name="Exp"]').val();
    
    Char['race'] = $('[name="Race"]').val();
    
    Char['size'] = $('[name="Size"]').val();
    Char['age'] = $('[name="Age"]').val();
    Char['gender'] = $('[name="Gender"]').val();
    Char['height'] = $('[name="Height"]').val();
    Char['weight'] = $('[name="Weight"]').val();
    Char['alignment'] = $('[name="Alignment"]').val();
    Char['diety'] = $('[name="Diety"]').val();
    Char['company'] = $('[name="Adventuring_Company"]').val();
    

    STR['base'] = $('[name="StrScore"]').val();
    CON['base'] = $('[name="ConScore"]').val();
    DEX['base'] = $('[name="DexScore"]').val();
    INT['base'] = $('[name="IntScore"]').val();
    WIS['base'] = $('[name="WisScore"]').val();
    CHA['base'] = $('[name="ChaScore"]').val();
}