<template>
	<div>
		<a class="nav-link count-indicator dropdown-toggle" @click='click()' id="notificationDropdown" href="#" data-toggle="dropdown">
			<i class="mdi mdi-bell"></i>
			<span class="count">{{count}}</span>
		</a>
		<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
			<a class="dropdown-item preview-item">
				<div class="preview-item-content">
					<a href="/admin/admincheckout" v-for="notify in noti"><h6 class="preview-subject font-weight-medium text-dark">{{notify.name}} has been bought</h6></a>
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
				adminid:null
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
				that.adminid=response.data[1]

				console.log(that.noti);
				//console.log(response.data[0]);

					
				Echo.channel(`id.${that.adminid}`)
				.listen('Testevent', (e) => {
				
					that.noti.push({
						name:e.name,
						seen:false
					})
					console.log(that.noti)	
				});


			});



			
		}
	}
</script>