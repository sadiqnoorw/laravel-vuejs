export default class Validation {
	constructor() {
		this.message = {};
	}

	getMessage(field) {
		if(this.message[field]){
			return	this.message[field][0];
		}		 
	}

	setMessage(messages) {
		this.message = messages;
	}

	empty() {
		this.message = {};
	}
}