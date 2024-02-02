/**
 * 
 */
/**
 * 
 */
module Ampel {
	requires java.desktop;
	requires javafx.controls;
	requires javafx.graphics;
	requires javafx.base;
	
	opens ampelpacket to javafx.base, javafx.controls, javafx.graphics;
}