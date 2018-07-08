<?php

function randomHexColor(){
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
