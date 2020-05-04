// JavaScript Document

var validateLetters = function(inValue){
	inValue += "";	//turns all inValues into strings
	if(!/^[a-zA-Z ]*$/.test(inValue.trim())){
		return false;
	}
	return true;
}

module.exports = validateLetters;



/*

TEST PLAN


		PASS		||			FAIL
					||
					||		No input
					||		1 space
					||		2 spaces
					||		"null"
					||		"undefined"
					||		"1"
					||		"12345"
		a			||			
	"  ab"			||			
	"ab   "  		||			
					||		a-b
					||		abc2d

*/

