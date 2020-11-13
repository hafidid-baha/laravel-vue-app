<template>
    <div>
        <div class="row">
            <div class="col-12 p-4 DetaisHeader">{{title}}</div>    
        </div>
    </div>
</template>
<script>
export default {
    name:'Header',
    props:{
        title:String
    }
}
</script>

<style scoped>
.DetaisHeader{
    background: #F5F5F5;
    border-radius: 5em;
    /* box-shadow: 0px 0px 6px rgba(0, 0, 0, 0.06); */
    font-family: 'Changa', sans-serif;
}
</style>