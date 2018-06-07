<template lang="html">
    <div class="">
        <el-button @click="visible = true">Button</el-button>
        <el-dialog :visible.sync="visible" title="Hello world">
          <p>Try Element</p>
        </el-dialog>

        <router-link to="/user">Go to Bar</router-link>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            visible: false
        }
    }
}
</script>

<style lang="css">
</style>
