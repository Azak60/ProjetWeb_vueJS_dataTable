<template>
    <div id="app" class="container">
        <img src="./assets/logo.png">
        <ToolData :add="true"></ToolData>
        <!--<EditData :v-if:Table.data().isClicked="true"></EditData>-->
        <Table :msg="'Welcome to the DataTable'"></Table>
    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';
    import ToolData from './components/MyComponent/ToolData';

    export default {
        name: 'app',
        components: {
            ToolData,
            Table
        },
        data() {
            return {
            }
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
