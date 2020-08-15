<template>
    <div class="mx-auto">
        <div v-for="post in this.posts">
            <div class="flex flex-col align-baseline">
                <div class="flex flex-row align-top mx-auto rounded-md items-top mb-8">
                    <img class=" rounded-full w-16 h-16 object-cover mr-4" :src="post.picture" alt="">
                    <div class="   ">
                        <a class="" :href=" '/profile/'+post.username "> <b><i>{{ post.username }}</i></b></a>
                        <p class=" w-64  min-w-64 text-wrap overflow-hidden break-all ">{{ post.content }}</p>


                        <div class="flex lex-row align-middle items-center">
                            <p class="pr-4">Likes: {{post.likescount}}</p>
                            <p>Shares: {{0}}</p>

                        </div>

                    </div>




                </div>



                <button class="text-blue-500" @click="likePost(post)"> {{(post.isLiked)? 'Unlike': 'Like'}} </button>
            </div>




        </div>
    </div>
</template>

<script>
export default {
    name: "postfeed",


    data(){
        return{
            profile: null,
            posts: [],


        }
    },

    props: {
        profilearr: null,
        type: {
            required: true,
            type: String,
        },

        auth_user: null,


    },

    methods: {

        getPosts(){
            let profiles = ['0'];
            let data = new FormData;


            if(this.type === "profile"){
                profiles.push(this.profilearr);
                data.append('profiles',JSON.stringify(profiles));
                axios.post('/posts',data).then(rsp=>{
                    this.posts = rsp.data.data;

                })
            }else if(this.type == "dashboard"){

                profiles.push(JSON.parse(this.auth_user).id);
                JSON.parse(this.profilearr).forEach(follow =>{
                    profiles.push(follow.pivot.follow_id);
                });

                data.append('profiles',JSON.stringify(profiles));
                axios.post('/posts',data).then(rsp=>{
                    this.posts = rsp.data.data;

                })



            }
        },


        likePost(post){

            let notif = new FormData();
            let content = post.username + " liked your post";
            notif.append('profile_id',post.posterId);
            notif.append('content',content);
            notif.append('link','/profile/'+post.username);
            notif.append('type','like');
            if(!post.isLiked){
                axios.post('/notification/create',notif).then(rsp=>{
                    console.log(rsp);

                })
            }

            axios.post('/posts/like/' + post.id).then(rsp=>{
                console.log(rsp.data);

            })
        }
    },

    mounted(){
        this.getPosts();
    }
}
</script>

<style scoped>

</style>
