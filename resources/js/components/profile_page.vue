<template>
    <div class="   font-sans font-bold">

            <div class="  bg-red-400 w-full  text-white shadow-xl py-4  ">
                <img  class=" align-middle object-cover h-48 w-48 mx-auto  rounded-full border-red-500 border-solid border-2 " alt="" :src=" this.user.profile_picture_link ">

                <div class="mx-auto text-center  w-64  px4 my-4">
                    <button v-if="!isThisAuth" @click="followButton()" class="hover:bg-white rounded-full bg-gray-200  p-3 text-red-400 "> {{ (isFollowing)? "Unfollow": "Follow" }}</button>
                    <button v-if=" isThisAuth" @click="editing = true" class="hover:bg-white rounded-full bg-gray-200  p-3 text-red-400 "> Edit Profile</button>

                    <h1 class="mx-auto text-center my-4      " > <i> @{{this.user.username }}</i></h1>
                    <p class="mx-auto text-center h-4 text-white mb-8 ">{{this.user.bio}}</p>


                </div>
            </div>

        <div v-if="editing" class="fixed inset-0  overflow-hidden">
            <div class="z-50 opacity-100 bg-white rounded-md  vertical-align-middle relative mx-auto m-auto inset-y-50 w-full max-w-md text-black opacity-100">
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






        <postfeed class="mx-auto mt-4" type="profile" :profilearr="this.user.id"></postfeed>






    </div>

</template>



<script>
export default {
    name: "profile_page",

    data(){
        return{
            user: null,
            isFollowing: false,
            editing: false,
            isAuth: false,
            isThisAuth: false,
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
        auth_usr: null,

    },

    mounted() {
        this.getUser();


    },

    methods:{
        getUser(){
            axios.get('/users/getuser/' + this.usr).then(rsp =>{
                console.log(rsp.data);

               this.user = rsp.data.data;


            }).then(r =>{
                this.getFollowing()
                this.isAuth = this.auth_usr !== "";
                this.isThisAuth = this.user.userId === JSON.parse(this.auth_usr).id
            });


        },


        getFollowing(){
            if(this.auth_user !== '') {
                axios.post('/users/isfollowing', {'following': this.user}).then(rsp => {
                    this.isFollowing =  rsp.data;
                })
            }
        },


        followButton(){
            if(this.isFollowing){
                //unfollow
                axios.post('/users/stopfollowing',{'following': this.user}).then(rsp=>{
                    console.log(rsp);
                })
                this.isFollowing = false;
            } else{
                //follow
                axios.post('/users/startfollowing',{'following': this.user}).then(rsp=>{
                    console.log(rsp);
                })
                this.isFollowing = true;

            }




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

    computed:{

    }





}
</script>

<style scoped>

</style>
