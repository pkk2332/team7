<template>

  <div class="container pt-5">
    <div class="row px-4">
      <div class="col-lg-7 col-md-7 col-sm-12 col-12 pb-4">
        <div class="row">
          <div class="col-12 bg-dark px-4 py-3">
            <h1 class="text-white display-4">Your Cart</h1>
          </div>
        </div>

        <div class="" v-for="(product,index) in products">
          <div class="row border border-top-0 border-dark">
            <div class="col-3 p-2">
              <img :src="getPhoto(product.image)" alt="..." class="img-thumbnail">
            </div>
            <div class="col-7 p-3">
              <h4>{{ product.name }}</h4>
              <div class="row p-0">
                <div class="col-3 d-flex align-items-center text-dark text-center">
                  Quantity
                </div>
                <div class="col-3 d-flex justify-content-left">
                  <input class="form-control" type="number" @change="changevalue(index,$event)" min="1" :value="current(index)">
                </div>
              </div>
              <br>
              <button class="btn btn-danger" @click.prevent="remove(index)">Remove</button>

            </div>
            <div class="col-2 p-2 d-flex align-items-center">
              <h4>{{product.price*product.quantity}} Ks</h4>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4 col-md-4 col-sm-12 col-12 offset-lg-1 offset-md-1">
        <div class="row">
          <div class="col-12 bg-dark text-white px-4 py-3">
            <h1 class="text-white display-4">Summary</h1>
            <br>
            <div class="row py-2">
              <div class="col-6">
                Sub-total
              </div>
              <div class="col-6 d-flex justify-content-end">
                {{Subtotal1}} Ks
              </div>
            </div>
            <div class="row py-2">
              <div class="col-6">
                Tax
              </div>
              <div class="col-6 d-flex justify-content-end">
                {{tax1}} Ks
              </div>
            </div>

            <div class="row pt-4 pb-2">
              <div class="col-6">
                <h3><b>Total</b></h3>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <h3>{{amount}} Ks</h3>
              </div>
            </div>
            <div class="col-12 pt-3 p-0">
              <button class="btn btn-block btn-primary" @click.prevent="checkout"><i class="fa fa-shopping-cart"></i>Check Out</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</template>



<script>
  export default {
    data: function() {
      return {
        products: [],
        Subtotal:null,
        tax:null,
        Amount:null
      }
    },
    methods:{
      checkout(){
        console.log(this.products)
        axios.post('cart/save', {
          products: this.products,
          Subtotal: this.Subtotal,
          tax:this.tax,
          amount:this.Amount
        })
        .then(function (response) {
  window.location="/product" 
})
        .catch(function (error) {

        });
      },
      remove(a){

        axios.post('cart/delete', {

         id:this.products[a].id
       })

        .then(function (response) {

        })
        .catch(function (error) {

        });


        this.products.splice(a,1);

      },
      getPhoto(aa){
        return aa;
      },
      plus(count){
        return this.products[count].quantity++
      },
      minus(count){
        return this.products[count].quantity--
      },
      current(bb){
        return this.products[bb].quantity

      },
      changevalue(index,e)
      {
        var  a=e.target.value
        console.log(this.products)
        if (a<=0)
        {
          alert("Quantity must be at least 1")
          this.products[index].quantity=1
          this.$forceUpdate()

          console.log(this.products[index].quantity)

        }
        else{

          this.products[index].quantity=e.target.value
          console.log(this.products[index].quantity)
        }

      }
    },
    computed:{
      Subtotal1(){
        var b=0
        Object.values(this.products).forEach(function(a){

          b+=a.quantity*a.price
        })
        this.Subtotal=b

        return this.Subtotal.toLocaleString()
      },
      tax1(){
        var b=this.Subtotal*0.005

        this.tax=b.toFixed(0)
        return this.tax.toLocaleString()
      },
      amount(){
        var b=Number(this.Subtotal)+Number(this.tax)
        this.Amount=b
        return this.Amount.toLocaleString()
      }
    },
    mounted(){

      var that=this
      axios.get('/cart/data')
      .then(function (response) {
        that.products=response.data[0]

        console.log(that.products);
        

        Object.values(that.products).forEach(function(a){

          a.quantity=1
        })


      });




    }
  }
</script>