new Vue({
	el:'#app',
	data: {
		message: "Salut les gens",
		link: "http://willemsefrance.fr",
		success: true,
		personnes: ["Max","Valentino","Jacotte","Tom"]
	},
	methods: {
		close: function(){
			this.success = false;
			this.message = "LOLOLOL";
		}
	}
})