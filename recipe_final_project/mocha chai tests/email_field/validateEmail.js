// JavaScript Document

var validateEmail = function(inValue){
	inValue += "";	//turns all inValues into strings
	if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(inValue.trim())){
		return false;
	}
	return true;
}

module.exports = validateEmail;



/*

TEST PLAN


		PASS				||			FAIL
							||
							||		No input
							||		1 space
							||		2 spaces
							||		"null"
							||		"undefined"
							||		"b"
							||		"info@.com"
							||		info.com		
							||		info@ .com
							||		info @.com
							||		info@spot .com		
							||		info@spot. com
							||		@spot.com
							||		info@spot	
	info@spot.com			||
	' info@spot.com'		||			
	'info@spot.com '		||			

*/



