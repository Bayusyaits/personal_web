<template>
  <div class="container tg-b" id="tg-body" v-if="show">
    <!-- <my-component></my-component> -->
    <home></home>
    <about></about>
    <casestudies></casestudies>
    <contact></contact>
  </div>
</template>

<script type="text-javascript">
  import Vue from 'vue';
  import Contact from '../contact/index.vue';
  import About from '../about/index.vue';
  import Casestudies from '../casestudies/index.vue';
  import Home from '../home/index.vue';
  import {
    get
  } from '../../libs/api';
  
  // Vue.component('my-component', {
  //   template: '<div>A custom component!</div>'
  // })
  export default {
    name: 'Layout',
    components: {
      'home': Home,
      'about': About,
      'casestudies': Casestudies,
      'contact': Contact
    },
    data() {
      return {
        show: true,
        posts: [],
        model: {
          items: [],
          customer: {}
        },
        currentView: 'home'
      }
    }
  }
</script>

<style lang="scss">
  .tg-b {
    padding: 0px;
    clear: both;
    vertical-align: top;
    direction: ltr;
    box-sizing: border-box;
    > .mcm-home {
      background: blue;
    }
  }
  a {
    color: #42b983;
  }
</style>