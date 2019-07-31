<template>
<div>
	<div class="alert alert-warning">
	<span  class=" ">1st Photo is the Main Photo of the Product and The rest will show only in detail page</span>
</div>
	<div class="" v-for="(file,index) in files">
<form action="admin/pushphoto" method="post">
	<img style="width:150px" :src="getPhoto(file.id,file.file_name)" alt="">
	<input type="hidden" :value="id" name='id'>
	<input type="hidden" value="" name='pathid'>
	<input type="hidden" :value="id" name='index'>
	<input type="file" name='file'  ref="file" @change="change($event,file.id,index)">
</form>
	</div>
</div>
</template>

<script>
export default {


  data () {
    return {
    	id:null,
    	files:[],
    	file:'',
    	oimages:[]


    }
  },
  methods:{
  	getPhoto(aa,bb){

  		return "/storage/"+aa+"/"+bb;
  	},
  	click(aa){
  		console.log(this.files)
  		console.log(aa)
  		console.log(this.oimages)
  	},
  	change(e,pid,index){
  		e.preventDefault()
        e.stopPropagation();
        		//console.log(this.$refs.file[index].files[0])
            console.log(pid)
            console.log(this.id)
        		console.log(e.target.files[0])
          var type= e.target.files[0].type
         var oldname=this.files[index].file_name;
         var size=e.target.files[0].size
          this.file = this.$refs.file[index].files[0]
          let formData = new FormData();

            /*
                Add the form data we need to submit
            */
            formData.append('name',oldname);
             formData.append('file', this.file);
            formData.append('id', this.id);
            formData.append('size', size);
             formData.append('type', type);
            formData.append('pathid', pid);
            formData.append('index', index);


        /*
          Make the request to the POST /single-file URL
        */var that = this
            axios.post( '/admin/pushphoto',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then(function(){
            that.files[index].file_name=e.target.files[0].name
             console.log( that.files[index].file_name);
               that.$forceUpdate()
        })
        .catch(function(error){
          console.log(error);
        });


  		// var that=this
  		// var name= e.target.file
  		// console.log(name)
  		// axios.post('/admin/pushphoto', {
  		// 	id:this.id,
  		// 	index:index,
  		// 	name:this.file
		  // })
		  // .then(function (response) {
		  //   that.files[index].file_name=name
		  //   console.log(that.files[index].file_name)
		  // })
		  // .catch(function (error) {
		  //   console.log(error);
		  // });

  	}
  },
  computed:{
  	restphoto(){
  		var img=this.files.slice()
  		console.log(img)
		  img.splice(0,1);
		  return img
  	},
  	mainphoto(){


  	}
  },
  mounted(){
  	
  	var loc=window.location.pathname
  	
  	var loc1=loc.split("/");
  	var id=loc1[2]
  	this.id =loc1[2]
     var that=this
  	axios.get('/admin/data1', {
    params: {
      id: loc1[2]
    }
  })
  .then(function (response) {
    that.files=response.data.data.image
    console.log(response)
  })
  .catch(function (error) {
    console.log(error);
  })

  }
}
</script>
