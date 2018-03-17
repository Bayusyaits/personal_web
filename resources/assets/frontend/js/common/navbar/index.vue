<template>
    <header class="container tg-h" id="tg-header">
        <div class="icons">
            <div class="logo">
                <img class="mm-l_1" src="http://res.cloudinary.com/limononoto/image/upload/v1521290953/personal_web/uploads/logos/bayusyaits.svg" />
            </div>
            <div class="dm-nav">
                <button type="button" class="nav-icon"></button>
            </div>
        </div>
        <nav class="dm-nv">
            <ul class="dm-ul">
                <li v-for="post in posts" class="dm-li">
                    <a href="#" :class="post.dm_initial" v-scroll-to="post.dm_url" v-text="post.dm_name"></a>
                </li>
            </ul>
        </nav>
    </header>
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

<style lang="scss">
    .tg-h {
        >.icons {
            >.logo {
                >img {}
            }
            >.dm-nav {}
            >.dm-nv {
                >button {}
            }
        }
        >.dm-nv {
            >ul {
                >li {
                    a {}
                }
            }
        }
    }
</style>