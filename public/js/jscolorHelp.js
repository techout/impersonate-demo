
$(document).ready(function(){
    $('.jscolor').on('change load', function(){
        $dest = $($(this).attr('BWTarget'));
        if(!$dest.length) return false;

        $dest.css('backgroundColor', fontColorCalculate($(this).css('backgroundColor')))
    });
    $('.jscolor').trigger('change');
});

function fontColorCalculate(bgColor){
    // check if bgColor is in hex
    if(bgColor.substr(0, 1) == "#") bgColor = hexToRgb(bgColor);
    var bg = (bgColor.replace(/[rgb() ]/g, '')).split(',');

    var r = bg[0];
    var g = bg[1];
    var b = bg[2];

    var lumins = 1 - (0.299 * r + 0.587 * g + 0.114 * b) / 255;
    var ret = "#FFFFFF";

    if(lumins < 0.5){
        ret = "#000000";
    }else{
        ret = "#FFFFFF";
    }

    return ret;
}

function hexToRgb(hex){
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}
