<template>
  <div>
    <v-header></v-header>
    <main style="margin-top: 20px;">
      <div class="uk-container">
        <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<script>
  import VHeader from "./Header";

  export default {
    components: {
      VHeader
    },
    name: "App"
  }
</script>

<style scoped>

</style>