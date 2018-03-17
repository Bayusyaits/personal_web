<template>
    <div class="mc-contact" id="mc-subjects">
        <div v-for="post in posts" :class="post.mc_initial" :id="post.mc_name">
          <h5>{{ post.mc_name }}</h5>
        </div>
    </div>
</template>

<script type="text-javascript">
import Vue from 'vue';
import { get } from '../../libs/api';

export default {
  name: 'Subjects',
  data() {
    return {
      posts:[]
      }
  },
  created() {
    get('api/categories/subjects')
    .then(({
          data
        }) => {
          console.log(data)
          this.posts = data
        })
        .catch(as => {
          console.log(as)
        })
  }

}

</script>

<style lang="scss">

</style>