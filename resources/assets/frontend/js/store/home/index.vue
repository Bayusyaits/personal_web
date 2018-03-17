<template>
  <div class="mcm-home container" id="mcm-home">
    <section :id="posts.mtp_title_en">
      <div class="mtp-mm">
        <div class="mm" ref="container">
          <img class="mm-img" :class="posts.mm_initial" :src="posts.mm_src" />
        </div>
        <div class="mtp">
          <div :class="posts.mtp_initial">
            <h5 v-text="posts.mtp_caption_en"></h5>
            <h1 v-text="posts.mtp_content_en"></h1>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script type="text-javascript">
  import Vue from 'vue';
  import {
    get
  } from '../../libs/api';
  
  export default {
    name: 'Home',
    components: {},
    data() {
      return {
        posts: []
      }
    },
    created() {
      get('api/pages/home')
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
  .mcm-home {
    >section {
      >.mtp-mm {
        >.mm {
          >.mm-img {}
        }
        >.mtp {}
      }
    }
  }
</style>