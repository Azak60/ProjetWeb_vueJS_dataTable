<template>
  <div id="app">
    <b-row><img src="./assets/logo.png"></b-row>
    <Table :msg="'Welcome to the DataTable'"></Table>

    <!--<HelloWorld msg="Welcome to Your Vue.js App"/>-->
  </div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue';
import Table from './components/MyComponent/Table';

export default {
  name: 'app',
  components: {
    Table
  }
}
</script>

<style>
  @import '../node_modules/bootstrap/dist/css/bootstrap.css';

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
