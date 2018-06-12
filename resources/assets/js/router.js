import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const router = new VueRouter({
 //base: '/ventas/', 
 routes: [
  /*{
   path: "/",
   component: require('./components/Login.vue'),
   meta: {
    forVisitors: true
   }
  }/*,
  {
   path: "/nestor",
   component: require('./components/Login.vue'),
   meta: {
    forVisitors: true
   }
  }*/
  
 ],
 mode: 'history',

 linkActiveClass: 'active',
  fallback: false

})

export default router