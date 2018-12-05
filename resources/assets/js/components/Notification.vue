<template>
	<div>
		<a class="nav-link count-indicator dropdown-toggle" @click='click()' id="notificationDropdown" href="#" data-toggle="dropdown">
			<i class="mdi mdi-bell"></i>
			<span class="count">{{count}}</span>
		</a>
		<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
			<a class="dropdown-item preview-item">
				<div class="preview-item-content">
					<h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
				</div>
			</a>
		</div>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				noti:[],


			}
		},
		computed:{
			count(){
				var a=  Object.values(this.noti).filter(function(n){
					return n.seen!=true
				})
				return a.length
			}
		},
		methods:{
			click(){
				for (var i=0; i<this.noti.length; i++) {
					this.noti[i].seen=true
				}
				//console.log(this.noti)
			}
		},

		mounted(){
			var that=this
			axios.get('/admin/noti')
			.then(function (response) {
				that.noti=response.data[0]

				//console.log(that.noti);
				//console.log(response.data[0]);

				Echo.private(that.noti.id)
				.listen('Testevent', (e) => {
					console.log(e);
				});


			});



			
		}
	}
</script>