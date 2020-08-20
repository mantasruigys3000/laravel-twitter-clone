<template>
    <div>
        <post-input></post-input>
        <postfeeds :profile="user" type="dashboard"></postfeeds>
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
