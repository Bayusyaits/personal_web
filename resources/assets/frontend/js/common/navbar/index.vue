<template>
    <div class="dm header">
        <nav class="dm-navbar">
            <ul class="dm-ul">
                <li v-for="post in posts" class="dm-li">
                    <a href="#" :class="post.dm_slug" v-scroll-to="post.dm_url" v-text="post.dm_name"></a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    import Vue from 'vue';
    import {
        get
    } from '../../libs/api';
    export default {
        name: 'navbar',
        data() {
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
        created() {
            get('api/pages/menu')
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

<style>
    
</style>