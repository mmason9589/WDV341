// JavaScript Document

var assert = require('chai').assert;	//Chai assertion library
var validateLetters = require('../app/validateLetters');



describe("Testing field for only letters", function(){
	
	
	
	
	
	
	it("No input should fail", function(){		
		assert.isFalse(validateLetters(""));
	});
	
	it("A space and nothing entered should fail", function(){		
		assert.isFalse(validateLetters(" "));
	});
	
	it("Two spaces and nothing entered should fail", function(){		
		assert.isFalse(validateLetters("  "));
	});
	
	it("Null should fail", function(){		
		assert.isFalse(validateLetters("null"));
	});
	
	it("Undefined should fail", function(){		
		assert.isFalse(validateLetters("undefined"));
	});
	
	it("1 number should fail", function(){		
		assert.isFalse(validateLetters("1"));
	});
	
	it("5 numbers should fail", function(){		
		assert.isFalse(validateLetters("12345"));
	});
	
	it("1 letter should pass", function(){		
		assert.isTrue(validateLetters("ab"));
	});
	
	it("whitespace before should pass", function(){		
		assert.isTrue(validateLetters("    ab"));
	});
	
	it("whitespace after should pass", function(){		
		assert.isTrue(validateLetters("ab   "));
	});
	
	it("Special characters between letters should fail", function(){		
		assert.isFalse(validateLetters("a-b"));
	});
	
	it("mixture of numbers and letters should fail", function(){		
		assert.isFalse(validateLetters("abc2d"));
	});
	
	
});