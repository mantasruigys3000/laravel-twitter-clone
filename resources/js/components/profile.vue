<template>
    <div>

        <div class="container mx-auto font-bold text-white text-center max-w-lg text-lg mt-4 rounded-md shadow-md px-4">
            <div class="rounded-md bg-red-600 mb-4"> {{profile.username}}</div>
            <div class="flex flex-row justify-center ">
                <img  v-if="!editing"  class="  mr-4 align-middle object-cover h-48 w-48 mx-auto  rounded-full border-red-500 border-solid border-2 " alt="" :src=" profile.profile_picture ">
                <label v-if="editing " class="w-full">
                    <img  v-if="editing"  class=" hover:opacity-75 mr-4 align-middle object-cover h-48 w-48 mx-auto  rounded-full border-red-500 border-solid border-2 " alt="" :src=" profile.profile_picture ">

                    <input v-if="editing" type="file" @change="changeImage"  class=" hidden">
                </label>



                <div class="flex flex-col justify-between">
                    <h1 v-if="!editing" class="text-black text-left ">{{profile.bio}}</h1>
                    <textarea v-if="editing" v-model="profileEdit.bio" class=" font-bold text-black text-left float-right resize-none  "  > </textarea>
                    <div class="flex flex-row text-white font-bold  justify-between text-xs mb-4 ">
                        <p class="bg-red-700 px-1 mr-1 rounded-lg">Member since: 18/08/2020</p>
                        <p class="bg-red-700 px-1 mr-1 rounded-lg">Followers: 0</p>
                        <p class="bg-red-700 px-1 mr-1 rounded-lg">Following: 0</p>

                    </div>

                </div>
            </div>
            <div class="pb-2 mb-4">
                <button @click="editing = true" v-if="user.id === profile.id && !editing" class="hover:bg-red-500 bg-red-700 px-1 mr-1 rounded-full font-bold" >Edit Profile</button>
                <button @click="editing = false; editProfile()" v-if="user.id === profile.id && editing" class="hover:bg-red-500 bg-red-700 px-1 mr-1 rounded-full font-bold" >Submit</button>
                <button @click="followToggle()" v-if="user.id !== profile.id" class="hover:bg-red-500 bg-red-700 px-1 mr-1 rounded-full font-bold" >
                    {{ (this.isFollowing)? 'Unfollow':'Follow' }}</button>
            </div>
        </div>



        <post-input :user="user"></post-input>
        <postfeed type="profile" :profile="profile"></postfeed>




    </div>
</template>

<script>
export default {
    name: "profile",

    data(){
        return{
            profileEdit:{
                picture:null,
                bio: '',

            },
            profile: null,
            editing: false,
            isFollowing: false,



        }
    },

    mounted() {
      this.getProfile();

    },

    methods:{
      getProfile(){
            axios.get('/users/getuser/' + this.$route.params.username).then(rsp=>{
                this.profile = rsp.data.data;
                this.profileEdit.bio = this.profile.bio

                axios.get('/users/isFollowing/'+this.profile.id).then(rsp=>{
                    this.isFollowing=rsp.data;

                })

            });




        },

        editProfile(){
            let data = new FormData();
            data.append('bio',this.profileEdit.bio);
            data.append('file',this.profileEdit.picture);
            axios.post('/i/uploadImg',data).then(rsp=>{
                data.append('pic',rsp.data)
                return axios.post('/users/editbio',data)
            }).then(rsp=>{

            })

            this.profile.bio = this.profileEdit.bio;

        },

        changeImage(event){
          this.profileEdit.picture = event.target.files[0];

        },

        followToggle(){
            axios.post('/users/follow/' + this.profile.id).then(rsp=>{
                this.isFollowing = !this.isFollowing;
            })
        }
    },



    props:{
        user:{

        }
    }
}
</script>
