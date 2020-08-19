<template>
<div>
    <div class="mx-auto max-w-lg shadow-md">
        <div class="flex flex-row">
            <img class="w-16 h-16 rounded-full object-cover" src="/images/default_pp.png" alt="">
            <div class="flex-col w-full">
                <h1 class="bg-red-600 w-full text-white font-bold text-center shadow-sm rounded-md">{{user.username}}</h1>
                <form @submit.prevent="sendPost()" >
                    <textarea  v-model="post.content" class="w-full " name="content" id="content" cols="30" rows="3" placeholder="Whats going on today?..."></textarea>
                    <input type="submit" value="Post" class="mb-4 float-right rounded-lg bg-red-600 hover:bg-red-500 text-white font-bold px-2"  >
                </form>
            </div>
        </div>



    </div>


</div>
</template>

<script>
export default {
    name: "post_input",
    data(){
        return{
            title: "twitter app",
            post:{
                content: null,

            },
            posts: [],

        }
    },

    methods:{
        sendPost(){
            axios.post('/post',this.post).then(rsp=>{
                this.posts.unshift(rsp.data.data);

            })
            window.location.reload()
        },


    },

    mounted() {

    },


    props:{
        user:{

        }
    }
}
</script>

