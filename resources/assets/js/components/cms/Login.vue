<template>
   <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-5">
              <v-toolbar dark class="blue darken-3 white--text">
                <v-toolbar-title>Inicia sesión</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                
                  <v-text-field 
                    prepend-icon="person" 
                    v-model="email"
                    name="email" 
                    label="Correo electrónico" 
                    type="email"></v-text-field>
                  <v-text-field 
                    v-model="password"
                    name="password"
                    label="Contraseña"
                    prepend-icon="lock" 
                    :append-icon="e1 ? 'visibility' : 'visibility_off'"
                    :append-icon-cb="() => (e1 = !e1)"
                    :type="e1 ? 'password' : 'text'"
                    >
                  </v-text-field>
                
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn type="submit" class="blue darken-3 white--text" >Ingresar</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>  
   <!--v-container grid-list-md>
        <v-layout row wrap>
            <v-flex xs10 offset-xs1 sm8 offset-sm2 md6 offset-md3>
                <v-text-field 
                  v-model="email"
                  name="email" 
                  solo label="Correo electrónico"
                ></v-text-field>
            </v-flex>
            <v-flex xs10 offset-xs1 sm8 offset-sm2 md6 offset-md3>
                 <v-text-field
                  v-model="password"
                  name="password"
                  :append-icon="e1 ? 'visibility' : 'visibility_off'"
                  :append-icon-cb="() => (e1 = !e1)"
                  :type="e1 ? 'password' : 'text'"
                  solo label="Contraseña"
                ></v-text-field>
            </v-flex>
            <v-flex xs10 offset-xs1 sm8 offset-sm2 md6 offset-md3>
              <v-btn 
                block 
                class="blue" 
                dark
                type="submit"
              >
                Ingresar
              </v-btn>
            </v-flex>
        </v-layout>
    </v-container-->
</template>

<script>
  export default {
    data: () => ({
      drawer: null,
      valid: false,
      e1: true,
      password: '',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      endpoint: "/login",
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters'
      ],
      email: '',
      
    }),
    methods:{
      send(){
        axios({
          method: "POST",
          url: this.endpoint,
          data:{
            product_id: this.product.id
          },
          headers:{
            "Accept": "application/json",
            "Content-Type": "application/json"
          }
        }).then((response)=>{
          if( response.data.action == "new"){
            window.store.commit("increment");
          }
          this.makeSwal("Listo", "Se agregó al carrito.", "success", "Aceptar");
        }).catch (error => {
                this.makeSwal("Lo sentimos", "No se pudo agregar el producto. Intenta otra vez.", "error", "Aceptar");
        });  
      }
    },
    props: {
      source: String
    }
  }
</script>