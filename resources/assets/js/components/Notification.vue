<template>
	
</template>
<script>
	export default{
		mounted(){
			Echo.private('id')
			.listen('Testevent', (e) => {
				console.log(e);
			});
		}
	}
</script>