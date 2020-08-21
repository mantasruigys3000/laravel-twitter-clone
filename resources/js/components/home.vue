<template>
    <div>
        <post-input></post-input>
        <postfeed :profile="user" type="dashboard"></postfeed>
    </div>
</template>

<script>
export default {
name: "home",


    props:{
    user:{

    },
    }
}
</script>
