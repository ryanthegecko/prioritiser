<template>
  <div class="hello">
    <input type="text" id="input" v-model="msg">
  </div>
</template>

<script>
export default {
  name: 'About',
  data () {
    return {
      msg: 'About Your Vue.js App',
      message: 'I am a message'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
