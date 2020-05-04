// JavaScript Document

var assert = require('chai').assert;	//Chai assertion library
var validateNumbers = require('../app/validateNumbers');



describe("Testing field for only numbers", function(){
	
	
	
	
	
	
	it("No input should fail", function(){		
		assert.isFalse(validateNumbers(""));
	});
	
	it("A space and nothing entered should fail", function(){		
		assert.isFalse(validateNumbers(" "));
	});
	
	it("Two spaces and nothing entered should fail", function(){		
		assert.isFalse(validateNumbers("  "));
	});
	
	it("Null should fail", function(){		
		assert.isFalse(validateNumbers("null"));
	});
	
	it("Undefined should fail", function(){		
		assert.isFalse(validateNumbers("undefined"));
	});
	
	it("1 character should fail", function(){		
		assert.isFalse(validateNumbers("b"));
	});
	
	it("5 characters should fail", function(){		
		assert.isFalse(validateNumbers("bbbbb"));
	});
	
	it("2 digits should pass", function(){		
		assert.isTrue(validateNumbers("12"));
	});
	
	it("whitespace before should pass", function(){		
		assert.isTrue(validateNumbers("    12"));
	});
	
	it("whitespace after should pass", function(){		
		assert.isTrue(validateNumbers("12   "));
	});
	
	it("Characters between digits should fail", function(){		
		assert.isFalse(validateNumbers("1-2"));
	});
	
	it("mixture of numbers and letters should fail", function(){		
		assert.isFalse(validateNumbers("12c4"));
	});
	
	
});