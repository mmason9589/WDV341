// JavaScript Document

var validateNumLetCharc = function(inValue){
	inValue += "";	//turns all inValues into strings
	if(!/^[a-zA-Z 1-9,.]*$/.test(inValue.trim())){
		return false;
	}
	return true;
}

module.exports = validateNumLetCharc;



/*

TEST PLAN


		PASS		||			FAIL
					||
					||		No input
					||		1 space
					||		2 spaces
					||		"null"
					||		"undefined"
					||		"b#"
					||		"b.#"
		12.			||			
	   12,			||			
	a,3.    		||			
	". a, ."    	||		
					||		

*/

