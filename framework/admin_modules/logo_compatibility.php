<?php
//Backwards Compatibility FUnction
function klopp_logo() {
if ( function_exists( 'the_custom_logo' ) ) {
the_custom_logo();
}
}

function klopp_has_logo() {
if (function_exists( 'has_custom_logo')) {
if ( has_custom_logo() ) {
return true;
}
} else {
return false;
}
}