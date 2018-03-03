<template>
    <div class="container" v-if="show">
        <div>
            <img src="../../../images/logo/bayusyaits.svg">
            <h1>{{ msg }}</h1>
            <h1>Navbar</h1>
            <h1>Test</h1>
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
        model: {
          items: [],
          customer: {}
        },
	      msg: 'Welcome to Your Vue.js App'
	    }
	},
beforeRouteEnter(to, from, next) {
    get('api/halo')
    .then((res) => {

      next(vm => vm.setData(res))
    })
},
methods: {
  setData(res) {
    Vue.set(this.$data, 'model', res.data.model)
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