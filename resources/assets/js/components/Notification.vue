<template>
	
</template>
<script>
	export default{
		data(){
			return{
			}
		},

		mounted(){
			Echo.private('id')
			.listen('Testevent', (e) => {
				console.log(e);
			});
		}
	}
</script>