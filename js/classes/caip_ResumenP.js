
class caip_ResumenP extends caip_Action{
		
	constructor() {
		super();
		this.tokens = 300;
		this.responseStartsWhith = '';
		this.prompt = __('Genera un resumen de no más de 35 palabras o 300 caracteres sobre el siguiente texto en español: \n\n','cibeles-ai');
		this.input = this.prompt + this.contenido + '\n\n' + this.responseStartsWhith;
		this.alertSinContenido = __('No hay ningún texto o contenido en la entrada con la que poder generar el resumen.','cibeles-ai');
	}

	launch(){
		jQuery(this.divresult).html('');
		super.launch();
	}
	excerpt(){
		jQuery('#excerpt').val(this.responseText);
	}
	
	ajaxFunction() {
		super.ajaxFunction(this);
    }


}