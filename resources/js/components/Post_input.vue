<template>
<div>
    <div class="">
        <form @submit.prevent="sendPost()">
            <textarea  v-model="post.content" class="d-flex" name="content" id="content" cols="30" rows="10"></textarea>
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
        },


    },

    mounted() {
        this.getPosts();
    }
}
</script>

