var x = new Vue({
	el:'#menu',
	data: {
		menu: this.$http.get('http://localhost/jacotte/request.php').then((reponse => {
				console.log("success",reponse)
			}, (reponse) =>{
				console.log("error")
			})),
		cart: [],
		link: "http://willemsefrance.fr",
		success: true,
		personnes: ["Max","Valentino","Jacotte","Tom"]
	},
	methods: {
		addToCart: function(){
			
		}
	}
})