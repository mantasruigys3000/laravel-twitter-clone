<template>
    <div class="w-full bg-red-500 flex flex-row align-center p-2  shadow-lg justify-center text-white font-bold">
        <div >
            <router-link class="px-4 font-bold" :to="{name:'home'}"> Home</router-link>
            <router-link class="px-4 font-bold" :to="{name:'profile', params:{username:user.username}}" > Profile</router-link>

        </div>
        <div>
            <button v-if="user !== null"  @click="logout()" class="px-4 font-bold">Logout</button>
            <a href=""class="px-4">Login</a>
        </div>
        <div class="">
            <button @click="showNotifications = !showNotifications" class="px-4 font-bold w-32 relative" >Notifications</button>
            <div  v-if="showNotifications" class=" absolute bg-red-500 w-32 h-32 overflow-scroll">
                <div  class="relative " v-for="notification in this.notifications">
                    <div class="relative block bg-red-200">
                        {{ notification.content }}
                    </div>
                </div>
            </div>

        </div>
        <profilesearch></profilesearch>



    </div>
</template>

<script>


export default {
name: "User_Navbar",

    data(){
    return{
        prof: null,
        showNotifications: false,
        notifications: [],



    }

    },

    props:{

        user:{

        },



    },

    methods:{
        logout(){
            axios.post('/logout')
            window.location = '/login'

        }
    },


    mounted() {



    }
}
</script>

