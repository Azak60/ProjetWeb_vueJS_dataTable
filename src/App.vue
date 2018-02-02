<template>
    <div id="app" class="container">
        <img src="./assets/logo.png">
        <Table :msg="'Welcome to the DataTable'"></Table>
    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';

    export default {
        name: 'app',
        components: {
            Table
        }
    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
