<template>
    <div>
        Effectuer une recherche : <input type="text"  name="search" class="form-control" :v-model="searchFilter" />
    </div>
</template>

<script>
    export default {
        name: "searchbar",

        props: {
            searchFilter: String
        },
        data() {
            return {
                searchFilter: ''
            }
        },
        watch: {
            searchFilter: function() {
                searchFilter = this.searchFilter
                this.$parent.$emit('filtreSearchBar', searchFilter)
            }
        }
    }
</script>

<style scoped>

</style>