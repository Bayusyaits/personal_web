<template>
    <footer class="container tg-f" id="tg-footer">
        <ul class="f-ul mm-dm">
            <li v-for="post in posts">
                <a :href="post.dm_url" :class="post.dm_initial" v-lazy-container="{ selector: 'img' }">
                    <img :data-src="post.mm_src" />
                </a>
            </li>
        </ul>
    </footer>
</template>

<script type="text-javascript">
    import Vue from 'vue';
    import {
        get
    } from '../../libs/api';
    
    export default {
        name: 'Footer',
        components: {},
        data() {
            return {
                posts: []
            }
        },
        created() {
            get('api/media/med-sos')
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
    .tg-f {
        >ul {
            >li {
                >a {
                    img {}
                }
            }
        }
    }
</style>