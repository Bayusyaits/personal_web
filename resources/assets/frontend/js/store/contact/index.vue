<template>
    <div class="mcm-contact container" id="mcm-contact">
        <subjects></subjects>
        <section  :class="posts.mtp_initial" :id="posts.mtp_title_en">
          <h1>{{ posts.mtp_content_en }}</h1>
        </section>
    </div>
</template>

<script type="text-javascript">
import Vue from 'vue';
import { get } from '../../libs/api';
import Subjects from '../../common/categories/subjects.vue';

export default {
  name: 'Contact',
  components: {
    'subjects': Subjects
  },
  data() {
    return {
      posts:[]
      }
  },
  created() {
    get('api/pages/contact')
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