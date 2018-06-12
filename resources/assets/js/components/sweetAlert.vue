<template>
    
</template>

<script>
    import swal from 'sweetalert2';
    export default {
        components: {
          swal,
        },
        props: { 
          message: "",
          type: "",
          title: ""
        },
        mounted() {
            if( this.message != ""){
                this.makeSwal(this.title, this.message, this.type, "Aceptar");
            }
        },
        methods: {
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
