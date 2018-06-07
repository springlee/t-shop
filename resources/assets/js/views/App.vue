<template lang="html">
    <div id="app">
        <el-container>
            <el-header>Header</el-header>
            <el-main>
                <router-view></router-view>
            </el-main>
            <el-footer>Footer</el-footer>
        </el-container>
    </div>
</template>
<script>
export default {
    data: function () {
        return {

        }
    }
}
</script>
<style>
body {
    margin: 0;
}
</style>
