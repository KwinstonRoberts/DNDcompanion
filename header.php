<header>
    <div class="container gray">
        <div class="row">
            <div class="col-sm-8 light">
                <h1> DND Campaign Companion </h1>
            </div>
            <div class="col-sm-4 light">
                <label for="playername">Player's Name</label> 
                <input name="Player_Name" class="form-control" type="text" id="playername" value="">
            </div>
        </div>
    </div>
    <div class="container gray_l">
        <div class="row">
            <div class="col-xs-6 col-sm-2">
                <div class="btn-group">
                    <button id="btn-player" type="button" class="btn btn-default dropdown-toggle" aria-expanded="true" data-toggle="dropdown" aria-expanded="false"> Players <span class="caret"></span></button>
                    <ul id="players" class="dropdown-menu" role="menu">
                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="btn-group">
		    <button id="btn-character" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Characters <span class="caret"></span></button>
                    <ul id="characters" class="dropdown-menu" role="menu">
                    </ul>
		</div>
            </div>
            <div class="col-sm-2">
                <button id="btn-save" type="button" class="btn btn-default"> Save </button>
                <ul class="dropdown-menu" role="menu">
                </ul>
            </div>
        </div>
    </div>
</header>