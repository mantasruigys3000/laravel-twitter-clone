<template>

    <div>
        <div>

            <user-navbar :user="user"></user-navbar>


        </div>

        <div>
            <router-view :user="user"></router-view>
        </div>
    </div>

</template>

<script>
export default {
    name: "app",

    props:{
        user:{
            required:true,
        }
    }
}
</script>
