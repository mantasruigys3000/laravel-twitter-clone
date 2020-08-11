<template>
    <div class="container mx-auto font-sans font-bold">
        <img  class="object-cover h-48 w-48 mx-auto rounded-full border-red-500 border-solid border-2" alt="" :src=" this.user.profile_picture_link ">
        <div class="mx-auto text-center  w-64  px4 my-4">

            <h1 class="mx-auto text-left my-4 bg-red-200 border-red-500 border-solid border-2 bg-red-200 " > {{this.user.username }}</h1>
            <p class="mx-auto text-center h-64 border-red-500 border-solid border-2 bg-red-200">{{this.user.bio}}</p>
            <button @click="" class="hover:bg-red-800  bg-red-500 p-3 "> Follow</button>
            <button v-if="auth_user !== '' " @click="editing = true" class="text-red-500 hover:text-red-800 "> Edit Profile</button>

        </div>

        <postfeed class="mx-auto object-center" type="profile" :profilearr="this.user.id"></postfeed>





        <div v-if="editing" class="absolute bg-black inset-0 opacity-50 z-40">
            <div class="z-30 bg-white relative mx-auto m-auto  w-full max-w-md text-black opacity-100">
                THIS IS MODAL
                <form @submit.prevent="editBio()" class="m-5">
                    <label for="pp">Profile Picture</label>
                    <input  id="pp" type="file" class="rounded-50" @change="changed">

                    <label for="Bio"></label>
                    <textarea name="bio" id="bio" cols="30" rows="10" v-model="profileObj.bio"></textarea>
                    <br>
                    <button @click="editing = false" class="">X</button>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>

</template>



<script>
export default {
    name: "Profile Page",

    data(){
        return{
            user: null,

            editing: false,
            profileObj:{
                bio: null,
                pic: null
            },


        }
    },

    props:{
        usr:{
            required: true,
            type: String,
        },
        auth_user: null,
    },

    mounted() {
        this.getUser();

    },

    methods:{
        getUser(){
            axios.get('/users/getuser/' + this.usr).then(rsp =>{
                console.log(rsp.data);

               this.user = rsp.data.data;


            })
        },


        editBio(){
            let data = new FormData();
            data.append('bio',this.profileObj.bio);
            data.append('file',this.profileObj.pic);
            axios.post('/i/uploadImg',data).then(rsp=>{
                data.append('pic',rsp.data.id)
                return axios.post('/users/editbio',data)
            }).then(rsp=>{

            })


        },

        changed(event){
            this.profileObj.pic = event.target.files[0];

        }


    },




}
</script>

<style scoped>

</style>
