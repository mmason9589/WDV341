// JavaScript Document

var assert = require('chai').assert;	//Chai assertion library
var validateEmail = require('../app/validateEmail');



describe("Testing Valid Email Address", function(){
	
	
	it("No input should fail", function(){		
		assert.isFalse(validateEmail(""));
	});
	
	it("A space and nothing entered should fail", function(){		
		assert.isFalse(validateEmail(" "));
	});
	
	it("Two spaces and nothing entered should fail", function(){		
		assert.isFalse(validateEmail("  "));
	});
	
	it("The word null should fail", function(){		
		assert.isFalse(validateEmail("null"));
	});
	
	it("The word undefined should fail", function(){		
		assert.isFalse(validateEmail("undefined"));
	});
	
	it("The character 'b' and any letter between [a-z] should fail", function(){		
		assert.isFalse(validateEmail("b"));
	});
	
	it("Incomplete Domain before '.' should fail", function(){		
		assert.isFalse(validateEmail("info@.com"));
	});
	
	it("No @ symbol should fail", function(){		
		assert.isFalse(validateEmail("info.com"));
	});
	
	it("Space before '.' should fail", function(){		
		assert.isFalse(validateEmail("info@spot .com"));
	});
	
	it("Space before @ should fail", function(){		
		assert.isFalse(validateEmail("info @spot.com"));
	});
	
	
	it("Space after '.' should fail", function(){		
		assert.isFalse(validateEmail("info@spot. com"));
	});
	
	it("Missing account/username should fail", function(){		
		assert.isFalse(validateEmail("@spot.com"));
	});
	
	it("Incomplete Domain should fail", function(){		
		assert.isFalse(validateEmail("info@spot"));
	});
	
	it("Correct format should pass", function(){		
		assert.isTrue(validateEmail("info@spot.com"));
	});
	
	it("Correct format with whitespace before should pass", function(){		
		assert.isTrue(validateEmail("   info@spot.com"));
	});
	
	it("Correct format with whitespace after should pass", function(){		
		assert.isTrue(validateEmail("info@spot.com    "));
	});
	
	it("TLD up to 30 characters should pass", function(){		
		assert.isTrue(validateEmail("info@spot.abcdefghijklmn"));
	});
	
	
});








