function hexFromRGB(r, g, b) {
        var hex = [
                r.toString( 16 ),
                g.toString( 16 ),
                b.toString( 16 )
        ];
        $.each( hex, function( nr, val ) {
                if ( val.length === 1 ) {
                        hex[ nr ] = "0" + val;
                }
        });
        return hex.join( "" ).toUpperCase();
}
function refreshSwatch() {
        var red = $( "#red" ).slider( "value" ),
                green = $( "#green" ).slider( "value" ),
                blue = $( "#blue" ).slider( "value" ),
                hex = hexFromRGB( red, green, blue );
        $( "#swatch" ).css( "background-color", "#" + hex );
        
}
function refreshSwatchTrig() {
    refreshSwatch();
    refreshImg();
}
function refreshSwatch2() {
        var red = $( "#red2" ).slider( "value" ),
                green = $( "#green2" ).slider( "value" ),
                blue = $( "#blue2" ).slider( "value" ),
                hex = hexFromRGB( red, green, blue );
        $( "#swatch2" ).css( "color", "#" + hex );
        
}
function refreshSwatch2Trig() {
    refreshSwatch2();
    refreshImg();
}
function refreshSwatch3() {
        var red = $( "#red3" ).slider( "value" ),
                green = $( "#green3" ).slider( "value" ),
                blue = $( "#blue3" ).slider( "value" ),
                hex = hexFromRGB( red, green, blue );
        $( "#swatch3" ).css( "border-color", "#" + hex );
        
}
function refreshSwatch3Trig() {
    refreshSwatch3();
    refreshImg();
}

function refreshImg(save) {
    save = (typeof save === 'undefined' || typeof save === 'object') ? 'N' : save;
    //console.log(typeof save);
    $('#size').trigger('click', [save]);
}

function doneTyping () {
    refreshImg();
}

$(document).ready(function() {
    var tabs_var = $( "#tabs" ).tabs();
    $( "#size" ).buttonset();
    $( "#generate" ).button();
    
    

    $( "#red, #green, #blue" ).slider({
            orientation: "horizontal",
            range: "min",
            max: 255,
            value: 127,
            slide: refreshSwatch,
            change: refreshSwatchTrig
    });
    $( "#red2, #green2, #blue2" ).slider({
            orientation: "horizontal",
            range: "min",
            max: 255,
            value: 127,
            slide: refreshSwatch2,
            change: refreshSwatch2Trig
    });
    $( "#red3, #green3, #blue3" ).slider({
            orientation: "horizontal",
            range: "min",
            max: 255,
            value: 127,
            slide: refreshSwatch3,
            change: refreshSwatch3Trig
    });
    $( "#red" ).slider( "value", 255 );
    $( "#red2" ).slider( "value", 127 );
    $( "#red3" ).slider( "value", 15 );
    $( "#green" ).slider( "value", 127 );
    $( "#green2" ).slider( "value", 127 );
    $( "#green3" ).slider( "value", 127 );
    $( "#blue" ).slider( "value", 15 );
    $( "#blue2" ).slider( "value", 127 );
    $( "#blue3" ).slider( "value", 255 );
    
    $( "#border" ).slider({
            value:1,
            min: 0,
            max: 10,
            step: 1,
            change: refreshImg
    });
    
    $( "#font_size" ).slider({
            value:14,
            min: 10,
            max: 30,
            step: 1,
            change: refreshImg
    });
    
    
    $('#generate').bind('click', function() {
        refreshImg("Y");
    });
    
    
    $('#banner a').live('click',function() {//using live since banner elements being removed and appended constantly
        tabs_var.tabs('select', 3);//force select (open) fourth tab
        return false;
    });
    
    
    var data_arr, process_str, size_id, width, height, bg_r, bg_g, bg_b, txt, txt_size, txt_r, txt_g, txt_b, bdr_size, bdr_r, bdr_g, bdr_b, targ_url;
    
    $('#size').bind('click', function(event, save) {
        if ($("#size input[name='size']:checked").val()) {
            size_id = $("#size input[name='size']:checked").attr('id');
        } else {
            size_id = "size0";
        }
        
        switch (size_id) {
            case 'size1':
                width = 728;
                height = 90;
                break;
            case 'size2':
                width = 468;
                height = 60;
                break;
            case 'size3':
                width = 234;
                height = 60;
                break;
            case 'size0':
                width = 0;
                height = 0;
                break;
        }
        
        bg_r = $("#red").slider("value");
        bg_g = $("#green").slider("value");
        bg_b = $("#blue").slider("value");
        txt = $("input#text").val();
        txt_size = $("#font_size").slider("value");
        txt_r = $("#red2").slider("value");
        txt_g = $("#green2").slider("value");
        txt_b = $("#blue2").slider("value");
        bdr_size = $("#border").slider("value");
        bdr_r = $("#red3").slider("value");
        bdr_g = $("#green3").slider("value");
        bdr_b = $("#blue3").slider("value");
        targ_url = $("#url").val();
        
        process_str = 'process.php?width='+width+'&height='+height+'&bg_r='+bg_r+'&bg_g='+bg_g+'&bg_b='+bg_b+'&txt='+txt+'&txt_size='+txt_size+'&txt_r='+txt_r+'&txt_g='+txt_g+'&txt_b='+txt_b+'&bdr_size='+bdr_size+'&bdr_r='+bdr_r+'&bdr_g='+bdr_g+'&bdr_b='+bdr_b+'&targ_url='+targ_url;
        
        if (width !== 0 && (typeof save === 'undefined' || save == 'N')) {
            $("#banner").empty().append('<a href="#"><img alt="banner" src="'+process_str+'" /></a>');
        } else if (width !== 0) {
            $.post(process_str, {
                save: "Y"
            },
            function(data){
                data_arr = data.split("-banner_id-");//see process.php for notes on having to grab saved banner id this way
                $("textarea#result").val("http://carlosmestevez.com/banner-generator/view.php?banner=" + data_arr[1]);
                $("#banner").empty().append("<strong style='font-size:large; line-height:"+height+"px; display:none;'>Successful!</strong>");
                $("#banner strong").fadeIn().fadeOut();
            });
        }
    });
    
    
    
    var typingTimer;
    var doneTypingInterval = 500;

    $('input#text').keyup(function(){
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    $('input#text').keydown(function(){
        clearTimeout(typingTimer);
    });

    
});