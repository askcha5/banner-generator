<div id="main">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Design</a></li>
            <li><a href="#tabs-2">Content</a></li>
            <li><a href="#tabs-3">Details</a></li>
            <li><a href="#tabs-4">Generate</a></li>
        </ul>
        <div id="tabs-1">
            <p>
                <p class="ui-state-default ui-corner-all option">
                        Pick a Size
                </p>
                <form>
                    <div id="size">
                        <input type="radio" id="size1" name="size" /><label for="size1">Leaderboard</label>
                        <input type="radio" id="size2" name="size" /><label for="size2">Banner</label>
                        <input type="radio" id="size3" name="size" /><label for="size3">Half Banner</label>
                    </div>
                </form>
                
                
                <p class="ui-state-default ui-corner-all option">
                        Select a Background Color
                </p>
                <div id="red"></div>
                <div id="green"></div>
                <div id="blue"></div>

                <div id="swatch" class="ui-widget-content ui-corner-all"></div>
            </p>
        </div>
        <div id="tabs-2">
            <p>
                <p class="ui-state-default ui-corner-all option">
                        Enter Text
                </p>
                <form>
                    <input type="text" name="text" id="text" class="text ui-widget-content ui-corner-all" />
                </form>
                
                <p class="ui-state-default ui-corner-all option">
                        Choose a Font Size
                </p>
                <div id="font_size"></div>
                
                
                <p class="ui-state-default ui-corner-all option">
                        Select a Font Color
                </p>
                <div id="red2"></div>
                <div id="green2"></div>
                <div id="blue2"></div>

                <div id="swatch2" class="ui-widget-content ui-corner-all">Text Color</div>
            </p>
        </div>
        <div id="tabs-3">
            <p>
                <p class="ui-state-default ui-corner-all option">
                        Choose a Border Size
                </p>
                <div id="border"></div>
                
                
                <p class="ui-state-default ui-corner-all option">
                        Select a Border Color
                </p>
                <div id="red3"></div>
                <div id="green3"></div>
                <div id="blue3"></div>

                <div id="swatch3" class="ui-widget-content ui-corner-all"></div>
            </p>
        </div>
        <div id="tabs-4">
            <p>
                <p class="ui-state-default ui-corner-all option">
                        Enter Target URL
                </p>
                <form>
                    <input type="text" name="url" id="url" class="text ui-widget-content ui-corner-all" />
                </form>
                
                
                <p class="ui-state-default ui-corner-all option">
                        Save Your Banner
                </p>
                <button name="generate" id="generate">Generate</button>
                <form>
                    <textarea id="result" name="result" class="textarea text ui-widget-content ui-corner-all"></textarea>
                </form>
            </p>
        </div>
    </div>
    
    <div id="banner">
        
    </div>
</div>