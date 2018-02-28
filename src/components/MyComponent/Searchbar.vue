<template>
    <div>
        Effectuer une recherche : <input type="text" name="search" :v-model="filter" />
    </div>
</template>

<script>
    export default {
        name: "searchbar",

        data() {
            return {
                filter: ''
            }
        },
        watch() {

        }
    }
</script>

<style scoped>

</style>