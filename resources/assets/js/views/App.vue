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
            return {}
        }
    }
</script>
<style lang="scss">
    body {
        margin: 0;
        .el-footer {
            position: absolute;
            bottom: 0;
            width: 100% ;
        }
    }
</style>
