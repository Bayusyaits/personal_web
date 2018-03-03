<template>
    <div class="nv">
        <div class="nv-header">
            <nav class="nv-navbar">
                <ul class="nv-ul">
                    <li class="nv-li">{{title}}</li>
                    <li class="nv-li">Title</li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['source', 'title']
    }
</script>

<style>
   
</style>