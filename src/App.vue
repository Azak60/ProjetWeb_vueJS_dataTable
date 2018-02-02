<template>
    <div id="app" class="container">
        <img src="./assets/logo.png">
        <AddData></AddData>
        <Table :msg="'Welcome to the DataTable'"></Table>
    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';
    import AddData from './components/MyComponent/AddData';

    export default {
        name: 'app',
        components: {
            Table,
            AddData
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
