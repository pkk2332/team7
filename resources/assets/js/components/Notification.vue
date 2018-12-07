<template>
	<div>
		<a class="nav-link count-indicator dropdown-toggle"  
		v-on-clickaway="away"
		 @click='click($event)' id="notificationDropdown" href="#" >
			<i class="mdi mdi-bell"></i>

			<span class="count">{{count}}</span>
		</a>
		<div  :class="{'dropdown-menu':true ,
		'dropdown-menu-right':true ,
		'navbar-dropdown preview-list':true ,
		'show': show } "   style=" max-height: 450px;
    overflow-y: auto; 
    width:300px" 
		aria-labelledby="notificationDropdown">

		<a class="dropdown-item preview-item">
			<div class="preview-item-content">


				<div v-if="change.length!=0">
				<a  href="/admin/admincheckout"  v-for="notify in change">

				 <h6  class="preview-subject font-weight-medium text-dark">{{notify.name}} has been bought </h6>


					</a>
			</div>
		<div v-else>

				<h6  class="preview-subject font-weight-medium text-dark">There is No New Notification</h6>

</div>


			</div>
		</a>
	</div>
</div>
</template>
<script>
import { directive as onClickaway } from 'vue-clickaway';

export default{
	directives: {
		onClickaway: onClickaway,
	},

	data(){
		return{
			noti:[],
			adminid:null,
			show:false,
			ii:0
		}
	},
	computed:{
		count(){
			var a=  Object.values(this.noti).filter(function(n){
				return n.seen!=true
			})

			return a.length
		},
		change(){
			var a=  Object.values(this.noti).filter(function(n){
				return n.seen!=true
			}) 
			return a
		}
	},
	methods:{
		click(e){
				
			this.show=!this.show
			if (this.show==false) {
				for (var i=0; i<this.noti.length; i++) {
					this.noti[i].seen=true
					this.ii=this.ii-1
				}

					axios.post('/admin/notisave', {
					 adminid:this.adminid,
					  })



				
			}
			else{
				this.ii=this.ii+1
			}

			},
			away(){
			     this.show=false
			     if (this.show==false && this.ii>0) {
			     for (var i=0; i<this.noti.length; i++) {
					this.noti[i].seen=true
				}
				
			     }
			    }
		},

		mounted(){
			var that=this
			axios.get('/admin/noti')
			.then(function (response) {
				that.noti=response.data[0]
				that.adminid=response.data[1]

				console.log(`id.${that.adminid}`);
				//console.log(response.data[0]);


				Echo.channel(`id.${that.adminid}`)
				.listen('Testevent', (e) => {
					
					that.noti.push({
						id:e.id,
						name:e.name,
						seen:false
					})
					console.log(that.noti)	
				});


			});



			
		}
	}
	</script>