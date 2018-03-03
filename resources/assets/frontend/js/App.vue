<template>
  <div class="container" id="app">
    <h2>Essential Links</h2>
    <transition name="fade" mode="out-in">
        <router-view class="page" :key="$route.path"></router-view>
    </transition>
  </div>
</template>
<script>

</script>
<style>
</style>