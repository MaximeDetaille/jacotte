let vm = new Vue({
	el:'#menu',
	data: {
		cart: [
			{
			'id':0,
			'qte':0,
			'nom':0,
			'prix':0
			}
			],
		link: "http://willemsefrance.fr",
		success: true
	},
	methods: {
		addToCart: function(id,nom,prix){
			if(this.cart[id]==undefined){
				this.cart.push({'id':id,'qte':1,'nom':nom,'prix':prix});
			}
			else{
				if(this.cart[id].id== id){
				this.cart[id].nom= nom;
				this.cart[id].prix= prix;
				this.cart[id].qte = this.cart[id].qte+1;
				}	
			}
		}
	}
})