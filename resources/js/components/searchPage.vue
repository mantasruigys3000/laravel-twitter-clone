<template>
    <div>
        <h1>People</h1>
        <div v-for="person in  this.people">
            <p>{{ person.username }}</p>
            <br>
            <p>{{ person.bio }}</p>
        </div>

        <h1>Posts</h1>
        <div v-for="post in this.posts">
            <p>{{ post.content }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "searchPage",


    data(){
        return{
            people : [],
            posts: [],

        }
    },

    mounted() {
        this.getSearch();

    },


    methods:{
        getSearch(){
            axios.post('/searchAll',{'search':this.$route.params.q}).then(rsp=>{
                console.log(rsp);


                this.people = rsp.data.people;
                this.posts = rsp.data.posts;

            })
        }
    }
}
</script>


