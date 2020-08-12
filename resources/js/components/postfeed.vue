<template>
    <div>
        <div v-for="post in this.posts">
            <div class="flex flex-row align-middle  items-center mb-8">
                <img class=" rounded-full w-16 h-16" :src="post.picture" alt="">
                <div class="">
                    <a :href=" '/profile/'+post.username ">{{ post.username }}</a>
                    <p>{{ post.content }}</p>
                    <p>Likes: {{post.likescount}}</p>
                    <button class="text-green-500" @click="likePost(post)"> LIKE </button>

                </div>

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
        }
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
                profiles.push(JSON.parse(this.profilearr)[0].pivot.profile_id);
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
