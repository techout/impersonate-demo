
$(document).ready(function(){
    $('.jscolor').change(function(){
        $dest = $($(this).attr('BWTarget'));
        if(!$dest.length) return false;

        $bg = ($(this).css('backgroundColor').replace(/[rgb() ]/g, '')).split(',');
        $light = colourIsLight($bg[0], $bg[1], $bg[2]);

        if($light){
            $dest.css('backgroundColor', '#000000');
            $dest.val('#000000');
        }else{
            $dest.css('backgroundColor', '#FFFFFF');
            $dest.val('#FFFFFF');
        }
    });
});

var colourIsLight = function (r, g, b) {
    // Counting the perceptive luminance
    // human eye favors green color... 
    var a = 1 - (0.299 * r + 0.587 * g + 0.114 * b) / 255;
    return (a < 0.5);
}
