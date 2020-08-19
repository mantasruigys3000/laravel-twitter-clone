<template>

    <div>
        <div>

            THIS IS THE APP
            <router-link class="text-green-500" :to="{name:'home'}"> HOME</router-link>
            <router-link :to="{name:'profile'}" > PROFILE</router-link>

        </div>

        <div>
            <router-view></router-view>
        </div>
    </div>

</template>

<script>
export default {
    name: "app"
}
</script>
