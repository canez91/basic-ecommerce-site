<template>
	<div>
		<template v-if="method=='POST'" id="image-input-template">
          <div class="Image-input">
            <div class="Image-input__image-wrapper">
              <i v-show="!image.file" class="icon fa fa-picture-o"></i>
              <img v-show="image.file" class="Image-input__image " :src="image.file">
            </div>

            <div class="Image-input__input-wrapper">
              Elige
              <input 
              	@change="previewPhoto" 
              	class="Image-input__input input_benefit" 
              	name="image_url" 
              	type="file" 

              	accept="image/*"
              	/>
            </div>
          </div>
        </template>
		<template v-if="method=='PUT' && edit_image" id="image-input-template">
          <div class="Image-input">
            <div class="Image-input__image-wrapper">
              <i v-show="!image.file" class="icon fa fa-picture-o"></i>
              <img v-show="image.file" class="Image-input__image " :src="image.file">
            </div>

            <div class="Image-input__input-wrapper">
              Elige
              <input 
              	@change="previewPhoto" 
              	class="Image-input__input input_benefit" 
              	name="image_url" 
              	type="file" 

              	accept="image/*"
              	/>
            </div>
          </div>
        </template>
        <template v-if="method=='PUT' && !edit_image" id="image-input-template">
          <div class="Image-input">
            <div class="Image-input__image-wrapper">
              <img class="Image-input__image " :src="'/images/'+product.image_url">
            </div>

            <div class="Image-input__input-wrapper" @click="editImage()">
              Cambiar
            </div>
          </div>
        </template>
	</div>
</template>

<script>
	import swal from 'sweetalert2';
	export default{
		components: {
	      swal,
	    },
		props: { 
		  product: { 
		  	image_url:null
		  },
		  method: ""
		},
		data(){
			return{
				edit_image: false,
				endpoint: "/upload_media",
				image:{
	                file: null,
	                format: null,
	                size: null,
	                width: null,
	                height: null,
	                file_name: null,
	            }	
			}
		},
		methods: {
			editImage(){
			  this.edit_image = true;
			  this.appendHidden();	
			},
			appendHidden(){
			  var input = document.createElement("input");
			  input.setAttribute("type", "hidden");
			  input.setAttribute("name", "new_image");
			  input.setAttribute("value", true);
			  document.getElementById("productForm").appendChild(input);
			},
			resetImage(){
				this.image = {
	                file: null,
	                format: null,
	                size: null,
	                width: null,
	                height: null,
	                file_name: null,
	            };	

	            let i = document.getElementsByClassName('Image-input__input')
		        for(let n in i){
		          if (i[n].value){
		            i[n].value = null
		          }
		        }
			},
			cleanMediaName(name){
				var only_name = name.split(".")[0];
				var format = name.split(".")[ name.split(".").length-1 ];
		        return only_name.split(" ").join("-")+"."+format;
			},
			previewPhoto: function(event) {
	          var input = event.target;
	          this.image.format = input.files[0].name.split(".")[ input.files[0].name.split(".").length-1 ];
	          this.image.size = input.files[0].size;
	          this.image.file_name = this.cleanMediaName( input.files[0].name );
	                
	          if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function(e) {
	              var img = new Image;

	              img.onload = function() {
	                  this.image.width = img.width;
	                  this.image.height = img.height;
	              }.bind(this);

	              img.src = e.target.result; 
	              this.image.file = e.target.result;

	            }.bind(this);
	        
	            reader.readAsDataURL(input.files[0]);
	          }

	          setTimeout(
	            function(){
	            	var max_height = 800;
	                var max_width = 600;

	                if( this.validateImageFormat(this.image, max_width, max_height) ){
	                	//subir la imagen
	                	this.upload();
	                	this.product.image_url = this.image.file_name;
	                } else {
	                	this.resetImage();
	                }
	            }.bind(this)
	          ,
	          500);
           },
		   validateImageFormat(media, max_width, max_height){
		     var validFormats = ["jpg","jpeg","png"],
		         maxSize = 2000000,
		         maxWidth = max_width,
		         maxHeight = max_height;
		     
		     if( validFormats.indexOf( media.format ) < 0 ){
		       this.makeSwal("Espera", "El formato de la imagen no esta permitido, por favor, utilice otra imagen.", "warning", "Aceptar");
		        return false;
		     } else if ( maxWidth < media.width || maxHeight < media.height ) {
		       this.makeSwal("Espera", "Las dimensiones máximas permitidas para la imagen son "+maxWidth+"x"+maxHeight+" pixeles.", "warning", "Aceptar");
		        return false;
		     } else if( media.size > maxSize ) {
		       this.makeSwal("Espera", "Lo sentimos, el tamaño de la imagen supera el limite permitido ("+(maxSize/1000000)+" Mb), por favor, utilice otra imagen.", "warning", "Aceptar");
		        return false;
		     }

		     return true;
		   },
		   upload(){
		      axios({
				  method: "POST",
				  url: this.endpoint,
				  data:{
				    image: this.image
			 	  },
				  headers:{
				    "Accept": "application/json",
					"Content-Type": "application/json"
				  }
			  }).then((response)=>{
			  
			  }).catch((error)=> {
	            this.makeSwal("Error", error.response.data.msg, "error", "Aceptar");
	            this.resetImage();
	          });
		  },
          makeSwal(swalTitle, swalText, swalType, buttonText){
	        swal({
	          title: swalTitle,
	          html: swalText,
	          type: swalType,
	          confirmButtonText: buttonText,
	          allowOutsideClick: false
	        });
	      }
		}
	}
</script>

<style>
	.Image-input {
  margin: 1em;
}

.Image-input__image-wrapper {
  flex-basis: 80%;
  height: 300px;
  flex: 2.5;
  border-radius: 1px;
  overflow-y: hidden;
  border-radius: 1px;
  background: #eee;
  justify-content: center;
  align-items: center;
  display: flex;
}

.Image-input__image-wrapper > .icon {
  color: #ccc;
  font-size: 50px;
  cursor: default;
}

.Image-input__image {
  max-width: 100%;
  border-radius: 1px;
  max-height: 100%;
}

.Image-input__input-wrapper {
  overflow: hidden;
  position: relative;
  background: #cecece;
  border-radius: 1px;
  max-width: 100%;
  padding-top: 1.5em;
  padding-bottom: 1.5em;
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  color: rgba(0, 0, 0, 0.7);
  transition: 0.4s background;
}

.Image-input__input-wrapper:hover {
  background: #e0e0e0;
}

.Image-input__input {
  cursor: inherit;
  display: block;
  font-size: 999px;
  min-height: 100%;
  opacity: 0;
  position: absolute;
  right: 0;
  text-align: right;
  top: 0;
  cursor: pointer;
}

.vue-input-tag-wrapper{
  margin-bottom: 1em;
}
</style>