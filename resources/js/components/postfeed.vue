<template>
    <div class="mx-auto shadow-md max-w-md ">
        <div v-for="post in this.posts">
            <div class="flex flex-col align-baseline shadow-md rouded-md mt-4">
                <div class="flex flex-row align-top mx-auto rounded-md items-top mb-8">
                    <img class=" rounded-full w-16 h-16 object-cover mr-4" :src="post.picture" alt="">
                    <div class="   ">
<!--                        <a class="" :href=" '/profile/'+post.username "> <b><i>{{ post.username }}</i></b></a>-->
                        <RouterLink class="" :to=" '/profile/'+post.username "> <b><i>{{ post.username }}</i></b></RouterLink>
                        <p class=" w-64  min-w-64 text-wrap overflow-hidden break-all ">{{ post.content }}</p>


                        <div class="flex lex-row align-middle items-center">
                            <p class="pr-4">Likes: {{post.likescount}}</p>
                            <p>Shares: {{0}}</p>
                        </div>

                        <div>
                            <p>Created at {{post.created_at}}</p>
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

            posts: [],


        }
    },

    props: {
        profilearr: null,
        type: {
            required: true,
            type: String,
        },
        profile: null,

        auth_user: null,


    },

    methods: {

        getPosts(){


            if(this.type === "profile"){

                axios.get('/posts/' + this.profile.id).then(rsp=>{
                    this.posts = rsp.data.data;

                })
            }else if(this.type == "dashboard"){
                axios.get('/posts').then(rsp=>{
                    this.posts = rsp.data
                })

            }
        },


        likePost(post){

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
