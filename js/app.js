let vm = new Vue({
	el:'#menu',
	data: {
		cart: [],
		prixTotal: 0,
		last:[],
		lastId: -1,
		link: "http://willemsefrance.fr",
		success: true,
		seconds:36000,
		heures: -1,
		minutes:-1,
		secondes:-1
	},
	mounted: function(){
		now = new Date();
		h = now.getHours();
		m = now.getMinutes();
		s = now.getSeconds();
		sTotal = s + 60*m + h*3600 ;
		this.seconds = this.seconds - sTotal;
		this.$interval = setInterval(() => {
			this.secondes = this.seconds;
			this.heures = Math.floor(this.secondes / 60 / 60 % 60);
			this.minutes = Math.floor(this.secondes / 60 % 60);
			this.secondes = this.secondes % 60;
			this.seconds--;
		},1000);
	},
	destroy: function(){
		clearInverval(this.$interval);
	},
	methods: {
		addToCart: function(id,nom,prix,image){
			this.lastId = id;
			$('.cart').fadeIn();
			if(this.cart.length == 0){
				console.log("id : "+id);
				console.log("nom : "+nom);
				console.log("prix : "+prix);
				console.log("image : "+image);
				this.cart.push({'id':id,'qte':1,'nom':nom,'prix':prix,'image':image});
			} 
			else{
				var findIt = false;
				this.cart.forEach(function(e){
					if(e.id == id){
						findIt = true;
						e.qte += 1;
					}
				});
				if(!findIt){
					this.cart.push({'id':id,'qte':1,'nom':nom,'prix':prix,'image':image});
					findIt = false;
				}
			}
			var lastId = this.lastId;
			var last = this.last;
			this.cart.forEach(function(e){
				if(e.id == lastId){
					if(last.length==0){
						last.push(e);
					}else{
						last.pop();
						last.push(e);
					}
				}
			})
			this.calcPrixTotal();
		},
		incrementQte: function(id){
			this.cart.forEach(function(e){
				if(e.id == id){
					e.qte +=1
				}
			})
			this.calcPrixTotal();
		},
		decrementQte: function(id){
			cart = this.cart;
			last = this.last;
			this.cart.forEach(function(e,i){
				if(e.id == id){
					e.qte-=1;
					if(e.qte == 0){
						cart.splice(i,1);
						if(last[0].id==e.id){
							
							if(cart.length==0){
								$('.cart').fadeOut(function(){
									last.pop();
								});
							}else{
								last.pop();
								last.push(cart[0]);
							}
						}
					}
				}
			})
			this.calcPrixTotal();
		},
		calcPrixTotal: function(){
			var somme = 0;
			this.cart.forEach(function(element){
				somme = somme + element.qte * element.prix;
			})
			this.prixTotal = somme.toFixed(2);
		}
	}
})

$(document).ready(function(){
	clicked = true;
	$('.cartUp').click(function(){
		if(clicked){
			$('.showCart').fadeIn();
			clicked = false;
		}else{
			$('.showCart').fadeOut();
			clicked = true;
		}
		
	})
})