<template>
    <div class="mcm-casestudies container" id="mcm-casestudies">
        <section  :class="posts.mtp_initial" :id="posts.mtp_title_en">
          <h1>{{ posts.mtp_content_en }}</h1>
        </section>
        <fields></fields>
        <projects></projects>
    </div>
</template>

<script type="text-javascript">
import Vue from 'vue';
import { get } from '../../libs/api';
import Fields from '../../common/categories/fields.vue';
import Projects from './projects/';

export default {
  name: 'Casestudies',
  components: {
    'fields': Fields,
    'projects': Projects
  },
  data() {
    return {
      posts:[]
      }
  },
  created() {
    get('api/pages/case-studies')
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