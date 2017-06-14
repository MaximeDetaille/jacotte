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
		nomMenu : "",
		prixMenu : 0,
		prixEntree : 0,
		prixPlat : 0,
		prixDessert : 0,
		prixFromage : 0,
		prixBoisson : 0,
		imageMenu : [{'entree':"0",'plat':"0",'dessert':"0",'fromage':"0",'boisson':"0"}],
		imageMenuEnd : "",
		lastIdEntree : "",
		lastIdPlat : "",
		lastIdDessert : "",
		lastIdFromage : "",
		lastIdBoisson : "",
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
			if(this.tmpEntree.id == id){
				$('#entree-'+idMenu).css('background-color','#000000');
				$('#entree-'+idMenu).children('.tick').hide();
				this.imageMenu.entree = "";
				this.prixEntree = 0;
				this.tmpEntree = "";
				this.lastIdEntree = "";
			}else{
				$('#entree-'+this.lastIdEntree).css('background-color','#000000');
				$('#entree-'+this.lastIdEntree).children('.tick').hide();
				$('#entree-'+idMenu).css('background-color','#64D581');
				$('#entree-'+idMenu).children('.tick').show();
				this.imageMenu.entree = image;
				this.prixEntree = prix;
				this.tmpEntree = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
				this.lastIdEntree = idMenu;
			}
			this.calcPrixMenu();
		},
		addToMenuPlat: function(id,idMenu,nom,prix,image,qte){
			if(this.tmpPlat.id == id){
				$('#plat-'+idMenu).css('background-color','#000000');
				$('#plat-'+idMenu).children('.tick').hide();
				this.imageMenu.plat = "";
				this.prixPlat = 0;
				this.tmpPlat = "";
				this.lastIdPlat = "";
			}else{
				$('#plat-'+this.lastIdPlat).css('background-color','#000000');
				$('#plat-'+this.lastIdPlat).children('.tick').hide();
				$('#plat-'+idMenu).css('background-color','#64D581');
				$('#plat-'+idMenu).children('.tick').show();
				this.imageMenu.plat = image;
				this.prixPlat = prix;
				this.tmpPlat = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
				this.lastIdPlat = idMenu;
			}
			this.calcPrixMenu();
		},
		addToMenuDessert: function(id,idMenu,nom,prix,image,qte){
			if(this.tmpDessert.id == id){
				$('#dessert-'+idMenu).css('background-color','#000000');
				$('#dessert-'+idMenu).children('.tick').hide();
				this.imageMenu.dessert = "";
				this.prixDessert = 0;
				this.tmpDessert = "";
				this.lastIdDessert = "";
			}else{
				$('#dessert-'+this.lastIdDessert).css('background-color','#000000');
				$('#dessert-'+this.lastIdDessert).children('.tick').hide();
				$('#dessert-'+idMenu).css('background-color','#64D581');
				$('#dessert-'+idMenu).children('.tick').show();
				this.imageMenu.dessert = image;
				this.prixDessert = prix;
				this.tmpDessert = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
				this.lastIdDessert = idMenu;
			}
			this.calcPrixMenu();
		},
		addToMenuFromage: function(id,idMenu,nom,prix,image,qte){
			if(this.tmpFromage.id == id){
				$('#fromage-'+idMenu).css('background-color','#000000');
				$('#fromage-'+idMenu).children('.tick').hide();
				this.imageMenu.fromage = "";
				this.prixFromage = 0;
				this.tmpFromage = "";
				this.lastIdFromage = "";
			}else{
				$('#fromage-'+this.lastIdFromage).css('background-color','#000000');
				$('#fromage-'+this.lastIdFromage).children('.tick').hide();
				$('#fromage-'+idMenu).css('background-color','#64D581');
				$('#fromage-'+idMenu).children('.tick').show();
				this.imageMenu.fromage = image;
				this.prixFromage = prix;
				this.tmpFromage = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
				this.lastIdFromage = idMenu;
			}
			this.calcPrixMenu();
		},
		addToMenuBoisson: function(id,idMenu,nom,prix,image,qte){
			if(this.tmpBoisson.id == id){
				$('#boisson-'+idMenu).css('background-color','#000000');
				$('#boisson-'+idMenu).children('.tick').hide();
				this.imageMenu.boisson = "";
				this.prixBoisson = 0;
				this.tmpBoisson = "";
				this.lastIdBoisson = "";
			}else{
				$('#boisson-'+this.lastIdBoisson).css('background-color','#000000');
				$('#boisson-'+this.lastIdBoisson).children('.tick').hide();
				$('#boisson-'+idMenu).css('background-color','#64D581');
				$('#boisson-'+idMenu).children('.tick').show();
				this.imageMenu.boisson = image;
				this.prixBoisson = prix;
				this.tmpBoisson = {'id':id,'idMenu':idMenu,'nom':nom,'prix':prix,'image':image,'qte':qte}
				this.lastIdBoisson = idMenu;
			}
			this.calcPrixMenu();
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
			if(this.cart.length<4){
				this.prixTotal = (parseFloat(this.prixTotal) + 3).toFixed(2);
			}
			$.post('updateCart.php?prix='+this.prixTotal,{data : dataString},function(result){
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
			
			if(this.imageMenu.plat){
				this.imageMenuEnd = this.imageMenu.plat;
			}
			else{
				if(this.imageMenu.entree){
					this.imageMenuEnd = this.imageMenu.entree;
				}
				else{
					if(this.imageMenu.dessert){
						this.imageMenuEnd = this.imageMenu.dessert;
					}
					else{
						if(this.imageMenu.fromage){
							this.imageMenuEnd = this.imageMenu.fromage;
						}
						else{
							this.imageMenuEnd = this.imageMenu.boisson;
						}
					}
				}
			}
			menu = {'nom':this.nomMenu,'prix':this.prixMenu,'type':"personnalisé",'image':this.imageMenuEnd,'idEntree':this.tmpEntree.idMenu,'idPlat':this.tmpPlat.idMenu,'idDessert':this.tmpDessert.idMenu,'idFromage':this.tmpFromage.idMenu,'idBoisson':this.tmpBoisson.idMenu,'perso':1}
			var dataString = JSON.stringify(menu);
			console.log(dataString);
			result = "";
			$.post("ajax.php?method=createMenu",{data : dataString},function(data, status){
		        result = data;
		        vm.endCart(result,this.prixMenu);
		    });
		},
		endCart: function(result,prixMenu){
			this.addToCart(this.lastId+1,result,this.nomMenu,this.prixMenu,this.imageMenuEnd,1,this.tmpEntree.idMenu,this.tmpPlat.idMenu,this.tmpDessert.idMenu,this.tmpFromage.idMenu,this.tmpBoisson.idMenu);
			this.nomMenu = "";
			this.prixEntree = 0;
			this.prixPlat = 0;
			this.prixDessert = 0;
			this.prixFromage = 0;
			this.prixBoisson = 0;
			this.prixMenu = 0;
		},
		calcPrixMenu(){
			if((this.prixEntree != 0) && (this.prixPlat != 0) && (this.prixDessert != 0) && (this.prixBoisson != 0)){
				this.prixMenu = 11.50;
			}else{
				if(((this.prixEntree != 0) && (this.prixPlat != 0) && (this.prixBoisson != 0)) || ((this.prixBoisson != 0) && (this.prixPlat != 0) && (this.prixDessert))){
				this.prixMenu = 9.90;
				}
				else{
					if((this.prixPlat != 0) && (this.prixBoisson !=0)){
						this.prixMenu = 6.90;
					}else{
						this.prixMenu = this.prixEntree + this.prixPlat + this.prixDessert + this.prixFromage + this.prixBoisson;
					}
				}
			}
			this.prixMenu = this.prixMenu.toFixed(2);
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