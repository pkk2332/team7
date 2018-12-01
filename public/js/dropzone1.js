
Dropzone.options.myDropzone= {
      autoDiscover:false,
    url: 'save',
    method: 'POST',
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    removeAllFiles: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.

            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
          

        });
              this.on("maxfilesexceeded", function(file) {
       alert("You can only add five photos.");
              this.removeFile(file);
      });
        this.on("addedfile", function(file) {
           var a= document.getElementsByClassName('dz-message')
           var b=a[0].firstChild
           b.style.display="none";


      });
     this.on("removedfile", function(file) {

            if (this.files.length==0) {
           var a= document.getElementsByClassName('dz-message')
           var b=a[0].firstChild
           b.style.display="block";
            }



      });
        this.on("sendingmultiple", function(data, xhr, formData) {
              var data = $('#my').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });
        });

        this.on("successmultiple", function(data) {

            window.location='/admin'
        });
        this.on("error", function(files, error, xhr) {


                $(".pp").remove();
                $('#errors br').remove();

                        e=error['errors']
            this.removeFile(files);
        var a= document.getElementsByClassName('dz-message')
           var b=a[0].firstChild
           b.style.display="block";


            a=document.getElementById("errors")
            a.className += 'alert alert-danger';
             $("#errors").append(`<span class="pp">-Need to Add Images again<span><br>`)
            for (x in error['errors']) {
               $("#errors").append('<span class="pp">-'+error['errors'][x]+'</span>'+'<br>');
                
            }
   
          
        


        });



    }
}
