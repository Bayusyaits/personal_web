<template>
    <div class="container" v-if="show">
        <div>
            <img src="../../../images/logo/bayusyaits.svg">
            <h1>{{ msg }}</h1>
            <div v-for="post in posts"><a href="post.dm_url ">{{ post.dm_name }}</a></div>
            <button @click="setData" ></button>

        </div>
    </div>
</template>

<script type="text-javascript">
import Vue from 'vue';
import { get } from '../../libs/api';

export default {
	name: 'app',
	data () {
	    return {
        show: false,
        posts: [],
        model: {
          items: [],
          customer: {}
        },
	      msg: 'Welcome to Your Vue.js App'
	    }
	},
beforeRouteEnter(to, from, next) {
    get('api/pages')
    .then(function (res) {
      next(vm => vm.setData(res))
      console.log(res);
    })
    .catch(function (error) {
      console.log(error);
    });
},
created () {
  get('api/pages')
  .then(({data})=>{
    console.log(data)
    this.posts = data
  })
  .catch(as => {console.log(as)} )
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

h1, h2 {
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