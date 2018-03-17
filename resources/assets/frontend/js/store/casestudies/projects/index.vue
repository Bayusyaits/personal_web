<template>
  <div class="mcm-cmmc container" id="mcm-projects">
    <div v-for="post in posts" class="mtp-mm">
      <div class="mm" v-lazy-container="{ selector: 'img', error: 'http://res.cloudinary.com/limononoto/image/upload/v1521294359/personal_web/uploads/icons/error.png', loading: 'http://res.cloudinary.com/limononoto/image/upload/v1521294360/personal_web/uploads/icons/loading.gif' }">
        <img :class="post.mm_initial" :data-src="post.mm_src">
      </div>
      <div class="mtp-mc">
        <div class="mtp">
          <h4 :class="post.mtp_initial" v-text="post.mtp_title_en"></h4>
        </div>
        <div class="mc">
          <h5 :class="post.mc_initial" v-text="post.mc_name"></h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text-javascript">
  import Vue from 'vue';
  import {
    get
  } from '../../../libs/api';
  
  export default {
    name: 'Projects',
    components: {},
    data() {
      return {
        posts: []
      }
    },
    created() {
      get('api/case-studies/projects')
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
  .mcm-cmmc {}
</style>