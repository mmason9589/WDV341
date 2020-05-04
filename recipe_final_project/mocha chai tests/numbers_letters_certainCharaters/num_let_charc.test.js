// JavaScript Document

var assert = require('chai').assert;	//Chai assertion library
var validateNumLetCharc = require('../app/num_let_charc');



describe("Testing field for numbers, letters, commas, and periods", function(){
	
	
	
	
	
	
	it("No input should fail", function(){		
		assert.isFalse(validateNumLetCharc(""));
	});
	
	it("A space and nothing entered should fail", function(){		
		assert.isFalse(validateNumLetCharc(" "));
	});
	
	it("Two spaces and nothing entered should fail", function(){		
		assert.isFalse(validateNumLetCharc("  "));
	});
	
	it("Null should fail", function(){		
		assert.isFalse(validateNumLetCharc("null"));
	});
	
	it("Undefined should fail", function(){		
		assert.isFalse(validateNumLetCharc("undefined"));
	});
	
	it("number/letter combo and a special charater should fail", function(){		
		assert.isFalse(validateNumLetCharc("b#"));
	});
	
	it("number/letter combo and a special charater and period/comma should fail", function(){		
		assert.isFalse(validateNumLetCharc("b.#"));
	});
	
	it("Number/letter combo and period should pass", function(){		
		assert.isTrue(validateNumLetCharc("12."));
	});
	
	it("Number/letter combo and comma should pass", function(){		
		assert.isTrue(validateNumLetCharc("12,"));
	});
	
	it("Number/letter combo and comma in any order should pass", function(){		
		assert.isTrue(validateNumLetCharc("1,s.3"));
	});
	
	
});