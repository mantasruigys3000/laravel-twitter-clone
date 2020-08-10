<template>
    <div>
        <img   alt="" :src=" this.user.profile_picture ">
        <div>profile template {{this.user.username }}</div>
        <button @click="editing = true"> Edit Profile</button>
        <p>{{this.user.bio}}</p>



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
        }
    },

    mounted() {
        this.getUser();

    },

    methods:{
        getUser(){
            axios.get('/users/getuser/' + this.usr).then(rsp =>{
                console.log(rsp.data);

               this.user = rsp.data.data;
               this.user.profile_picture = (this.user.profile_picture !== null)? this.user.profile_picture: '/images/default_pp.png';

            })
        },


        editBio(){
            axios.post('/users/editbio',this.profileObj).then(rsp =>{
                console.log(rsp);

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
