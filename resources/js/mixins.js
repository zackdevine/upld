let toast = require('bulma-toast');

function notify (msgstr, msgtype = "is-primary") {
	toast({
		message: msgstr,
		type: msgtype,
		dismissable: true,
		pauseOnHover: true,
		animate: { in: "slideInRight", out: "slideOutRight" }
	})
}