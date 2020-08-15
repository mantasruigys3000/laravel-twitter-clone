<template>
    <div class="w-full bg-red-500 flex flex-row align-center justify-center text-white font-bold">
        <div>
            <a href="" class="px-4">Hone</a>
            <a href="" class="px-4">Profile</a>
            <a href="" class="px-4">Notifications</a>
        </div>
        <div>
            <button v-if="isauth"  @click="logout()" class="px-4">Logout</button>
            <a href=""class="px-4">Login</a>
        </div>

    </div>
</template>

<script>


export default {
name: "User_Navbar",

    data(){
    return{}

    },

    props:{
    isauth:false,

    },

    methods:{
        logout(){
            axios.post('/logout')
            window.location = '/login'

        }
    }
}
</script>

