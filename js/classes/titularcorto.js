class caip_Titularcorto extends caip_Titulo{
		
	constructor() {
		super();
		if (caip_Titularcorto.instance) {
		  return caip_Titularcorto.instance;
		}
		this.id = 'titularcorto';
		this.divresult = '.result.titularcorto';
		this.prompt = __('Un listado de %d titulares muy cortos sobre el siguiente texto: \n\n','cibeles-ai').replace('%d', caip_settings.caip_numero_titulares);
		this.input = this.prompt + this.contenido + '\n\n';
		this.setButtons();
		caip_Titularcorto.instance = this;
	}
}