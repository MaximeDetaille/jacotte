let vm = new Vue({
	el:'.menu',
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
		secondes:-1,
		tmpEntree : "",
		tmpPlat : "",
		tmpDessert : "",
		tmpFromage : "",
		tmpBoisson : "",
		nomMenu : ""
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
		addToMenuEntree: function(id,idMenu,nom,prix,image,qte){
			this.tmpEntree = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
		},
		addToMenuPlat: function(id,idMenu,nom,prix,image,qte){
			this.tmpPlat = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
		},
		addToMenuDessert: function(id,idMenu,nom,prix,image,qte){
			this.tmpDessert = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
		},
		addToMenuFromage: function(id,idMenu,nom,prix,image,qte){
			this.tmpFromage = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
		},
		addToMenuBoisson: function(id,idMenu,nom,prix,image,qte){
			this.tmpBoisson = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
		},
		addToCart: function(id,idMenu,nom,prix,image,qte,idEntree,idPlat,idDessert,idFromage,idBoisson){
			this.lastId = id;
			$('.cart').fadeIn();
			if(this.cart.length == 0){
				this.cart.push({'id':id,'idMenu':idMenu,'qte':1,'nom':nom,'prix':prix,'image':image,'idEntree':idEntree,'idPlat':idPlat,'idDessert':idDessert,'idFromage':idFromage,'idBoisson':idBoisson});
			} 
			else{
				var findIt = false;
				this.cart.forEach(function(e){
					if(e.id == id){
						findIt = true;
						if(e.qte < e.qteStock){
							e.qte += 1;
						}
					}
				});
				if(!findIt){
					this.cart.push({'id':id,'idMenu':idMenu,'qte':1,'nom':nom,'prix':prix,'image':image,'idEntree':idEntree,'idPlat':idPlat,'idDessert':idDessert,'idFromage':idFromage,'idBoisson':idBoisson});
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
		delItem: function(id){
			last = this.last;
			cart = this.cart;
			this.cart.forEach(function(e,i){
				if(e.id == id){
					console.log(i);
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
			})
			this.calcPrixTotal();
		},
		calcPrixTotal: function(){
			console.log("pirxtotal")
			var somme = 0;
			this.cart.forEach(function(element){
				somme = somme + element.qte * element.prix;
			})
			this.prixTotal = somme.toFixed(2);
		},
		checkout : function(location){
			console.log(JSON.stringify(this.cart));
			var dataString = JSON.stringify(this.cart);
			console.log(this.cart);
			$.post('updateCart.php',{data : dataString},function(result){
				document.location.href=location;
			});
		},
		delItemCheckout: function(id){
			cart = this.cart;
			this.cart.forEach(function(e,i){
				if(e.id == id){
					cart.splice(i,1);
					if(cart.length==0){
						$('.cart').fadeOut(function(){
							last.pop();
						});
					}
				}
			})
			this.calcPrixTotal();
		},
		decrementQteCheckout: function(id){
			cart = this.cart;
			this.cart.forEach(function(e,i){
				if(e.id == id){
					e.qte-=1;
					if(e.qte == 0){
						cart.splice(i,1);
						if(cart.length==0){
							$('.cart').fadeOut(function(){
								last.pop();
							});
						}
					}
				}
			})
			this.calcPrixTotal();
		},
		addMenuToCart: function(){
			
			var prixMenu = 0;
			if(this.tmpEntree!=""){prixMenu += this.tmpEntree.prix}
			if(this.tmpPlat!=""){prixMenu += this.tmpPlat.prix}
			if(this.tmpDessert!=""){prixMenu += this.tmpDessert.prix}
			if(this.tmpFromage!=""){prixMenu += this.tmpFromage.prix}
			if(this.tmpBoisson!=""){prixMenu += this.tmpBoisson.prix}
			
			menu = {'nom':this.nomMenu,'prix':prixMenu,'type':"personnalisé",'image':"defaultMenu.png",'idEntree':this.tmpEntree.idMenu,'idPlat':this.tmpPlat.idMenu,'idDessert':this.tmpDessert.idMenu,'idFromage':this.tmpFromage.idMenu,'idBoisson':this.tmpBoisson.idMenu,'perso':1}
			var dataString = JSON.stringify(menu);
			result = "";
			$.post("ajax.php?method=createMenu",{data : dataString},function(data, status){
		        result = data;
		        vm.endCart(result,prixMenu);
		    });
		},
		endCart: function(result,prixMenu){
			this.addToCart(this.lastId+1,result,this.nomMenu,prixMenu,"defaultMenu.png",1,this.tmpEntree.idMenu,this.tmpPlat.idMenu,this.tmpDessert.idMenu,this.tmpFromage.idMenu,this.tmpBoisson.idMenu);
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
	});

	console.log($('#hiddenCart').text());
	if($('#hiddenCart').text()){
		cart = JSON.parse($('#hiddenCart').text());
		cart.forEach(function(e){
			vm.$data.cart.push(e);
		});
	}
})