<template>
  <div class="container" id="dm" v-if="show">
    <div>
      <img src="../../../images/logo/bayusyaits.svg">
      <h1>{{ msg }}</h1>
      <section v-for="post in posts" :class="post.mcm_initial" :id="post.mcm_title_id" v-html="post.mcm_content_en"></section>  
    </div>
    <my-component></my-component>
    <casestudies></casestudies>
  </div>
</template>

<script type="text-javascript">
  import Vue from 'vue';
  import casestudies from '../casestudies/index.vue';
  import { get } from '../../libs/api';
  
  Vue.component('my-component', {
  template: '<div>A custom component!</div>'
})
  export default {
  name: 'app',
    components: {
      'casestudies': casestudies
    },
    data() {
      return {
        show: false,
        posts: [],
        model: {
          items: [],
          customer: {}
        },
        msg: 'Welcome to Your Vue.js App',
        currentView: 'casestudies'
      }
    },
    beforeRouteEnter(to, from, next) {
      get('api/pages/content-menu')
        .then(function(res) {
          next(vm => vm.setData(res))
          console.log(res);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    created() {
      get('api/pages/content-menu')
        .then(({
          data
        }) => {
          console.log(data)
          this.posts = data
        })
        .catch(as => {
          console.log(as)
        })
    },
    methods: {
      setData(res) {
        Vue.set(this.$data, 'posts', res.data.posts)
        this.show = true
      }
    }
  }
</script>

<style lang="scss">
  #app {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
  }
  
  h1,
  h2 {
    font-weight: normal;
  }
  
  ul {
    list-style-type: none;
    padding: 0;
  }
  
  li {
    display: inline-block;
    margin: 0 10px;
  }
  
  a {
    color: #42b983;
  }
</style>