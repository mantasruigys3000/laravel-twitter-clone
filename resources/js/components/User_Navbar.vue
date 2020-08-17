<template>
    <div class="w-full bg-red-500 flex flex-row align-center justify-center text-white font-bold">
        <div >
            <a href="/" class="px-4 font-bold">Home</a>
            <a :href=" '/profile/'+prof.username " class="px-4">Profile</a>

        </div>
        <div>
            <button v-if="isauth"  @click="logout()" class="px-4 font-bold">Logout</button>
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
        isauth:false,
        profile:'',



    },

    methods:{
        logout(){
            axios.post('/logout')
            window.location = '/login'

        }
    },


    mounted() {
        this.prof = JSON.parse(this.profile);

        axios.get('/notifications').then(rsp=>{
            this.notifications = rsp.data;
        })

    }
}
</script>

