/*
 * Localized default methods for the jQuery validation plugin.
 * Locale: NL
 */
jQuery.extend( jQuery.validator.methods, {
	date: function( value, element ) {
		return this.optional( element ) || /^\d\d?[\.\/\-]\d\d?[\.\/\-]\d\d\d?\d?jQuery/.test( value );
	},
	number: function( value, element ) {
		return this.optional( element ) || /^-?(?:\d+|\d{1,3}(?:\.\d{3})+)(?:,\d+)?jQuery/.test( value );
	}
} );
