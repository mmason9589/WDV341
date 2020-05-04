// JavaScript Document

var validateNumbers = function(inValue){
	inValue += "";	//turns all inValues into strings
	if(!/^[0-9]*$/.test(inValue.trim())){
		return false;
	}
	return true;
}

module.exports = validateNumbers;



/*

TEST PLAN


		PASS		||			FAIL
					||
					||		No input
					||		1 space
					||		2 spaces
					||		"null"
					||		"undefined"
					||		"b"
					||		"bbbbb"
		12			||			
	"  12"			||			
	"12   "  		||			
					||		1-2
					||		12c4

*/

