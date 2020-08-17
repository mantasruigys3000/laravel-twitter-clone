<template>
<div>
    <div class="mx-auto">
        <form @submit.prevent="sendPost()" >
            <textarea  v-model="post.content" class=" bg-gray-200" name="content" id="content" cols="30" rows="10" placeholder="Whats going on today?..."></textarea>
            <input type="submit" value="Post" class="mb-4" >
        </form>
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

    }
}
</script>

